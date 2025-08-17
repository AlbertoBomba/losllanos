<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class ListPosts extends Command
{
    protected $signature = 'posts:list';
    protected $description = 'Listar todos los posts';

    public function handle()
    {
        $posts = Post::all(['id', 'title', 'youtube_url', 'published']);
        
        $this->info('Lista de posts:');
        $this->line('');
        
        foreach ($posts as $post) {
            $status = $post->published ? 'Publicado' : 'Borrador';
            $video = $post->youtube_url ? 'Con video' : 'Sin video';
            $this->line("ID: {$post->id} - {$post->title} [{$status}] [{$video}]");
        }
        
        return 0;
    }
}
