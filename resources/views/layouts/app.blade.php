<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent Cars</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    
<div class="container sticky-top pt-3">
    <nav class="navbar navbar-expand-lg px-4 bg-body-tertiary rounded-4 shadow-sm">
        <div class="container-fluid">

            <!-- Logo -->
            <a class="navbar-brand fw-medium fs-4 d-flex align-items-center gap-2" href="{{ url('/') }}">
                <img src="{{ asset('images/Group.png') }}" alt="Logo" width="30" height="30">
                <span class="fw-bold text-primary">RENTCARS</span>
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-medium gap-lg-4 text-center">

                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ url('/#home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ url('/#about') }}">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('cars.index') }}">Cars</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ url('/#contact') }}">Contact</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="#">
                                My Bookings
                            </a>
                        </li>
                    @endauth

                    @auth
                        @if(Auth::user()->role == 'admin')

                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle text-primary"
                                   href="#"
                                   data-bs-toggle="dropdown">

                                    Dashboard

                                </a>

                                <ul class="dropdown-menu">

                                    <li>
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            Dashboard
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="#">
                                            Manage Users
                                            {{-- {{ route('users.index') }} --}}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="#">
                                            Manage Cars
                                            {{-- {{ route('cars.manage') }} --}}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="#">
                                            Manage Bookings
                                            {{-- {{ route('bookings.manage') }} --}}
                                        </a>
                                    </li>

                                </ul>

                            </li>

                        @endif
                    @endauth

                </ul>

                <div class="d-flex align-items-center gap-3 justify-content-center">

                    @auth

                        <a href="{{ route('profile.edit') }}"
                           class="text-decoration-none fw-bold text-primary">

                            <i class="fa-solid fa-user"></i>

                            {{ Auth::user()->name }}

                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button class="btn btn-outline-danger">
                                Log Out
                            </button>

                        </form>

                    @else

                        <a href="{{ route('login') }}"
                           class="btn btn-outline-primary">

                            Sign In

                        </a>

                        <a href="{{ route('register') }}"
                           class="btn btn-primary">

                            Sign Up

                        </a>

                    @endauth

                </div>

            </div>

        </div>
    </nav>
</div>
    <main class="container py-4">
        @yield('content')
    </main>
    @include('includes.footer')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

