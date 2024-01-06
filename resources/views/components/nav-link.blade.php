<a href="{{ $href }}" class="flex items-center justify-center w-full gap-2 hover:animate-pulse" wire:navigate {{ $attributes->merge([]) }}>

    <div class="w-6 h-6 rounded-full bg-[#02e659a5] p-3 text-white text-center flex justify-center items-center">
        <span class="-rotate-12">#</span>
        <span class="rotate-12">{{ $number }}</span>
    </div>

    <span x-show="show" x-transition:enter.duration.500ms>{{ $name }}</span>
</a>
