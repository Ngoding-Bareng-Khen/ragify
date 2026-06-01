<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="mb-4 flex flex-col gap-3 px-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">{{ $title }}</h3>

            @if ($description)
                <p class="mt-1 text-theme-sm text-gray-500 dark:text-gray-400">{{ $description }}</p>
            @endif
        </div>

        @if ($showSearch || $showFilter)
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                @if ($showSearch)
                    <form>
                        <div class="relative">
                            <x-ui.button type="button" variant="custom" size="none" className="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400" aria-label="{{ $searchPlaceholder }}">
                                <i class="fa-solid fa-magnifying-glass text-sm"></i>
                            </x-ui.button>
                            <input
                                type="text"
                                placeholder="{{ $searchPlaceholder }}"
                                class="h-[42px] w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-[42px] pr-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 xl:w-[300px]" />
                        </div>
                    </form>
                @endif

                @if ($showFilter)
                    <x-ui.button
                        type="button"
                        variant="outline"
                        size="none"
                        x-on:click="$dispatch('open-modal', '{{ $filterModalId }}')"
                        className="h-[42px] px-4 text-theme-sm">
                        <i class="fa-solid fa-filter text-sm"></i>
                        {{ $filterLabel }}
                    </x-ui.button>
                @endif
            </div>
        @endif
    </div>

    <div class="overflow-hidden">
        <div class="custom-scrollbar max-w-full overflow-x-auto">
            {{ $slot }}
        </div>
    </div>
</div>
