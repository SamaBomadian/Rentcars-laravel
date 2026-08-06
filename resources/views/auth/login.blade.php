
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<section class="logg">
    <div class="overlay"></div>

    <div class="main-wrapper">
        <div class="login-card">
            <div class="text-center">
                <h1 class="logo">
                    <i class="fa-solid fa-car-side"></i>
                    <span class="white">RENT</span><span class="blue">CARS</span>
                </h1>
                <h2>Welcome Back!</h2>
                <p>Log in to your account</p>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger py-2 small">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        class="form-control @error('email') is-invalid @enderror" 
                        placeholder="Email Address" 
                        required 
                        autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        placeholder="Password" 
                        required>
                </div>

                {{-- خيار تذكرني --}}
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label text-white small" for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn btn-login w-100">Log In</button>
            </form>

            <div class="text-center mt-3 text-white">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
                <br><br>
                <span>Don't have an account?</span>
                <a href="{{ route('register') }}">Sign Up</a>
            </div>
        </div>
    </div>
</section>
