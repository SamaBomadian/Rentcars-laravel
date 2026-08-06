use App\Models\User;
use App\Models\Car;
use App\Models\Booking;

Route::get('/dashboard', function () {
    return view('dashboard', [
        'users' => User::count(),
        'cars' => Car::count(),
        'bookings' => Booking::count(), 
    ]);
})->middleware(['auth'])->name('dashboard');