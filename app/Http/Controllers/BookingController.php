<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\User;
use App\Models\Car;
use Carbon\Carbon;


class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();

        return view('bookings.index', compact('bookings'));
    }


    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();

        return view('bookings.my_bookings', compact('bookings'));
    }


    public function create()
    {
        $users = User::all();

        return view('bookings.create', compact('users'));
    }




public function store(Request $request)
{
    $car = Car::findOrFail($request->car_id);

    $pickup = Carbon::parse($request->pickup_date);
    $return = Carbon::parse($request->return_date);

    $days = $pickup->diffInDays($return);

    // لو نفس اليوم اعتبره يوم واحد
    if ($days == 0) {
        $days = 1;
    }

    $totalPrice = $days * $car->price_per_day;

    Booking::create([
        'user_id' => Auth::id(),
        'car_id' => $request->car_id,
        'pickup_date' => $request->pickup_date,
        'return_date' => $request->return_date,
        'total_price' => $totalPrice,
        'status' => 'Pending',
    ]);

    return redirect()->route('bookings.my')
        ->with('success', 'Booking created successfully.');
}


    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $users = User::all();

        return view('bookings.edit', compact('booking', 'users'));
    }


    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking updated successfully.');
    }


    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'Cancelled'
        ]);

        return redirect()->route('bookings.my')
                         ->with('success', 'Booking cancelled successfully.');
    }
}