@extends('admin.layouts.app')

@section('title', 'Modifier ' . $skill->name . ' - Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Header -->
    <div class="sticky top-0 z-40 border-b border-purple-500/30 bg-slate-900/80 backdrop-blur-lg">
        <div class="px-6 py-4">
            <h1 class="text-3xl font-bold text-white">Modifier "{{ $skill->name }}"</h1>
        </div>
    </div>

    <div class="p-6 max-w-4xl mx-auto">
        <div class="group relative">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-xl blur opacity-20"></div>
            <div class="relative bg-slate-800 border border-slate-700 rounded-xl p-8">
                <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="space-y-6">
                    @csrf @method('PUT')

                    <!-- Grille 2 colonnes -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nom -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Nom de la Compétence *</label>
                            <input type="text" name="name" value="{{ old('name', $skill->name) }}" required class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors @error('name') border-red-500 @enderror">
                            @error('name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Catégorie -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Catégorie *</label>
                            <select name="category" required class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:border-purple-500 transition-colors @error('category') border-red-500 @enderror">
                                <option value="frontend" @selected(old('category', $skill->category) == 'frontend')>Frontend</option>
                                <option value="backend" @selected(old('category', $skill->category) == 'backend')>Backend</option>
                                <option value="database" @selected(old('category', $skill->category) == 'database')>Base de données</option>
                                <option value="devops" @selected(old('category', $skill->category) == 'devops')>DevOps</option>
                                <option value="tools" @selected(old('category', $skill->category) == 'tools')>Outils</option>
                                <option value="other" @selected(old('category', $skill->category) == 'other')>Autres</option>
                            </select>
                            @error('category')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Grille 2 colonnes -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Niveau de maîtrise -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Niveau de Maîtrise (%)</label>
                            <input type="number" name="proficiency" value="{{ old('proficiency', $skill->proficiency) }}" min="0" max="100" class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:border-purple-500 transition-colors">
                            <div class="mt-2 w-full h-2 bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-purple-500 to-pink-500 rounded-full" style="width: {{ old('proficiency', $skill->proficiency) }}%"></div>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">{{ old('proficiency', $skill->proficiency) }}% - Ajustez avec le curseur</p>
                        </div>

                        <!-- Icon -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Icon (Emoji ou Unicode)</label>
                            <input type="text" name="icon" value="{{ old('icon', $skill->icon) }}" placeholder="🚀, ⚡, 💎..." class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors text-2xl text-center">
                            <p class="text-xs text-gray-400 mt-1">Optionnel - Un emoji pour identifier la compétence</p>
                        </div>
                    </div>

                    <!-- Publié -->
                    <div class="flex items-center gap-3 p-4 bg-slate-700/50 rounded-lg border border-slate-600">
                        <input type="checkbox" id="is_published" name="is_published" value="1" @checked(old('is_published', $skill->is_published)) class="w-4 h-4 rounded">
                        <label for="is_published" class="text-white cursor-pointer">
                            <span class="font-medium">Publier cette compétence</span>
                            <p class="text-xs text-gray-400 mt-1">Visible sur le portfolio si coché</p>
                        </label>
                    </div>

                    <!-- Boutons -->
                    <div class="flex gap-4 pt-6 border-t border-slate-700">
                        <a href="{{ route('admin.skills.index') }}" class="flex-1 px-6 py-3 bg-slate-700 hover:bg-slate-600 text-white rounded-lg transition-colors font-medium text-center">
                            Annuler
                        </a>
                        <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-lg transition-all font-medium">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Lier le curseur au pourcentage
const proficiency = document.querySelector('input[name="proficiency"]');
const progressBar = document.querySelector('.h-full.bg-gradient-to-r');
const percentageText = document.querySelector('p.text-xs.text-gray-400');

function updateProgressBar() {
    const value = proficiency.value;
    progressBar.style.width = value + '%';
    percentageText.textContent = value + '% - Ajustez avec le curseur';
}

proficiency.addEventListener('input', updateProgressBar);
</script>
@endsection
