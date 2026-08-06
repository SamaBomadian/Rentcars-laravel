@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>Cars List</h2>

        <a href="{{ route('cars.create') }}" class="btn btn-primary">
            Add Car
        </a>
    </div>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Price Per Day</th>
                <th>Passengers</th>
                <th>Transmission</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>



        <tbody>

            @forelse($cars as $car)

                <tr>

                    <td>{{ $car->id }}</td>


                    <td>
                        @if($car->image)
                            <img src="{{ asset('images/'.$car->image) }}" width="100">
                        @endif
                    </td>


                    <td>{{ $car->brand }}</td>


                    <td>{{ $car->model }}</td>


                    <td>
                        ${{ $car->price_per_day }}
                    </td>


                    <td>
                        {{ $car->passengers }}
                    </td>


                    <td>
                        {{ $car->transmission }}
                    </td>


                    <td>
                        {{ $car->status }}
                    </td>



                    <td>

                        <a href="{{ route('cars.edit', $car->id) }}" 
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>



                        <form action="{{ route('cars.destroy', $car->id) }}" 
                              method="POST" 
                              style="display:inline;">

                            @csrf
                            @method('DELETE')


                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">

                                Delete

                            </button>


                        </form>


                    </td>


                </tr>


            @empty

                <tr>
                    <td colspan="9" class="text-center">
                        No Cars Found
                    </td>
                </tr>

            @endforelse


        </tbody>


    </table>


</div>


@endsection