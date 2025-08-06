<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'parent_id',
        'author_name',
        'author_email',
        'content',
        'is_approved',
        'is_spam',
        'ip_address',
        'user_agent',
        'spam_score',
        'spam_reasons'
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'is_spam' => 'boolean',
        'spam_reasons' => 'array',
    ];

    /**
     * Relación con el post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Relación con el usuario (puede ser null para invitados)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con comentario padre (para respuestas)
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    /**
     * Relación con comentarios hijos (respuestas)
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    /**
     * Scope para comentarios aprobados
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    /**
     * Scope para comentarios pendientes
     */
    public function scopePending($query)
    {
        return $query->where('is_approved', false)->where('is_spam', false);
    }

    /**
     * Scope para comentarios spam
     */
    public function scopeSpam($query)
    {
        return $query->where('is_spam', true);
    }

    /**
     * Scope para comentarios principales (no respuestas)
     */
    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Obtener el nombre del autor
     */
    public function getAuthorNameAttribute()
    {
        return $this->user ? $this->user->name : $this->attributes['author_name'];
    }

    /**
     * Obtener el email del autor
     */
    public function getAuthorEmailAttribute()
    {
        return $this->user ? $this->user->email : $this->attributes['author_email'];
    }

    /**
     * Verificar si es un comentario de invitado
     */
    public function isGuest()
    {
        return !$this->user_id;
    }

    /**
     * Aprobar comentario
     */
    public function approve()
    {
        $this->update(['is_approved' => true, 'is_spam' => false]);
    }

    /**
     * Marcar como spam
     */
    public function markAsSpam()
    {
        $this->update(['is_spam' => true, 'is_approved' => false]);
    }

    /**
     * Rechazar comentario
     */
    public function reject()
    {
        $this->update(['is_approved' => false]);
    }

    /**
     * Analizar comentario con detector de spam
     */
    public function analyzeForSpam()
    {
        $spamDetector = app(\App\Services\SpamDetectionService::class);
        
        $analysis = $spamDetector->isSpam(
            $this->content,
            $this->author_email,
            $this->author_name,
            $this->ip_address
        );

        // Actualizar campos de spam
        $this->update([
            'spam_score' => $analysis['score'],
            'spam_reasons' => $analysis['reasons'],
            'is_spam' => $analysis['is_spam'],
            'is_approved' => $analysis['action'] === 'approve'
        ]);

        return $analysis;
    }

    /**
     * Scope para comentarios con alta probabilidad de spam
     */
    public function scopeHighSpamRisk($query)
    {
        return $query->where('spam_score', '>=', 15);
    }

    /**
     * Scope para comentarios que requieren revisión
     */
    public function scopeNeedsReview($query)
    {
        return $query->where('spam_score', '>=', 5)
                    ->where('spam_score', '<', 10)
                    ->where('is_approved', false);
    }
}
