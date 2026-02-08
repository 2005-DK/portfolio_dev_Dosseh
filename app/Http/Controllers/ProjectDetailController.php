<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectDetailController extends Controller
{
    /**
     * Afficher les détails d'un projet (frontend public)
     */
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        
        // Vérifier que le projet est publié
        if (!$project->is_published) {
            abort(404, 'Ce projet n\'existe pas');
        }

        // Projets récents (pour les suggestions)
        $relatedProjects = Project::published()
            ->where('id', '!=', $project->id)
            ->orderBy('order')
            ->limit(3)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
