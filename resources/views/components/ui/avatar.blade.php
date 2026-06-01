@props([
    'src' => '',
    'alt' => 'User Avatar',
    'size' => 'medium',
    'status' => 'none',
    'initials' => '',
])

@php
    $sizeClasses = [
        'xsmall' => 'h-6 w-6 max-w-6 text-[10px]',
        'small' => 'h-8 w-8 max-w-8 text-xs',
        'medium' => 'h-10 w-10 max-w-10 text-sm',
        'large' => 'h-12 w-12 max-w-12 text-base',
        'xlarge' => 'h-14 w-14 max-w-14 text-lg',
        'xxlarge' => 'h-16 w-16 max-w-16 text-xl',
    ];

    $statusSizeClasses = [
        'xsmall' => 'h-1.5 w-1.5 max-w-1.5',
        'small' => 'h-2 w-2 max-w-2',
        'medium' => 'h-2.5 w-2.5 max-w-2.5',
        'large' => 'h-3 w-3 max-w-3',
        'xlarge' => 'h-3.5 w-3.5 max-w-3.5',
        'xxlarge' => 'h-4 w-4 max-w-4',
    ];

    $statusColorClasses = [
        'online' => 'bg-green-500',
        'offline' => 'bg-red-400',
        'busy' => 'bg-yellow-500',
    ];

    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['medium'];
    $statusSizeClass = $statusSizeClasses[$size] ?? $statusSizeClasses['medium'];
    $statusColorClass = $statusColorClasses[$status] ?? '';
@endphp

<div class="relative shrink-0 rounded-full {{ $sizeClass }}">
    @if ($src)
        <img
            src="{{ $src }}"
            alt="{{ $alt }}"
            class="h-full w-full rounded-full object-cover">
    @else
        <div {{ $attributes->class('flex h-full w-full items-center justify-center rounded-full bg-gray-100 font-semibold text-gray-700 dark:bg-white/10 dark:text-white/80') }}>
            {{ $initials ?: strtoupper(substr($alt, 0, 1)) }}
        </div>
    @endif

    @if ($status !== 'none')
        <span class="absolute bottom-0 right-0 rounded-full border-[1.5px] border-white dark:border-gray-900 {{ $statusSizeClass }} {{ $statusColorClass }}"></span>
    @endif
</div>
