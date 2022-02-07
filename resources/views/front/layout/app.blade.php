<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> {{$site_data->name ?? config('app.name')}} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/meanmenu.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/slick.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/default.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/responsive.css">
</head>

<body>

    @include('front.layout.partials.header')


    <main>

        @yield('content')

    </main>

    @include('front.layout.partials.footer')

    <!-- JS here -->
    <script src="{{ asset('theme') }}/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/one-page-nav-min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/slick.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/jquery.meanmenu.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/ajax-form.js"></script>
    <script src="{{ asset('theme') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/plugins.js"></script>
    <script src="{{ asset('theme') }}/assets/js/main.js"></script>

</body>
