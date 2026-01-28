            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="#"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="{{url('/admin')}}">
                            <img src="{{asset('assets/images/logo.png')}}" class="header-brand-img desktop-logo" alt="{{ env('APP_NAME') }}">
                            <img src="{{asset('assets/images/logo.png')}}" class="header-brand-img light-logo1" alt="{{ env('APP_NAME') }}">
                        </a>
                        <!-- LOGO -->

                        <div class="d-flex order-lg-2 ms-auto header-right-icons">

                            <button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="dropdown d-md-flex profile-1">
                                    <a href="#" data-bs-toggle="dropdown" class="nav-link pe-2 leading-none d-flex animate">
                                        <span>
                                            <img src="{{asset('assets/images/6.png')}}" alt="profile-user" class="avatar profile-user brround cover-image">
                                        </span>
                                        <div class="text-center p-1 d-flex d-lg-none-max">
                                            <h6 class="mb-0" id="profile-heading">{{Auth::user()->name}}<i class="user-angle ms-1 fa fa-angle-down "></i></h6>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{url('admin/logout')}}">
                                            <i class="fa fa-sign-out side-menu__icon"></i>
                                            Log out
                                        </a>
                                    </div>
                                </div>
                                <!-- Profile -->
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->
