<div class="w-full">
    @if (!$modal)
        <x-container :modal="$modal">
            <x-gallows-image :numberImage="$numberImage" :modal="$modal"/>

            <div class="grid xl:grid-cols-2 xl:-mt-16">
                <div class="flex flex-col items-start justify-end w-full mx-4">
                    <h1>1° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach (App\Services\QuadraGallowsService::getWordArr1() as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters"/>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col items-start justify-end w-full mx-4">
                    <h1>2° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach (App\Services\QuadraGallowsService::getWordArr2() as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters"/>
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col items-start justify-end w-full mx-4">
                    <h1>3° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach (App\Services\QuadraGallowsService::getWordArr3() as $w)
                            <x-box :w="$w" :correctLetters="$correctLetters"/>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col items-start justify-end w-full mx-4">
                    <h1>4° Palavra </h1>
                    <div class="flex items-center justify-center gap-1">
                        @foreach (App\Services\QuadraGallowsService::getWordArr4() as $w)
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
        <x-modal :win="$win" :word1="App\Services\QuadraGallowsService::getWord1()" :word2="App\Services\QuadraGallowsService::getWord2()" :word3="App\Services\QuadraGallowsService::getWord3()" :word4="App\Services\QuadraGallowsService::getWord4()" :errorLetters="$errorLetters" :correctLetters="$correctLetters" />
    @endif
</div>
