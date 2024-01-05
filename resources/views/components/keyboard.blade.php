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
    class="flex items-center justify-center xl:w-20 xl:h-20 p-4 text-xl text-center uppercase border text-white w-[37.5px] h-[37.5px] last:rounded-br-lg first:rounded-bl-lg select-none
    @if ($error) bg-[#FF3C3C] border-[#FF3C3C] @elseif ($correct) bg-[#02e659a5] border-[#02e659a5] @else bg-black @endif border-gray-700 disabled:cursor-not-allowed"
    @if ($error || $correct) disabled @endif>
    {{ $value }}
</button>
