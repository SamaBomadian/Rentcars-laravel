@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Add New Car</h2>

    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Car Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control">
        </div>

        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" class="form-control">
        </div>

        <div class="mb-3">
            <label>Year</label>
            <input type="number" name="year" class="form-control">
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control">
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