<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserBookingController extends Controller
{
    public function index()
    {
        // إحضار جميع حجوزات المستخدم الحالي من جدول bookings
        $bookings = Booking::with('car')->where('user_id', Auth::id())->latest()->get();

    return view('user_bookings.my_bookings', compact('bookings'));
    }

    public function create()
    {
        $cars = Car::all();
        return view('user_bookings.create', compact('cars'));
    }

    public function store(Request $request)
    {
        // 1. التحقق من البيانات لمنع التواريخ القديمة
        $request->validate([
            'car_id'      => 'required|exists:cars,id',
            'pickup_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:pickup_date',
        ]);

        // 2. حساب السعر الإجمالي بناءً على عدد الأيام
        $car = Car::findOrFail($request->car_id);
        $startDate = Carbon::parse($request->pickup_date);
        $endDate   = Carbon::parse($request->return_date);
        $days      = $startDate->diffInDays($endDate) ?: 1; // يحسب يوماً واحداً إذا كانت نفس اليوم
        $totalPrice = $days * $car->price_per_day;

        // 3. الحفظ في جدول bookings الرئيسي مباشرة
        Booking::create([
            'user_id'        => Auth::id(),
            'car_id'         => $request->car_id,
            'pickup_date'    => $request->pickup_date,
            'return_date'    => $request->return_date,
            'total_price'    => $totalPrice,
            'payment_method' => $request->payment_method ?? 'Cash',
            'payment_status' => 'Pending',
            'status'         => 'Pending',
        ]);

        return redirect()->route('user.bookings.index')
            ->with('success', 'Booking sent successfully.');
    }

    public function edit($id)
    {
        $booking = Booking::where('user_id', Auth::id())->findOrFail($id);
        $cars = Car::all();

        return view('user_bookings.edit', compact('booking', 'cars'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'car_id'      => 'required|exists:cars,id',
            'pickup_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:pickup_date',
        ]);

        $booking = Booking::where('user_id', Auth::id())->findOrFail($id);

        // إعادة حساب السعر في حال تغيرت التواريخ أو السيارة
        $car = Car::findOrFail($request->car_id);
        $startDate = Carbon::parse($request->pickup_date);
        $endDate   = Carbon::parse($request->return_date);
        $days      = $startDate->diffInDays($endDate) ?: 1;
        $totalPrice = $days * $car->price_per_day;

        $booking->update([
            'car_id'      => $request->car_id,
            'pickup_date' => $request->pickup_date,
            'return_date' => $request->return_date,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('user.bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $booking = Booking::where('user_id', Auth::id())->findOrFail($id);
        $booking->delete();

        return redirect()->route('user.bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}