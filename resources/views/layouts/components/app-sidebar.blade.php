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
                        @if(Auth::check())
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{url('/admin/dashboard')}}"><i class="fa fa-home side-menu__icon"></i><span class="side-menu__label"> Dashboard</span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('plan.index')}}"><i class="fa fa-tasks side-menu__icon"></i><span class="side-menu__label">Plans </span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('admin.pin.index')}}"><i class="fa fa-lock side-menu__icon"></i><span class="side-menu__label">Pins </span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('admin.login_user.index')}}"><i class="fa fa-users side-menu__icon"></i><span class="side-menu__label">Members List</span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('admin.level.index')}}"><i class="fa fa-object-group side-menu__icon"></i><span class="side-menu__label">Business Incharge</span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('admin.divident.index')}}"><i class="fa fa-object-group side-menu__icon"></i><span class="side-menu__label">Investor Commission</span>
                           </a>
                        </li>
                        <li class="slide">
                           <a class="side-menu__item" data-bs-toggle="slide" href="#">
                              <i class="fa fa-money side-menu__icon"></i>
                              <span class="side-menu__label">Payout</span><i class="angle fa fa-angle-right"></i>
                           </a>
                           <ul class="slide-menu">
                              <li class="side-menu-label1"><a href="javascript:void(0)">Payout</a></li>
                              <li><a href="{{route('admin.business')}}" class="slide-item">Business Incharge</a></li>
                              <li><a href="{{route('admin.investor')}}" class="slide-item">Investor Commission</a></li>
                           </ul>
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
