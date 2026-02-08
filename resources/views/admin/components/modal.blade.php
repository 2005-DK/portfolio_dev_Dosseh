@props([
    'title' => 'Confirmer',
    'message' => 'Êtes-vous certain?',
    'confirmText' => 'Confirmer',
    'cancelText' => 'Annuler',
    'variant' => 'danger' // primary, danger, warning
])

@php
    $variantClasses = [
        'primary' => 'from-primary to-secondary',
        'danger' => 'from-red-500 to-red-600',
        'warning' => 'from-amber-500 to-amber-600'
    ];
@endphp

<div x-data="{ open: false }" @keydown.escape="open = false" class="relative">
    <!-- Trigger Button -->
    <div @click="open = true" class="inline-block">
        {{ $slot }}
    </div>
    
    <!-- Modal Backdrop -->
    <div x-show="open" 
         @click.outside="open = false"
         class="fixed inset-0 bg-black/50 z-40 transition-opacity"
         x-transition
         x-cloak></div>
    
    <!-- Modal -->
    <div x-show="open" 
         class="fixed left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl shadow-2xl z-50 w-full max-w-sm p-6"
         x-transition
         x-cloak>
        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $title }}</h3>
        <p class="text-gray-600 mb-6">{{ $message }}</p>
        
        <div class="flex gap-3 justify-end">
            <button @click="open = false" 
                    class="px-4 py-2 rounded-lg bg-gray-100 text-gray-900 font-semibold hover:bg-gray-200 transition">
                {{ $cancelText }}
            </button>
            <button @click="open = false; {{ $attributes->get('onConfirm', '') }}" 
                    class="px-4 py-2 rounded-lg bg-gradient-to-r {{ $variantClasses[$variant] }} text-white font-semibold hover:shadow-lg transition">
                {{ $confirmText }}
            </button>
        </div>
    </div>
</div>