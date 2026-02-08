@extends('admin.layouts.app')

@section('title', 'Projets - Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Header -->
    <div class="sticky top-0 z-40 border-b border-purple-500/30 bg-slate-900/80 backdrop-blur-lg">
        <div class="px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white">Gestion des Projets</h1>
                    <p class="text-sm text-purple-300">{{ $projects->count() }} projet{{ $projects->count() !== 1 ? 's' : '' }} au total</p>
                </div>
                <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-lg transition-all font-medium shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Nouveau Projet
                </a>
            </div>
        </div>
    </div>

    <div class="p-6 max-w-7xl mx-auto">
        <!-- Filtres & Recherche -->
        <div class="mb-6 bg-slate-800 border border-slate-700 rounded-xl p-4">
            <div class="flex flex-col md:flex-row gap-4 items-center">
                <input type="text" placeholder="Rechercher un projet..." class="flex-1 px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors">
                <select class="px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:border-purple-500 transition-colors">
                    <option value="">Tous les statuts</option>
                    <option value="public">Public</option>
                    <option value="private">Privé</option>
                </select>
            </div>
        </div>

        <!-- Grille Projets -->
        @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
                <div class="relative bg-slate-800 border border-slate-700 rounded-xl overflow-hidden hover:border-purple-500/50 transition-all">
                    <!-- Image -->
                    @if($project->image)
                    <div class="relative h-40 bg-slate-700 overflow-hidden">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 to-transparent"></div>
                    </div>
                    @else
                    <div class="h-40 bg-gradient-to-br from-slate-700 to-slate-800 flex items-center justify-center">
                        <svg class="w-12 h-12 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    @endif

                    <!-- Contenu -->
                    <div class="p-4">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="text-lg font-bold text-white flex-1 line-clamp-2">{{ $project->title }}</h3>
                            <span class="px-2 py-1 text-xs font-medium rounded-full whitespace-nowrap ml-2 {{ $project->is_public ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' }}">
                                {{ $project->is_public ? 'Public' : 'Privé' }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-400 line-clamp-2">{{ $project->description }}</p>
                        
                        <!-- Technologies -->
                        @if($project->technologies)
                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach(explode(',', $project->technologies) as $tech)
                            <span class="px-2 py-1 text-xs bg-purple-500/20 text-purple-300 rounded">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                        @endif

                        <!-- Actions -->
                        <div class="mt-4 flex gap-2 pt-4 border-t border-slate-700">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="flex-1 px-3 py-2 bg-blue-600/20 hover:bg-blue-600/40 text-blue-400 text-sm font-medium rounded-lg transition-colors text-center">
                                Modifier
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="flex-1" onsubmit="return confirm('Êtes-vous sûr ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-3 py-2 bg-red-600/20 hover:bg-red-600/40 text-red-400 text-sm font-medium rounded-lg transition-colors">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 bg-slate-800 border border-slate-700 rounded-xl">
            <svg class="w-16 h-16 mx-auto text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
            </svg>
            <p class="text-gray-400 text-lg mb-4">Aucun projet pour le moment</p>
            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-lg transition-all font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Créer le premier projet
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
