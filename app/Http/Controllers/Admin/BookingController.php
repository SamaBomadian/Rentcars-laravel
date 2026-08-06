<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'car']);

        if ($request->search) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->status && $request->status != 'All') {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->paginate(5);

        $total    = Booking::count();
        $pending  = Booking::whereIn('status', ['Pending', 'pending'])->count();
        $approved = Booking::whereIn('status', ['Approved', 'approved'])->count();
        $rejected = Booking::whereIn('status', ['Rejected', 'rejected'])->count();

        return view('admin.bookings.index', compact(
            'bookings',
            'total',
            'pending',
            'approved',
            'rejected'
        ));
    }

    public function approve(Booking $booking)
    {
        $hasOverlap = Booking::where('car_id', $booking->car_id)
            ->where('id', '!=', $booking->id)
            ->whereIn('status', ['Approved', 'approved'])
            ->where(function ($query) use ($booking) {
                $query->where('pickup_date', '<=', $booking->return_date)
                      ->where('return_date', '>=', $booking->pickup_date);
            })
            ->exists();

        if ($hasOverlap) {
            return redirect()->route('admin.bookings.index')
                ->with('error', 'لا يمكن قبول الحجز وجود تعارض مع حجز مقبوض سابقاً بنفس التواريخ!');
        }

        $booking->status = 'Approved'; 
        $booking->save();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking approved successfully.');
    }

    public function reject(Booking $booking)
    {
        $booking->status = 'Rejected'; 
        $booking->save();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking rejected successfully.');
    }
}