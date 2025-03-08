<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Vite: CSS Files -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom CSS Files -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/flex-slider.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">

        <!-- JS Scripts -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Additional Scripts -->
        <!-- <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="{{ asset('assets/js/owl.js') }}" ></script>
        <script src="{{ asset('assets/js/slick.js') }}" ></script>
        <script src="{{ asset('assets/js/isotope.js') }}" ></script>
        <script src="{{ asset('assets/js/accordions.js') }}" ></script> -->

        <title>{{ config('app.name', 'E-Commerce Store') }}</title>
    </head>
    <body class="font-sans antialiased">
        
        <!-- Navbar Component -->
        @include('components.navbar')

        <!-- Page Content -->
        <main>
            @yield('main')
        </main>
        @include('components.footer')
    </body>
</html>
