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
                'reviewer_name' => 'Carlos Mendez',
                'reviewer_email' => 'carlos.mendez@email.com',
                'reviewer_location' => 'Madrid',
                'rating' => 5,
                'service_type' => 'caza_perdiz',
                'title' => 'Mejor experiencia de caza de perdiz',
                'content' => 'Increíble jornada de caza de perdiz en Los Llanos. El terreno es perfecto, las aves de excelente calidad y el trato del personal excepcional. Los perros de muestra trabajaron de forma impecable. Sin duda la mejor organización de cacerías que he conocido. Volveré sin pensarlo.',
                'is_approved' => true,
                'is_featured' => true,
                'ip_address' => '192.168.1.100',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'Miguel Rodriguez',
                'reviewer_email' => 'miguel.rodriguez@email.com',
                'reviewer_location' => 'Barcelona',
                'rating' => 5,
                'service_type' => 'caza_faisan',
                'title' => 'Faisanes espectaculares, servicio de 10',
                'content' => 'La calidad de los faisanes es excepcional, aves criadas con mimo que ofrecen un vuelo espectacular. Las instalaciones están impecables y el personal conoce perfectamente su trabajo. La comida tradicional al final de la jornada fue el broche de oro perfecto.',
                'is_approved' => true,
                'is_featured' => true,
                'ip_address' => '192.168.1.101',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'Antonio Jimenez',
                'reviewer_email' => 'antonio.jimenez@email.com',
                'reviewer_location' => 'Valencia',
                'rating' => 4,
                'service_type' => 'tiradas_finca',
                'title' => 'Tiradas en finca muy bien organizadas',
                'content' => 'Excelente organización de las tiradas. Los puestos están perfectamente ubicados y las aves salen con regularidad. El personal es muy profesional y se nota la experiencia de muchos años. El único pero es que me hubiera gustado que durara más tiempo, se pasa volando.',
                'is_approved' => true,
                'is_featured' => false,
                'ip_address' => '192.168.1.102',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'José Luis García',
                'reviewer_email' => 'joseluis.garcia@email.com',
                'reviewer_location' => 'Sevilla',
                'rating' => 5,
                'service_type' => 'caza_codorniz',
                'title' => 'Codornices de primera calidad',
                'content' => 'Las codornices son de una calidad extraordinaria, con un vuelo rápido y errático que hace la caza muy emocionante. El terreno es variado y perfecto para este tipo de caza. Los guías conocen cada rincón y te llevan a los mejores lugares. Muy recomendable.',
                'is_approved' => true,
                'is_featured' => true,
                'ip_address' => '192.168.1.103',
                'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'Francisco Morales',
                'reviewer_email' => 'francisco.morales@email.com',
                'reviewer_location' => 'Zaragoza',
                'rating' => 4,
                'service_type' => 'caza_paloma',
                'title' => 'Buena caza de paloma, ambiente genial',
                'content' => 'La jornada de caza de paloma fue muy entretenida. Las aves pasan con buena frecuencia y el ambiente entre cazadores es fantástico. Las instalaciones son correctas y el personal atento. Para repetir con amigos.',
                'is_approved' => true,
                'is_featured' => false,
                'ip_address' => '192.168.1.104',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'Rafael Serrano',
                'reviewer_email' => 'rafael.serrano@email.com',
                'reviewer_location' => 'Murcia',
                'rating' => 5,
                'service_type' => 'venta_aves',
                'title' => 'Aves de cría excepcionales',
                'content' => 'Compré varias parejas de perdices para mi coto y la calidad es insuperable. Aves sanas, bien conformadas y con una genética excelente. El trato comercial fue muy profesional y el transporte perfecto. Seguiré comprando aquí.',
                'is_approved' => true,
                'is_featured' => false,
                'ip_address' => '192.168.1.105',
                'user_agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'Diego Ruiz',
                'reviewer_email' => 'diego.ruiz@email.com',
                'reviewer_location' => 'Bilbao',
                'rating' => 4,
                'service_type' => 'caza_perdiz',
                'title' => 'Gran experiencia, volveremos',
                'content' => 'Primera vez que venimos a Los Llanos y ha sido una experiencia muy satisfactoria. La organización es buena, el terreno apropiado y las perdices de buena calidad. El personal muy amable y conocedor. Solo echo en falta más variedad en el menú del almuerzo.',
                'is_approved' => true,
                'is_featured' => false,
                'ip_address' => '192.168.1.106',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ],
            [
                'reviewer_name' => 'Manuel Torres',
                'reviewer_email' => 'manuel.torres@email.com',
                'reviewer_location' => 'Granada',
                'rating' => 5,
                'service_type' => 'tiradas_finca',
                'title' => 'Profesionalidad y calidad en todo',
                'content' => 'Llevamos varios años organizando jornadas de empresa en Los Llanos y siempre nos sorprenden positivamente. La atención al detalle, la calidad de las aves, la organización de los puestos y el trato personal es excepcional. Es nuestro lugar de referencia.',
                'is_approved' => true,
                'is_featured' => false,
                'ip_address' => '192.168.1.107',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36',
                'spam_score' => 0.0,
                'spam_reasons' => []
            ]
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
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
