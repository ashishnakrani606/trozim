<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link
            rel="preload"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap"
            as="style"
            onload="this.onload=null;this.rel='stylesheet'"
        />
        <!-- Fonts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">

        @stack('styles')
    </head>
    <body class="antialiased bg-[#fafafa] dark:bg-[#161616] text-gray-600 min-h-full flex flex-col application application-ltr overflow-x-hidden overflow-y-scroll ">
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-16 space-y-8 min-h-screen">
        @yield('content')
    </div>
    <script
        src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        @stack('scripts')
    </body>
</html>
