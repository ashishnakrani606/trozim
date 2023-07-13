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

        @stack('styles')
    </head>
    <body class="antialiased bg-[#fafafa] dark:bg-[#161616] text-gray-600 min-h-full flex flex-col application application-ltr overflow-x-hidden overflow-y-scroll ">
        @yield('content')

        @stack('scripts')
    </body>
</html>
