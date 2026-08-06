@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">My Bookings</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        @forelse($bookings as $booking)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-light text-center p-3">
                        @if($booking->car && $booking->car->image)
                            <img src="{{ asset('storage/' . $booking->car->image) }}" 
                                 alt="{{ $booking->car->brand }}" 
                                 class="img-fluid rounded-3" 
                                 style="height: 180px; object-fit: contain;">
                        @else
                            <div class="d-flex align-items-center justify-content-center text-muted" style="height: 180px;">
                                No Image Available
                            </div>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <h4 class="fw-bold text-dark mb-3">
                            {{ $booking->car->brand ?? 'Car' }} {{ $booking->car->model ?? '' }}
                        </h4>

                        <div class="mb-3 text-secondary">
                            <p class="mb-2">
                                <strong>Pick-up Date:</strong> {{ $booking->pickup_date }}
                            </p>
                            <p class="mb-2">
                                <strong>Return Date:</strong> {{ $booking->return_date }}
                            </p>
                            <p class="mb-2">
                                <strong>Total Price:</strong> 
                                <span class="text-success fw-bold">
                                    @if($booking->total_price > 0)
                                        {{ number_format($booking->total_price, 2) }} EGP
                                    @elseif($booking->car && $booking->pickup_date && $booking->return_date)
                                        @php
                                            $start = \Carbon\Carbon::parse($booking->pickup_date);
                                            $end   = \Carbon\Carbon::parse($booking->return_date);
                                            $days  = $start->diffInDays($end) ?: 1;
                                            $calculatedTotal = $days * $booking->car->price_per_day;
                                        @endphp
                                        {{ number_format($calculatedTotal, 2) }} EGP
                                    @else
                                        0.00 EGP
                                    @endif
                                </span>
                            </p>

                            <div class="d-flex align-items-center mt-3">
                                <strong class="me-2">Status:</strong> 
                                @php
                                    $statusClass = match(strtolower($booking->status)) {
                                        'approved' => 'bg-success text-white',
                                        'rejected', 'cancelled' => 'bg-danger text-white',
                                        default => 'bg-warning text-dark',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }} px-3 py-2 rounded-pill">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-auto pt-3 border-top d-flex gap-2">
                            @if(strtolower($booking->status) == 'pending')
                                <a href="{{ route('user.bookings.edit', $booking->id) }}" class="btn btn-outline-success btn-sm w-50 rounded-pill">
                                    Edit
                                </a>

                                <form action="{{ route('user.bookings.destroy', $booking->id) }}" method="POST" class="w-50">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-outline-danger btn-sm w-100 rounded-pill"
                                            onclick="return confirm('Are you sure you want to cancel this booking?')">
                                        Cancel Booking
                                    </button>
                                </form>
                            @else
                                <button class="btn btn-sucess btn-sm w-100 rounded-pill" disabled>
                                    Processed
                                </button>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">No bookings found yet.</p>
                <a href="{{ route('cars.index') }}" class="btn btn-primary rounded-pill px-4">
                    Browse Cars
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection