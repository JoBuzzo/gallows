<nav class="relative" x-data="{ show: false, dropdown: false, page: $persist('{{ $title }}') }" x-cloak>

    <div class="flex items-center justify-between w-full p-4 bg-black rounded-b-md md:hidden">
        <div class="flex items-center justify-center gap-2">
            <img class="w-10" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Gallows') }} Logo">
            <span class="text-lg font-black">Gallows</span>
        </div>

        <div class="flex justify-between w-1/2">

            <div class="relative w-1/2 font-bold">
                <button @click="dropdown = !dropdown">Games</button>

                <ul class="absolute z-40 flex flex-col items-start justify-center px-2 pl-1 text-sm bg-black -right-5 top-10 rounded-b-md"
                    x-show="dropdown" x-on:click.outside="dropdown = false"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

                    <li class="cursor-pointer py-2 hover:text-[#02e659a5]"
                        :class="{ 'text-[#02e659a5]': page === 'Gallows' }">
                        <a wire:navigate @click="page = 'Gallows'" href="{{ route('gallows') }}">Gallows</a>
                    </li>
                    <li class="cursor-pointer py-2 hover:text-[#02e659a5]"
                        :class="{ 'text-[#02e659a5]': page === 'DuoGallows' }">
                        <a wire:navigate @click="page = 'DuoGallows'" href="{{ route('gallows.duo') }}">DuoGallows</a>
                    </li>
                    <li class="cursor-pointer py-2 hover:text-[#02e659a5]"
                        :class="{ 'text-[#02e659a5]': page === 'QuadraGallows' }">
                        <a wire:navigate @click="page = 'QuadraGallows'"
                            href="{{ route('gallows.quadra') }}">DuoGallows</a>
                    </li>
                </ul>
            </div>

            <a href="{{ route('about') }}" wire:navigate>
                <x-icon.info class="w-4 h-4" />
            </a>

        </div>

    </div>


    @persist('sidebar')
        <div class="absolute top-0 left-0 z-40 flex-col items-start justify-between hidden h-screen p-4 bg-black rounded-r-md md:flex"
            :class="{
                'w-56 transition-all ease-in-out duration-300': show,
                'w-16 transition-all ease-in-out duration-300': !show
            }"
            x-on:click.outside="show = false">

            <div class="flex flex-col items-start justify-between h-full pt-5" :class="{ 'px-5': show }">

                <div class="flex h-[60%] flex-col justify-between">
                    <div class="flex flex-col items-start justify-start gap-2">
                        <div class="flex items-center justify-center gap-2">
                            <img :class="{
                                'w-8 transition-all ease-in-out duration-300': !show,
                                'w-12 transition-all ease-in-out duration-300': show
                            }"
                                src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Gallows') }} Logo">
                            <span x-show="show" x-transition:enter.duration.500ms
                                class="text-2xl font-black">Gallows</span>
                        </div>
                    </div>

                    <ul class="flex flex-col items-start justify-center gap-4 text-sm font-bold md:gap-10 md:text-base">
                        <li class="cursor-pointer py-2 hover:text-[#02e659a5]"
                            :class="{ 'text-[#02e659a5]': page === 'Gallows' }">
                            <x-nav-link number="1" name="Gallows" href="{{ route('gallows') }}"
                                @click="page = 'Gallows'" />
                        </li>
                        <li class="cursor-pointer py-2 hover:text-[#02e659a5]"
                            :class="{ 'text-[#02e659a5]': page === 'DuoGallows' }">
                            <x-nav-link number="2" name="DuoGallows" href="{{ route('gallows.duo') }}"
                                @click="page = 'DuoGallows'" />
                        </li>
                        <li class="cursor-pointer py-2 hover:text-[#02e659a5]"
                            :class="{ 'text-[#02e659a5]': page === 'QuadraGallows' }">
                            <x-nav-link number="4" name="QuadraGallows" href="{{ route('gallows.quadra') }}"
                                @click="page = 'QuadraGallows'" />
                        </li>
                    </ul>
                </div>


                <a wire:navigate href="{{ route('about') }}"
                    class="flex items-center justify-start w-full gap-2 text-lg font-bold">
                    <x-icon.info class="w-5 h-5" />
                    <span x-show="show" x-transition:enter.duration.500ms>Sobre</span>
                </a>
            </div>

            <button x-data="{ tooltip: false }" class="absolute -right-6 top-1/2" @click="show = !show"
                @mouseleave="tooltip = false" @mouseenter="tooltip = true">
                <span class="" x-show="!show" class="relative">
                    <div class="flex h-[72px] w-8 items-center justify-center">
                        <div class="flex flex-col items-center w-6 h-6">
                            <div class="w-1 h-3 rounded-full"
                                style="background: black; transform: translateY(0.15rem) rotate(15deg) translateZ(0px);">
                            </div>
                            <div class="w-1 h-3 rounded-full"
                                style="background: black; transform: translateY(-0.15rem) rotate(-15deg) translateZ(0px);">
                            </div>
                        </div>
                    </div>
                    <span x-show="!show && tooltip"
                        class="absolute left-6 top-6 whitespace-nowrap rounded-lg bg-[black] px-2 py-1 text-xs font-bold text-white">
                        Abrir
                    </span>
                </span>

                <span class="" x-show="show">
                    <div class="flex h-[72px] w-8 items-center justify-center">
                        <div class="flex flex-col items-center w-6 h-6">
                            <div class="w-1 h-3 rounded-full"
                                style="background: black; transform: translateY(0.15rem) rotate(0deg) translateZ(0px);">
                            </div>
                            <div class="w-1 h-3 rounded-full"
                                style="background: black; transform: translateY(-0.15rem) rotate(0deg) translateZ(0px);">
                            </div>
                        </div>
                    </div>
                    <span x-show="show && tooltip"
                        class="absolute left-6 top-6 whitespace-nowrap rounded-lg bg-[black] px-2 py-1 text-xs font-bold text-white">
                        Fechar
                    </span>
                </span>
            </button>
        </div>
    @endpersist

</nav>
