<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::ordered()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        // Normalize technologies: accept comma-separated string or array
        $techInput = $request->input('technologies');
        if (is_string($techInput)) {
            $techInput = trim($techInput, "\"' ");
            $techs = array_filter(array_map('trim', explode(',', $techInput)));
            $request->merge(['technologies' => $techs]);
        }

        // Normalize URLs: prepend https:// if scheme is missing
        foreach (['url', 'github_url'] as $u) {
            $val = $request->input($u);
            if ($val && is_string($val) && !preg_match('#^https?://#i', $val)) {
                $request->merge([$u => 'https://' . ltrim($val, '/')] );
            }
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|array|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $validated['technologies'] = json_encode($request->technologies);
        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projet créé avec succès');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        // Normalize technologies: accept comma-separated string or array
        $techInput = $request->input('technologies');
        if (is_string($techInput)) {
            $techInput = trim($techInput, "\"' ");
            $techs = array_filter(array_map('trim', explode(',', $techInput)));
            $request->merge(['technologies' => $techs]);
        }

        // Normalize URLs: prepend https:// if scheme is missing
        foreach (['url', 'github_url'] as $u) {
            $val = $request->input($u);
            if ($val && is_string($val) && !preg_match('#^https?://#i', $val)) {
                $request->merge([$u => 'https://' . ltrim($val, '/')] );
            }
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|array|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                \Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $validated['technologies'] = json_encode($request->technologies);
        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            \Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé');
    }
}
