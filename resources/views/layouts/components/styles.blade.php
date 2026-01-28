
		<!-- TITLE -->
		<title>@yield('title') | {{env('APP_NAME')}}</title>

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}" />

        <!-- BOOTSTRAP CSS -->
        <link id="style" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- STYLE CSS -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

        <!-- CUSTOM CSS -->
        <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />

        @yield('styles')

        <!--- FONT-ICONS CSS -->
        <link href="{{asset('assets/plugins/icons/icons.css')}}" rel="stylesheet" />
