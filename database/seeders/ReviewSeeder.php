<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $reviews = [
            [
                'reviewer_name' => 'María González',
                'reviewer_email' => 'maria@example.com',
                'reviewer_location' => 'Madrid',
                'rating' => 5,
                'service_type' => 'Alojamiento',
                'title' => 'Experiencia increíble en Los Llanos',
                'content' => 'El lugar es absolutamente maravilloso. La atención al detalle, el personal amable y las instalaciones de primera calidad hicieron que nuestra estancia fuera inolvidable. Sin duda volveremos.',
                'is_approved' => true,
                'is_featured' => true,
                'ip_address' => '192.168.1.100',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'Carlos Rodríguez',
                'reviewer_email' => 'carlos@example.com',
                'reviewer_location' => 'Barcelona',
                'rating' => 4,
                'service_type' => 'Restauración',
                'title' => 'Excelente gastronomía local',
                'content' => 'La comida es espectacular, con productos locales de primera calidad. El ambiente es muy acogedor y el servicio atento. Muy recomendable para conocer la gastronomía de la zona.',
                'is_approved' => true,
                'is_featured' => false,
                'ip_address' => '192.168.1.101',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'Ana Martín',
                'reviewer_email' => 'ana@example.com',
                'reviewer_location' => 'Valencia',
                'rating' => 5,
                'service_type' => 'Actividades',
                'title' => 'Actividades fantásticas para toda la familia',
                'content' => 'Pasamos un fin de semana estupendo. Las actividades están muy bien organizadas y son perfectas para disfrutar en familia. Los niños se divirtieron muchísimo.',
                'is_approved' => true,
                'is_featured' => true,
                'ip_address' => '192.168.1.102',
                'user_agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_7_1 like Mac OS X) AppleWebKit/605.1.15',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'Jorge López',
                'reviewer_email' => 'jorge@example.com',
                'reviewer_location' => 'Sevilla',
                'rating' => 4,
                'service_type' => 'Alojamiento',
                'title' => 'Muy buen lugar para desconectar',
                'content' => 'Un lugar perfecto para alejarse del ruido de la ciudad. Las habitaciones son cómodas y limpias. El entorno natural es precioso y muy relajante.',
                'is_approved' => true,
                'is_featured' => false,
                'ip_address' => '192.168.1.103',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'Laura Fernández',
                'reviewer_email' => 'laura@example.com',
                'reviewer_location' => 'Bilbao',
                'rating' => 5,
                'service_type' => 'Restauración',
                'title' => 'Una experiencia gastronómica única',
                'content' => 'Cada plato es una obra de arte. Los sabores son extraordinarios y la presentación impecable. El chef realmente sabe lo que hace. Una experiencia culinaria memorable.',
                'is_approved' => true,
                'is_featured' => true,
                'ip_address' => '192.168.1.104',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'Miguel Santos',
                'reviewer_email' => 'miguel@example.com',
                'reviewer_location' => 'Granada',
                'rating' => 3,
                'service_type' => 'Actividades',
                'title' => 'Buena experiencia con algunas mejoras posibles',
                'content' => 'En general fue una buena experiencia, aunque algunas actividades podrían estar mejor organizadas. El personal es amable pero podría ser más proactivo.',
                'is_approved' => true,
                'is_featured' => false,
                'ip_address' => '192.168.1.105',
                'user_agent' => 'Mozilla/5.0 (Android 11; Mobile; rv:68.0) Gecko/68.0 Firefox/88.0',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'Carmen Ruiz',
                'reviewer_email' => 'carmen@example.com',
                'reviewer_location' => 'Zaragoza',
                'rating' => 4,
                'service_type' => 'Alojamiento',
                'title' => 'Muy recomendable para parejas',
                'content' => 'Un lugar romántico y tranquilo, perfecto para una escapada en pareja. Las vistas son espectaculares y el ambiente muy íntimo. Repetiremos seguro.',
                'is_approved' => true,
                'is_featured' => false,
                'ip_address' => '192.168.1.106',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ]
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
