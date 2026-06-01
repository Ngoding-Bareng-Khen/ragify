<div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3">
    <div class="flex items-center justify-between border-b border-gray-200 px-5 py-4 dark:border-gray-800">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Recent Documents</h3>
            <p class="mt-1 text-theme-sm text-gray-500 dark:text-gray-400">Latest uploaded sources and indexing status.</p>
        </div>
    </div>

    <div class="custom-scrollbar overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="border-b border-gray-100 dark:border-white/5">
                    <th class="px-5 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400">Document</th>
                    <th class="px-5 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400">Type</th>
                    <th class="px-5 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400">Size</th>
                    <th class="px-5 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400">Status</th>
                    <th class="px-5 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400">Uploaded</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-white/5">
                @foreach ($recentDocuments as $document)
                    <tr>
                        <td class="px-5 py-4">
                            <p class="text-theme-sm font-medium text-gray-800 dark:text-white/90">{{ $document['title'] }}</p>
                        </td>
                        <td class="px-5 py-4 text-theme-sm text-gray-500 dark:text-gray-400">{{ $document['type'] }}</td>
                        <td class="px-5 py-4 text-theme-sm text-gray-500 dark:text-gray-400">{{ $document['size'] }}</td>
                        <td class="px-5 py-4">
                            <x-ui.badge
                                size="sm"
                                :color="match ($document['status']) {
                                    'completed' => 'success',
                                    'processing' => 'warning',
                                    'failed' => 'error',
                                    default => 'primary',
                                }">
                                {{ $document['status'] }}
                            </x-ui.badge>
                        </td>
                        <td class="px-5 py-4 text-theme-sm text-gray-500 dark:text-gray-400">{{ $document['uploaded'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
