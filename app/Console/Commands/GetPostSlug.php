<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class GetPostSlug extends Command
{
    protected $signature = 'post:slug {id}';
    protected $description = 'Obtener el slug de un post';

    public function handle()
    {
        $post = Post::find($this->argument('id'));
        if (!$post) {
            $this->error('Post no encontrado');
            return;
        }
        
        $this->info("Post: {$post->title}");
        $this->info("Slug: {$post->slug}");
        $this->info("URL: " . route('blog-de-caza.show', $post->slug));
        
        return 0;
    }
}
