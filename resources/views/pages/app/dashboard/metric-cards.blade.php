<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
    @foreach ($metrics as $metric)
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/3">
            <div class="flex items-center justify-between">
                <span class="flex h-12 w-12 items-center justify-center rounded-xl {{ $metric['color'] }}">
                    <i class="fa-solid {{ $metric['icon'] }}"></i>
                </span>
                <span class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">{{ $metric['change'] }}</span>
            </div>
            <p class="mt-5 text-theme-sm text-gray-500 dark:text-gray-400">{{ $metric['label'] }}</p>
            <h2 class="mt-1 text-2xl font-semibold text-gray-800 dark:text-white/90">{{ $metric['value'] }}</h2>
        </div>
    @endforeach
</div>
