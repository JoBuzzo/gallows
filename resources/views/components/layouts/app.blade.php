<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', $title) }} </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#181818] min-h-screen overflow-x-hidden text-white">
    <nav class="relative flex items-center justify-center w-full" x-data="{ show: false }" x-cloak>

        <button @click="show = !show" class="absolute z-50 p-2 bg-black rounded md:left-2 md:top-2 top-[80px] left-0">
            <template x-if="!show">
                <x-icon.angle-down />
            </template>
            <template x-if="show">
                <x-icon.angle-up />
            </template>
        </button>

        <div class="absolute top-0 z-40 flex items-center justify-between w-full p-4 bg-black xl:w-1/3 rounded-b-md"
            x-on:click.outside="show = false" x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">
            <img class="w-12 md:w-10" src="{{ asset('images/logo.png') }}"
                alt="{{ config('app.name', 'Gallows') }} Logo">

            <ul class="flex items-center w-full gap-4 text-sm font-bold md:gap-10 md:text-base justify-evenly">
                <li class="hover:text-[#02e659a5] cursor-pointer @if ($title == 'Gallows') text-[#02e659a5] @endif">
                    Gallows
                </li>
                <li class="hover:text-[#02e659a5] cursor-pointer @if ($title == 'DuoGallows') text-[#02e659a5] @endif">
                    DuoGallows
                </li>
                <li class="hover:text-[#02e659a5] cursor-pointer @if ($title == 'QuadraGallows') text-[#02e659a5] @endif">
                    QuadraGallows
                </li>
            </ul>
        </div>

    </nav>
    <main>
        {{ $slot }}
    </main>
</body>

</html>
