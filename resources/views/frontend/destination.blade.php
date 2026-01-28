@extends('layouts.front.app')

@section('title', 'Destination')
@section('description', 'Destination description')

@section('styles')

@endsection

@section('content')

        <!-- Header Start -->
        <div class="container-fluid page-header">
            <div class="container">
                <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                    <h3 class="display-4 text-white text-uppercase">Destination</h3>
                    <div class="d-inline-flex text-white">
                        <p class="m-0 text-uppercase"><a class="text-white" href="{{url('/')}}">Home</a></p>
                        <i class="fa fa-angle-double-right pt-1 px-3"></i>
                        <p class="m-0 text-uppercase">Destination</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Destination Start -->
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                    <h1>Explore Top Destination</h1>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="{{asset('front/img/destination-3.jpg')}}" alt="destination1">
                            <a class="destination-overlay text-white text-decoration-none" href="">
                                <h5 class="text-white">United States</h5>
                                <span>100 Cities</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="{{asset('front/img/destination-2.jpg')}}" alt="destination2">
                            <a class="destination-overlay text-white text-decoration-none" href="">
                                <h5 class="text-white">United Kingdom</h5>
                                <span>100 Cities</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="{{asset('front/img/destination-3.jpg')}}" alt="destnation3">
                            <a class="destination-overlay text-white text-decoration-none" href="">
                                <h5 class="text-white">Australia</h5>
                                <span>100 Cities</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="{{asset('front/img/destination-3.jpg')}}" alt="destination4">
                            <a class="destination-overlay text-white text-decoration-none" href="">
                                <h5 class="text-white">India</h5>
                                <span>100 Cities</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="{{asset('front/img/destination-5.jpg')}}" alt="destination5">
                            <a class="destination-overlay text-white text-decoration-none" href="">
                                <h5 class="text-white">South Africa</h5>
                                <span>100 Cities</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="{{asset('front/img/destination-2.jpg')}}" alt="destination6">
                            <a class="destination-overlay text-white text-decoration-none" href="">
                                <h5 class="text-white">Indonesia</h5>
                                <span>100 Cities</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Destination Start -->

@endsection

@section('scripts')
@endsection
