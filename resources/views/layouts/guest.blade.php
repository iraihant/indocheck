<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-mode="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Indocheck</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css','resources/css/icons.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans text-gray-900 antialiased light">
        <div class="min-h-screen flex flex-col sm:justif y-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

            <div class="w-full sm:max-w-md px-6 mb-5 sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
