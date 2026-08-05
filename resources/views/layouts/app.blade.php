<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
        {{-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> --}}
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <style>
            html {
        scroll-behavior: smooth;
    }

    body {
        max-width: 100%;
        overflow-x: hidden;
        position: relative; 
    }
    footer .nav-link{
    color:#D6D6D6 !important;   
}
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
.carr{
    background-image: url("{{ asset('images/Fram).png') }}");
    background-position: right;
}


</style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            {{-- @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset --}}
            @include('layouts.navbar')

            <!-- Page Content -->
            {{-- <main>
                {{ $slot }}
            </main> --}}
            @yield('content')
        </div>


<footer class="px-5 " style="background-color:#051C34;color:white;"> 
        <div class="row pt-3"> 
            <div class="col-6 col-md-3 d-flex flex-column " > 
                <img src="{{ asset('images/Frame 993.png') }}" style="width:100px;height:30px;margin-bottom:5px"/> 
            </div>
                 <div class="col-6 col-md-3 "> 
                    <h5 style= "color:#1572D3;">Our Product</h5> 
                    <ul class="nav flex-column"> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Career</a></li> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Car</a></li> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Packages</a></li> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Features</a></li> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Priceline</a></li> 
                    </ul> 
                </div> 
                <div class="col-6 col-md-3 "> 
                    <h5 style= "color:#1572D3;">Resources</h5> 
                    <ul class="nav flex-column"> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Download</a></li> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Help Center</a></li> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Guides</a></li> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Partner Network</a></li> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Cruises</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Developer</a></li>
                     </ul> 
                    </div> 
                    <div class="col-6 col-md-3 "> 
                    <h5 style= "color:#1572D3;">About Rentcars</h5> 
                    <ul class="nav flex-column"> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Why Choose Us</a></li> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Our Story</a></li> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">investor Relations</a></li> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Press Center</a></li> 
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Advertise</a></li>
                        
                     </ul> 
                    </div>  
                             <div class="d-flex flex-column flex-sm-row  pt-4 mt-4 px-3 border-top align-content-between justify-content-between"> 
                                <p>© 2026 <a href="#home" style="color:#1572D3 ; text-decoration:none;">RentCars</a> Company, Inc. All rights reserved.</p> 
                                 </div>
</footer>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    </body>
</html>
