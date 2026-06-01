<div class="custom-scrollbar flex-1 space-y-6 overflow-y-auto bg-gray-50/60 p-5 dark:bg-gray-950/20">
    @foreach ($messages as $message)
        <div class="flex gap-3 {{ $message['sender'] === 'user' ? 'justify-end' : 'justify-start' }}">
            @if ($message['sender'] === 'assistant')
                <x-ui.avatar size="small" initials="AI" />
            @endif

            <div class="max-w-190 {{ $message['sender'] === 'user' ? 'text-right' : '' }}">
                <div class="mb-1 flex items-center gap-2 {{ $message['sender'] === 'user' ? 'justify-end' : '' }}">
                    <span class="text-theme-xs font-medium text-gray-700 dark:text-gray-300">{{ $message['name'] }}</span>
                    <span class="text-theme-xs text-gray-400">{{ $message['time'] }}</span>
                </div>

                <div class="rounded-2xl px-4 py-3 shadow-theme-xs {{ $message['sender'] === 'user' ? 'rounded-tr-sm bg-brand-500 text-white' : 'rounded-tl-sm border border-gray-200 bg-white text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300' }}">
                    <p class="whitespace-pre-line text-theme-sm leading-6">{{ $message['body'] }}</p>
                </div>

                @if (count($message['sources']))
                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach ($message['sources'] as $source)
                            <x-ui.badge color="light" size="sm">
                                <i class="fa-solid fa-file-lines"></i>
                                {{ $source }}
                            </x-ui.badge>
                        @endforeach
                    </div>
                @endif
            </div>

            @if ($message['sender'] === 'user')
                <x-ui.avatar size="small" alt="You" initials="YC" class="mt-1 bg-gray-800 text-white dark:bg-white/10" />
            @endif
        </div>
    @endforeach
</div>
