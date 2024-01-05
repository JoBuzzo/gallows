<nav class="relative" x-data="{ show: false, dropdown: false, page: '{{ ($title) }}' }"  x-cloak>

    <div class="flex items-center justify-between w-full p-4 bg-black rounded-b-md md:hidden">
        <div class="flex items-center justify-center gap-2">
            <img class="w-10" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Gallows') }} Logo">
            <span class="text-lg font-black">Gallows</span>
        </div>

        <div class="flex justify-between w-1/2">

            <div class="relative w-1/2 font-bold">
                <button @click="dropdown = !dropdown">Games</button>

                <ul class="absolute z-40 flex flex-col items-start justify-center px-2 pl-1 text-sm bg-black rounded-b-md -right-5 top-10"
                    x-show="dropdown" x-on:click.outside="dropdown = false"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    
                    <li class="hover:text-[#02e659a5] cursor-pointer py-2" :class="{'text-[#02e659a5]' : page === 'Gallows'}"  @click="page = 'Gallows'">
                        <a wire:navigate href="{{ route('gallows') }}">Gallows</a>
                    </li>
                    <li class="hover:text-[#02e659a5] cursor-pointer py-2" :class="{'text-[#02e659a5]' : page === 'DuoGallows'}"  @click="page = 'DuoGallows'">
                        <a wire:navigate href="{{ route('gallows.duo') }}">DuoGallows</a>
                    </li>
                    <li class="hover:text-[#02e659a5] cursor-pointer py-2" :class="{'text-[#02e659a5]' : page === 'QuadraGallows'}"  @click="page = 'QuadraGallows'">
                        <a wire:navigate href="{{ route('gallows.quadra') }}">DuoGallows</a>
                    </li>
                </ul>
            </div>

            <button>
                <x-icon.info class="w-4 h-4" />
            </button>

        </div>

    </div>


    @persist('sidebar')
        <div class="absolute top-0 left-0 z-40 flex-col items-start justify-between hidden h-screen p-4 bg-black md:flex rounded-r-md"
            :class="{
                'w-44 transition-all ease-in-out duration-300': show,
                'w-16 transition-all ease-in-out duration-300': !show
            }"
            x-on:click.outside="show = false">

            <div class="flex flex-col justify-between h-1/3">
                <div class="flex flex-col items-start justify-start gap-2">
                    <div class="flex items-center justify-center gap-2">
                        <img class="w-10" src="{{ asset('images/logo.png') }}"
                            alt="{{ config('app.name', 'Gallows') }} Logo">
                        <span x-show="show" x-transition:enter.duration.500ms class="text-lg font-black">Gallows</span>
                    </div>

                    <button class="hidden p-2 bg-black rounded md:block" @click="show = !show">
                        <template x-if="!show">
                            <x-icon.angle-right />
                        </template>
                        <template x-if="show">
                            <x-icon.angle-left />
                        </template>
                    </button>
                </div>

                <ul class="flex flex-col items-start justify-center gap-4 text-sm font-bold md:gap-10 md:text-base">
                    <li class="hover:text-[#02e659a5] cursor-pointer py-2" :class="{'text-[#02e659a5]' : page === 'Gallows'}"  @click="page = 'Gallows'">
                        <x-nav-link number="1" name="Gallows" href="{{ route('gallows') }}" />
                    </li>
                    <li class="hover:text-[#02e659a5] cursor-pointer py-2" :class="{'text-[#02e659a5]' : page === 'DuoGallows'}"  @click="page = 'DuoGallows'">
                        <x-nav-link number="2" name="DuoGallows" href="{{ route('gallows.duo') }}" />
                    </li>
                    <li class="hover:text-[#02e659a5] cursor-pointer py-2" :class="{'text-[#02e659a5]' : page === 'QuadraGallows'}"  @click="page = 'QuadraGallows'">
                        <x-nav-link number="4" name="QuadraGallows" href="{{ route('gallows.quadra') }}" />
                    </li>
                </ul>
            </div>


            <a href="#" class="flex items-center justify-start w-full gap-2 text-lg font-bold">
                <x-icon.info class="w-5 h-5" />
                <span x-show="show" x-transition:enter.duration.500ms>Sobre</span>
            </a>

        </div>
    @endpersist

</nav>
