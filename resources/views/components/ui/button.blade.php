@props([
    'size' => 'md',
    'variant' => 'primary',
    'startIcon' => null,
    'endIcon' => null,
    'className' => '',
    'disabled' => false,
])

@php
    $base = 'inline-flex items-center justify-center gap-2 rounded-lg font-medium transition';

    $sizeMap = [
        'sm' => 'px-4 py-3 text-sm',
        'md' => 'px-5 py-3.5 text-sm',
        'none' => '',
    ];

    $variantMap = [
        'primary' => 'bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300',
        'outline' => 'bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03] dark:hover:text-gray-300',
        'ghost' => 'text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300',
        'danger' => 'text-gray-500 hover:bg-error-50 hover:text-error-500 dark:text-gray-400 dark:hover:bg-error-500/15 dark:hover:text-error-400',
        'custom' => '',
    ];

    $sizeClass = $sizeMap[$size] ?? $sizeMap['md'];
    $variantClass = $variantMap[$variant] ?? $variantMap['primary'];
    $disabledClass = $disabled ? 'cursor-not-allowed opacity-50' : '';
    $classes = trim("{$base} {$sizeClass} {$variantClass} {$className} {$disabledClass}");
@endphp

<button
    {{ $attributes->merge(['class' => $classes, 'type' => $attributes->get('type', 'button')]) }}
    @if ($disabled) disabled @endif>
    @if ($startIcon)
        <span class="flex items-center">{!! $startIcon !!}</span>
    @endif

    {{ $slot }}

    @if ($endIcon)
        <span class="flex items-center">{!! $endIcon !!}</span>
    @endif
</button>
