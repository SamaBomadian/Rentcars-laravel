@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Edit Booking</h2>

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">User</label>

            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}"
                        {{ $booking->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control"
                   value="{{ $booking->date }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Time</label>
            <input type="time" name="time" class="form-control"
                   value="{{ $booking->time }}">
        </div>

        <button type="submit" class="btn btn-success">
            Update Booking
        </button>

        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection