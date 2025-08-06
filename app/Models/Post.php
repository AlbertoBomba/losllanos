<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'published',
        'user_id'
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    /**
     * Relación con el usuario (autor)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope para posts publicados
     */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    /**
     * Obtener la URL del post
     */
    public function getUrlAttribute()
    {
        return route('post.show', $this->slug);
    }

    /**
     * Obtener imagen destacada con fallback
     */
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }
        return asset('images/default-post.jpg');
    }

    /**
     * Relación con comentarios
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Comentarios aprobados
     */
    public function approvedComments()
    {
        return $this->hasMany(Comment::class)->approved();
    }

    /**
     * Comentarios principales (no respuestas)
     */
    public function parentComments()
    {
        return $this->hasMany(Comment::class)->parent()->approved()->with('replies', 'user');
    }

    /**
     * Contar comentarios aprobados
     */
    public function getApprovedCommentsCountAttribute()
    {
        return $this->comments()->approved()->count();
    }
}
