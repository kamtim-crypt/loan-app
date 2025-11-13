<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Inline Styles for Background Image -->
        <style>
            .bg-cover-image {
                /* Make sure to place your image in public/images/background.jpg */
                background-image: url('{{ asset('images/background.jpg') }}');
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            
            <!-- Background Image and Overlay -->
            <div class="absolute inset-0 bg-cover-image bg-cover bg-center"></div>
            <div class="absolute inset-0 bg-black opacity-50"></div>

            <!-- Login/Register Links -->
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-200 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-200 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-200 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <!-- Centered Content -->
            <div class="relative max-w-7xl mx-auto p-6 lg:p-8 text-center">
                <div class="flex justify-center">
                    <x-application-logo class="h-24 w-auto text-white" />
                </div>

                <div class="mt-8">
                    <h1 class="text-4xl font-bold text-white">Your Financial Future, Secured</h1>
                    <p class="mt-4 text-lg text-gray-300">
                        Fast, reliable, and transparent loan services tailored for you.
                    </p>
                </div>

                <div class="mt-10 flex justify-center gap-4">
                    <a href="{{ route('login') }}" class="inline-block rounded-md bg-indigo-600 px-6 py-3 text-center font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Get Started
                    </a>
                    <a href="#" class="inline-block rounded-md px-6 py-3 text-center font-semibold text-white ring-1 ring-inset ring-gray-300 hover:bg-gray-700">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
