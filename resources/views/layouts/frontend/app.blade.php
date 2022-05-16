<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('meta::manager')


    <!-- Favicons -->
    <link href="{{ asset('home/assets/img/favicon.ico') }}" rel="icon">

    <!-- Frontend -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('funder-template/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('funder-template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('funder-template/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('funder-template/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('funder-template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('funder-template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('funder-template/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('funder-template/css/animate.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    <link rel="stylesheet" href="{{ asset('funder-template/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('funder-template/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('funder-template/css/jquery.fancybox.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('funder-template/css/style.css') }}">

    @stack('css')
</head>
<body>
    <body style="background-image: url('{{ asset('funder-template/images/bg.jpg') }}');">

        <div class="site-wrap">

        @include('layouts.frontend._patials.head')

            @yield('content')

        @include('layouts.frontend._patials.footer')
        </div>



        <!-- Frontend -->
        <script src="{{ asset('funder-template/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('funder-template/js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ asset('funder-template/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('funder-template/js/popper.min.js') }}"></script>
        <script src="{{ asset('funder-template/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('funder-template/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('funder-template/js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('funder-template/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('funder-template/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('funder-template/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('funder-template/js/aos.js') }}"></script>
        <script src="{{ asset('funder-template/js/main.js') }}"></script>
        <script src="{{ asset('funder-template/js/jquery.fancybox.min.js') }}"></script>
        @stack('js')
    </body>
</html>
