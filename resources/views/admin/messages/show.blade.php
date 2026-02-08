@extends('admin.layout')

@section('title', 'Message de ' . $message->name)
@section('page_title', 'Détail du Message')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-6">
    <div class="mb-6">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ $message->subject }}</h2>
                <p class="text-gray-600 mt-2">De: <strong>{{ $message->name }}</strong></p>
                <p class="text-gray-600">Email: <strong>{{ $message->email }}</strong></p>
                <p class="text-gray-600">Date: <strong>{{ $message->created_at->format('d/m/Y à H:i') }}</strong></p>
            </div>
            <span class="px-3 py-1 text-sm rounded @if($message->is_read) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                {{ $message->is_read ? 'Lu' : 'Non lu' }}
            </span>
        </div>

        <div class="border-t border-gray-200 pt-6 mt-6">
            <p class="text-gray-800 whitespace-pre-wrap">{{ $message->message }}</p>
        </div>
    </div>

    <!-- Boutons d'action -->
    <div class="flex gap-3 pt-6 border-t border-gray-200">
        @if(!$message->is_read)
            <form action="{{ route('admin.messages.mark-as-read', $message) }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition">
                    <i class="fas fa-check mr-2"></i> Marquer comme lu
                </button>
            </form>
        @endif

        <a href="mailto:{{ $message->email }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
            <i class="fas fa-reply mr-2"></i> Répondre par email
        </a>

        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit" onclick="return confirm('Sûr?')" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg transition">
                <i class="fas fa-trash mr-2"></i> Supprimer
            </button>
        </form>

        <a href="{{ route('admin.messages.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-lg transition">
            Retour
        </a>
    </div>
</div>
@endsection
