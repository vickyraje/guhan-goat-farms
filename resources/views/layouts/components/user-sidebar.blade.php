            <!--APP-SIDEBAR-->
            <div class="sticky">
               <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
               <div class="app-sidebar">
                  <div class="side-header">
                     <a class="header-brand1 brd" href="{{url('/')}}">
                        <img src="{{asset('assets/images/logo.png')}}" class="header-brand-img desktop-logo" alt="{{ env('APP_NAME') }}">
                        <img src="{{asset('assets/images/logo.png')}}" class="header-brand-img toggle-logo" alt="{{ env('APP_NAME') }}">
                        <img src="{{asset('assets/images/logo.png')}}" class="header-brand-img light-logo" alt="{{ env('APP_NAME') }}">
                        <img src="{{asset('assets/images/logo.png')}}" class="header-brand-img light-logo1" alt="{{ env('APP_NAME') }}">
                        <span>Guhan<i>Goat Farms</i></span>
                     </a><!-- LOGO -->
                  </div>
                  <div class="main-sidemenu">
                     <div class="slide-left disabled" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                           <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                        </svg>
                     </div>
                     <ul class="side-menu">
                        @if(Auth::guard('user')->check())
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{url('/user/dashboard')}}"><i class="fa fa-home side-menu__icon"></i><span class="side-menu__label"> Dashboard</span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{url('/user/profile')}}"><i class="fa fa-list side-menu__icon"></i><span class="side-menu__label">My Account</span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{url('/user/change_password')}}"><i class="fa fa-recycle side-menu__icon"></i><span class="side-menu__label">Change Password</span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('user.pin.index') }}"><i class="fa fa-lock side-menu__icon"></i><span class="side-menu__label">Pin List</span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('user.login_user.create') }}"><i class="fa fa-user-plus side-menu__icon"></i><span class="side-menu__label">Register User</span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('user.downline') }}"><i class="fa fa-arrow-down side-menu__icon"></i><span class="side-menu__label">Downline Users</span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('user.level.index') }}"><i class="fa fa-object-group side-menu__icon"></i><span class="side-menu__label">Business Incharge</span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('user.divident.index') }}"><i class="fa fa-object-group side-menu__icon"></i><span class="side-menu__label">Investor Commissions</span>
                           </a>
                        </li>
                        @endif
                     </ul>
                     <div class="slide-right" id="slide-right">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                           width="24" height="24" viewBox="0 0 24 24">
                           <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                        </svg>
                     </div>
                  </div>
               </div>
            </div>
            <!--/APP-SIDEBAR-->
