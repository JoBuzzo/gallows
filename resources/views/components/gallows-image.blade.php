<div class="flex flex-col items-center justify-center w-full gap-2 mt-10 xl:mt-0">
    <img src="{{ asset("images/$numberImage.png") }}" alt="Gallows image game" class="w-40 2xl:w-48">
    <div class="relative justify-start hidden p-1 md:flex">
        <x-input :modal="$modal" />
        @if ($errors->has('key'))
            <x-error :error="$errors->first('key')" />
        @endif
    </div>
</div>