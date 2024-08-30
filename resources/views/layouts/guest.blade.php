<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Azim Group - Knit Division') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        .azimbg {
            background: linear-gradient(to top, #ffffff, #0083c1);
        }
    </style>
    <body class="azimbg font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6">
            <div class="flex lg:justify-center lg:col-start-2">
                <a href="{{ url('/') }}" class="d-inline-block"><img
                    src="{{ asset('assets/img/logo/AG-LOGO.png') }}" alt=""></a>
                </div>
                <div class="my-4">
                    <h1 style="font-size: 35px;font-weight:100;color:#ffffff;font-family:'Times New Roman', Times, serif">KNIT DIVISION</h1>
                </div>
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
            <footer class="py-16 text-center text-sm text-black">
                Copyright © 2024 AZIM GROUP - KNIT DIVISION ( IT ). All rights reserved.
            </footer>
        </div>
    </body>
</html>
