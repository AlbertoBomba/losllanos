<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Newsletter;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Constructor - requiere autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar dashboard principal
     */
    public function index()
    {
        $stats = [
            'total_posts' => Post::count(),
            'published_posts' => Post::where('published', true)->count(),
            'draft_posts' => Post::where('published', false)->count(),
            'total_subscribers' => Newsletter::count(),
            'recent_subscribers' => Newsletter::where('subscribed_at', '>=', now()->subDays(7))->count(),
        ];

        $recent_posts = Post::latest()->take(5)->get();
        $recent_subscribers = Newsletter::latest()->take(10)->get();

        return view('admin.dashboard', compact('stats', 'recent_posts', 'recent_subscribers'));
    }
}
