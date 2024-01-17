@if (!$modal)
    <input wire:keydown.enter="handleKeyDown" wire:model="key"
        class="uppercase bg-transparent border-0 focus:border-0 focus:ring-0 ring-0" id="key"
        placeholder="Digite uma letra" autocomplete="off" />
    <script>
        document.addEventListener("livewire:navigated", function() {
            const inputField = document.getElementById('key');

            if (inputField) {
                function maintainFocus() {
                    if (window.innerWidth > 768) {
                        inputField.focus();
                    }
                }
                setInterval(maintainFocus, 1);

                inputField.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        inputField.value = '';
                    }
                });
            }
        });
    </script>
@endif
