<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'RentCars') }}</title>
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>
<body>

    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container sticky-top pt-3">
        <nav class="navbar navbar-expand-lg px-4 bg-body-tertiary rounded-4 shadow-sm">
            <div class="container-fluid">
                
                {{-- Logo --}}
                <a class="navbar-brand fw-medium fs-4 d-flex align-items-center gap-2" href="{{ url('/') }}">
                    <img src="{{ asset('images/Group.png') }}" alt="Logo" width="30" height="30">
                    <span class="fw-bold text-primary">RENTCARS</span>
                </a>

                <button class="navbar-toggler border-0"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    {{-- Links --}}
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-medium gap-lg-4 text-center">
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ url('/#home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ url('/#about') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ url('/#cars') }}">Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ url('/#contact') }}">Contact</a>
                        </li>

                        @auth
                            @if(Auth::user()->role !== 'admin')
                                <li class="nav-item">
                                    <a class="nav-link text-primary" href="{{ route('user.bookings.index') }}">My Bookings</a>
                                </li>
                            @endif

                            @if(Auth::user()->role == 'admin')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-primary fw-bold"
                                       href="#"
                                       role="button"
                                       data-bs-toggle="dropdown"
                                       aria-expanded="false"> Dashboard
                                    </a>
                                    <ul class="dropdown-menu border-0 shadow rounded-3">
                                        <li>
                                            <a class="dropdown-item py-2" href="{{ route('dashboard') }}">
                                                <i class="fa-solid fa-chart-line me-2 text-primary"></i> Dashboard Overview
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item py-2" href="{{ route('admin.cars.index') }}">
                                                <i class="fa-solid fa-car me-2 text-primary"></i> Manage Cars
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item py-2" href="{{ route('admin.bookings.index') }}">
                                                <i class="fa-solid fa-car me-2 text-primary"></i> Manage Booking
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    {{-- Auth Buttons --}}
                    <div class="d-flex align-items-center gap-3 justify-content-center">
                        @auth
                            <a href="{{ route('profile.index') }}" class="text-decoration-none fw-bold text-primary">
                                <i class="fa-solid fa-user me-1"></i>
                                {{ Auth::user()->name }}
                            </a>
                            
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger rounded-pill px-3">
                                    Log Out
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4">
                                Sign In
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4">
                                Sign Up
                            </a>
                        @endauth
                    </div>

                </div>
            </div>
        </nav>
    </div>

    <main class="py-4">
        @yield('content')
    </main>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>