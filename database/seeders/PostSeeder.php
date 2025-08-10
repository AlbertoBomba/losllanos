<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener el primer usuario o crear uno admin
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@losllanos.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);
        }

        // Posts de ejemplo para el blog de caza
        $posts = [
            [
                'title' => 'Guía completa para la caza de faisanes',
                'slug' => 'guia-completa-caza-faisanes',
                'content' => '<p>Los faisanes son una de las especies más codiciadas en la caza menor. En esta guía completa aprenderás todo lo necesario para una caza exitosa.</p><h2>Técnicas de caza</h2><p>La caza del faisán requiere paciencia y conocimiento del comportamiento de estas aves...</p>',
                'excerpt' => 'Todo lo que necesitas saber sobre técnicas y consejos para la caza exitosa de faisanes.',
                'published' => true,
                'featured_image' => 'images/faisanes-caza.jpg',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Mejores épocas para cazar codornices',
                'slug' => 'mejores-epocas-cazar-codornices',
                'content' => '<p>La codorniz es un ave migratoria que requiere conocer sus patrones de movimiento para una caza efectiva.</p><h2>Temporada de caza</h2><p>La temporada oficial de caza de codornices...</p>',
                'excerpt' => 'Descubre cuándo y cómo cazar codornices para obtener los mejores resultados.',
                'published' => true,
                'featured_image' => 'images/codornices-caza.jpg',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Equipamiento esencial para la caza menor',
                'slug' => 'equipamiento-esencial-caza-menor',
                'content' => '<p>Una buena jornada de caza comienza con el equipamiento adecuado. Aquí encontrarás todo lo necesario.</p><h2>Armas y munición</h2><p>Para la caza menor se recomienda...</p>',
                'excerpt' => 'Lista completa del equipamiento básico y avanzado para cazadores de aves.',
                'published' => true,
                'featured_image' => 'images/equipamiento-caza.jpg',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Cuidados y mantenimiento de aves de caza',
                'slug' => 'cuidados-mantenimiento-aves-caza',
                'content' => '<p>El mantenimiento adecuado de las aves de caza es crucial para obtener ejemplares de calidad.</p><h2>Alimentación</h2><p>Una dieta balanceada es fundamental...</p>',
                'excerpt' => 'Aprende los secretos del cuidado profesional de aves de caza en cautividad.',
                'published' => true,
                'featured_image' => 'images/cuidado-aves.jpg',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Técnicas de tiro para caza de aves',
                'slug' => 'tecnicas-tiro-caza-aves',
                'content' => '<p>El tiro certero es fundamental en la caza de aves. Domina estas técnicas para mejorar tu precisión.</p><h2>Postura y respiración</h2><p>Una postura correcta es la base...</p>',
                'excerpt' => 'Mejora tu puntería con técnicas profesionales de tiro para caza de aves.',
                'published' => true,
                'featured_image' => 'images/tecnicas-tiro.jpg',
                'user_id' => $user->id,
            ]
        ];

        foreach ($posts as $postData) {
            Post::create($postData);
        }
    }
}
