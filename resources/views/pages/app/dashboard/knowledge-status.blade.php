<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/3">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Knowledge Status</h3>
    <p class="mt-1 text-theme-sm text-gray-500 dark:text-gray-400">Document indexing pipeline health.</p>

    <div class="mt-5 space-y-4">
        @foreach ($statusSummary as $status)
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <x-ui.badge :color="$status['color']" size="sm">{{ $status['label'] }}</x-ui.badge>
                </div>
                <span class="text-theme-sm font-semibold text-gray-800 dark:text-white/90">{{ $status['value'] }}</span>
            </div>
        @endforeach
    </div>
</div>
