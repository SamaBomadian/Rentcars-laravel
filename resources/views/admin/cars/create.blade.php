@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-dark text-white p-4">
                    <h4 class="fw-bold mb-0"><i class="fa-solid fa-plus me-2"></i>Add New Car</h4>
                </div>
                
                <div class="card-body p-4">

                    {{-- عرض أخطاء الـ Validation إن وجدت --}}
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <!-- Brand -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Brand</label>
                                <input type="text" name="brand" class="form-control rounded-3" placeholder="e.g. Toyota" value="{{ old('brand') }}" required>
                            </div>

                            <!-- Model -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Model</label>
                                <input type="text" name="model" class="form-control rounded-3" placeholder="e.g. Corolla" value="{{ old('model') }}" required>
                            </div>

                            <!-- Price Per Day -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Price / Day (EGP)</label>
                                <input type="number" step="0.01" name="price_per_day" class="form-control rounded-3" placeholder="e.g. 1500" value="{{ old('price_per_day') }}" required>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Status</label>
                                <select name="status" class="form-select rounded-3">
                                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>Rented</option>
                                </select>
                            </div>

                            <!-- Passengers -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Passengers</label>
                                <input type="number" name="passengers" class="form-control rounded-3" placeholder="e.g. 5" value="{{ old('passengers') }}" required>
                            </div>

                            <!-- Transmission -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Transmission</label>
                                <select name="transmission" class="form-select rounded-3">
                                    <option value="Automatic" {{ old('transmission') == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                                    <option value="Manual" {{ old('transmission') == 'Manual' ? 'selected' : '' }}>Manual</option>
                                </select>
                            </div>

                            <!-- Doors -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Doors</label>
                                <input type="number" name="doors" class="form-control rounded-3" placeholder="e.g. 4" value="{{ old('doors') }}" required>
                            </div>

                            <!-- Air Conditioning -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Air Conditioning</label>
                                <select name="air_conditioning" class="form-select rounded-3">
                                    <option value="1" {{ old('air_conditioning') == '1' ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('air_conditioning') == '0' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            <!-- Image Upload -->
                            <div class="col-12 mb-3">
                                <label class="form-label fw-semibold">Car Image</label>
                                <input type="file" name="image" class="form-control rounded-3" required>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary rounded-pill px-4">
                                Add Car
                            </button>
                            <a href="{{ route('admin.cars.index') }}" class="btn btn-light border rounded-pill px-4">
                                Cancel
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection