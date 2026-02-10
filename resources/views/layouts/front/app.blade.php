<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Guhan Goat Farms - Premium Goat Farming with Quality Livestock and Sustainable Farming Practices">
        <meta name="author" content="{{ config('app.name') }}">
        <meta name="keywords" content="On-line, Shooping">
        <title>@yield('title') | {{ config('app.name') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- favicons Icons -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}" />


        <meta property="og:locale" content="en_GB" />
        <meta name="og:site_name" content="{{ config('app.name') }}" />
        <meta property="og:type" content="Website">

        <link href="{{asset('front/css/style.css')}}" rel="stylesheet">

    </head>
    <body>

            @include('layouts.front.menu')

            @yield('content')

            @include('layouts.front.footer')

            @include('layouts.front.scripts')
    </body>
</html>
