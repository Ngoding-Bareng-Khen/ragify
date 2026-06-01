<div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h1 class="text-title-sm font-semibold text-gray-800 dark:text-white/90">Dashboard</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Overview of documents, indexing health, and AI chat activity.</p>
    </div>

    <div class="flex flex-col gap-3 sm:flex-row">
        <x-ui.button variant="outline" size="none" className="h-11 px-4 text-sm">
            <i class="fa-solid fa-database"></i>
            Knowledge Source
        </x-ui.button>
        <x-ui.button variant="primary" size="none" className="h-11 px-4 text-sm">
            <i class="fa-solid fa-plus"></i>
            New Chat
        </x-ui.button>
    </div>
</div>
