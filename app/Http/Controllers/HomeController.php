<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

     /**
     * Mostrar un post individual
     */
    public function home2()
    {
         // Obtener últimos posts para mostrar en home
        $latestPosts = Post::where('published', true)
                          ->latest()
                          ->take(3)
                          ->get();
        return view('frontend._home', compact('latestPosts'));
    }

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

    /**
     * Mostrar un post individual
     */
    public function showBlogs()
    {
        $v['posts'] = Post::where('published', true)
            ->latest()
            ->get();

        $v['lastpost'] = Post::where('published', true)
            ->orderBy('id', 'desc')
            ->first();

        // dd($v['lastpost']);
        return view('frontend.blogs', $v);
    }

    public function showBlog($slug)
    {
         $post = Post::where('slug', $slug)
            ->where('published', true)
            ->firstOrFail();

        // dd($post);
        return view('frontend.blog', compact('post'));
    }

    public function showAvesCaza()
    {
        return view('frontend.aves');
    }

    public function showTiradas()
    {
        return view('frontend.tiradas-en-finca');
    }

    public function products()
    {
        return view('frontend.products');
    }
    
    public function perdices()
    {
        return view('frontend.perdices');
    }

    public function faisanes()
    {
        return view('frontend.faisanes');
    }

    public function codornices()
    {
        return view('frontend.codornices');
    }

    public function palomas()
    {
        return view('frontend.palomas');
    }

    public function showCotoCazaIntensivo()
    {
        return view('frontend.coto-de-caza-intensiva');
    }

    public function showSueltaPerdices()
    {
        return view('frontend.suelta-de-perdices');
    }

    

    public function showSueltaFaisanes()
    {
        return view('frontend.suelta-de-faisanes');
    }
}
