<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title }} </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if (!config('app.debug'))
        <script src="https://cdn.usefathom.com/script.js" data-site="ABCDEFG" data-spa="auto" defer></script>
    @endif
</head>

<body class="bg-[#181818] min-h-screen overflow-x-hidden text-white">
    <x-layouts.sidebar :title="$title" />

    <main class="overflow-x-hidden">
        {{ $slot }}
    </main>
</body>

</html>
