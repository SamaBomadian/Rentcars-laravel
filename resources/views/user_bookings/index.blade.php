@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>My Bookings</h2>

        <a href="{{ route('user.bookings.create') }}" class="btn btn-primary">
            Add Booking
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Car</th>
                <th>Pickup Date</th>
                <th>Pickup Time</th>
                <th>Status</th>
                <th width="220">Actions</th>
            </tr>
        </thead>

        <tbody>

        @forelse($bookings as $booking)

            <tr>

                <td>{{ $booking->id }}</td>

                <td>
                    {{ $booking->car->brand ?? '' }}
                    {{ $booking->car->model ?? '' }}
                </td>

                <td>{{ $booking->pickup_date }}</td>

                <td>{{ $booking->pickup_time }}</td>

                <td>
                    <span class="badge bg-secondary">
                        {{ $booking->status }}
                    </span>
                </td>

                <td>

                    <a href="{{ route('user.bookings.edit',$booking->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('user.bookings.destroy',$booking->id) }}"
                          method="POST"
                          style="display:inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this booking?')">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>
        @empty

            <tr>
                <td colspan="6" class="text-center">
                    No Bookings Found
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

@endsection