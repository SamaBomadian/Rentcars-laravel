<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <br>
                <button type="submit" class="btn btn-login">Log In</button>
            </form>

            <div class="text-center mt-3 text-white">
                <a href="{{ route('password.request') }}" >Forgot Password?</a>
                <br><br>
                <span>Don't have an account?</span>
                <a href="{{ route('register') }}" >Sign Up</a>
            </div>
        </div>
    </div>
</section>