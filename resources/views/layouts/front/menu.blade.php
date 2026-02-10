
            <!-- Header -->
            <header class="header">
               <div class="container">
                     <div class="nav-wrapper">
                        <a href="index.html" class="logo">Guhan Goat Farms</a>
                        <nav class="nav-desktop">
                           <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                           <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                           <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                           <a href="{{ route('contact') }}" class="btn btn-primary">Get Started</a>
                        </nav>
                        <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                           <span class="hamburger"></span>
                        </button>
                     </div>
                     <nav class="nav-mobile" id="mobileMenu">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                        <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                        <a href="{{ route('contact') }}" class="btn btn-primary">Get Started</a>
                     </nav>
               </div>
            </header>
