<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class TestYoutubeVideo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:youtube {post_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Agregar video de YouTube a un post para probar';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $postId = $this->argument('post_id');
        $post = Post::find($postId);
        
        if (!$post) {
            $this->error("Post con ID {$postId} no encontrado.");
            return;
        }
        
        // Agregar una URL de YouTube de prueba
        $youtubeUrl = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';
        $post->youtube_url = $youtubeUrl;
        $post->save();
        
        $this->info("Video de YouTube agregado al post: {$post->title}");
        $this->info("URL: {$youtubeUrl}");
        $this->info("Video ID: {$post->youtube_video_id}");
        $this->info("Embed URL: {$post->youtube_embed_url}");
        $this->info("URL guardada: " . ($post->youtube_url ?? 'null'));
        $this->info("ID extraído: " . ($post->getYoutubeVideoIdAttribute() ?? 'null'));
        $this->info("Tiene video: " . ($post->has_youtube_video ? 'Sí' : 'No'));
        
        return 0;
    }
}
