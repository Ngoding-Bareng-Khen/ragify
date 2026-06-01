<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/3">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Top Referenced Sources</h3>
    <p class="mt-1 text-theme-sm text-gray-500 dark:text-gray-400">Documents most used in AI answers.</p>

    <div class="mt-5 space-y-4">
        @foreach ($topSources as $source)
            <div>
                <div class="mb-2 flex items-center justify-between gap-4">
                    <p class="truncate text-theme-sm font-medium text-gray-800 dark:text-white/90">{{ $source['title'] }}</p>
                    <span class="text-theme-xs text-gray-500 dark:text-gray-400">{{ $source['hits'] }} refs</span>
                </div>
                <div class="h-2 rounded-full bg-gray-100 dark:bg-gray-800">
                    <div class="h-2 rounded-full bg-brand-500" style="width: {{ $source['percent'] }}%"></div>
                </div>
            </div>
        @endforeach
    </div>
</div>
