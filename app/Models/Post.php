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
        'youtube_url',
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
        return route('blog-de-caza.show', $this->slug);
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

    /**
     * Extraer ID de video de YouTube desde URL
     */
    public function getYoutubeVideoIdAttribute()
    {
        if (!$this->youtube_url) {
            return null;
        }

        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
        if (preg_match($pattern, $this->youtube_url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    /**
     * Obtener URL embebida de YouTube
     */
    public function getYoutubeEmbedUrlAttribute()
    {
        $videoId = $this->youtube_video_id;
        if (!$videoId) {
            return null;
        }

        return "https://www.youtube.com/embed/{$videoId}";
    }

    /**
     * Verificar si el post tiene video de YouTube
     */
    public function getHasYoutubeVideoAttribute()
    {
        return !empty($this->youtube_url);
    }
}
