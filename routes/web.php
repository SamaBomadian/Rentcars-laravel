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

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])
    ->name('home.dashboard');

/*
|--------------------------------------------------------------------------
| Cars
|--------------------------------------------------------------------------
*/

Route::get('/cars', [CarController::class, 'index'])
    ->name('cars.user.index');

Route::get('/cars/{id}', [CarController::class, 'show'])
    ->name('cars.show');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('cars', AdminCarController::class);

        Route::resource('users', UserController::class);

        Route::get('/bookings', [BookingController::class, 'index'])
            ->name('bookings.index');

        Route::put('/bookings/{booking}', [BookingController::class, 'update'])
            ->name('bookings.update');

        Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])
            ->name('bookings.destroy');

        Route::post('/bookings/{booking}/approve', [BookingController::class, 'approve'])
            ->name('bookings.approve');

        Route::post('/bookings/{booking}/reject', [BookingController::class, 'reject'])
            ->name('bookings.reject');

        Route::get('/bookings/{booking}', [BookingController::class, 'show'])
            ->name('bookings.show');
    });
    Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

});

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| User Bookings
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/my-bookings', [UserBookingController::class, 'index'])
        ->name('user.bookings.index');

    Route::get('/bookings/create', [UserBookingController::class, 'create'])
        ->name('user.bookings.create');

    Route::post('/bookings', [UserBookingController::class, 'store'])
        ->name('user.bookings.store');

    Route::get('/bookings/{id}/edit', [UserBookingController::class, 'edit'])
        ->name('user.bookings.edit');

    Route::put('/bookings/{id}', [UserBookingController::class, 'update'])
        ->name('user.bookings.update');

    Route::delete('/bookings/{id}', [UserBookingController::class, 'destroy'])
        ->name('user.bookings.destroy');
});

Auth::routes();

require __DIR__.'/auth.php';