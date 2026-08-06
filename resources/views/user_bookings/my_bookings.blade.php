@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">My Bookings</h2>

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
                <th width="220">Action</th>
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

                    @if($booking->status == 'Pending')

                        <a href="{{ route('bookings.edit',$booking->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('bookings.destroy',$booking->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Cancel this booking?')">
                                Cancel
                            </button>

                        </form>

                    @elseif($booking->status == 'Cancelled')

                        <span class="text-danger">
                            Cancelled
                        </span>

                    @elseif($booking->status == 'Approved')

                        <span class="text-success">
                            Approved
                        </span>

                    @else

                        <span class="text-secondary">
                            {{ $booking->status }}
                        </span>

                    @endif

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    No bookings found.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection