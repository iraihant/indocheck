<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-mode="light" data-layout-width="default" data-layout-position="fixed" data-topbar-color="light" data-menu-color="light" data-sidenav-view="default">
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
    <body class="font-sans antialiased">
        <div class="flex wrapper min-h-screen">
            <div class="app-menu">
                <livewire:layout.header />
            </div>
            <div class="page-content">
                <livewire:layout.navigation />
                <main class="p-6">
                    {{ $slot }}
                </main>
            </div>

        </div>
        <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
        <script src="{{ asset('@frostui/tailwindcss/dist/frostui.js') }}"></script>

    </body>
</html>
