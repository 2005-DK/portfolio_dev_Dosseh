<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Post;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les statistiques principales
        $stats = [
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'posts' => Post::count(),
            'messages' => Message::count(),
            'unread_messages' => Message::unread()->count(),
        ];

        // Messages récents (derniers 5)
        $recent_messages = Message::ordered()->limit(5)->get();

        // Projets récents (derniers 5)
        $recent_projects = Project::latest()->limit(5)->get();

        // Données supplémentaires pour le dashboard
        $stats['public_projects'] = Project::where('is_public', true)->count();
        $stats['private_projects'] = Project::where('is_public', false)->count();

        return view('admin.dashboard', compact('stats', 'recent_messages', 'recent_projects'));
    }
}
