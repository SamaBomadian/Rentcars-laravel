@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
    
        <div class="col-md-9 p-4">
            <h2 class="mb-4">
                Dashboard
            </h2>
            <div class="row">

                <div class="col-md-4 mb-4">

                    <div class="card bg-primary text-white shadow">

                        <div class="card-body d-flex justify-content-between align-items-center">

                            <div>

                                <h5>Total Users</h5>

                                <h2>{{ $users }}</h2>

                            </div>

                            <i class="fas fa-users fa-3x"></i>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-4">

                    <div class="card bg-success text-white shadow">

                        <div class="card-body d-flex justify-content-between align-items-center">

                            <div>

                                <h5>Total Cars</h5>

                                <h2>{{ $cars }}</h2>

                            </div>

                            <i class="fas fa-car fa-3x"></i>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-4">

                    <div class="card bg-danger text-white shadow">

                        <div class="card-body d-flex justify-content-between align-items-center">

                            <div>

                                <h5>Total Bookings</h5>

                                <h2>{{ $bookings }}</h2>

                            </div>

                            <i class="fas fa-calendar-check fa-3x"></i>

                        </div>

                    </div>

                </div>

            </div>
            <div class="card mt-4 shadow">

                <div class="card-body">

                    <h4>
                        Welcome Admin
                    </h4>

                    <p class="mb-0">
                        Welcome to the Car Rental Management System Dashboard.
                    </p>

                </div>

            </div>
        </div>
    </div>
    </div>
</div>

@endsection

