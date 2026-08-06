@extends('layouts.app') {{-- استدعاء الهيدر والناف بار الرئيسي --}}

@section('content')
<style>
    body {
        background: #f8f9fa;
    }

    .table-card {
        border-radius: 15px;
        overflow: hidden;
        border: none;
    }

    .table thead th {
        background: #0b1f3a !important;
        color: white;
        border: none;
        padding: 15px;
        text-align: center;
    }

    .table tbody td {
        vertical-align: middle;
        text-align: center;
        padding: 12px;
    }

    .badge-available {
        background-color: #0d6efd;
        color: white;
    }

    .badge-rented {
        background-color: #dc3545;
        color: white;
    }
    
    .car-img-thumb {
        width: 60px;
        height: 40px;
        object-fit: cover;
        border-radius: 6px;
    }
</style>

<div class="container py-4">

    {{-- Header Section --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">Manage Cars</h3>
        </div>

        <a href="{{ route('admin.cars.create') }}" class="btn btn-primary rounded-pill px-4 fw-semibold">
            <i class="fa-solid fa-plus me-1"></i> Add Car
        </a>
    </div>

    {{-- Cars Table Card --}}
    <div class="card table-card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Price / Day</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                @forelse ($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>
                            @if (!empty($car->image))
                                <img src="{{ asset('storage/' . $car->image) }}" alt="car" class="car-img-thumb">
                            @else
                                <i class="fa-solid fa-car text-secondary fs-4"></i>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td class="fw-bold text-primary">{{ number_format($car->price_per_day, 2) }}EGP</td>
                        <td>
                            @if (strtolower($car->status) == 'available')
                                <span class="badge badge-available rounded-pill px-3 py-2">
                                    Available
                                </span>
                            @else
                                <span class="badge badge-rented rounded-pill px-3 py-2">
                                    Rented
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-dark btn-sm rounded-pill px-3">
                                Edit
                            </a>
                        </td>
                        <td>
                            {{-- نموذج الحذف لحماية POST/DELETE مع CSRF --}}
                            <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this car?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-car fs-1 d-block mb-2 opacity-50"></i>
                            No Cars Found
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection