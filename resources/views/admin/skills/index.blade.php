@extends('admin.layouts.app')

@section('title', 'Compétences - Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Header -->
    <div class="sticky top-0 z-40 border-b border-purple-500/30 bg-slate-900/80 backdrop-blur-lg">
        <div class="px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white">Gestion des Compétences</h1>
                    <p class="text-sm text-purple-300">{{ $skills->count() }} compétence{{ $skills->count() !== 1 ? 's' : '' }} au total</p>
                </div>
                <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-lg transition-all font-medium shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Nouvelle Compétence
                </a>
            </div>
        </div>
    </div>

    <div class="p-6 max-w-5xl mx-auto">
        @if($skills->count() > 0)
        <!-- Groupés par Catégorie -->
        @php
            $grouped = $skills->groupBy('category');
        @endphp

        @foreach($grouped as $category => $categorySkills)
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-white mb-4 capitalize">{{ $category ?? 'Sans catégorie' }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($categorySkills as $skill)
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
                    <div class="relative bg-slate-800 border border-slate-700 rounded-xl p-5 hover:border-purple-500/50 transition-all">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-white">{{ $skill->name }}</h3>
                                <p class="text-xs text-gray-400 mt-1">{{ $category ?? 'Sans catégorie' }}</p>
                            </div>
                            @if($skill->icon)
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center flex-shrink-0 text-lg">
                                {!! $skill->icon !!}
                            </div>
                            @endif
                        </div>

                        <!-- Niveau de maîtrise -->
                        <div class="mb-4">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs text-gray-400">Maîtrise</span>
                                <span class="text-sm font-bold text-purple-400">{{ $skill->proficiency ?? 0 }}%</span>
                            </div>
                            <div class="w-full h-2 bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-purple-500 to-pink-500 rounded-full" style="width: {{ $skill->proficiency ?? 0 }}%"></div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-2 pt-4 border-t border-slate-700">
                            <a href="{{ route('admin.skills.edit', $skill) }}" class="flex-1 px-3 py-2 bg-blue-600/20 hover:bg-blue-600/40 text-blue-400 text-sm font-medium rounded-lg transition-colors text-center">
                                Modifier
                            </a>
                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="flex-1" onsubmit="return confirm('Êtes-vous sûr ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-3 py-2 bg-red-600/20 hover:bg-red-600/40 text-red-400 text-sm font-medium rounded-lg transition-colors">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
        @else
        <div class="text-center py-16 bg-slate-800 border border-slate-700 rounded-xl">
            <svg class="w-16 h-16 mx-auto text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="text-gray-400 text-lg mb-4">Aucune compétence pour le moment</p>
            <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-lg transition-all font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Ajouter la première compétence
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
