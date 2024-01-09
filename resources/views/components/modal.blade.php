@props([
    'win',
    'word1',
    'word2' => null,
    'word3' => null,
    'word4' => null,
    'errorLetters' => [],
    'correctLetters' => [],
])

<div class="absolute left-0 right-0 flex items-center justify-center p-2 md:top-16">
    <div class="flex flex-col items-center justify-center w-4/5 p-8 bg-black rounded-lg md:w-1/2 md:justify-normal md:items-stretch">

        <div class="flex flex-col items-center justify-between gap-2 xl:flex-row">
            <div class="flex flex-col">
                <div class="flex items-center justify-start">
                    @if ($win)
                        <h1 class="text-3xl font-extrabold">Parabéns, você venceu!</h1>
                    @else
                        <h1 class="text-3xl font-extrabold">Não foi dessa vez, mas jamais desista!</h1>
                    @endif
                </div>

                <div class="flex flex-col items-center justify-center mt-10 mb-5 xl:justify-start xl:items-start">
                    <h1 class="mb-4 text-4xl font-semibold">A palavra é:</h1>
                    <div
                        class="grid grid-cols-2 gap-6 text-2xl xl:text-4xl font-extrabold uppercase @if ($win) text-[#02e659a5] @else text-[#FF3C3C] @endif">
                        <h1>{{ $word1 }}</h1>
                        <h1>{{ $word2 }}</h1>
                        <h1>{{ $word3 }}</h1>
                        <h1>{{ $word4 }}</h1>
                    </div>
                </div>

                @if (count($errorLetters) > 0)
                    <div class="flex flex-col items-start justify-start mt-10">
                        <h1 class="text-lg">Letras erradas:</h1>
                        <div class="flex flex-wrap items-center justify-center">
                            @foreach (array_unique($errorLetters) as $errorLetter)
                                <div
                                    class="flex items-center justify-center w-8 h-8 text-xl text-center text-white uppercase bg-[#FF3C3C] border border-black rounded-md xl:h-12 xl:w-12">
                                    {{ $errorLetter }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (count($correctLetters) > 0)
                    <div class="flex flex-col items-start justify-start mt-10">
                        <h1 class="text-lg">Letras corretas:</h1>
                        <div class="flex flex-wrap items-center justify-center">
                            @foreach (array_unique($correctLetters) as $currectLetter)
                                @if ($currectLetter != '-' && $currectLetter != "'")
                                    <div
                                        class="flex items-center justify-center w-8 h-8 text-xl text-center text-white uppercase border border-black bg-[#02e659a5] rounded-md xl:h-12 xl:w-12">
                                        {{ $currectLetter }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            @if (!$win)
                <img src="{{ asset('images/6.png') }}" alt="Gallows image game" class="w-36 2xl:w-48">
                @else
                <img src="{{ asset('images/7.png') }}" alt="Gallows image game" class="w-36 2xl:w-48">
            @endif
        </div>

        <div class="flex flex-col items-center justify-center gap-4 mt-10 md:justify-start md:items-start">
            <p>
                Mais Games
            </p>

            <div class="flex flex-col items-center justify-center w-full gap-4 xl:flex-row">
                <a href="{{ route('gallows') }}" wire:navigate
                    class="w-full px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md inline-flex bg-[#02e659a5] hover:bg-[#02e659be] focus:bg-[#02e659a5] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 justify-center items-center">Gallows</a>
                <a href="{{ route('gallows.duo') }}" wire:navigate
                    class="w-full px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md inline-flex bg-[#02e659a5] hover:bg-[#02e659be] focus:bg-[#02e659a5] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 justify-center items-center">DuoGallows</a>
                <a href="{{ route('gallows.quadra') }}" wire:navigate
                    class="w-full px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md inline-flex bg-[#02e659a5] hover:bg-[#02e659be] focus:bg-[#02e659a5] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 justify-center items-center">QuadraGallows</a>
            </div>
        </div>
    </div>
</div>
