<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DailyMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar el restaurante existente
        $restaurant = \App\Models\Restaurant::where('slug', 'restaurante-los-llanos')->first();
        
        if ($restaurant) {
            // Crear menú del día
            \App\Models\DailyMenu::create([
                'restaurant_id' => $restaurant->id,
                'name' => 'Menú del Día',
                'description' => 'Nuestro menú diario con los mejores productos frescos de temporada. Incluye pan, postre y bebida.',
                'price' => 18.50,
                'date' => today(), // Para hoy
                'first_courses' => [
                    'Crema de verduras de temporada',
                    'Ensalada mixta con queso de cabra',
                    'Lentejas guisadas con verduras',
                    'Gazpacho andaluz (temporada)'
                ],
                'second_courses' => [
                    'Pollo asado con patatas',
                    'Merluza a la plancha con verduras',
                    'Lomo de cerdo en salsa',
                    'Tortilla española con ensalada'
                ],
                'desserts' => [
                    'Flan casero',
                    'Fruta de temporada',
                    'Yogur natural',
                    'Helado (3 bolas)'
                ],
                'drinks' => [
                    'Agua mineral',
                    'Refresco',
                    'Cerveza',
                    'Vino de la casa',
                    'Café o infusión'
                ],
                'notes' => 'Incluye pan artesanal. Disponible de lunes a viernes de 13:00 a 16:00h.',
                'is_active' => true,
                'sort_order' => 0
            ]);

            // Crear menú ejecutivo (sin fecha específica, siempre disponible)
            \App\Models\DailyMenu::create([
                'restaurant_id' => $restaurant->id,
                'name' => 'Menú Ejecutivo',
                'description' => 'Perfecto para comidas de trabajo. Rápido, sabroso y a buen precio.',
                'price' => 15.90,
                'date' => null, // Sin fecha específica
                'first_courses' => [
                    'Ensalada César',
                    'Crema del día',
                    'Pasta italiana'
                ],
                'second_courses' => [
                    'Escalope de ternera',
                    'Salmón grillé',
                    'Hamburguesa gourmet'
                ],
                'desserts' => [
                    'Tiramisú',
                    'Fruta fresca',
                    'Café y petit four'
                ],
                'drinks' => [
                    'Agua',
                    'Refresco',
                    'Café'
                ],
                'notes' => 'Servido en 20 minutos. Ideal para comidas de negocios.',
                'is_active' => true,
                'sort_order' => 1
            ]);
        }
    }
}
