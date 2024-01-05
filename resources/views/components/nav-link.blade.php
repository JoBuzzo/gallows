<a href="{{ $href }}" class="flex w-full gap-2" wire:navigate>
    <span class="w-6 h-6 rounded-full bg-[#02e659a5] text-sm p-2 flex justify-center items-center text-white">{{ $number }}</span>
    <span x-show="show"  x-transition:enter.duration.500ms>{{ $name }}</span>
</a>