@props([
    'label' => '',
    'type' => 'text',
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'error' => null,
    'hint' => null,
    'icon' => null
])

@php
    $hasError = $error || $errors->has($name);
    $errorMessage = $error ?? $errors->first($name);
@endphp

<div class="mb-6">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-gray-900 mb-2">
            {{ $label }}
            @if($required)<span class="text-red-500">*</span>@endif
        </label>
    @endif
    
    <div class="relative">
        @if($icon)
            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                <i class="{{ $icon }}"></i>
            </div>
        @endif
        
        @if($type === 'textarea')
            <textarea 
                name="{{ $name }}"
                id="{{ $name }}"
                placeholder="{{ $placeholder }}"
                {{ $attributes->merge(['class' => 'w-full px-4 py-3 ' . ($icon ? 'pl-12' : '') . ' rounded-lg border-2 transition-all duration-200 font-inter ' . ($hasError ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:border-primary focus:bg-white')]) }}
                @if($required) required @endif>{{ $value ?? old($name) }}</textarea>
        @else
            <input 
                type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $name }}"
                value="{{ $value ?? old($name) }}"
                placeholder="{{ $placeholder }}"
                {{ $attributes->merge(['class' => 'w-full px-4 py-3 ' . ($icon ? 'pl-12' : '') . ' rounded-lg border-2 transition-all duration-200 font-inter ' . ($hasError ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:border-primary focus:bg-white')]) }}
                @if($required) required @endif />
        @endif
    </div>
    
    @if($hasError)
        <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
            <i class="fas fa-exclamation-circle"></i>
            {{ $errorMessage }}
        </p>
    @elseif($hint)
        <p class="mt-2 text-sm text-gray-500">{{ $hint }}</p>
    @endif
</div>