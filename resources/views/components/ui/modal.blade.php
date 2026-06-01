@props([
    'isOpen' => false,
    'showCloseButton' => true,
    'isFullscreen' => false,
    'modalId' => 'modal',
])

<div
    x-data="{
        open: @js($isOpen),
        modalId: @js($modalId),
        init() {
            this.$watch('open', value => {
                document.body.style.overflow = value ? 'hidden' : 'unset';
            });
        },
    }"
    x-show="open"
    x-cloak
    @open-modal.window="if ($event.detail === modalId) open = true"
    @keydown.escape.window="open = false"
    class="modal fixed inset-0 z-99999 flex items-center justify-center overflow-y-auto p-5"
    {{ $attributes->except('class') }}>
    <div
        @click="open = false"
        class="fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
    </div>

    <div
        @click.stop
        class="relative max-h-[calc(100vh-2.5rem)] w-full overflow-y-auto rounded-3xl bg-white dark:bg-gray-900 {{ $isFullscreen ? 'h-full max-w-full' : $attributes->get('class') }}"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95">
        @if ($showCloseButton)
            <x-ui.button
                variant="custom"
                size="none"
                x-on:click="open = false"
                className="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11"
                aria-label="Close modal">
                <i class="fa-solid fa-xmark text-lg"></i>
            </x-ui.button>
        @endif

        <div>
            {{ $slot }}
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none;
    }
</style>
