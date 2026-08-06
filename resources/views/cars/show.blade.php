@extends('layouts.app')

@section('content')

<div class="container py-5">

    <a href="{{ route('cars.index') }}"
       class="btn btn-outline-secondary mb-4 rounded-pill px-4">

        <i class="fa-solid fa-arrow-left me-2"></i>

        Back to Cars

    </a>

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <div class="row g-0">

            <!-- Image -->

            <div class="col-lg-6 bg-light d-flex align-items-center justify-content-center p-4">

                <img
                    src="{{ asset('storage/'.$car->image) }}"
                    alt="{{ $car->brand }}"
                    class="img-fluid rounded-3"
                    style="max-height:350px; object-fit:contain;">

            </div>

            <!-- Details -->

            <div class="col-lg-6 p-4 p-md-5 d-flex flex-column justify-content-between">

                <div>

                    <div class="d-flex justify-content-between align-items-center mb-2">

                        <span class="badge bg-primary-subtle text-primary fs-6 px-3 py-2 rounded-pill">

                            {{ $car->status }}

                        </span>

                        <h3 class="text-primary fw-bold mb-0">

                            ${{ $car->price_per_day }}

                            <span class="fs-6 text-muted fw-normal">

                                / day

                            </span>

                        </h3>

                    </div>

                    <h1 class="fw-bold display-6 mb-3">

                        {{ $car->brand }} {{ $car->model }}

                    </h1>

                    <hr>

                    <h5 class="fw-bold mb-3">

                        Car Features

                    </h5>

                    <div class="row g-3">

                        <div class="col-6">

                            <i class="fa-regular fa-user text-primary me-2"></i>

                            <strong>Passengers:</strong>

                            {{ $car->passengers }}

                        </div>

                        <div class="col-6">

                            <i class="fa-solid fa-gear text-primary me-2"></i>

                            <strong>Transmission:</strong>

                            {{ $car->transmission }}

                        </div>

                        <div class="col-6">

                            <i class="fa-solid fa-car-side text-primary me-2"></i>

                            <strong>Doors:</strong>

                            {{ $car->doors }}

                        </div>

                        <div class="col-6">

                            <i class="fa-regular fa-snowflake text-primary me-2"></i>

                            <strong>A/C:</strong>

                            {{ $car->air_conditioning }}

                        </div>

                    </div>

                </div>

                <div class="mt-4">

                    <form action="{{ route('bookings.store') }}" method="POST">

                        @csrf
                        

                        <input
                            type="hidden"
                            name="car_id"
                            value="{{ $car->id }}">

                        <div class="row g-2 mb-3">

                            <div class="col-md-6">

                                <label class="form-label">

                                    Pick-up Date

                                </label>

                                <input
                                    type="date"
                                    class="form-control"
                                    name="pickup_date"
                                    required/>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">

                                    Return Date

                                </label>

                                <input
                                    type="date"
                                    class="form-control"
                                    name="return_date"
                                    required/>

                            </div>

                        </div>

                        <button
                            class="btn btn-primary btn-lg w-100 rounded-pill">

                            Proceed to Booking

                            <i class="fa-solid fa-arrow-right ms-2"></i>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection