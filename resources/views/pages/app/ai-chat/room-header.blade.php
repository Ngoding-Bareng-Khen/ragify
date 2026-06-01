<div class="flex flex-col gap-4 border-b border-gray-200 px-5 py-3.5 dark:border-gray-800 sm:flex-row sm:items-center sm:justify-between">
    <div class="flex items-center gap-3">
        <x-ui.avatar size="large" initials="AI" class="bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-400" />
        <div>
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white/90">Product handbook Q&A</h2>
            <p class="mt-0.5 text-theme-xs text-gray-500 dark:text-gray-400">Using 4 indexed knowledge sources</p>
        </div>
    </div>

    <div class="flex items-center gap-2">
        <x-ui.button variant="outline" size="none" className="flex h-10 w-10 p-0" aria-label="Refresh chat">
            <i class="fa-solid fa-rotate"></i>
        </x-ui.button>
        <x-ui.button variant="custom" size="none" className="flex h-10 w-10 items-center justify-center rounded-lg border border-gray-200 text-gray-500 shadow-theme-xs hover:bg-error-50 hover:text-error-500 dark:border-gray-800 dark:text-gray-400 dark:hover:bg-error-500/15 dark:hover:text-error-400" aria-label="Delete chat">
            <i class="fa-solid fa-trash"></i>
        </x-ui.button>
    </div>
</div>
