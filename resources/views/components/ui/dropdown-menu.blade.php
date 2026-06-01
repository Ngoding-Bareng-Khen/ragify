@props([
    'align' => 'right',
    'width' => '56',
])

@php
    $alignmentClasses = [
        'left' => 'left-0',
        'right' => 'right-0',
    ];

    $widthClasses = [
        '48' => 'w-48',
        '56' => 'w-56',
        '64' => 'w-64',
    ];

    $alignClass = $alignmentClasses[$align] ?? $alignmentClasses['right'];
    $widthClass = $widthClasses[$width] ?? $widthClasses['56'];
@endphp

<div x-data="{ open: false }" class="relative">
    <div x-on:click="open = !open">
        {{ $trigger }}
    </div>

    <div
        x-show="open"
        x-cloak
        x-on:click.outside="open = false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute {{ $alignClass }} z-99999 mt-2 {{ $widthClass }} origin-top-right rounded-xl border border-gray-200 bg-white p-2 shadow-theme-md dark:border-gray-800 dark:bg-gray-900">
        {{ $slot }}
    </div>
</div>
