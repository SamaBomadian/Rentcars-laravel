<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminCarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

// 1. الصفحة الرئيسية والسيارات العامة للزوار
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');

// 2. مسارات تحتاج تسجيل دخول (المستخدمين والأدمن)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // لوحة التحكم
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // صفحة عرض البروفايل الرئيسية
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    
    // صفحة تعديل البروفايل (تغيير المسار لـ /profile/edit لفك التعارض)
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. مسارات الأدمن
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('cars', AdminCarController::class);
});

require __DIR__ . '/auth.php';