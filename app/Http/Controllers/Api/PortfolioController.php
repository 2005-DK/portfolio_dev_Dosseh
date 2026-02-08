<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Post;
use App\Models\Message;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function projects()
    {
        $projects = Project::published()->ordered()->get();
        return response()->json($projects);
    }

    public function skills()
    {
        $skills = Skill::published()->ordered()->get();
        return response()->json($skills);
    }

    public function skillsByCategory($category)
    {
        $skills = Skill::published()->byCategory($category)->ordered()->get();
        return response()->json($skills);
    }

    public function posts()
    {
        $posts = Post::published()->ordered()->paginate(10);
        return response()->json($posts);
    }

    public function post(Post $post)
    {
        if ($post->is_published) {
            $post->incrementViews();
            return response()->json($post);
        }
        return response()->json(['error' => 'Not found'], 404);
    }

    public function storeMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Message::create($validated);
        return response()->json(['success' => 'Message envoyé avec succès'], 201);
    }
}
