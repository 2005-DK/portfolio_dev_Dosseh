@props([
    'headers' => [],
    'rows' => []
])

<div class="overflow-x-auto rounded-lg border border-gray-200">
    <table class="w-full text-sm">
        <thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
            <tr>
                @foreach($headers as $header)
                    <th class="px-6 py-3 text-left font-semibold text-gray-900">
                        {{ $header['label'] }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            {{ $slot }}
        </tbody>
    </table>
</div>

<style>
    table tr:hover {
        background-color: rgba(59, 130, 246, 0.02);
    }
</style>