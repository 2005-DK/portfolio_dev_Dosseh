@extends('admin.layouts.app')

@section('title', 'Messages - Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Header -->
    <div class="sticky top-0 z-40 border-b border-purple-500/30 bg-slate-900/80 backdrop-blur-lg">
        <div class="px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white">Messages de Contact</h1>
                    <p class="text-sm text-purple-300">{{ $messages->count() }} message{{ $messages->count() !== 1 ? 's' : '' }} reçu{{ $messages->count() !== 1 ? 's' : '' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 max-w-5xl mx-auto">
        @if($messages->count() > 0)
        <div class="space-y-4">
            @foreach($messages as $message)
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r {{ $message->is_read ? 'from-blue-500/10 to-cyan-500/10' : 'from-orange-500/20 to-red-500/20' }} rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
                <div class="relative bg-slate-800 border {{ $message->is_read ? 'border-slate-700' : 'border-orange-500/50' }} rounded-xl p-6 hover:border-purple-500/50 transition-all">
                    <div class="flex items-start gap-4">
                        <!-- Avatar -->
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center flex-shrink-0 text-white font-bold text-lg">
                            {{ strtoupper(substr($message->name, 0, 1)) }}
                        </div>

                        <!-- Contenu -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-4 mb-2">
                                <div>
                                    <h3 class="text-lg font-bold text-white">{{ $message->name }}</h3>
                                    <p class="text-sm text-gray-400">{{ $message->email }}</p>
                                </div>
                                <div class="flex items-center gap-2 flex-shrink-0">
                                    @if(!$message->is_read)
                                    <span class="flex items-center gap-2 px-3 py-1 bg-orange-500/20 text-orange-400 text-xs font-medium rounded-full border border-orange-500/30">
                                        <span class="w-2 h-2 bg-orange-400 rounded-full"></span>
                                        Non lu
                                    </span>
                                    @else
                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 text-xs font-medium rounded-full border border-green-500/30">
                                        Lu
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Sujet -->
                            @if($message->subject)
                            <p class="text-purple-400 font-medium mb-3">Sujet : {{ $message->subject }}</p>
                            @endif

                            <!-- Message -->
                            <p class="text-gray-300 leading-relaxed mb-4">{{ $message->message }}</p>

                            <!-- Date -->
                            <p class="text-xs text-gray-500">{{ $message->created_at->format('d M Y - H:i') }}</p>
                        </div>

                        <!-- Actions -->
                        <div class="flex flex-col gap-2 flex-shrink-0">
                            @if(!$message->is_read)
                            <form action="{{ route('admin.messages.mark-as-read', $message) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="px-3 py-2 bg-green-600/20 hover:bg-green-600/40 text-green-400 text-xs font-medium rounded-lg transition-colors whitespace-nowrap">
                                    Marquer comme lu
                                </button>
                            </form>
                            @endif
                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')" class="inline">
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
            </svg>
            <p class="text-gray-400 text-lg">Aucun message pour le moment</p>
            <p class="text-gray-500 text-sm mt-2">Les messages de contact apparaîtront ici</p>
        </div>
        @endif
    </div>
</div>
@endsection
