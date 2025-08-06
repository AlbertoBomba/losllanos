<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Gestión de Posts')]
class PostsIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $filterStatus = 'all';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'filterStatus' => ['except' => 'all'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();
        
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Post eliminado exitosamente'
        ]);
    }

    public function togglePublished($postId)
    {
        $post = Post::findOrFail($postId);
        $post->update(['published' => !$post->published]);
        
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => $post->published ? 'Post publicado' : 'Post guardado como borrador'
        ]);
    }

    public function render()
    {
        $posts = Post::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('content', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterStatus !== 'all', function ($query) {
                $query->where('published', $this->filterStatus === 'published');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.posts-index', [
            'posts' => $posts
        ]);
    }
}
