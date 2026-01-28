<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Tours & Travels">
		<meta name="author" content="Govaabo">
		<meta name="keywords" content="Tours & Travels">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.components.styles')

    </head>

    <body class="ltr app sidebar-mini light-mode">

        <!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
		<div class="page">
			<div class="page-main">

                @include('layouts.components.user-header')

                @include('layouts.components.user-sidebar')

                <!--app-content open-->
                <div class="app-content main-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                                @yield('content')

                        </div>
                    </div>
                </div>
                    <!-- CONTAINER CLOSED -->
             </div>

            @yield('modal')

            @include('layouts.components.footer')

        </div>
        <!-- page -->

        @include('layouts.components.scripts')

    </body>

</html>
