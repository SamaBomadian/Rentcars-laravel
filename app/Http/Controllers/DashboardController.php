<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use App\Models\Booking;

class DashboardController extends Controller
{
    //
    public function index(){

        $users = User::count();
        $cars = Car::count();
        $bookings = Booking::count();
        return view('dashboard', compact('users', 'cars','bookings'));

        
    }
}
