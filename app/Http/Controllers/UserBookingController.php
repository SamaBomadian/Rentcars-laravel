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
        $request->validate([
            'car_id'      => 'required|exists:cars,id',
            'pickup_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:pickup_date',
        ]);

        $hasOverlap = Booking::where('car_id', $request->car_id)
            ->whereIn('status', ['Pending', 'Approved', 'pending', 'approved'])
            ->where(function ($query) use ($request) {
                $query->where('pickup_date', '<=', $request->return_date)
                      ->where('return_date', '>=', $request->pickup_date);
            })
            ->exists();

        if ($hasOverlap) {
            return redirect()->back()
                ->withErrors(['pickup_date' => 'This car is already booked for the selected dates. Please choose different dates.'])
                ->withInput();
        }

        $car = Car::findOrFail($request->car_id);
        $startDate = Carbon::parse($request->pickup_date);
        $endDate   = Carbon::parse($request->return_date);
        $days      = $startDate->diffInDays($endDate) ?: 1; 
        $totalPrice = $days * $car->price_per_day;

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

        $hasOverlap = Booking::where('car_id', $request->car_id)
            ->where('id', '!=', $booking->id)
            ->whereIn('status', ['Pending', 'Approved', 'pending', 'approved'])
            ->where(function ($query) use ($request) {
                $query->where('pickup_date', '<=', $request->return_date)
                      ->where('return_date', '>=', $request->pickup_date);
            })
            ->exists();

        if ($hasOverlap) {
            return redirect()->back()
                ->withErrors(['pickup_date' => 'The selected dates conflict with an existing booking for this car.'])
                ->withInput();
        }

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