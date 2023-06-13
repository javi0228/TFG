<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Icono de la web --}}
    <link rel="shortcut icon" href="{{ asset('assets/img/brand/logo.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <wireui:scripts />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div
        class="main-content-guest min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <a href="/">
                <x-application-logo class="w-40 h-40  fill-current text-gray-500" />
            </a>
        </div>
        
        <div
            class="w-full {{ Str::contains($slot,'confirm') ? 'sm:max-w-5xl' : 'sm:max-w-md' }}  mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
