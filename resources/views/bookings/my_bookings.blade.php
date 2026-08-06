@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <h2 class="mb-4 fw-bold">My Bookings</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    <div class="row">
        {{-- {{ dd($bookings) }} --}}

        @forelse($bookings as $booking)

            <div class="col-md-4 mb-4">

                <div class="card shadow-sm h-100 overflow-hidden">

                    @if($booking->car && $booking->car->image)
                        <img src="{{ asset('storage/'.$booking->car->image) }}"
                             class="card-img-top"
                             style="height:180px;object-fit:cover;">
                    @endif

                    <div class="card-body d-flex flex-column justify-content-between">

                        <div>

                            <h4 class="fw-bold">
                                {{ $booking->car->brand }}
                                {{ $booking->car->model }}
                            </h4>

                            <hr>

                            <p>
                                <strong>Pick-up Date:</strong>
                                {{ $booking->pickup_date }}
                            </p>

                            <p>
                                <strong>Return Date:</strong>
                                {{ $booking->return_date }}
                            </p>

                            <p>

                                <strong>Status:</strong>

                                @if($booking->status === 'Pending')

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                @elseif($booking->status === 'Approved' || $booking->status === 'Confirmed')

                                    <span class="badge bg-success">
                                        Confirmed
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Cancelled
                                    </span>

                                @endif

                            </p>

                        </div>

                        @if($booking->status !== 'Cancelled')

                            <form action="{{ route('bookings.destroy',$booking->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger w-100"
                                        onclick="return confirm('Are you sure?')">

                                    Cancel Booking

                                </button>

                            </form>

                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">
                    No bookings found yet.
                </p>
            </div>

        @endforelse

    </div>

</div>

@endsection