
            <!-- Topbar Start -->
            <div class="container-fluid bg-light pt-3 d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                            <div class="d-inline-flex align-items-center">
                                <p><i class="fa fa-envelope mr-2"></i>info@govaabo.com</p>
                                <p class="text-body px-3">|</p>
                                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</p>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center text-lg-right">
                            <div class="d-inline-flex align-items-center">
                                <a class="text-primary px-3" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>

                                <a class="text-primary px-3" href="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="text-primary pl-3" href="">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar End -->


            <!-- Navbar Start -->
            <div class="container-fluid position-relative nav-bar p-0" id="navbar">
                <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
                    <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                        <a href="{{url('/')}}" class="navbar-brand">
                            <span><img src="{{asset('public/front/img/logo.png')}}" alt="govaabo"></span>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                            <div class="navbar-nav ml-auto py-0">
                                <a href="{{url('/')}}" class="nav-item nav-link active">Home</a>
                                <a href="{{url('about')}}" class="nav-item nav-link">About</a>
                                <a href="{{url('service')}}" class="nav-item nav-link">Services</a>
                                <a href="{{url('package')}}" class="nav-item nav-link">Tour Packages</a>
                                <?php /*<div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu border-0 rounded-0 m-0">
                                        <a href="blog.php" class="dropdown-item">Blog Grid</a>
                                        <a href="single.php" class="dropdown-item">Blog Detail</a>
                                        <a href="destination.php" class="dropdown-item">Destination</a>
                                        <a href="guide.php" class="dropdown-item">Travel Guides</a>
                                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                                    </div>
                                </div>*/ ?>
                                <a href="{{url('contact')}}" class="nav-item nav-link">Contact</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Navbar End -->
