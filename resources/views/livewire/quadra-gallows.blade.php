<div class="w-full">
    @if (!$modal)
        <x-container :modal="$modal">
            <x-gallows-image :numberImage="$numberImage" :modal="$modal"/>

            <div class="grid xl:grid-cols-2 xl:-mt-16">
                <div class="flex flex-col items-start justify-end w-full mx-4">
                    <h1>1° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach ($wordArr1 as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters"/>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col items-start justify-end w-full mx-4">
                    <h1>2° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach ($wordArr2 as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters"/>
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col items-start justify-end w-full mx-4">
                    <h1>3° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach ($wordArr3 as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters"/>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col items-start justify-end w-full mx-4">
                    <h1>4° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach ($wordArr4 as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters"/>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center w-full">
                <x-keyboard :correctLetters="$correctLetters" :errorLetters="$errorLetters" />
            </div>

        </x-container>
    @else
        <x-modal :win="$win" :word1="$word1" :word2="$word2" :word3="$word3" :word4="$word4" :errorLetters="$errorLetters" :correctLetters="$correctLetters" />
    @endif
</div>
