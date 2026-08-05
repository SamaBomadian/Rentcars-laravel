<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/bookings', [BookingController::class, 'index'])
        ->name('admin.bookings.index');

    Route::put('/bookings/{booking}/approve', [BookingController::class, 'approve'])
        ->name('admin.bookings.approve');

    Route::put('/bookings/{booking}/reject', [BookingController::class, 'reject'])
        ->name('admin.bookings.reject');
});
