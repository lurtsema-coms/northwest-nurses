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
    <body class="font-sans text-gray-900 antialiased flex m-auto min-h-screen">
        <div class="w-full max-w-7xl flex flex-row justify-center m-auto bg-white shadow-md overflow-hidden h-[35rem]">
            <div class=" w-full flex-1 px-14 py-4 m-auto  ">
                {{ $slot }}
            </div>
            <div class="w-full flex-1 hidden sm:block  relative bg-contain bg-no-repeat bg-center">
                <img class="absolute object-cover min-h-full min-w-full top-0 z-10" src="{{asset('img/nurse_bg.jpg')}}" alt="">
                <div class="bg-primary w-full h-full absolute inset-0 z-20 opacity-75">
                </div>
            </div>
        </div>
    </body>
</html>
