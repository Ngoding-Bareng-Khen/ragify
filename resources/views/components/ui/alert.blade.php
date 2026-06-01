@props([
    'variant' => 'info',
    'title' => '',
    'message' => '',
    'showLink' => false,
    'linkHref' => '#',
    'linkText' => 'Learn more',
])

@php
    $variantClasses = [
        'success' => [
            'container' => 'border-green-500 bg-green-50 dark:border-green-500/30 dark:bg-green-500/15',
            'icon' => 'text-green-500',
            'iconName' => 'fa-circle-check',
        ],
        'error' => [
            'container' => 'border-red-500 bg-red-50 dark:border-red-500/30 dark:bg-red-500/15',
            'icon' => 'text-red-500',
            'iconName' => 'fa-circle-exclamation',
        ],
        'warning' => [
            'container' => 'border-yellow-500 bg-yellow-50 dark:border-yellow-500/30 dark:bg-yellow-500/15',
            'icon' => 'text-yellow-500',
            'iconName' => 'fa-triangle-exclamation',
        ],
        'info' => [
            'container' => 'border-blue-500 bg-blue-50 dark:border-blue-500/30 dark:bg-blue-500/15',
            'icon' => 'text-blue-500',
            'iconName' => 'fa-circle-info',
        ],
    ];

    $classes = $variantClasses[$variant] ?? $variantClasses['info'];
@endphp

<div class="rounded-xl border p-4 {{ $classes['container'] }}">
    <div class="flex items-start gap-3">
        <div class="-mt-0.5 {{ $classes['icon'] }}">
            <i class="fa-solid {{ $classes['iconName'] }} text-2xl"></i>
        </div>

        <div class="flex-1">
            @if ($title)
                <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                    {{ $title }}
                </h4>
            @endif

            @if ($message)
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $message }}</p>
            @endif

            @if ($showLink)
                <a
                    href="{{ $linkHref }}"
                    class="mt-3 inline-block text-sm font-medium text-gray-500 underline hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                    {{ $linkText }}
                </a>
            @endif

            {{ $slot }}
        </div>
    </div>
</div>
