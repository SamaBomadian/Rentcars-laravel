<?php

namespace App\Http\Controllers;

use App\Models\UserBooking;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBookingController extends Controller
{
    public function index()
    {
        $bookings = UserBooking::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user_bookings.index', compact('bookings'));
    }

    public function create()
    {
        $cars = Car::all();

        return view('user_bookings.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
        ]);

        // حفظ في جدول المستخدم
        $userBooking = UserBooking::create([
            'user_id' => Auth::id(),
            'car_id' => $request->car_id,
            'pickup_date' => $request->pickup_date,
            'pickup_time' => $request->pickup_time,
            'status' => 'Pending',
        ]);

        // حفظ في جدول الأدمن
        Booking::create([
            'user_id' => Auth::id(),
            'car_id' => $request->car_id,
            'pickup_date' => $request->pickup_date,
            'return_date' => null,
            'total_price' => 0,
            'payment_method' => '',
            'payment_status' => 'Pending',
            'status' => 'Pending',
        ]);

        return redirect()->route('user.bookings.index')
            ->with('success', 'Booking sent successfully.');
    }

    public function edit($id)
    {
        $booking = UserBooking::findOrFail($id);
        $cars = Car::all();

        return view('user_bookings.edit', compact('booking', 'cars'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
        ]);

        $booking = UserBooking::findOrFail($id);

        $booking->update([
            'car_id' => $request->car_id,
            'pickup_date' => $request->pickup_date,
            'pickup_time' => $request->pickup_time,
        ]);

        // تحديث نسخة الأدمن
        $adminBooking = Booking::where('user_id', Auth::id())
            ->where('car_id', $booking->car_id)
            ->where('pickup_date', $booking->pickup_date)
            ->first();

        if ($adminBooking) {
            $adminBooking->update([
                'car_id' => $request->car_id,
                'pickup_date' => $request->pickup_date,
            ]);
        }

        return redirect()->route('user.bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $booking = UserBooking::findOrFail($id);

        // حذف نسخة الأدمن
        Booking::where('user_id', Auth::id())
            ->where('car_id', $booking->car_id)
            ->where('pickup_date', $booking->pickup_date)
            ->delete();

        // حذف نسخة المستخدم
        $booking->delete();

        return redirect()->route('user.bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}