@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">My Bookings</h2>
    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->date }}</td>
                <td>{{ $booking->time }}</td>
                <td>
                    {{ $booking->status }}
                </td>
                <td>
                    @if(strtolower($booking->status) == 'pending')
                    <form action="{{ route('bookings.destroy', $booking->id) }}" 
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to cancel this booking?')">
                            Cancel Booking
                        </button>
                    </form>
                    @elseif(strtolower($booking->status) == 'cancelled')
                        <span class="text-muted">
                            Cancelled
                        </span>
                    @else
                        <span class="text-success">
                            Confirmed
                        </span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">
                    No bookings found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection