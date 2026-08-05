<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// My Bookings
Route::get('/my-bookings', [BookingController::class, 'myBookings'])
    ->name('bookings.my');

// Bookings CRUD
Route::resource('bookings', BookingController::class);
