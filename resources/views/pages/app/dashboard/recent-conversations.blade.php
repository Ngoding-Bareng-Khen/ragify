<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/3">
    <div class="mb-5 flex items-center justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Recent Conversations</h3>
            <p class="mt-1 text-theme-sm text-gray-500 dark:text-gray-400">Latest chat sessions and message volume.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
        @foreach ($recentConversations as $conversation)
            <div class="rounded-xl border border-gray-200 p-4 dark:border-gray-800">
                <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-400">
                    <i class="fa-solid fa-comments"></i>
                </div>
                <h4 class="truncate text-theme-sm font-semibold text-gray-800 dark:text-white/90">{{ $conversation['title'] }}</h4>
                <div class="mt-3 flex items-center justify-between text-theme-xs text-gray-500 dark:text-gray-400">
                    <span>{{ $conversation['messages'] }} messages</span>
                    <span>{{ $conversation['last'] }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
