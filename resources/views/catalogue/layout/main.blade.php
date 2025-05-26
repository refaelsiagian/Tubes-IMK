<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Shabrina</title>

    <meta name="author" content="themesflat.com">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- font -->
   <link rel="stylesheet" href="{{ asset('catalogue/fonts/fonts.css') }}">
   <link rel="stylesheet" href="{{ asset('catalogue/fonts/font-icons.css') }}">
   <link rel="stylesheet" href="{{ asset('catalogue/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('catalogue/css/swiper-bundle.min.css') }}">
   <link rel="stylesheet" href="{{ asset('catalogue/css/animate.css') }}">
   <link rel="stylesheet"type="text/css" href="{{ asset('catalogue/css/styles.css') }}"/>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('catalogue/images/logo/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('catalogue/images/logo/favicon.png') }}">

    @yield('style')

</head>

<body class="preload-wrapper popup-loader">
    <div id="wrapper">

        @include('catalogue.layout.header')

        @yield('content')

        @include('catalogue.layout.footer')

        @include('catalogue.layout.sidebar')

    </div>

    @yield('additional')

    <!-- Javascript -->
    <script type="text/javascript" src="{{ asset('catalogue/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('catalogue/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('catalogue/js/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('catalogue/js/carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('catalogue/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('catalogue/js/lazysize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('catalogue/js/count-down.js') }}"></script>
    <script type="text/javascript" src="{{ asset('catalogue/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('catalogue/js/multiple-modal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('catalogue/js/main.js') }}"></script>

    @yield('script')

</body>

</html>