@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Add New Car</h2>

    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control">
        </div>

        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" class="form-control">
        </div>

        <div class="mb-3">
            <label>Price Per Day</label>
            <input type="text" name="price_per_day" class="form-control">
        </div>

        <div class="mb-3">
            <label>passengers</label>
            <input type="number" name="passengers" class="form-control">
        </div>

        <div class="mb-3">
            <label>doors</label>
            <input type="number" name="doors" class="form-control">
        </div>
        <div class="mb-3">
            <label>Air Conditioning</label>
            <select name="air_conditioning" class="form-control">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Transmission</label>
            <select name="transmission" class="form-control">
                <option value="Manual">Manual</option>
                <option value="Automatic">Automatic</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>

</div>

@endsection