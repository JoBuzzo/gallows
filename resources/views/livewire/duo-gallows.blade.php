<div class="w-full">
    @if (!$modal)
        <x-container :modal="$modal">
            <x-gallows-image :numberImage="$numberImage" :modal="$modal"/>

            <div class="grid gap-2 mt-20 xl:gap-10 xl:grid-cols-2 xl:mt-0">
                <div class="flex flex-col items-start justify-end w-full">
                    <h1>1° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach (App\Services\DuoGallowsService::getWordArr1() as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters" />
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col items-start justify-end w-full">
                    <h1>2° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach (App\Services\DuoGallowsService::getWordArr2() as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters" />
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="flex flex-col items-center justify-center w-full">
                <x-keyboard :correctLetters="$correctLetters" :errorLetters="$errorLetters" />
            </div>

        </x-container>
    @else
        <x-modal :win="$win" :word1="App\Services\DuoGallowsService::getWord1()" :word2="App\Services\DuoGallowsService::getWord2()" :errorLetters="$errorLetters" :correctLetters="$correctLetters" />
    @endif

</div>
