<aside class="flex min-h-130 flex-col border-b border-gray-200 dark:border-gray-800 lg:border-b-0 lg:border-r">
    <div class="border-b border-gray-200 p-4 dark:border-gray-800">
        <div class="relative">
            <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                <i class="fa-solid fa-magnifying-glass text-sm"></i>
            </span>
            <input
                type="text"
                placeholder="Search chats"
                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-10 pr-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
        </div>
    </div>

    <div class="custom-scrollbar flex-1 space-y-1 overflow-y-auto p-3">
        @foreach ($conversations as $conversation)
            <x-ui.button
                variant="custom"
                size="none"
                class="group flex w-full items-start gap-3 rounded-xl p-3 text-left transition {{ $conversation['active'] ? 'bg-brand-50 dark:bg-brand-500/12' : 'hover:bg-gray-50 dark:hover:bg-white/5' }}">
                <span class="mt-0.5 flex h-10 w-10 shrink-0 items-center justify-center rounded-full {{ $conversation['active'] ? 'bg-brand-500 text-white' : 'bg-gray-100 text-gray-500 dark:bg-white/5 dark:text-gray-400' }}">
                    <i class="fa-solid fa-comments"></i>
                </span>

                <span class="min-w-0 flex-1">
                    <span class="flex items-center justify-between gap-3">
                        <span class="truncate text-theme-sm font-semibold {{ $conversation['active'] ? 'text-brand-600 dark:text-brand-300' : 'text-gray-800 dark:text-white/90' }}">
                            {{ $conversation['title'] }}
                        </span>
                        <span class="shrink-0 text-theme-xs text-gray-400">{{ $conversation['time'] }}</span>
                    </span>
                    <span class="mt-1 line-clamp-2 block text-theme-xs text-gray-500 dark:text-gray-400">
                        {{ $conversation['preview'] }}
                    </span>
                </span>

                @if ($conversation['unread'])
                    <span class="mt-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-brand-500 px-1.5 text-[11px] font-medium text-white">
                        {{ $conversation['unread'] }}
                    </span>
                @endif
            </x-ui.button>
        @endforeach
    </div>
</aside>
