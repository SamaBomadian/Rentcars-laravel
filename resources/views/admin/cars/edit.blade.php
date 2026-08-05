@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Edit Car</h2>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form action="{{ route('cars.update', $car->id) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="row">


            <div class="col-md-6 mb-3">
                <label>Brand</label>
                <input type="text" 
                       name="brand" 
                       class="form-control"
                       value="{{ $car->brand }}">
            </div>



            <div class="col-md-6 mb-3">
                <label>Model</label>
                <input type="text" 
                       name="model" 
                       class="form-control"
                       value="{{ $car->model }}">
            </div>



            <div class="col-md-6 mb-3">
                <label>Price Per Day</label>
                <input type="number" 
                       step="0.01"
                       name="price_per_day" 
                       class="form-control"
                       value="{{ $car->price_per_day }}">
            </div>



            <div class="col-md-6 mb-3">
                <label>Passengers</label>
                <input type="number" 
                       name="passengers" 
                       class="form-control"
                       value="{{ $car->passengers }}">
            </div>




            <div class="col-md-6 mb-3">
                <label>Transmission</label>

                <select name="transmission" class="form-control">

                    <option value="Automatic"
                    {{ $car->transmission == 'Automatic' ? 'selected' : '' }}>
                        Automatic
                    </option>


                    <option value="Manual"
                    {{ $car->transmission == 'Manual' ? 'selected' : '' }}>
                        Manual
                    </option>

                </select>
            </div>




            <div class="col-md-6 mb-3">
                <label>Doors</label>

                <input type="number"
                       name="doors"
                       class="form-control"
                       value="{{ $car->doors }}">
            </div>





            <div class="col-md-6 mb-3">

                <label>Air Conditioning</label>

                <select name="air_conditioning" class="form-control">

                    <option value="1"
                    {{ $car->air_conditioning == 1 ? 'selected' : '' }}>
                        Yes
                    </option>


                    <option value="0"
                    {{ $car->air_conditioning == 0 ? 'selected' : '' }}>
                        No
                    </option>

                </select>

            </div>





            <div class="col-md-6 mb-3">

                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="available"
                    {{ $car->status == 'available' ? 'selected' : '' }}>
                        Available
                    </option>


                    <option value="rented"
                    {{ $car->status == 'rented' ? 'selected' : '' }}>
                        Rented
                    </option>

                </select>

            </div>





            <div class="col-md-12 mb-3">

                <label>Current Image</label><br>


                @if($car->image)

                    <img src="{{ asset('images/'.$car->image) }}"
                         width="150"
                         class="mb-3">

                @endif



                <input type="file"
                       name="image"
                       class="form-control">

            </div>


        </div>



        <button type="submit" class="btn btn-success">
            Update Car
        </button>


        <a href="{{ route('cars.index') }}" 
           class="btn btn-secondary">
            Cancel
        </a>


    </form>


</div>


@endsection