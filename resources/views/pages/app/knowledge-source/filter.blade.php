<x-ui.modal modal-id="knowledge-source-filter-modal" class="max-w-[520px] p-6 lg:p-8">
    <div class="pr-12">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-white/90">Filter Documents</h3>
        <p class="mt-1 text-theme-sm text-gray-500 dark:text-gray-400">Filter uploaded sources by file type and indexing status.</p>
    </div>

    <form class="mt-6 space-y-6">
        <div>
            <p class="mb-3 text-theme-sm font-medium text-gray-700 dark:text-gray-300">File Type</p>
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                @foreach (['PDF', 'TXT', 'Word'] as $type)
                    <label class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2.5 text-theme-sm text-gray-700 dark:border-gray-800 dark:text-gray-300">
                        <input type="checkbox" name="types[]" value="{{ $type }}" class="h-4 w-4 rounded-sm border-gray-300 text-brand-500 focus:ring-brand-500 dark:border-gray-700 dark:bg-gray-900">
                        <span>{{ $type }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div>
            <p class="mb-3 text-theme-sm font-medium text-gray-700 dark:text-gray-300">Status</p>
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                @foreach (['Indexed', 'Processing', 'Failed'] as $status)
                    <label class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2.5 text-theme-sm text-gray-700 dark:border-gray-800 dark:text-gray-300">
                        <input type="checkbox" name="statuses[]" value="{{ $status }}" class="h-4 w-4 rounded-sm border-gray-300 text-brand-500 focus:ring-brand-500 dark:border-gray-700 dark:bg-gray-900">
                        <span>{{ $status }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 dark:border-gray-800 sm:flex-row sm:justify-end">
            <x-ui.button type="reset" variant="outline" size="none" className="h-11 px-5 text-theme-sm">
                Reset
            </x-ui.button>
            <x-ui.button type="button" variant="primary" size="none" className="h-11 px-5 text-theme-sm" x-on:click="open = false">
                <i class="fa-solid fa-check text-sm"></i>
                Apply Filter
            </x-ui.button>
        </div>
    </form>
</x-ui.modal>
