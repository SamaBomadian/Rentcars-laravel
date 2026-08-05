@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Bookings List</h2>

    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">
        Add Booking
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->date }}</td>
                <td>{{ $booking->time }}</td>

                <td>
                    <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this booking?')">
                            Delete
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection