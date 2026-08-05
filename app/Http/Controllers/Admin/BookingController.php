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

        // Search
        if ($request->search) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        // Filter
        if ($request->status && $request->status != 'All') {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->paginate(5);

        // Statistics
        $total = Booking::count();
        $pending = Booking::where('status', 'Pending')->count();
        $approved = Booking::where('status', 'Approved')->count();
        $rejected = Booking::where('status', 'Rejected')->count();

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