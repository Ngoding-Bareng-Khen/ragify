@props([
    'name',
    'label' => '',
    'type' => 'text',
    'placeholder' => '',
    'value' => null,
    'required' => false,
])

@php
    $hasError = $errors->has($name);
    $inputClasses = 'dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30';
    $stateClasses = $hasError
        ? 'border-error-500 focus:border-error-500 focus:ring-error-500/10 dark:border-error-500 dark:focus:border-error-500'
        : 'border-gray-300 dark:border-gray-700';
@endphp

<div>
    @if ($label)
        <label for="{{ $name }}" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            {{ $label }}@if ($required)<span class="text-error-500">*</span>@endif
        </label>
    @endif

    @if ($type === 'password')
        <div x-data="{ showPassword: false }" class="relative">
            <input
                x-bind:type="showPassword ? 'text' : 'password'"
                id="{{ $name }}"
                name="{{ $name }}"
                placeholder="{{ $placeholder }}"
                @if ($required) required @endif
                {{ $attributes->merge(['class' => "{$inputClasses} {$stateClasses} pr-11 pl-4"]) }} />

            <span
                x-on:click="showPassword = !showPassword"
                class="absolute top-1/2 right-4 z-30 -translate-y-1/2 cursor-pointer text-gray-500 dark:text-gray-400">
                <i x-show="!showPassword" class="fa-solid fa-eye"></i>
                <i x-show="showPassword" class="fa-solid fa-eye-slash"></i>
            </span>
        </div>
    @else
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            @if ($required) required @endif
            {{ $attributes->merge(['class' => "{$inputClasses} {$stateClasses}"]) }} />
    @endif

    @error($name)
        <p class="mt-1.5 text-theme-xs text-error-500">{{ $message }}</p>
    @enderror
</div>
