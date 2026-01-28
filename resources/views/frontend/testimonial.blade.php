@extends('layouts.front.app')

@section('title', 'Testimonial')
@section('description', 'Testimonial description')

@section('styles')

@endsection

@section('content')

        <!-- Header Start -->
        <div class="container-fluid page-header">
            <div class="container">
                <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                    <h3 class="display-4 text-white text-uppercase">Testimonial</h3>
                    <div class="d-inline-flex text-white">
                        <p class="m-0 text-uppercase"><a class="text-white" href="{{url('/')}}">Home</a></p>
                        <i class="fa fa-angle-double-right pt-1 px-3"></i>
                        <p class="m-0 text-uppercase">Testimonial</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Testimonial Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h6>
                    <h1>What Say Our Clients</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="text-center pb-4">
                        <img class="img-fluid mx-auto" src="{{asset('front/img/testimonial-1.jpg')}}" alt="testimonial1" style="width: 100px; height: 100px;" >
                        <div class="testimonial-text bg-white p-4 mt-n5">
                            <p class="mt-5">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                            </p>
                            <h5 class="text-truncate">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <img class="img-fluid mx-auto" src="{{asset('front/img/testimonial-2.jpg')}}" alt="testimonial2" style="width: 100px; height: 100px;" >
                        <div class="testimonial-text bg-white p-4 mt-n5">
                            <p class="mt-5">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                            </p>
                            <h5 class="text-truncate">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <img class="img-fluid mx-auto" src="{{asset('front/img/testimonial-3.jpg')}}" alt="testimonial3" style="width: 100px; height: 100px;" >
                        <div class="testimonial-text bg-white p-4 mt-n5">
                            <p class="mt-5">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                            </p>
                            <h5 class="text-truncate">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <img class="img-fluid mx-auto" src="{{asset('front/img/testimonial-4.jpg')}}" alt="testimonial4" style="width: 100px; height: 100px;" >
                        <div class="testimonial-text bg-white p-4 mt-n5">
                            <p class="mt-5">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                            </p>
                            <h5 class="text-truncate">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

@endsection

@section('scripts')
@endsection
