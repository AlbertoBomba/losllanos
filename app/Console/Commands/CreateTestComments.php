<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;

class CreateTestComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comments:create-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create test comments for posts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::published()->get();
        $user = User::first();

        if ($posts->isEmpty()) {
            $this->error('No hay posts publicados. Ejecuta primero posts:create-test');
            return;
        }

        $comments = [
            [
                'content' => 'Excelente artículo! Me parece muy interesante la información sobre el club.',
                'author_name' => 'Juan Pérez',
                'author_email' => 'juan@example.com',
                'is_approved' => true,
                'user_id' => null
            ],
            [
                'content' => 'Genial! Estoy interesado en participar en el próximo campeonato.',
                'author_name' => 'María García',
                'author_email' => 'maria@example.com',
                'is_approved' => false,
                'user_id' => null
            ],
            [
                'content' => 'Como socio del club, confirmo que es una excelente información.',
                'author_name' => $user ? $user->name : 'Admin',
                'author_email' => $user ? $user->email : 'admin@example.com',
                'is_approved' => true,
                'user_id' => $user ? $user->id : null
            ],
            [
                'content' => 'Los nuevos horarios son perfectos para mi agenda laboral.',
                'author_name' => 'Carlos Ruiz',
                'author_email' => 'carlos@example.com',
                'is_approved' => true,
                'user_id' => null
            ],
            [
                'content' => 'Spam comment with suspicious links and content that should be marked.',
                'author_name' => 'Spammer Bot',
                'author_email' => 'spam@badsite.com',
                'is_approved' => false,
                'is_spam' => true,
                'user_id' => null
            ]
        ];

        foreach($posts as $post) {
            foreach($comments as $commentData) {
                $comment = Comment::create([
                    'post_id' => $post->id,
                    'user_id' => $commentData['user_id'],
                    'author_name' => $commentData['user_id'] ? null : $commentData['author_name'],
                    'author_email' => $commentData['user_id'] ? null : $commentData['author_email'],
                    'content' => $commentData['content'],
                    'is_approved' => $commentData['is_approved'],
                    'is_spam' => $commentData['is_spam'] ?? false,
                    'ip_address' => '127.0.0.1',
                    'user_agent' => 'Test Browser',
                    'created_at' => now()->subDays(rand(1, 7))
                ]);

                $this->info("Comentario creado en '{$post->title}' por {$commentData['author_name']}");

                // Crear algunas respuestas
                if ($comment->is_approved && rand(1, 3) === 1) {
                    Comment::create([
                        'post_id' => $post->id,
                        'user_id' => $user ? $user->id : null,
                        'parent_id' => $comment->id,
                        'content' => 'Gracias por tu comentario. ¡Nos alegra que te haya gustado!',
                        'is_approved' => true,
                        'ip_address' => '127.0.0.1',
                        'user_agent' => 'Test Browser',
                        'created_at' => $comment->created_at->addHours(rand(1, 12))
                    ]);
                    
                    $this->info("Respuesta creada para el comentario de {$commentData['author_name']}");
                }
            }
        }

        $this->info("¡Comentarios de prueba creados!");
    }
}
