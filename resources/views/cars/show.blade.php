@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary mb-4 rounded-pill px-4">
        <i class="fa-solid fa-arrow-left me-2"></i> Back to Cars
    </a>

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="row g-0">
            
            <div class="col-lg-6 bg-light d-flex align-items-center justify-content-center p-4">
                @if($car->image)
                    <img src="{{ asset('storage/' . $car->image) }}" 
                         alt="{{ $car->brand }}" 
                         class="img-fluid rounded-3" 
                         style="max-height: 350px; object-fit: contain;">
                @else
                    <div class="py-5 text-muted fs-5">No Image Available</div>
                @endif
            </div>

            <div class="col-lg-6 p-4 p-md-5 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-primary-subtle text-primary fs-6 px-3 py-2 rounded-pill">
                            {{ $car->status ?? 'Available' }}
                        </span>
                        <h3 class="text-primary fw-bold mb-0">
                            {{ number_format($car->price_per_day, 2) }} EGP <span class="fs-6 text-muted fw-normal">/ day</span>
                        </h3>
                    </div>

                    <h1 class="fw-bold text-dark display-6 mb-3">
                        {{ $car->brand . ' ' . $car->model }}
                    </h1>

                    <hr class="my-4">

                    <h5 class="fw-bold mb-3">Car Features:</h5>
                    <div class="row g-3 mb-4 text-secondary fs-6">
                        <div class="col-6">
                            <i class="fa-regular fa-user text-primary me-2"></i> 
                            <strong>Passengers:</strong> {{ $car->passengers ?? $car->seats ?? '2' }}
                        </div>
                        <div class="col-6">
                            <i class="fa-solid fa-gear text-primary me-2"></i> 
                            <strong>Transmission:</strong> {{ $car->transmission ?? 'Auto' }}
                        </div>
                        <div class="col-6">
                            <i class="fa-solid fa-car-side text-primary me-2"></i> 
                            <strong>Doors:</strong> {{ $car->doors ?? '2' }}
                        </div>
                        <div class="col-6">
                            <i class="fa-regular fa-snowflake text-primary me-2"></i> 
                            <strong>A/C:</strong> {{ isset($car->air_conditioning) ? ($car->air_conditioning ? 'Yes' : 'No') : 'Yes' }}
                        </div>
                    </div>
                </div>

                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 mb-3">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car->id }}">

                        <div class="row g-2 mb-3">
                            <div class="col-md-6">
                                <label for="pickup_date" class="form-label small fw-bold text-secondary">Pick-up Date:</label>
                                <input type="date" 
                                       id="pickup_date" 
                                       name="pickup_date" 
                                       class="form-control rounded-3" 
                                       value="{{ old('pickup_date', date('Y-m-d')) }}" 
                                       min="{{ date('Y-m-d') }}" 
                                       required>
                            </div>
                            <div class="col-md-6">
                                <label for="return_date" class="form-label small fw-bold text-secondary">Return Date:</label>
                                <input type="date" 
                                       id="return_date" 
                                       name="return_date" 
                                       class="form-control rounded-3" 
                                       value="{{ old('return_date', date('Y-m-d')) }}" 
                                       min="{{ old('pickup_date', date('Y-m-d')) }}" 
                                       required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill py-3 fw-bold shadow">
                            Proceed to Booking <i class="fa-solid fa-arrow-right ms-2"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pickupInput = document.getElementById('pickup_date');
        const returnInput = document.getElementById('return_date');

        pickupInput.addEventListener('change', function () {
            const selectedPickupDate = this.value;
            returnInput.min = selectedPickupDate;

            if (returnInput.value && returnInput.value < selectedPickupDate) {
                returnInput.value = selectedPickupDate;
            }
        });
    });
</script>
@endsection