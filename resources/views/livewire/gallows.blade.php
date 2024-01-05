<div>
    @if (!$modal)
        <div
            class="flex flex-col items-center justify-center w-full gap-4 px-4 xl:gap-24 @if ($modal) blur-3xl @endif">
            <div class="flex flex-col items-center justify-center w-full gap-2 mt-10">
                <img src="{{ asset("images/$numberImage.png") }}" alt="Boneco do jogo da forca" class="w-40 xl:w-1/12">
            </div>

            <div class="flex flex-col items-center justify-between gap-10 mt-20 xl:flex-row">
                <div class="flex flex-col items-start">
                    <h1>1° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach ($wordArr as $w)
                            <div
                                class="flex items-center justify-center w-6 h-6 text-xl text-center text-white uppercase bg-black border border-[#181818] rounded-md md:h-16 md:w-16">
                                @if (in_array($w, $correctLetters))
                                    {{ $w }}
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center w-full">
                <div class="relative justify-start hidden p-1 md:flex">
                    <x-input :modal="$modal"/>
                    @if ($errors->has('key'))
                        <span class="absolute left-0 right-0 text-sm font-bold text-red-600 bottom-10 whitespace-nowrap">{{ $errors->first('key') }}</span>
                    @endif
                </div>


                <x-keyboard :correctLetters="$correctLetters" :errorLetters="$errorLetters" />

            </div>

        </div>
    @else
        <x-modal :win="$win" :word1="$word" :errorLetters="$errorLetters" :correctLetters="$correctLetters" />
    @endif

</div>
