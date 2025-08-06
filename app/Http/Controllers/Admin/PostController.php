<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Constructor - requiere autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar lista de posts
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Mostrar formulario para crear nuevo post
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Almacenar nuevo post
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|max:500',
            'featured_image' => 'nullable|image|max:2048'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->content = $request->content;
        $post->excerpt = $request->excerpt;
        $post->published = $request->has('published');
        $post->user_id = auth()->id();

        // Manejar imagen destacada
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('posts', 'public');
            $post->featured_image = $imagePath;
        }

        $post->save();

        return redirect()->route('admin.posts.index')
                        ->with('success', 'Post creado exitosamente');
    }

    /**
     * Mostrar post específico
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Actualizar post
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|max:500',
            'featured_image' => 'nullable|image|max:2048'
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->content = $request->content;
        $post->excerpt = $request->excerpt;
        $post->published = $request->has('published');

        // Manejar imagen destacada
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('posts', 'public');
            $post->featured_image = $imagePath;
        }

        $post->save();

        return redirect()->route('admin.posts.index')
                        ->with('success', 'Post actualizado exitosamente');
    }

    /**
     * Eliminar post
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')
                        ->with('success', 'Post eliminado exitosamente');
    }
}
