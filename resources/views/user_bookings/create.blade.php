@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white p-4">
                    <h4 class="mb-0 fw-bold">Book a Car</h4>
                </div>

                <div class="card-body p-4 p-md-5">

                    {{-- عرض الأخطاء إن وجدت --}}
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 mb-4">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.bookings.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="car_id" class="form-label fw-bold text-secondary">Select Car:</label>
                            <select name="car_id" id="car_id" class="form-select rounded-3 py-2" required>
                                <option value="" selected disabled>-- Choose a Car --</option>
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                                        {{ $car->brand }} {{ $car->model }} ({{ number_format($car->price_per_day, 2) }} EGP / day)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="pickup_date" class="form-label fw-bold text-secondary">Pick-up Date:</label>
                                <input type="date" 
                                       id="pickup_date" 
                                       name="pickup_date" 
                                       class="form-control rounded-3 py-2" 
                                       value="{{ old('pickup_date', date('Y-m-d')) }}" 
                                       min="{{ date('Y-m-d') }}" 
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label for="return_date" class="form-label fw-bold text-secondary">Return Date:</label>
                                <input type="date" 
                                       id="return_date" 
                                       name="return_date" 
                                       class="form-control rounded-3 py-2" 
                                       value="{{ old('return_date', date('Y-m-d')) }}" 
                                       min="{{ old('pickup_date', date('Y-m-d')) }}" 
                                       required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('user.bookings.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold">
                                Confirm Booking
                            </button>
                        </div>
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