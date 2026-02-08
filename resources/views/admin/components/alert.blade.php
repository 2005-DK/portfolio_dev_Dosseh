@props([
    'type' => 'info', // info, success, warning, error
    'title' => '',
    'icon' => null,
    'dismissible' => true
])

@php
    $typeClasses = [
        'info' => 'bg-blue-50 border-blue-200 text-blue-800',
        'success' => 'bg-green-50 border-green-200 text-green-800',
        'warning' => 'bg-amber-50 border-amber-200 text-amber-800',
        'error' => 'bg-red-50 border-red-200 text-red-800'
    ];
    
    $iconDefaults = [
        'info' => 'fas fa-info-circle',
        'success' => 'fas fa-check-circle',
        'warning' => 'fas fa-exclamation-triangle',
        'error' => 'fas fa-times-circle'
    ];
    
    $icon = $icon ?? $iconDefaults[$type];
@endphp

<div {{ $attributes->merge(['class' => 'p-4 rounded-lg border-l-4 ' . $typeClasses[$type] . ' notification']) }}
     x-data="{ open: true }" 
     x-show="open"
     @if($dismissible) x-transition @endif>
    <div class="flex items-start gap-3">
        <i class="{{ $icon }} mt-0.5 flex-shrink-0"></i>
        <div class="flex-1">
            @if($title)
                <h4 class="font-semibold mb-1">{{ $title }}</h4>
            @endif
            <div>{{ $slot }}</div>
        </div>
        @if($dismissible)
            <button @click="open = false" class="text-gray-400 hover:text-gray-600 flex-shrink-0">
                <i class="fas fa-times"></i>
            </button>
        @endif
    </div>
</div>