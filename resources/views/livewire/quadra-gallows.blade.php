<div class="w-full">
    @if (!$modal)
        <x-container :modal="$modal">
            <x-gallows-image :numberImage="$numberImage" />

            <div class="grid items-end justify-end gap-10 md:grid-cols-2">
                <div class="flex flex-col items-start">
                    <h1>1° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach ($wordArr1 as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters" />
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col items-start">
                    <h1>2° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach ($wordArr2 as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters" />
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col items-start">
                    <h1>3° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach ($wordArr3 as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters" />
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col items-start">
                    <h1>4° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach ($wordArr4 as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters" />
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
        <x-modal :win="$win" :word1="$word1" :word2="$word2" :word3="$word3" :word4="$word4"
            :errorLetters="$errorLetters" :correctLetters="$correctLetters" />
    @endif
</div>
