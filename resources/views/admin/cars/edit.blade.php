@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Edit Car</h2>

    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Car Name</label>
            <input type="text" name="name" class="form-control" value="{{ $car->name }}">
        </div>

        <div class="mb-3">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ $car->brand }}">
        </div>

        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" class="form-control" value="{{ $car->model }}">
        </div>

        <div class="mb-3">
            <label>Year</label>
            <input type="number" name="year" class="form-control" value="{{ $car->year }}">
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ $car->price }}">
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>

            @if($car->image)
                <img src="{{ asset('storage/'.$car->image) }}" width="150">
            @endif
        </div>

        <div class="mb-3">
            <label>New Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Update
        </button>
    </form>
</div>

@endsection