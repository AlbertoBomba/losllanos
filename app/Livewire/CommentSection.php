<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentSection extends Component
{
    public Post $post;
    public $content = '';
    public $author_name = '';
    public $author_email = '';
    public $reply_to = null;
    public $reply_content = '';

    protected $rules = [
        'content' => 'required|min:10|max:1000',
        'author_name' => 'required_without:auth|string|max:100',
        'author_email' => 'required_without:auth|email|max:100',
        'reply_content' => 'required|min:5|max:500'
    ];

    protected $messages = [
        'content.required' => 'El comentario es obligatorio.',
        'content.min' => 'El comentario debe tener al menos 10 caracteres.',
        'content.max' => 'El comentario no puede exceder 1000 caracteres.',
        'author_name.required_without' => 'El nombre es obligatorio.',
        'author_email.required_without' => 'El email es obligatorio.',
        'author_email.email' => 'El email debe ser válido.',
        'reply_content.required' => 'La respuesta es obligatoria.',
        'reply_content.min' => 'La respuesta debe tener al menos 5 caracteres.',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function submitComment()
    {
        if (Auth::check()) {
            $this->validate(['content' => 'required|min:10|max:1000']);
        } else {
            $this->validate([
                'content' => 'required|min:10|max:1000',
                'author_name' => 'required|string|max:100',
                'author_email' => 'required|email|max:100',
            ]);
        }

        $comment = Comment::create([
            'post_id' => $this->post->id,
            'user_id' => Auth::id(),
            'author_name' => Auth::check() ? null : $this->author_name,
            'author_email' => Auth::check() ? null : $this->author_email,
            'content' => $this->content,
            'is_approved' => false, // Por defecto no aprobado hasta análisis de spam
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        // Analizar el comentario para detectar spam
        $spamAnalysis = $comment->analyzeForSpam();

        // Determinar el mensaje basado en el resultado del análisis
        if ($spamAnalysis['is_spam']) {
            $message = 'Tu comentario ha sido marcado como spam y será revisado por un moderador.';
            $type = 'warning';
        } elseif ($spamAnalysis['action'] === 'review') {
            $message = 'Tu comentario será revisado antes de publicarse.';
            $type = 'info';
        } elseif ($spamAnalysis['action'] === 'approve') {
            $message = 'Comentario publicado correctamente.';
            $type = 'success';
        } else {
            $message = Auth::check() 
                ? 'Comentario publicado correctamente.' 
                : 'Comentario enviado. Será revisado antes de publicarse.';
            $type = 'success';
        }

        $this->reset(['content', 'author_name', 'author_email']);
        session()->flash("comment_{$type}", $message);
    }

    public function submitReply()
    {
        if (Auth::check()) {
            $this->validate(['reply_content' => 'required|min:5|max:500']);
        } else {
            session()->flash('comment_error', 'Debes estar registrado para responder comentarios.');
            return;
        }

        $reply = Comment::create([
            'post_id' => $this->post->id,
            'user_id' => Auth::id(),
            'parent_id' => $this->reply_to,
            'content' => $this->reply_content,
            'is_approved' => false, // Por defecto no aprobado hasta análisis de spam
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        // Analizar la respuesta para detectar spam
        $spamAnalysis = $reply->analyzeForSpam();

        // Determinar el mensaje basado en el resultado del análisis
        if ($spamAnalysis['is_spam']) {
            $message = 'Tu respuesta ha sido marcada como spam y será revisada por un moderador.';
            $type = 'warning';
        } elseif ($spamAnalysis['action'] === 'review') {
            $message = 'Tu respuesta será revisada antes de publicarse.';
            $type = 'info';
        } else {
            $message = 'Respuesta publicada correctamente.';
            $type = 'success';
        }

        $this->reset(['reply_to', 'reply_content']);
        session()->flash("comment_{$type}", $message);
    }

    public function replyTo($commentId)
    {
        $this->reply_to = $commentId;
        $this->reply_content = '';
    }

    public function cancelReply()
    {
        $this->reply_to = null;
        $this->reply_content = '';
    }

    public function render()
    {
        $comments = $this->post->parentComments()
                              ->latest()
                              ->get();

        return view('livewire.comment-section', [
            'comments' => $comments
        ]);
    }
}
