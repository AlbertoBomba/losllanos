<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'reviewer_name',
        'reviewer_email',
        'reviewer_location',
        'rating',
        'service_type',
        'title',
        'content',
        'is_approved',
        'is_featured',
        'ip_address',
        'user_agent',
        'spam_score',
        'spam_reasons'
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'is_featured' => 'boolean',
        'spam_reasons' => 'array',
    ];

    /**
     * Scope para reseñas aprobadas
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    /**
     * Scope para reseñas pendientes
     */
    public function scopePending($query)
    {
        return $query->where('is_approved', false);
    }

    /**
     * Scope para reseñas destacadas
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope para filtrar por valoración
     */
    public function scopeWithRating($query, $rating)
    {
        return $query->where('rating', $rating);
    }

    /**
     * Scope para las mejores valoraciones
     */
    public function scopeTopRated($query)
    {
        return $query->where('rating', '>=', 4);
    }

    /**
     * Obtener las reseñas más recientes para el home
     */
    public function scopeForHome($query, $limit = 5)
    {
        return $query->approved()
                    ->latest()
                    ->limit($limit);
    }

    /**
     * Aprobar reseña
     */
    public function approve()
    {
        $this->update(['is_approved' => true]);
    }

    /**
     * Marcar como destacada
     */
    public function feature()
    {
        $this->update(['is_featured' => true]);
    }

    /**
     * Quitar de destacadas
     */
    public function unfeature()
    {
        $this->update(['is_featured' => false]);
    }

    /**
     * Rechazar reseña
     */
    public function reject()
    {
        $this->update(['is_approved' => false]);
    }

    /**
     * Analizar reseña con detector de spam
     */
    public function analyzeForSpam()
    {
        $spamDetector = app(\App\Services\SpamDetectionService::class);
        
        $analysis = $spamDetector->isSpam(
            $this->content . ' ' . $this->title,
            $this->reviewer_email,
            $this->reviewer_name,
            $this->ip_address
        );

        // Actualizar campos de spam
        $this->update([
            'spam_score' => $analysis['score'],
            'spam_reasons' => $analysis['reasons'],
            'is_approved' => $analysis['action'] === 'approve'
        ]);

        return $analysis;
    }

    /**
     * Obtener las estrellas como HTML
     */
    public function getStarsHtmlAttribute()
    {
        $html = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $this->rating) {
                $html .= '<span class="text-yellow-400">★</span>';
            } else {
                $html .= '<span class="text-gray-300">☆</span>';
            }
        }
        return $html;
    }

    /**
     * Obtener el texto de la valoración
     */
    public function getRatingTextAttribute()
    {
        $ratings = [
            1 => 'Muy malo',
            2 => 'Malo',
            3 => 'Regular',
            4 => 'Bueno',
            5 => 'Excelente'
        ];
        
        return $ratings[$this->rating] ?? 'Sin valorar';
    }
}
