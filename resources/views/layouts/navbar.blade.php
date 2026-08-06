<div class="container sticky-top pt-3">
    <nav class="navbar navbar-expand-lg px-4 bg-body-tertiary rounded-4 shadow-sm">
        <div class="container-fluid">

            <!-- Logo -->
            <a class="navbar-brand fw-medium fs-4 d-flex align-items-center gap-2" href="{{ route('home') }}">
                <img src="{{ asset('images/Group.png') }}" alt="Logo" width="30" height="30">
                <span class="fw-bold text-primary">RENTCARS</span>
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-medium gap-lg-4">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#about') }}">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cars.index') }}">Cars</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#contact') }}">Contact</a>
                    </li>

                    @auth

                        @if(Auth::user()->role == 'admin')

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle"
                               href="#"
                               role="button"
                               data-bs-toggle="dropdown"
                               aria-expanded="false">

                                Dashboard

                            </a>

                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        Dashboard
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('cars.index') }}">
                                        Manage Cars
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item disabled" href="#">
                                        Manage Users
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item disabled" href="#">
                                        Manage Bookings
                                    </a>
                                </li>

                            </ul>

                        </li>

                        @endif

                    @endauth

                </ul>

                <div class="d-flex align-items-center gap-2">

                    @auth

                        <a href="{{ route('profile.edit') }}"
                           class="text-decoration-none fw-bold">

                            <i class="fa-solid fa-user"></i>
                            {{ Auth::user()->name }}

                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                Log Out
                            </button>
                        </form>

                    @else

                        <a href="{{ route('login') }}" class="btn btn-outline-primary">
                            Sign In
                        </a>

                        <a href="{{ route('register') }}" class="btn btn-primary">
                            Sign Up
                        </a>

                    @endauth

                </div>

            </div>

        </div>
    </nav>
</div>