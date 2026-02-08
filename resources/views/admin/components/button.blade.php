@props([
    'variant' => 'primary', // primary, secondary, danger, success, ghost
    'size' => 'md',         // sm, md, lg
    'type' => 'button',
    'href' => null,
    'icon' => null,
    'disabled' => false
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-semibold rounded-lg transition-all duration-200 font-inter';
    
    $variantClasses = [
        'primary' => 'bg-gradient-to-r from-primary to-secondary text-white hover:shadow-lg hover:scale-105',
        'secondary' => 'bg-gray-100 text-gray-900 hover:bg-gray-200',
        'danger' => 'bg-red-100 text-red-700 hover:bg-red-200',
        'success' => 'bg-green-100 text-green-700 hover:bg-green-200',
        'ghost' => 'text-gray-700 hover:bg-gray-100'
    ];
    
    $sizeClasses = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2.5 text-base',
        'lg' => 'px-6 py-3 text-lg'
    ];
    
    $classes = "$baseClasses {$variantClasses[$variant]} {$sizeClasses[$size]}";
    
    if ($disabled) {
        $classes .= ' opacity-50 cursor-not-allowed';
    }
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} @if($disabled) onclick="return false" @endif>
        @if($icon)<i class="{{ $icon }} mr-2"></i>@endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }} @if($disabled) disabled @endif>
        @if($icon)<i class="{{ $icon }} mr-2"></i>@endif
        {{ $slot }}
    </button>
@endif