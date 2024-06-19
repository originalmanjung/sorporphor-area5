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
    <style>
        .sticky-icon {
            z-index: 1;
            position: fixed;
            top: 40%;
            right: 0%;
            width: 220px;
            display: flex;
            flex-direction: column;
        }

        .sticky-icon a {
            transform: translate(160px, 0px);
            border-radius: 50px 0px 0px 50px;
            text-align: left;
            margin: 2px;
            text-decoration: none;
            text-transform: uppercase;
            padding: 10px;
            font-size: 22px;
            font-family: 'Oswald', sans-serif;
            transition: all 0.8s;
        }

        .sticky-icon a:hover {
            color: #FFF;
            transform: translate(0px, 0px);
        }

        .sticky-icon a:hover i {
            transform: rotate(360deg);
        }

        .Facebook {
            background-color: #2C80D3;
            color: #FFF;
        }

        .Youtube {
            background-color: #fa0910;
            color: #FFF;
        }

        .Messenger {
            background-color: #53c5ff;
            color: #FFF;
        }

        .sticky-icon a i {
            background-color: #FFF;
            height: 40px;
            width: 40px;
            color: #000;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            margin-right: 20px;
            transition: all 0.5s;
        }

        .sticky-icon a i.fa-facebook-f {
            background-color: #FFF;
            color: #2C80D3;
        }

        .sticky-icon a i.fa-youtube {
            background-color: #FFF;
            color: #fa0910;
        }

        .sticky-icon a i.fa-facebook-messenger {
            background-color: #FFF;
            color: #53c5ff;
        }

        .fas .fa-shopping-cart {
            background-color: #FFF;
        }

        #myBtn {
            height: 50px;
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            text-align: center;
            padding: 10px;
            text-align: center;
            line-height: 40px;
            border: none;
            outline: none;
            background-color: #1e88e5;
            color: white;
            cursor: pointer;
            border-radius: 50%;
        }

        .fa-arrow-circle-up {
            font-size: 30px;
        }

        #myBtn:hover {
            background-color: #555;
        }
    </style>
    @stack('css')
</head>

<body>

    <body style="background-image: url('{{ asset('images/bg.jpg') }}');">

        <div class="site-wrap">

            @include('layouts.frontend._patials.head')

            @yield('content')

            @include('layouts.frontend._patials.footer')
        </div>


        <!--Start Sticky Icon-->
        <div class="sticky-icon">
            <a target="_blank" href="https://www.facebook.com/chiangmaiarea5/" class="Facebook"><i class="fab fa-facebook-f"> </i> Facebook </a>
            <a target="_blank" href="https://www.youtube.com/channel/UCpd6DpwfhNsKEdwfRcIJvLQ" class="Youtube"><i class="fab fa-youtube"></i> Youtube </a>
            <a target="_blank" href="https://m.me/111368583605752" class="Messenger"><i class="fab fa-facebook-messenger"></i> Messenger </a>
        </div>
        <!--End Sticky Icon-->
        @include('cookie-consent::index')

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
