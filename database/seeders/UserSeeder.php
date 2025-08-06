<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear usuario administrador
        $admin = User::create([
            'name' => 'Alberto Martín',
            'email' => 'admin@losllanos.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        // Crear algunos posts de prueba
        $posts = [
            [
                'title' => 'Bienvenidos a Los Llanos',
                'slug' => 'bienvenidos-a-los-llanos',
                'content' => 'Los Llanos es un lugar único donde la naturaleza y la tranquilidad se encuentran para ofrecerte una experiencia inolvidable. Nuestras instalaciones están diseñadas para que disfrutes al máximo de tu estancia.',
                'excerpt' => 'Descubre la magia de Los Llanos, un lugar único para desconectar.',
                'published' => true,
                'user_id' => $admin->id,
            ],
            [
                'title' => 'Nuestros Servicios de Alojamiento',
                'slug' => 'servicios-de-alojamiento',
                'content' => 'Ofrecemos diferentes tipos de alojamiento adaptados a tus necesidades. Desde habitaciones cómodas hasta espacios familiares, todo pensado para tu comodidad y descanso.',
                'excerpt' => 'Conoce nuestras opciones de alojamiento.',
                'published' => true,
                'user_id' => $admin->id,
            ],
            [
                'title' => 'Gastronomía Local',
                'slug' => 'gastronomia-local',
                'content' => 'Nuestra cocina se basa en productos locales de la más alta calidad. Cada plato cuenta una historia y refleja la tradición culinaria de la región.',
                'excerpt' => 'Degusta la auténtica gastronomía local.',
                'published' => true,
                'user_id' => $admin->id,
            ],
            [
                'title' => 'Actividades y Entretenimiento',
                'slug' => 'actividades-entretenimiento',
                'content' => 'Organizamos diversas actividades para que toda la familia pueda disfrutar. Desde actividades al aire libre hasta eventos culturales.',
                'excerpt' => 'Descubre todas las actividades que tenemos para ti.',
                'published' => true,
                'user_id' => $admin->id,
            ]
        ];

        foreach ($posts as $postData) {
            Post::create($postData);
        }
    }
}
