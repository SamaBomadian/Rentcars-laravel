@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2>Add Booking</h2>

    <form action="{{ route('user.bookings.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Car</label>

            <select name="car_id" class="form-control">

                @foreach($cars as $car)

                    <option value="{{ $car->id }}">
                        {{ $car->brand }} {{ $car->model }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Pickup Date</label>

            <input type="date"
                   name="pickup_date"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">Pickup Time</label>

            <input type="time"
                   name="pickup_time"
                   class="form-control"
                   required>

        </div>

        <button class="btn btn-success">
            Book Now
        </button>

    </form>

</div>

@endsection