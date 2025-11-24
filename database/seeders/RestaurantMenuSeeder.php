<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear restaurante de ejemplo
        $restaurant = \App\Models\Restaurant::create([
            'name' => 'Restaurante Los Llanos',
            'description' => 'Auténtica cocina tradicional con los mejores productos de la región. Un lugar donde los sabores de antaño cobran vida.',
            'phone' => '123 456 789',
            'email' => 'info@restaurantelosllanos.com',
            'address' => 'Plaza Mayor, 1, 12345 Los Llanos',
            'website' => 'https://www.restaurantelosllanos.com',
            'slug' => 'restaurante-los-llanos',
            'is_active' => true,
        ]);

        // Crear categorías
        $entrantes = \App\Models\MenuCategory::create([
            'restaurant_id' => $restaurant->id,
            'name' => 'Entrantes',
            'description' => 'Para comenzar tu experiencia culinaria',
            'sort_order' => 0,
            'is_active' => true,
        ]);

        $principales = \App\Models\MenuCategory::create([
            'restaurant_id' => $restaurant->id,
            'name' => 'Platos Principales',
            'description' => 'Nuestras especialidades de la casa',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $postres = \App\Models\MenuCategory::create([
            'restaurant_id' => $restaurant->id,
            'name' => 'Postres',
            'description' => 'El dulce final perfecto',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        $bebidas = \App\Models\MenuCategory::create([
            'restaurant_id' => $restaurant->id,
            'name' => 'Bebidas',
            'description' => 'Selección de bebidas para acompañar',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        // Crear elementos de entrantes
        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $entrantes->id,
            'name' => 'Jamón Ibérico de Bellota',
            'description' => 'Jamón ibérico de bellota curado 48 meses, cortado a cuchillo. Acompañado de pan con tomate.',
            'price' => 28.50,
            'allergens' => ['gluten'],
            'dietary_info' => ['sin_lactosa'],
            'is_special' => true,
            'sort_order' => 0,
        ]);

        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $entrantes->id,
            'name' => 'Croquetas de la Abuela',
            'description' => 'Croquetas caseras de jamón ibérico y bechamel tradicional. 6 unidades.',
            'price' => 12.00,
            'allergens' => ['gluten', 'lacteos', 'huevos'],
            'dietary_info' => ['casero'],
            'sort_order' => 1,
        ]);

        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $entrantes->id,
            'name' => 'Ensalada de Rúcula y Queso de Cabra',
            'description' => 'Rúcula fresca, queso de cabra, nueces, tomates cherry y vinagreta de miel.',
            'price' => 14.50,
            'allergens' => ['lacteos', 'frutos_secos'],
            'dietary_info' => ['vegetariano'],
            'sort_order' => 2,
        ]);

        // Crear elementos de platos principales
        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $principales->id,
            'name' => 'Chuletón de Ternera a la Brasa',
            'description' => 'Chuletón de ternera gallega madurada, cocinado a la brasa. Acompañado de patatas panaderas y pimientos del piquillo.',
            'price' => 45.00,
            'is_special' => true,
            'sort_order' => 0,
        ]);

        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $principales->id,
            'name' => 'Paella Mixta',
            'description' => 'Arroz bomba, pollo de corral, conejo, garrofón, judía verde, azafrán. Para 2 personas (mínimo).',
            'price' => 22.00,
            'allergens' => ['sulfitos'],
            'dietary_info' => ['sin_gluten'],
            'sort_order' => 1,
        ]);

        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $principales->id,
            'name' => 'Merluza a la Plancha con Verduras',
            'description' => 'Lomo de merluza fresca a la plancha con verduras de temporada salteadas y salsa verde.',
            'price' => 24.50,
            'allergens' => ['pescado'],
            'dietary_info' => ['sin_gluten', 'sin_lactosa'],
            'sort_order' => 2,
        ]);

        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $principales->id,
            'name' => 'Risotto de Setas y Trufa',
            'description' => 'Arroz carnaroli, mezcla de setas de temporada, trufa negra, parmesano y aceite de trufa.',
            'price' => 26.00,
            'allergens' => ['lacteos'],
            'dietary_info' => ['vegetariano'],
            'sort_order' => 3,
        ]);

        // Crear elementos de postres
        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $postres->id,
            'name' => 'Torrija de la Casa',
            'description' => 'Torrija tradicional con leche de coco, canela y helado de vainilla artesanal.',
            'price' => 8.50,
            'allergens' => ['gluten', 'lacteos', 'huevos'],
            'dietary_info' => ['casero'],
            'is_special' => true,
            'sort_order' => 0,
        ]);

        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $postres->id,
            'name' => 'Tarta de Chocolate Negro',
            'description' => 'Tarta de chocolate negro 70%, crema de avellanas y frutos rojos.',
            'price' => 7.50,
            'allergens' => ['gluten', 'lacteos', 'huevos', 'frutos_secos'],
            'dietary_info' => ['vegetariano'],
            'sort_order' => 1,
        ]);

        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $postres->id,
            'name' => 'Helado Artesanal',
            'description' => 'Selección de helados artesanales: vainilla, chocolate, fresa o limón.',
            'price' => 6.00,
            'allergens' => ['lacteos'],
            'dietary_info' => ['vegetariano'],
            'sort_order' => 2,
        ]);

        // Crear elementos de bebidas
        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $bebidas->id,
            'name' => 'Vino Tinto Crianza D.O. Ribera del Duero',
            'description' => 'Vino tinto crianza de 12 meses en barrica de roble americano.',
            'price' => 32.00,
            'allergens' => ['sulfitos'],
            'sort_order' => 0,
        ]);

        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $bebidas->id,
            'name' => 'Cerveza Artesanal',
            'description' => 'Cerveza artesanal local, rubia o tostada.',
            'price' => 4.50,
            'allergens' => ['gluten'],
            'sort_order' => 1,
        ]);

        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $bebidas->id,
            'name' => 'Agua Mineral',
            'description' => 'Agua mineral natural con o sin gas.',
            'price' => 2.50,
            'sort_order' => 2,
        ]);

        \App\Models\MenuItem::create([
            'restaurant_id' => $restaurant->id,
            'menu_category_id' => $bebidas->id,
            'name' => 'Café Expresso',
            'description' => 'Café de tueste natural, acompañado de pastas caseras.',
            'price' => 2.00,
            'dietary_info' => ['casero'],
            'sort_order' => 3,
        ]);
    }
}
