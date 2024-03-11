<div>
    @if (!$modal)
        <x-container :modal="$modal">
            <x-gallows-image :numberImage="$numberImage" :modal="$modal" />

            <div class="flex flex-col items-center justify-between gap-10 mt-20 xl:flex-row xl:mt-0">
                <div class="flex flex-col items-start">
                    <h1>1° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach (App\Services\GallowsService::getWordArr() as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters" />
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center w-full">
                <x-keyboard :correctLetters="$correctLetters" :errorLetters="$errorLetters" />
            </div>

        </x-container>
    @else
        <x-modal :win="$win" :word1="App\Services\GallowsService::getWord()" :errorLetters="$errorLetters" :correctLetters="$correctLetters" />
    @endif

</div>
