<x-data.data-table
    title="Uploaded Documents"
    description="Track source files and their indexing state."
    search-placeholder="Search documents"
    filter-modal-id="knowledge-source-filter-modal">
    <table class="min-w-full">
        <thead>
            <tr class="border-y border-gray-100 dark:border-white/5">
                <th scope="col" class="px-6 py-3 text-start">
                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Document</p>
                </th>
                <th scope="col" class="px-6 py-3 text-start">
                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Type</p>
                </th>
                <th scope="col" class="px-6 py-3 text-start">
                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Size</p>
                </th>
                <th scope="col" class="px-6 py-3 text-start">
                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Chunks</p>
                </th>
                <th scope="col" class="px-6 py-3 text-start">
                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Uploaded</p>
                </th>
                <th scope="col" class="px-6 py-3 text-start">
                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Status</p>
                </th>
                <th scope="col" class="px-6 py-3 text-right">
                    <span class="sr-only">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 dark:divide-white/5">
            @foreach ($documents as $document)
                <tr>
                    <td class="px-6 py-3.5">
                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg {{ $document['iconClass'] }}">
                                <i class="fa-solid {{ $document['icon'] }} text-lg"></i>
                            </span>
                            <div>
                                <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">{{ $document['name'] }}</p>
                                <p class="mt-0.5 text-theme-xs text-gray-500 dark:text-gray-400">Source document</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-3.5">
                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $document['type'] }}</p>
                    </td>
                    <td class="px-6 py-3.5">
                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $document['size'] }}</p>
                    </td>
                    <td class="px-6 py-3.5">
                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ number_format($document['chunks']) }}</p>
                    </td>
                    <td class="px-6 py-3.5">
                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $document['uploadedAt'] }}</p>
                    </td>
                    <td class="px-6 py-3.5">
                        <x-ui.badge
                            size="sm"
                            :color="match ($document['status']) {
                                'Indexed' => 'success',
                                'Processing' => 'warning',
                                'Failed' => 'error',
                                default => 'primary',
                            }">
                            {{ $document['status'] }}
                        </x-ui.badge>
                    </td>
                    <td class="px-6 py-3.5">
                        <div class="flex items-center justify-end gap-1">
                            <x-ui.button variant="ghost" size="none" className="flex h-9 w-9" aria-label="View document">
                                <i class="fa-solid fa-eye"></i>
                            </x-ui.button>
                            <x-ui.button variant="ghost" size="none" className="flex h-9 w-9" aria-label="Re-index document">
                                <i class="fa-solid fa-rotate"></i>
                            </x-ui.button>
                            <x-ui.button variant="danger" size="none" className="flex h-9 w-9" aria-label="Delete document">
                                <i class="fa-solid fa-trash"></i>
                            </x-ui.button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-data.data-table>
