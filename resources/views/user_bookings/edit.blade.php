@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2>Edit Booking</h2>

    <form action="{{ route('bookings.update', $booking->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Car</label>

            <select name="car_id" class="form-control">

                @foreach($cars as $car)

                    <option value="{{ $car->id }}"
                        {{ $booking->car_id == $car->id ? 'selected' : '' }}>

                        {{ $car->brand }} {{ $car->model }}

                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Pickup Date</label>

            <input type="date"
                   name="pickup_date"
                   value="{{ $booking->pickup_date }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Return Date</label>

            <input type="date"
                   name="return_date"
                   value="{{ $booking->return_date }}"
                   class="form-control"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">
            Update Booking
        </button>

    </form>

</div>

@endsection