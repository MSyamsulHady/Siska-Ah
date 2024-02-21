<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    {{-- end pwa --}}
    <title>Mentor Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets') }}/img/favicon.png" rel="icon">
    <link href="{{ asset('assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets') }}/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    @include('layout.header')
    <!-- ======= End Header ======= -->
    {{--  main content  --}}
    @yield('content')
    {{--  /main content  --}}

    <!-- ======= Footer ======= -->
    @include('layout.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets') }}/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('assets') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets') }}/js/main.js"></script>
    <script src="{{ asset('sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>

</body>

</html>
