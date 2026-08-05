@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Add Booking</h2>

    <form action="{{ route('bookings.store') }}" method="POST">

        @csrf

        <div class="mb-3">
    <label class="form-label">User</label>

    <select name="user_id" class="form-control">
        @foreach($users as $user)
            <option value="{{ $user->id }}">
                {{ $user->name }}
            </option>
        @endforeach
    </select>
</div>
        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Time</label>
            <input type="time" name="time" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Save Booking
        </button>

    </form>

</div>

@endsection