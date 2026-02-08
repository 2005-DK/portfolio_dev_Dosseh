@props([
    'title' => '',
    'subtitle' => '',
    'actions' => null
])

<div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
    <!-- Header -->
    <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200 flex justify-between items-start">
        <div>
            <h3 class="text-lg font-bold text-gray-900">{{ $title }}</h3>
            @if($subtitle)
                <p class="text-sm text-gray-600 mt-1">{{ $subtitle }}</p>
            @endif
        </div>
        @if($actions)
            <div class="flex gap-2">
                {{ $actions }}
            </div>
        @endif
    </div>
    
    <!-- Content -->
    <div class="p-6">
        {{ $slot }}
    </div>
</div>