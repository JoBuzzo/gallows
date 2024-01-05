<nav class="relative w-full" x-data="{ show: false, dropdown: false }" x-cloak>

    <div class="flex items-center justify-between w-full p-4 bg-black rounded-b-md md:hidden">
        <div class="flex items-center justify-center gap-2">
            <img class="w-10" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Gallows') }} Logo">
            <span class="text-lg font-black">Gallows</span>
        </div>

        <div class="flex justify-between w-1/2">

            <div class="relative w-1/2 font-bold">
                <button @click="dropdown = !dropdown">Games</button>

                <ul class="absolute flex flex-col items-start justify-center px-2 pl-1 text-sm bg-black rounded-b-md -right-5 top-10"
                    x-show="dropdown" x-on:click.outside="dropdown = false"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    <li
                        class="hover:text-[#02e659a5] cursor-pointer py-2 @if ($title == 'Gallows') text-[#02e659a5] @endif">
                        <a href="{{ route('gallows') }}">Gallows</a>
                    </li>
                    <li
                        class="hover:text-[#02e659a5] cursor-pointer py-2 @if ($title == 'DuoGallows') text-[#02e659a5] @endif">
                        <a href="{{ route('gallows.duo') }}">DuoGallows</a>
                    </li>
                    <li
                        class="hover:text-[#02e659a5] cursor-pointer py-2 @if ($title == 'QuadraGallows') text-[#02e659a5] @endif">
                        QuadraGallows
                    </li>
                </ul>
            </div>

            <button>
                <x-icon.info class="w-4 h-4" />
            </button>

        </div>

    </div>




    <div class="absolute top-0 left-0 z-40 flex-col justify-between hidden h-screen p-4 bg-black md:flex rounded-r-md"
        x-on:click.outside="show = false" @click="show = !show">

        <div class="flex flex-col items-start justify-start gap-2">
            <div class="flex items-center justify-center gap-2">
                <img class="w-10" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Gallows') }} Logo">
                <span x-show="show" class="text-lg font-black">Gallows</span>
            </div>

            <button class="hidden p-2 bg-black rounded md:block">
                <template x-if="!show">
                    <x-icon.angle-right />
                </template>
                <template x-if="show">
                    <x-icon.angle-left />
                </template>
            </button>
        </div>

        <ul class="flex flex-col items-start justify-center gap-4 text-sm font-bold md:gap-10 md:text-base">
            <li class="hover:text-[#02e659a5] cursor-pointer @if ($title == 'Gallows') text-[#02e659a5] @endif">
                <x-nav-link number="1" name="Gallows" href="{{ route('gallows') }}" />
            </li>
            <li class="hover:text-[#02e659a5] cursor-pointer @if ($title == 'DuoGallows') text-[#02e659a5] @endif">
                <x-nav-link number="2" name="DuoGallows" href="{{ route('gallows.duo') }}" />
            </li>
            <li class="hover:text-[#02e659a5] cursor-pointer @if ($title == 'QuadraGallows') text-[#02e659a5] @endif">
                <x-nav-link number="4" name="QuadraGallows" href="{{ route('gallows.duo') }}" />
            </li>

        </ul>


        <a href="#">
            <x-icon.info class="w-4 h-4" />
        </a>

    </div>

</nav>
