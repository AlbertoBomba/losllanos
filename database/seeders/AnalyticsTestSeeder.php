<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PageVisit;
use Carbon\Carbon;

class AnalyticsTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear datos de ejemplo para diferentes fuentes de tráfico
        $testVisits = [
            [
                'url' => '/',
                'page_title' => 'Inicio - Los Llanos Caza',
                'session_id' => 'test_session_google_1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'ip_address' => '192.168.1.1',
                'referer' => 'https://www.google.com/search?q=aves+de+caza',
                'traffic_source' => 'google',
                'traffic_medium' => 'organic',
                'search_engine' => 'google',
                'search_keywords' => 'aves de caza',
                'is_unique_visitor' => true,
                'visited_at' => now()->subHours(2),
            ],
            [
                'url' => '/productos',
                'page_title' => 'Productos - Los Llanos Caza',
                'session_id' => 'test_session_facebook_1',
                'user_agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X)',
                'ip_address' => '192.168.1.2',
                'referer' => 'https://www.facebook.com/',
                'traffic_source' => 'facebook',
                'traffic_medium' => 'social',
                'is_unique_visitor' => true,
                'visited_at' => now()->subHours(1),
            ],
            [
                'url' => '/productos/aves-de-caza/codornices',
                'page_title' => 'Codornices - Los Llanos Caza',
                'session_id' => 'test_session_google_2',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)',
                'ip_address' => '192.168.1.3',
                'referer' => 'https://www.google.es/search?q=codornices+para+caza',
                'traffic_source' => 'google',
                'traffic_medium' => 'organic',
                'search_engine' => 'google',
                'search_keywords' => 'codornices para caza',
                'is_unique_visitor' => true,
                'visited_at' => now()->subMinutes(30),
            ],
            [
                'url' => '/blog-de-caza',
                'page_title' => 'Blog de Caza - Los Llanos Caza',
                'session_id' => 'test_session_direct_1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'ip_address' => '192.168.1.4',
                'referer' => null,
                'traffic_source' => 'direct',
                'traffic_medium' => 'direct',
                'is_unique_visitor' => true,
                'visited_at' => now()->subMinutes(15),
            ],
            [
                'url' => '/productos/aves-de-caza/faisanes',
                'page_title' => 'Faisanes - Los Llanos Caza',
                'session_id' => 'test_session_bing_1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                'ip_address' => '192.168.1.5',
                'referer' => 'https://www.bing.com/search?q=faisanes+caza',
                'traffic_source' => 'bing',
                'traffic_medium' => 'organic',
                'search_engine' => 'bing',
                'search_keywords' => 'faisanes caza',
                'is_unique_visitor' => true,
                'visited_at' => now()->subMinutes(10),
            ],
            [
                'url' => '/productos/sueltas',
                'page_title' => 'Tiradas en Finca - Los Llanos Caza',
                'session_id' => 'test_session_instagram_1',
                'user_agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X)',
                'ip_address' => '192.168.1.6',
                'referer' => 'https://www.instagram.com/',
                'traffic_source' => 'instagram',
                'traffic_medium' => 'social',
                'is_unique_visitor' => true,
                'visited_at' => now()->subMinutes(5),
            ]
        ];

        foreach ($testVisits as $visitData) {
            PageVisit::create($visitData);
        }

        $this->command->info('Se crearon ' . count($testVisits) . ' visitas de ejemplo para testing del sistema de analytics');
    }
}
