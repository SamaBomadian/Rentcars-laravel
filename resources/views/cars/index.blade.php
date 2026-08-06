@extends('layouts.app')

@section('content')

<section class="py-5 bg-light" id="cars">
    <div class="container">

        <div class="text-center mb-5">
            <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2 rounded-pill mb-2 text-uppercase fs-7">
                POPULAR RENTAL DEALS
            </span>

            <h2 class="fw-bold text-dark display-6">
                Most popular cars rental deals
            </h2>
        </div>

        <form action="{{ route('cars.index') }}" method="GET" class="row g-2 mb-5 justify-content-center">

            <div class="col-md-6">

                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    class="form-control form-control-lg rounded-pill px-4"
                    placeholder="Search by brand or model">

            </div>

            <div class="col-md-2">

                <button class="btn btn-primary btn-lg rounded-pill w-100">

                    <i class="fa-solid fa-magnifying-glass me-1"></i>

                    Search

                </button>

            </div>

        </form>

        <div class="row g-4">

            @forelse($cars as $car)

                <div class="col-lg-3 col-md-6">

                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2 custom-car-card">

                        <img
                            src="{{ asset('storage/'.$car->image) }}"
                            class="card-img-top p-3"
                            alt="{{ $car->brand }}"
                            style="height:180px;object-fit:contain;">

                        <div class="card-body d-flex flex-column pt-0">

                            <h5 class="fw-bold mb-1">

                                {{ $car->brand }} {{ $car->model }}

                            </h5>

                            <div class="d-flex align-items-center mb-3 text-warning small">

                                ⭐

                                <span class="fw-bold text-dark ms-1">4.8</span>

                                <span class="text-muted ms-1">(1,250 reviews)</span>

                            </div>

                            <div class="row g-2 mb-4 text-muted small">

                                <div class="col-6">
                                    <i class="fa-regular fa-user me-2"></i>
                                    {{ $car->passengers }}
                                </div>

                                <div class="col-6">
                                    <i class="fa-solid fa-gear me-2"></i>
                                    {{ $car->transmission }}
                                </div>

                                <div class="col-6">
                                    <i class="fa-regular fa-snowflake me-2"></i>
                                    {{ $car->air_conditioning }}
                                </div>

                                <div class="col-6">
                                    <i class="fa-solid fa-car-side me-2"></i>
                                    {{ $car->doors }}
                                </div>

                            </div>

                            <hr class="mt-auto">

                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <span class="text-muted">
                                    Price
                                </span>

                                <div>

                                    <span class="fw-bold fs-5">

                                        {{ $car->price_per_day }}EGP

                                    </span>

                                    <span class="text-muted">
                                        /day
                                    </span>

                                </div>

                            </div>
                            <a href="{{ route('cars.show',$car->id) }}"
                               class="btn btn-primary w-100">
                                Rent Now
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="text-center py-5">

                    <h4>No cars found.</h4>

                    <a href="{{ route('cars.index') }}"
                       class="btn btn-outline-primary">

                        View All Cars

                    </a>

                </div>

            @endforelse

        </div>

    </div>
</section>

@endsection