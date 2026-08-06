@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-dark text-white p-4">
                    <h4 class="fw-bold mb-0"><i class="fa-solid fa-pen-to-square me-2"></i>Edit Car</h4>
                </div>
                
                <div class="card-body p-4">

                    {{-- عرض الأخطاء إن وجدت --}}
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <!-- Brand -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Brand</label>
                                <input type="text" name="brand" class="form-control rounded-3" value="{{ old('brand', $car->brand) }}" required>
                            </div>

                            <!-- Model -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Model</label>
                                <input type="text" name="model" class="form-control rounded-3" value="{{ old('model', $car->model) }}" required>
                            </div>

                            <!-- Price Per Day -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Price / Day (EGP)</label>
                                <input type="number" step="0.01" name="price_per_day" class="form-control rounded-3" value="{{ old('price_per_day', $car->price_per_day) }}" required>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Status</label>
                                <select name="status" class="form-select rounded-3">
                                    <option value="available" {{ old('status', strtolower($car->status)) == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="rented" {{ old('status', strtolower($car->status)) == 'rented' ? 'selected' : '' }}>Rented</option>
                                </select>
                            </div>

                            <!-- Passengers -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Passengers</label>
                                <input type="number" name="passengers" class="form-control rounded-3" value="{{ old('passengers', $car->passengers) }}" placeholder="e.g. 5" required>
                            </div>

                            <!-- Transmission -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Transmission</label>
                                <select name="transmission" class="form-select rounded-3">
                                    <option value="Automatic" {{ old('transmission', $car->transmission) == 'Automatic' || old('transmission', $car->transmission) == 'Auto' ? 'selected' : '' }}>Automatic</option>
                                    <option value="Manual" {{ old('transmission', $car->transmission) == 'Manual' ? 'selected' : '' }}>Manual</option>
                                </select>
                            </div>

                            <!-- Doors -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Doors</label>
                                <input type="number" name="doors" class="form-control rounded-3" value="{{ old('doors', $car->doors) }}" placeholder="e.g. 4" required>
                            </div>

                            <!-- Air Conditioning -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Air Conditioning</label>
                                <select name="air_conditioning" class="form-select rounded-3">
                                    <option value="1" {{ old('air_conditioning', $car->air_conditioning) == '1' || old('air_conditioning', $car->air_conditioning) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('air_conditioning', $car->air_conditioning) == '0' || old('air_conditioning', $car->air_conditioning) == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            <!-- Image Upload -->
                            <div class="col-12 mb-3">
                                <label class="form-label fw-semibold">Car Image</label>
                                @if (!empty($car->image))
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/'. $car->image) }}" alt="Current Image" class="rounded-3" style="max-height: 80px;">
                                    </div>
                                @endif
                                <input type="file" name="image" class="form-control rounded-3">
                                <small class="text-muted">Leave empty if you don't want to change the image.</small>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary rounded-pill px-4">
                                Save Changes
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