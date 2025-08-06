<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateTestPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:create-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create test blog posts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Obtener el primer usuario o crear uno
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@losllanos.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now()
            ]);
            $this->info("Usuario admin creado: admin@losllanos.com / password");
        }

        $posts = [
            [
                'title' => 'Bienvenidos al Club de Tiro Los Llanos',
                'content' => 'Estamos emocionados de presentar nuestro nuevo sitio web. Aquí encontrarás todas las novedades, eventos y actividades de nuestro club de tiro.

Nuestro club cuenta con instalaciones de primer nivel y instructores certificados que te ayudarán a mejorar tu técnica y precisión.

¡Únete a nuestra comunidad de tiradores!',
                'published' => true
            ],
            [
                'title' => 'Próximo Campeonato Regional de Tiro',
                'content' => 'Nos complace anunciar que nuestro club será sede del próximo Campeonato Regional de Tiro que se llevará a cabo el próximo mes.

Este evento reunirá a los mejores tiradores de la región en diferentes categorías:
- Pistola deportiva
- Rifle de precisión
- Tiro olímpico

Las inscripciones ya están abiertas. ¡No te pierdas esta oportunidad de demostrar tu habilidad!',
                'published' => true
            ],
            [
                'title' => 'Nuevos Horarios de Entrenamiento',
                'content' => 'A partir del próximo lunes, tendremos nuevos horarios de entrenamiento para adaptarnos mejor a las necesidades de nuestros socios.

Horarios de lunes a viernes:
- Mañana: 9:00 - 12:00
- Tarde: 16:00 - 20:00

Sábados y domingos:
- Mañana: 8:00 - 14:00

Recuerda reservar tu turno con anticipación.',
                'published' => false
            ]
        ];

        foreach($posts as $postData) {
            $slug = Str::slug($postData['title']);
            
            Post::create([
                'title' => $postData['title'],
                'slug' => $slug,
                'content' => $postData['content'],
                'published' => $postData['published'],
                'user_id' => $user->id,
                'created_at' => now()->subDays(rand(1, 10))
            ]);
            
            $this->info("Post creado: {$postData['title']}");
        }
        
        $this->info("¡Posts de prueba creados!");
    }
}
