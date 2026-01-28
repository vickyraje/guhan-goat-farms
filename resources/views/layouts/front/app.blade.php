<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="@yield('description')">
        <meta name="author" content="">
        <meta name="keywords" content="On-line, Shooping">
        <title>@yield('title') | {{ env('APP_NAME') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- favicons Icons -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}" />

        @hasSection('scheme')

        <!-- OG Product Headers Start -->
        @include('layouts.front.schema')

        <!-- OG Product Headers End -->
        @endif


        <meta property="og:locale" content="en_GB" />
        <meta name="og:site_name" content="GOVAABO" />
        <meta property="og:type" content="Website">
        <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

        @include('layouts.front.styles')

    </head>
    <body>

            @include('layouts.front.menu')

            @yield('content')

            @include('layouts.front.footer')

            @include('layouts.front.scripts')
    </body>
</html>
