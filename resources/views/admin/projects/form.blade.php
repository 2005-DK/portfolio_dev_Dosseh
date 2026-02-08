@extends('admin.layouts.app')

@section('title', (isset($project) ? 'Modifier' : 'Créer') . ' Projet - Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Header -->
    <div class="sticky top-0 z-40 border-b border-purple-500/30 bg-slate-900/80 backdrop-blur-lg">
        <div class="px-6 py-4">
            <h1 class="text-3xl font-bold text-white">{{ isset($project) ? 'Modifier le projet' : 'Créer un nouveau projet' }}</h1>
        </div>
    </div>

    <div class="p-6 max-w-4xl mx-auto">
        <div class="group relative">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-xl blur opacity-20"></div>
            <div class="relative bg-slate-800 border border-slate-700 rounded-xl p-8">
                <form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if(isset($project))
                        @method('PUT')
                    @endif

                    <!-- Titre -->
                    <div>
                        <label class="block text-sm font-semibold text-white mb-2">Titre du Projet *</label>
                        <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors @error('title') border-red-500 @enderror">
                        @error('title')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-semibold text-white mb-2">Description *</label>
                        <textarea name="description" rows="4" required class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors @error('description') border-red-500 @enderror">{{ old('description', $project->description ?? '') }}</textarea>
                        @error('description')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Grille 2 colonnes -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Technologies -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Technologies (séparées par des virgules)</label>
                            <input type="text" name="technologies" value="{{ old('technologies', $project->technologies ?? '') }}" placeholder="Laravel, React, Tailwind..." class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors">
                            <p class="text-xs text-gray-400 mt-1">ex: Laravel, React, Tailwind CSS</p>
                        </div>

                        <!-- URL Projet -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">URL du Projet</label>
                            <input type="url" name="url" value="{{ old('url', $project->url ?? '') }}" placeholder="https://example.com" class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors">
                        </div>

                        <!-- GitHub URL -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">URL GitHub</label>
                            <input type="url" name="github_url" value="{{ old('github_url', $project->github_url ?? '') }}" placeholder="https://github.com/..." class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors">
                        </div>

                        <!-- Statut Public/Privé -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Visibilité *</label>
                            <select name="is_public" required class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:border-purple-500 transition-colors">
                                <option value="1" {{ old('is_public', $project->is_public ?? 1) == 1 ? 'selected' : '' }}>Public</option>
                                <option value="0" {{ old('is_public', $project->is_public ?? 1) == 0 ? 'selected' : '' }}>Privé</option>
                            </select>
                        </div>
                    </div>

                    <!-- Image du Projet -->
                    <div>
                        <label class="block text-sm font-semibold text-white mb-2">Image du Projet</label>
                        <div class="border-2 border-dashed border-slate-600 rounded-lg p-6 text-center hover:border-purple-500 transition-colors cursor-pointer" onclick="document.getElementById('image-input').click()">
                            <svg class="w-12 h-12 mx-auto text-gray-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-white font-medium">Cliquez pour ajouter une image</p>
                            <p class="text-gray-400 text-sm">ou déposez votre fichier ici</p>
                            <input type="file" id="image-input" name="image" accept="image/*" class="hidden" onchange="previewImage(this)">
                        </div>
                        @if(isset($project) && $project->image)
                        <div class="mt-4 relative inline-block">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="max-w-xs rounded-lg h-32 object-cover">
                            <button type="button" onclick="clearImage()" class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white p-1 rounded">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
                                </svg>
                            </button>
                        </div>
                        @endif
                    </div>

                    <!-- Boutons -->
                    <div class="flex gap-4 pt-6 border-t border-slate-700">
                        <a href="{{ route('admin.projects.index') }}" class="flex-1 px-6 py-3 bg-slate-700 hover:bg-slate-600 text-white rounded-lg transition-colors font-medium text-center">
                            Annuler
                        </a>
                        <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-lg transition-all font-medium">
                            {{ isset($project) ? 'Mettre à jour' : 'Créer le projet' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Afficher l'aperçu si nécessaire
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function clearImage() {
    document.getElementById('image-input').value = '';
}
</script>
@endsection
