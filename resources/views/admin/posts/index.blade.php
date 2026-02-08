@extends('admin.layouts.app')

@section('title', 'Articles - Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Header -->
    <div class="sticky top-0 z-40 border-b border-purple-500/30 bg-slate-900/80 backdrop-blur-lg">
        <div class="px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white">Gestion des Articles</h1>
                    <p class="text-sm text-purple-300">{{ $posts->count() }} article{{ $posts->count() !== 1 ? 's' : '' }} au total</p>
                </div>
                <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-lg transition-all font-medium shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Nouvel Article
                </a>
            </div>
        </div>
    </div>

    <div class="p-6 max-w-5xl mx-auto">
        @if($posts->count() > 0)
        <div class="space-y-4">
            @foreach($posts as $post)
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
                <div class="relative bg-slate-800 border border-slate-700 rounded-xl overflow-hidden hover:border-purple-500/50 transition-all">
                    <div class="p-6 flex flex-col md:flex-row gap-6">
                        <!-- Image miniature -->
                        @if($post->image)
                        <div class="md:w-32 md:h-32 flex-shrink-0">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-32 object-cover rounded-lg">
                        </div>
                        @endif

                        <!-- Contenu -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between mb-2 gap-4">
                                <div>
                                    <h3 class="text-xl font-bold text-white">{{ $post->title }}</h3>
                                    <p class="text-sm text-gray-400 mt-1">Publié le {{ $post->published_at?->format('d M Y') ?? 'En brouillon' }}</p>
                                </div>
                                <span class="px-3 py-1 text-xs font-medium rounded-full flex-shrink-0 {{ $post->published_at ? 'bg-green-500/20 text-green-400 border border-green-500/30' : 'bg-gray-500/20 text-gray-400 border border-gray-500/30' }}">
                                    {{ $post->published_at ? 'Publié' : 'Brouillon' }}
                                </span>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-300 line-clamp-3">{{ substr(strip_tags($post->content), 0, 150) }}...</p>

                            <!-- Métadonnées -->
                            <div class="mt-4 flex flex-wrap gap-4 text-xs text-gray-400">
                                <span>Vue{{ $post->views !== 1 ? 's' : '' }} : <span class="text-white font-semibold">{{ $post->views ?? 0 }}</span></span>
                                <span>Créé : <span class="text-white font-semibold">{{ $post->created_at->format('d M Y') }}</span></span>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex flex-col gap-2 flex-shrink-0">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="px-3 py-2 bg-blue-600/20 hover:bg-blue-600/40 text-blue-400 text-xs font-medium rounded-lg transition-colors text-center whitespace-nowrap">
                                Modifier
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-3 py-2 bg-red-600/20 hover:bg-red-600/40 text-red-400 text-xs font-medium rounded-lg transition-colors">
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17.25m20 0C22 10.998 17.5 6.254 12 6.253z"/>
            </svg>
            <p class="text-gray-400 text-lg mb-4">Aucun article pour le moment</p>
            <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-lg transition-all font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Créer le premier article
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
