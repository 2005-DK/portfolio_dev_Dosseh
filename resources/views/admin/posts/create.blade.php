@extends('admin.layouts.app')

@section('title', 'Écrire un article - Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Header -->
    <div class="sticky top-0 z-40 border-b border-purple-500/30 bg-slate-900/80 backdrop-blur-lg">
        <div class="px-6 py-4">
            <h1 class="text-3xl font-bold text-white">Écrire un Nouvel Article</h1>
        </div>
    </div>

    <div class="p-6 max-w-4xl mx-auto">
        <div class="group relative">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-xl blur opacity-20"></div>
            <div class="relative bg-slate-800 border border-slate-700 rounded-xl p-8">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Titre -->
                    <div>
                        <label class="block text-sm font-semibold text-white mb-2">Titre de l'Article *</label>
                        <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors @error('title') border-red-500 @enderror">
                        @error('title')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Grille 2 colonnes -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Catégorie -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Catégorie</label>
                            <input type="text" name="category" value="{{ old('category') }}" placeholder="Laravel, Vue.js, etc." class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors">
                        </div>

                        <!-- Image de couverture -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Image de Couverture</label>
                            <input type="file" name="image" accept="image/*" class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:border-purple-500 transition-colors file:text-white file:cursor-pointer">
                            <p class="text-xs text-gray-400 mt-1">JPG, PNG, GIF (max 2MB)</p>
                        </div>
                    </div>

                    <!-- Résumé -->
                    <div>
                        <label class="block text-sm font-semibold text-white mb-2">Résumé (max 500 caractères) *</label>
                        <textarea name="excerpt" rows="3" required class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors resize-none" placeholder="Un court résumé de l'article...">{{ old('excerpt') }}</textarea>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-xs text-gray-400">Courte description pour les listes</p>
                            <span class="text-xs text-gray-500">{{ strlen(old('excerpt', '')) }}/500</span>
                        </div>
                        @error('excerpt')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contenu -->
                    <div>
                        <label class="block text-sm font-semibold text-white mb-2">Contenu *</label>
                        <textarea name="content" rows="15" required class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors resize-vertical font-mono text-sm" placeholder="Écrivez votre contenu ici...">{{ old('content') }}</textarea>
                        <p class="text-xs text-gray-400 mt-1">💡 Supporte le Markdown</p>
                        @error('content')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Publié -->
                    <div class="flex items-center gap-3 p-4 bg-slate-700/50 rounded-lg border border-slate-600">
                        <input type="checkbox" id="is_published" name="is_published" value="1" @checked(old('is_published', true)) class="w-4 h-4 rounded">
                        <label for="is_published" class="text-white cursor-pointer">
                            <span class="font-medium">Publier cet article immédiatement</span>
                            <p class="text-xs text-gray-400 mt-1">Non coché = Brouillon</p>
                        </label>
                    </div>

                    <!-- Info Utiles -->
                    <div class="p-4 bg-blue-500/10 border border-blue-500/30 rounded-lg">
                        <h4 class="text-sm font-semibold text-blue-400 mb-2">💡 Conseils de rédaction</h4>
                        <ul class="text-xs text-blue-300/80 space-y-1">
                            <li>✓ Utilisez un titre accrocheur</li>
                            <li>✓ Écrivez un bon résumé pour les listes</li>
                            <li>✓ Structurez bien votre contenu</li>
                            <li>✓ Ajoutez une belle image de couverture</li>
                        </ul>
                    </div>

                    <!-- Boutons -->
                    <div class="flex gap-4 pt-6 border-t border-slate-700">
                        <a href="{{ route('admin.posts.index') }}" class="flex-1 px-6 py-3 bg-slate-700 hover:bg-slate-600 text-white rounded-lg transition-colors font-medium text-center">
                            Annuler
                        </a>
                        <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white rounded-lg transition-all font-medium">
                            Publier l'Article
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Compter les caractères du résumé
const excerpt = document.querySelector('textarea[name="excerpt"]');
const counter = document.querySelector('span');

excerpt.addEventListener('input', () => {
    counter.textContent = excerpt.value.length + '/500';
    if (excerpt.value.length > 500) {
        excerpt.value = excerpt.value.slice(0, 500);
    }
});
</script>
@endsection
