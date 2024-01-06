<div>
    @if (!$modal)
        <x-container :modal="$modal">
            <x-gallows-image :numberImage="$numberImage" />

            <div class="flex flex-col items-center justify-between gap-10 mt-20 xl:flex-row">
                <div class="flex flex-col items-start">
                    <h1>1° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach ($wordArr as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters" :wordIsBig="$wordIsBig" />
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center w-full">
                <div class="relative justify-start hidden p-1 md:flex">
                    <x-input :modal="$modal" />
                    @if ($errors->has('key'))
                        <x-error :error="$errors->first('key')" />
                    @endif
                </div>


                <x-keyboard :correctLetters="$correctLetters" :errorLetters="$errorLetters" />

            </div>

        </x-container>
    @else
        <x-modal :win="$win" :word1="$word" :errorLetters="$errorLetters" :correctLetters="$correctLetters" />
    @endif

</div>
