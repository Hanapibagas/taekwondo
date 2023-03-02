<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('portal') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('portal') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('portal') }}/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('portal') }}/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('portal') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('portal') }}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('portal') }}/assets/css/magnific-popup.min.css">
    {{--
    <link rel="stylesheet" href="{{ asset('portal') }}/assets/css/nice-select.css"> --}}
    <link rel="stylesheet" href="{{ asset('portal') }}/assets/css/meanmenu.css">
    <link rel="stylesheet" href="{{ asset('portal') }}/assets/css/progresscircle.min.css">
    <link rel="stylesheet" href="{{ asset('portal') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('portal') }}/assets/css/responsive.css">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('portal') }}/assets/img/favicon.png">
    @stack('style')
</head>

<body>
    <div class="preloader">
        <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
        </div>
    </div>

    @include('portal.layouts.navbar')

    @yield('content')

    @include('portal.layouts.footer')

    <div class="go-top"><i class="fas fa-arrow-up"></i><i class="fas fa-arrow-up"></i></div>

    <script src="{{ asset('portal') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('portal') }}/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('portal') }}/assets/js/jquery.magnific-popup.min.js"></script>
    {{-- <script src="{{ asset('portal') }}/assets/js/jquery.nice-select.min.js"></script> --}}
    <script src="{{ asset('portal') }}/assets/js/jquery.meanmenu.js"></script>
    <script data-async="false" src=" {{ asset('portal') }}/assets/js/email-decode.min.js"></script>
    <script src="{{ asset('portal') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('portal') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('portal') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('portal') }}/assets/js/parallax.min.js"></script>
    <script src="{{ asset('portal') }}/assets/js/progresscircle.min.js"></script>
    <script src="{{ asset('portal') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('portal') }}/assets/js/form-validator.min.js"></script>
    <script src="{{ asset('portal') }}/assets/js/contact-form-script.js"></script>
    <script src="{{ asset('portal') }}/assets/js/main.js"></script>
    @stack('script')
</body>

</html>