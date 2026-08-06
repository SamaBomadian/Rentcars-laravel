@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Manage Bookings</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card bg-primary text-white text-center">
                <div class="card-body">
                    <h4>Total Bookings</h4>
                    <h2>{{ $total }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-dark text-center">
                <div class="card-body">
                    <h4>Pending</h4>
                    <h2>{{ $pending }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white text-center">
                <div class="card-body">
                    <h4>Approved</h4>
                    <h2>{{ $approved }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white text-center">
                <div class="card-body">
                    <h4>Cancelled</h4>
                    <h2>{{ $cancelled }}</h2>
                </div>
            </div>
        </div>

    </div>


    <div class="row mb-4">

        <div class="col-md-6">
            <form method="GET">

                <input
                    type="text"
                    class="form-control"
                    name="search"
                    placeholder="Search Customer..."
                    value="{{ request('search') }}">

            </form>
        </div>

        <div class="col-md-3">

            <form method="GET">

                <select class="form-select"
                        name="status"
                        onchange="this.form.submit()">

                    <option value="All">All</option>

                    <option value="Pending"
                        {{ request('status')=='Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Approved"
                        {{ request('status')=='Approved' ? 'selected' : '' }}>
                        Approved
                    </option>

                    <option value="Rejected"
                        {{ request('status')=='Rejected' ? 'selected' : '' }}>
                        Rejected
                    </option>

                </select>

            </form>

        </div>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Car</th>
                <th>Pickup Date</th>
                <th>Return Date</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

            @forelse($bookings as $booking)

                <tr>

                    <td>{{ $booking->id }}</td>

                    <td>{{ $booking->user->name }}</td>

                    <td>{{ $booking->car->brand }} {{ $booking->car->model }}</td>

                    <td>{{ $booking->pickup_date }}</td>

                    <td>{{ $booking->return_date }}</td>

                    <td>${{ number_format($booking->total_price,2) }}</td>

                    <td>

                        @if($booking->status=="Pending")
                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        @elseif($booking->status=="Approved")
                            <span class="badge bg-success">
                                Approved
                            </span>

                        @else
                            <span class="badge bg-danger">
                                Rejected
                            </span>
                        @endif

                    </td>

                    <td>

                        @if($booking->status=="Pending")

                            <form action="{{ route('admin.bookings.approve',$booking->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Approve this booking?')">

                                @csrf
                                @method('PUT')

                                <button class="btn btn-success btn-sm">
                                    Approve
                                </button>

                            </form>

                            <form action="{{ route('admin.bookings.reject',$booking->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Reject this booking?')">

                                @csrf
                                @method('PUT')

                                <button class="btn btn-danger btn-sm">
                                    Reject
                                </button>

                            </form>

                        @else

                            No Action

                        @endif

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8" class="text-center">
                        No Bookings Found
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="mt-4 d-flex justify-content-center">
        {{ $bookings->links() }}
    </div>

</div>

@endsection