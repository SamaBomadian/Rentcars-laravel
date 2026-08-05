<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    html {
        scroll-behavior: smooth;
        scroll-padding-top: 90px; 
    }
    .carr {
       
        background-image: url("{{ asset('images/Fram).png') }}");
    }
</style>
<section class="container vh-100 d-flex align-items-center" id="home">
    <div class="row bg-hero align-items-center">
        <div class="col-lg-5 hero h-50">
            <h1 class="fw-bold w-75 lh-1">
                Find, book and <br>rent a car
                <span class="badge fw-bold" style="color: #1572D3;">Easily</span>
            </h1>
            <p class="w-75">
                Get a car wherever and whenever you <br> need 
                it with your IOS and Android device.
            </p>   
            <img src="{{ asset('images/Frame 2.png') }}" class="img-fluid mx-lg-0" alt="App Stores">
        </div>
        <div class="col-lg-7 py-4 carr">
            <img src="{{ asset('images/car 2 1 (1).png') }}" class="img-fluid" alt="Car Image">
        </div>
    </div>
</section>