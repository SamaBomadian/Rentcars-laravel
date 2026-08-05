@extends('layouts.app')

@section('content')

<section class="container mt-5" id="home">
    <div class="row bg-hero align-items-center">
    <div class="col-lg-6 hero h-50">
        <h1 class="fw-bold  w-75 lh-1">Find, book and <br>rent a car<span class="badge fw-bold" style="color: #1572D3;">Easily</span></h1>
        <p class="w-75">Get a car wherever and whenever you <br> need 
            it with your IOS and Android device.
        </p>
        <img src="{{ asset('images/Frame 2.png') }}" class="img-fluid mx-lg-0">
    </div>
    <div class="col-lg-6 py-4 carr">
         <img src="{{ asset('images/car 2 1 (1).png') }}">
    </div>
    </div>
</section>

<section class="container py-5" id="about">

    <div class="row align-items-center">

        <div class="col-lg-6">
            <img src="{{ asset('images/ab.jpeg') }}" class="img-fluid mx-lg-0" alt="Car">
        </div>

        <div class="col-lg-6">

            <span class="badge text-primary mb-3 fs-5">
                WHY CHOOSE US
            </span>

            <h2 class="fw-bold mb-4">
                We offer the best experience with our rental deals
            </h2>

            <div class="d-flex mb-4">
                <i class="bi bi-wallet2 text-primary fs-3 me-3"></i>

                <div>
                    <h5>Best price guaranteed</h5>
                    <p>Find a lower price? We'll refund you 100% of the difference.</p>
                </div>
            </div>

            <div class="d-flex mb-4">
                <i class="bi bi-person-check text-primary fs-3 me-3"></i>

                <div>
                    <h5>Experience driver</h5>
                    <p>Don't have driver? Don't worry, we have many experienced drivers for you.</p>
                </div>
            </div>

            <div class="d-flex mb-4">
                <i class="bi bi-truck text-primary fs-3 me-3"></i>

                <div>
                    <h5>24 hour car delivery</h5>
                    <p>Book your car anytime and we will deliver it directly to you.</p>
                </div>
            </div>

            <div class="d-flex">
                <i class="bi bi-headset text-primary fs-3 me-3"></i>

                <div>
                    <h5>24/7 technical support</h5>
                    <p>Have a question? Contact us anytime.</p>
                </div>
            </div>

        </div>

    </div>

</section>


<section class="container py-5" id="contact">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary" style= "color:#1572D3;">Contact Us</h2>
        <p class="text-muted">If you have any questions, feel free to contact us anytime.</p>
    </div>
    <div class="row g-4 bg-white p-4 p-md-5 rounded-4 shadow-sm border">
        <div class="col-lg-5 pe-lg-4">
            <h4 class="fw-bold mb-4" style= "color:#1572D3;">Get In Touch</h4>
            
            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary-subtle text-primary p-3 rounded-circle me-3">
                    <i class="bi bi-geo-alt fs-4"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1">Address</h6>
                    <p class="text-muted mb-0">10th of Ramadan City, Egypt</p>
                </div>
            </div>

            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary-subtle text-primary p-3 rounded-circle me-3">
                    <i class="bi bi-telephone fs-4"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1">Phone</h6>
                    <p class="text-muted mb-0">+20 100 123 4567</p>
                </div>
            </div>

            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary-subtle text-primary p-3 rounded-circle me-3">
                    <i class="bi bi-envelope fs-4"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1">Email</h6>
                    <p class="text-muted mb-0">info@rentcars.com</p>
                </div>
            </div>

            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary-subtle text-primary p-3 rounded-circle me-3">
                    <i class="bi bi-clock fs-4"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1">Working Hours</h6>
                    <p class="text-muted mb-0">Sun - Thu: 9:00 AM - 5:00 PM</p>
                </div>
            </div>

            <hr class="my-4">
            <h6 class="fw-bold mb-3" style= "color:#1572D3;">Follow Us</h6>
            <div class="d-flex gap-3">
                <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-facebook"></i></a>
                <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-instagram"></i></a>
                <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="btn btn-outline-primary rounded-circle"><i class="bi bi-twitter-x"></i></a>
            </div>
        </div>


        <div class="col-lg-7 ps-lg-4 border-start-lg">
            <h4 class="fw-bold mb-4"style= "color:#1572D3;">Send Us a Message</h4>
            <form action="" method="post">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-medium">Your Name</label>
                        <input type="text" class="form-control" placeholder="Enter Your Name" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium">Your Email</label>
                        <input type="email" class="form-control" placeholder="name@example.com" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-medium">Subject</label>
                        <input type="text" class="form-control" placeholder="Inquiry about renting a car">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-medium">Message</label>
                        <textarea class="form-control" rows="4" placeholder="How can we help you?" required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 fw-bold">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


@endsection