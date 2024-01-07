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
    class="flex items-center justify-center 2xl:w-20 2xl:h-20 p-4 text-xl text-center uppercase border text-white w-[37.5px] h-[37.5px]  select-none
    @if ($error) bg-[#FF3C3C]  @elseif ($correct) bg-[#02e659a5]  @else bg-black @endif border-[#181818] disabled:cursor-not-allowed"
    @if ($error || $correct) disabled @endif>
    {{ $value }}
</button>
