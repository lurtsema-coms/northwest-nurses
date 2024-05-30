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
            <div class="w-full flex-1 bg-faded-primary hidden sm:block  bg-contain bg-no-repeat bg-center">
                <div class="">
                    <span></span>
                </div>
            </div>
        </div>
    </body>
</html>
