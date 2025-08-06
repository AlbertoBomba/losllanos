<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Mostrar la página de inicio
     */
    public function index()
    {
        // Obtener últimos posts para mostrar en home
        $latestPosts = Post::where('published', true)
                          ->latest()
                          ->take(3)
                          ->get();

        return view('frontend.home', compact('latestPosts'));
    }

    /**
     * Mostrar un post individual
     */
    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)
                   ->where('published', true)
                   ->firstOrFail();

        return view('frontend.post', compact('post'));
    }
}
