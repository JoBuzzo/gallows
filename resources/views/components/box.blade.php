@if($wordIsBig)
<div class="flex items-center justify-center w-[19.5px] h-[19.5px] text-xl text-center text-white uppercase bg-black border border-[#181818] rounded-md xl:h-12 xl:w-12">
    @if (in_array($w, $correctLetters))
        {{ $w }}
    @endif
</div>
@else
<div class="flex items-center justify-center w-[26px] h-[26px] text-xl text-center text-white uppercase bg-black border border-[#181818] rounded-md xl:h-16 xl:w-16">
    @if (in_array($w, $correctLetters))
        {{ $w }}
    @endif
</div>
@endif
