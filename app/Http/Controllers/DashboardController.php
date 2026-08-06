<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;

class DashboardController extends Controller
{
    //
    public function index(){

        return view('dashboard', [
            'users' => User::count(),
            'cars'  => Car::count(),
            'bookings' => 0, 
        ]);
    }
}
