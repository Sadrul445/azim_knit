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
    <body class="azimbg font-sans antialiased">
        <div class="min-h-screen azimbg">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="shadow" style="background: #81d1f7;">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }} 
            </main>
        </div>
    </body>

</html>
