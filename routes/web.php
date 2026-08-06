<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserBookingController;

use App\Http\Controllers\Admin\AdminCarController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BookingController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home.dashboard');

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');



Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Bookings Routes
    Route::get('/my-bookings', [UserBookingController::class, 'index'])->name('user.bookings.index');
    Route::get('/bookings/create', [UserBookingController::class, 'create'])->name('user.bookings.create');
    Route::post('/bookings', [UserBookingController::class, 'store'])->name('user.bookings.store');
    Route::get('/bookings/{id}/edit', [UserBookingController::class, 'edit'])->name('user.bookings.edit');
    Route::put('/bookings/{id}', [UserBookingController::class, 'update'])->name('user.bookings.update');
    Route::delete('/bookings/{id}', [UserBookingController::class, 'destroy'])->name('user.bookings.destroy');
});



Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('cars', AdminCarController::class);
    Route::resource('users', UserController::class);

    // Admin Bookings Management
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::post('/bookings/{booking}/approve', [BookingController::class, 'approve'])->name('bookings.approve');
    Route::post('/bookings/{booking}/reject', [BookingController::class, 'reject'])->name('bookings.reject');
});

require __DIR__ . '/auth.php';