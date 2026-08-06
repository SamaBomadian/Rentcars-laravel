@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Create Booking</h2>

        <a href="{{ route('bookings.my') }}" class="btn btn-secondary">
            Back
        </a>

    </div>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    <form action="{{ route('bookings.store') }}" method="POST">

        @csrf


        <div class="row">


            {{-- Select Car --}}

            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Select Car
                </label>


                <select name="car_id" class="form-control" required>

                    <option value="">
                        -- Choose Car --
                    </option>


                    @forelse($cars as $car)

                        <option value="{{ $car->id }}">

                            {{ $car->brand }}
                            {{ $car->model }}
                            -
                            ${{ $car->price_per_day }}/Day

                        </option>


                    @empty

                        <option disabled>
                            No Cars Available
                        </option>


                    @endforelse


                </select>


            </div>





            {{-- Date --}}

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Booking Date
                </label>


                <input 
                    type="date"
                    name="date"
                    class="form-control"
                    required
                >


            </div>





            {{-- Time --}}

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Booking Time
                </label>


                <input 
                    type="time"
                    name="time"
                    class="form-control"
                    required
                >


            </div>



        </div>



        <button type="submit" class="btn btn-primary">

            Create Booking

        </button>


    </form>


</div>


@endsection