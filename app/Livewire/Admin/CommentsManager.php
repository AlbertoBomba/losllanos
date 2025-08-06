<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class CommentsManager extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = 'all'; // all, approved, pending, spam
    public $postFilter = '';

    protected $queryString = ['search', 'statusFilter', 'postFilter'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updatingPostFilter()
    {
        $this->resetPage();
    }

    public function approveComment($commentId)
    {
        $comment = Comment::find($commentId);
        if ($comment) {
            $comment->approve();
            session()->flash('message', 'Comentario aprobado.');
        }
    }

    public function rejectComment($commentId)
    {
        $comment = Comment::find($commentId);
        if ($comment) {
            $comment->reject();
            session()->flash('message', 'Comentario rechazado.');
        }
    }

    public function markAsSpam($commentId)
    {
        $comment = Comment::find($commentId);
        if ($comment) {
            $comment->markAsSpam();
            session()->flash('message', 'Comentario marcado como spam.');
        }
    }

    public function deleteComment($commentId)
    {
        Comment::find($commentId)?->delete();
        session()->flash('message', 'Comentario eliminado.');
    }

    public function bulkApprove($commentIds)
    {
        Comment::whereIn('id', $commentIds)->update(['is_approved' => true, 'is_spam' => false]);
        session()->flash('message', count($commentIds) . ' comentarios aprobados.');
    }

    public function bulkDelete($commentIds)
    {
        Comment::whereIn('id', $commentIds)->delete();
        session()->flash('message', count($commentIds) . ' comentarios eliminados.');
    }

    public function getStats()
    {
        return [
            'total' => Comment::count(),
            'approved' => Comment::approved()->count(),
            'pending' => Comment::pending()->count(),
            'spam' => Comment::spam()->count(),
        ];
    }

    public function render()
    {
        $query = Comment::with(['post', 'user', 'parent']);

        // Aplicar filtros
        if ($this->search) {
            $query->where(function($q) {
                $q->where('content', 'like', '%' . $this->search . '%')
                  ->orWhere('author_name', 'like', '%' . $this->search . '%')
                  ->orWhere('author_email', 'like', '%' . $this->search . '%')
                  ->orWhereHas('user', function($userQuery) {
                      $userQuery->where('name', 'like', '%' . $this->search . '%')
                               ->orWhere('email', 'like', '%' . $this->search . '%');
                  });
            });
        }

        if ($this->statusFilter === 'approved') {
            $query->approved();
        } elseif ($this->statusFilter === 'pending') {
            $query->pending();
        } elseif ($this->statusFilter === 'spam') {
            $query->spam();
        }

        if ($this->postFilter) {
            $query->whereHas('post', function($postQuery) {
                $postQuery->where('title', 'like', '%' . $this->postFilter . '%');
            });
        }

        $comments = $query->latest()->paginate(20);
        $stats = $this->getStats();

        return view('livewire.admin.comments-manager', [
            'comments' => $comments,
            'stats' => $stats
        ]);
    }

    /**
     * Analizar un comentario específico para spam
     */
    public function analyzeComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $analysis = $comment->analyzeForSpam();
        
        session()->flash('message', "Comentario analizado. Puntuación: {$analysis['score']}, Confianza: {$analysis['confidence']}%");
    }

    /**
     * Analizar todos los comentarios pendientes para spam
     */
    public function analyzeAllPending()
    {
        $pendingComments = Comment::where('is_approved', false)
                                 ->where('is_spam', false)
                                 ->get();

        $analyzed = 0;
        $spamDetected = 0;

        foreach ($pendingComments as $comment) {
            $analysis = $comment->analyzeForSpam();
            $analyzed++;
            
            if ($analysis['is_spam']) {
                $spamDetected++;
            }
        }

        session()->flash('message', "Analizados {$analyzed} comentarios. {$spamDetected} marcados como spam.");
    }

    /**
     * Entrenar el detector con comentarios existentes
     */
    public function trainSpamDetector()
    {
        $spamService = app(\App\Services\SpamDetectionService::class);
        $results = $spamService->trainFromExistingComments();
        
        session()->flash('message', "Entrenamiento completado. Spam: {$results['spam_analyzed']}, Legítimos: {$results['legitimate_analyzed']}");
    }
}
