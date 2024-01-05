<div class="flex items-center justify-center w-6 h-6 text-xl text-center text-white uppercase bg-black border border-[#181818] rounded-md md:h-16 md:w-16">
    @if (in_array($w, $correctLetters))
        {{ $w }}
    @endif
</div>