@php
    use Illuminate\Support\Arr;
    use Illuminate\Support\Str;

    $errorLetters = Arr::map($this->errorLetters, function ($value) {
        return Str::ascii($value);
    });

    $correctLetters = Arr::map($this->correctLetters, function ($value) {
        return Str::ascii($value);
    });


    $error = in_array($value, $errorLetters);
    $correct = in_array($value, $correctLetters);
@endphp

<button wire:click="verifyLetter('{{ $value }}')" wire:loading.attr="disabled"
    class="flex items-center justify-center w-[37.5px] h-[37.5px] sm:w-12 sm:h-12 md:w-16 md:h-20 lg:w-20 lg:h-20 p-4 text-xl text-center uppercase border text-white select-none
    @if ($error) bg-[#FF3C3C]  @elseif ($correct) bg-[#02e659a5]  @else bg-black @endif border-[#181818] disabled:cursor-not-allowed"
    @if ($error || $correct) disabled @endif>
    {{ $value }}
</button>
