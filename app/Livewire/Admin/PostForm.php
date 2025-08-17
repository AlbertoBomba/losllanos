<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

#[Title('Editor de Posts')]
class PostForm extends Component
{
    use WithFileUploads;

    public ?Post $post = null;
    public $title = '';
    public $content = '';
    public $excerpt = '';
    public $youtube_url = '';
    public $published = false;
    public $featured_image;
    public $existing_image;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'content' => 'required|min:10',
        'excerpt' => 'nullable|max:500',
        'youtube_url' => 'nullable|url',
        'published' => 'boolean',
        'featured_image' => 'nullable|image|max:2048', // 2MB Max
    ];

    protected $messages = [
        'title.required' => 'El título es obligatorio.',
        'title.min' => 'El título debe tener al menos 3 caracteres.',
        'content.required' => 'El contenido es obligatorio.',
        'content.min' => 'El contenido debe tener al menos 10 caracteres.',
        'youtube_url.url' => 'Debe ser una URL válida.',
        'featured_image.image' => 'El archivo debe ser una imagen.',
        'featured_image.max' => 'La imagen no puede superar los 2MB.',
    ];

    public function mount($post = null)
    {
        if ($post && $post instanceof Post && $post->exists) {
            $this->post = $post;
            $this->title = $post->title;
            $this->content = $post->content;
            $this->excerpt = $post->excerpt;
            $this->youtube_url = $post->youtube_url;
            $this->published = $post->published;
            $this->existing_image = $post->featured_image;
        } elseif ($post && !($post instanceof Post)) {
            // Si se pasa un ID como string, buscamos el post
            $this->post = Post::findOrFail($post);
            $this->title = $this->post->title;
            $this->content = $this->post->content;
            $this->excerpt = $this->post->excerpt;
            $this->youtube_url = $this->post->youtube_url;
            $this->published = $this->post->published;
            $this->existing_image = $this->post->featured_image;
        } else {
            $this->post = new Post();
        }
    }

    public function updatedTitle()
    {
        $this->validateOnly('title');
    }

    public function updatedContent()
    {
        $this->validateOnly('content');
    }

    public function updatedFeaturedImage()
    {
        $this->validateOnly('featured_image');
    }

    public function updatedYoutubeUrl()
    {
        if (!empty($this->youtube_url)) {
            // Validar que sea una URL válida
            if (!filter_var($this->youtube_url, FILTER_VALIDATE_URL)) {
                $this->addError('youtube_url', 'Debe ser una URL válida.');
                return;
            }
            
            // Validar que sea de YouTube
            if (!preg_match('/(?:youtube\.com|youtu\.be)/', $this->youtube_url)) {
                $this->addError('youtube_url', 'Debe ser una URL válida de YouTube.');
                return;
            }
        }
        
        $this->resetErrorBag('youtube_url');
    }

    public function save()
    {
        $this->validate();

        $this->post->fill([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'excerpt' => $this->excerpt,
            'youtube_url' => $this->youtube_url,
            'published' => $this->published,
            'user_id' => Auth::id(),
        ]);

        // Manejar imagen destacada
        if ($this->featured_image) {
            $imagePath = $this->featured_image->store('posts', 'public');
            $this->post->featured_image = $imagePath;
        }

        $this->post->save();

        $message = $this->post->wasRecentlyCreated ? 'Post creado exitosamente' : 'Post actualizado exitosamente';
        
        session()->flash('success', $message);
        
        return redirect()->route('admin.posts.index');
    }

    public function saveAsDraft()
    {
        $this->published = false;
        $this->save();
    }

    public function saveAndPublish()
    {
        $this->published = true;
        $this->save();
    }

    public function removeImage()
    {
        $this->existing_image = null;
        $this->post->featured_image = null;
        $this->post->save();
        
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Imagen eliminada exitosamente'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.post-form');
    }
}
