<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex items-center justify-end relative mr-32">
            
            <!-- Image on the left -->
            <img src="/assets/img/smk logo.jpg" class="absolute -mt-6 left-60 top-1/2 transform -translate-y-1/2 w-1/4 h-auto" alt="Image">

            <!-- Card Section (Shifted slightly to the right) -->
            <div class="w-full sm:max-w-md -mt-6 px-10 py-4 justify-center dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg ml-10">
                {{ $slot }}
            </div>
        </div>

        <!-- Small Images Section (Adjusted to be closer to the large image) -->
        <div class="flex justify-start gap-4 ml-44 mb-8 -mt-24">
            <img src="/assets/img/pplg.png" alt="Image 1" class="h-10"> <!-- Replace with your small image paths -->
            <img src="/assets/img/tjkt.png" alt="Image 2" class="h-10">
            <img src="/assets/img/an.png" alt="Image 3" class="h-10">
            <img src="/assets/img/perkantoran.png" alt="Image 4" class="h-10">
            <img src="/assets/img/akl.jpg" alt="Image 5" class="h-10">
            <img src="/assets/img/br.png" alt="Image 6" class="h-10">
            <img src="/assets/img/lps.png" alt="Image 7" class="h-10">
            <img src="/assets/img/dpb.png" alt="Image 8" class="h-10">
        </div>

    </body>
</html>
