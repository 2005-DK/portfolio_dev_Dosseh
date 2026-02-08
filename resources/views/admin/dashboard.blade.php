@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Header -->
    <div class="sticky top-0 z-40 border-b border-purple-500/30 bg-slate-900/80 backdrop-blur-lg">
        <div class="px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white">Dashboard</h1>
                    <p class="text-sm text-purple-300">Gestion complète de votre portfolio</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="hidden md:flex items-center gap-2 text-sm text-gray-400">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 10 2 0V6z" clip-rule="evenodd"/>
                        </svg>
                        <span id="current-time">--:--</span>
                    </div>
                    <div class="relative">
                        <button class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-purple-500/20 transition-colors">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span class="hidden md:inline text-white text-sm">{{ auth()->user()->name }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 max-w-7xl mx-auto">
        <!-- Statistiques principales -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
            <!-- Total Projects -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
                <div class="relative bg-slate-800 border border-slate-700 rounded-xl p-5 hover:border-blue-500/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Projets Total</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $stats['projects'] }}</p>
                        </div>
                        <div class="p-3 bg-blue-500/20 rounded-lg">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Skills -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
                <div class="relative bg-slate-800 border border-slate-700 rounded-xl p-5 hover:border-purple-500/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Compétences</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $stats['skills'] }}</p>
                        </div>
                        <div class="p-3 bg-purple-500/20 rounded-lg">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Articles -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
                <div class="relative bg-slate-800 border border-slate-700 rounded-xl p-5 hover:border-green-500/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Articles</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $stats['posts'] }}</p>
                        </div>
                        <div class="p-3 bg-green-500/20 rounded-lg">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17.25m20 0C22 10.998 17.5 6.254 12 6.253z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Messages -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
                <div class="relative bg-slate-800 border border-slate-700 rounded-xl p-5 hover:border-orange-500/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Messages</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $stats['messages'] }}</p>
                        </div>
                        <div class="p-3 bg-orange-500/20 rounded-lg">
                            <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Unread Messages -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-rose-500 to-pink-500 rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
                <div class="relative bg-slate-800 border border-slate-700 rounded-xl p-5 hover:border-rose-500/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Non lus</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $stats['unread_messages'] }}</p>
                            <p class="text-xs text-rose-400 mt-2">À consulter</p>
                        </div>
                        <div class="p-3 bg-rose-500/20 rounded-lg relative">
                            <svg class="w-6 h-6 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            @if($stats['unread_messages'] > 0)
                            <span class="absolute -top-2 -right-2 w-5 h-5 bg-rose-500 rounded-full text-xs font-bold text-white flex items-center justify-center">
                                {{ $stats['unread_messages'] }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Principal -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Projets Récents -->
            <div class="lg:col-span-2">
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-xl blur opacity-0 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative bg-slate-800 border border-slate-700 rounded-xl p-6 hover:border-purple-500/30 transition-all">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h2 class="text-xl font-bold text-white">Projets Récents</h2>
                                <p class="text-sm text-gray-400 mt-1">Vos derniers ajouts / modifications</p>
                            </div>
                            <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-lg transition-all text-sm font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Nouveau
                            </a>
                        </div>

                        @if($recent_projects->count() > 0)
                        <div class="space-y-3">
                            @foreach($recent_projects as $project)
                            <div class="group/item flex items-center gap-4 p-4 rounded-lg hover:bg-slate-700/50 transition-all border border-transparent hover:border-purple-500/30">
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-white truncate">{{ $project->title }}</h3>
                                    <p class="text-xs text-gray-400 mt-1 line-clamp-1">{{ $project->description }}</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full {{ $project->is_public ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' }}">
                                        {{ $project->is_public ? 'Public' : 'Privé' }}
                                    </span>
                                    <span class="text-xs text-gray-500">{{ $project->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 mx-auto text-gray-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p class="text-gray-400 text-sm">Aucun projet pour le moment</p>
                            <a href="{{ route('admin.projects.create') }}" class="inline-block mt-3 px-4 py-2 bg-purple-600/30 hover:bg-purple-600/50 text-purple-300 text-sm font-medium rounded-lg transition-all">
                                Créer le premier projet
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="lg:col-span-1">
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-xl blur opacity-0 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative bg-slate-800 border border-slate-700 rounded-xl p-6 hover:border-purple-500/30 transition-all">
                        <h3 class="text-lg font-bold text-white mb-4">Actions Rapides</h3>
                        <div class="space-y-2">
                            <a href="{{ route('admin.projects.create') }}" class="flex items-center gap-3 w-full px-4 py-3 rounded-lg bg-slate-700/50 hover:bg-blue-600/30 hover:border-blue-500 border border-slate-600 transition-all group/action">
                                <svg class="w-5 h-5 text-blue-400 group-hover/action:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span class="text-white text-sm font-medium group-hover/action:text-blue-300">Nouveau Projet</span>
                            </a>
                            <a href="{{ route('admin.skills.create') }}" class="flex items-center gap-3 w-full px-4 py-3 rounded-lg bg-slate-700/50 hover:bg-purple-600/30 hover:border-purple-500 border border-slate-600 transition-all group/action">
                                <svg class="w-5 h-5 text-purple-400 group-hover/action:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <span class="text-white text-sm font-medium group-hover/action:text-purple-300">Ajouter Compétence</span>
                            </a>
                            <a href="{{ route('admin.posts.create') }}" class="flex items-center gap-3 w-full px-4 py-3 rounded-lg bg-slate-700/50 hover:bg-green-600/30 hover:border-green-500 border border-slate-600 transition-all group/action">
                                <svg class="w-5 h-5 text-green-400 group-hover/action:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17.25m20 0C22 10.998 17.5 6.254 12 6.253z"/>
                                </svg>
                                <span class="text-white text-sm font-medium group-hover/action:text-green-300">Nouvel Article</span>
                            </a>
                            <a href="{{ route('admin.messages.index') }}" class="flex items-center gap-3 w-full px-4 py-3 rounded-lg bg-slate-700/50 hover:bg-orange-600/30 hover:border-orange-500 border border-slate-600 transition-all group/action">
                                <svg class="w-5 h-5 text-orange-400 group-hover/action:text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                                <span class="text-white text-sm font-medium group-hover/action:text-orange-300">Messages</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages Récents -->
        <div class="group relative">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-500/20 to-red-500/20 rounded-xl blur opacity-0 group-hover:opacity-20 transition-opacity"></div>
            <div class="relative bg-slate-800 border border-slate-700 rounded-xl p-6 hover:border-purple-500/30 transition-all">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-xl font-bold text-white">Messages Récents</h2>
                        <p class="text-sm text-gray-400 mt-1">Dernières demandes de contact</p>
                    </div>
                    <a href="{{ route('admin.messages.index') }}" class="text-purple-400 hover:text-purple-300 text-sm font-medium transition-colors">
                        Voir tous →
                    </a>
                </div>

                @if($recent_messages->count() > 0)
                <div class="space-y-3">
                    @foreach($recent_messages as $message)
                    <div class="flex items-start gap-4 p-4 rounded-lg hover:bg-slate-700/50 transition-all border border-transparent hover:border-orange-500/30">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-orange-400 to-red-400 flex items-center justify-center flex-shrink-0 text-white font-bold text-sm">
                            {{ strtoupper(substr($message->name, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold text-white">{{ $message->name }}</h3>
                                <span class="text-xs text-gray-500">{{ $message->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">{{ $message->email }}</p>
                            <p class="text-sm text-gray-300 mt-2 line-clamp-2">{{ $message->message }}</p>
                        </div>
                        @if(!$message->is_read)
                        <div class="w-2 h-2 rounded-full bg-rose-500 flex-shrink-0"></div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-8">
                    <svg class="w-12 h-12 mx-auto text-gray-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                    <p class="text-gray-400 text-sm">Aucun message pour le moment</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    // Clock update
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
        document.getElementById('current-time').textContent = timeString;
    }
    updateClock();
    setInterval(updateClock, 1000);
</script>
@endsection
