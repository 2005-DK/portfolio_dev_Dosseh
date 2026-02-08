<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Afficher la page du blog (liste des articles)
     */
    public function index()
    {
        $posts = Post::published()->ordered()->paginate(10);
        return view('blog.index', compact('posts'));
    }

    /**
     * Afficher un article spécifique
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        
        // Vérifier que l'article est publié
        if (!$post->is_published) {
            abort(404);
        }
        
        // Incrémenter les vues
        $post->incrementViews();
        
        // Articles similaires (même catégorie)
        $relatedPosts = Post::published()
            ->where('category', $post->category)
            ->where('id', '!=', $post->id)
            ->limit(2)
            ->get();
        
        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
