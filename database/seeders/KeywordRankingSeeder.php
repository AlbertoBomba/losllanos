<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KeywordRanking;
use Carbon\Carbon;

class KeywordRankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos de ejemplo de posiciones de keywords para las páginas del sitio
        $keywordData = [
            // Página principal
            [
                'keyword' => 'aves de caza',
                'url' => '/',
                'page_title' => 'Los Llanos Caza - Aves de Caza y Tiradas en Finca',
                'position' => 12,
                'search_engine' => 'google',
                'country' => 'es',
                'check_date' => today(),
                'impressions' => 1250,
                'clicks' => 87,
                'click_through_rate' => 6.96,
                'average_position' => 11.8
            ],
            [
                'keyword' => 'caza de aves',
                'url' => '/',
                'page_title' => 'Los Llanos Caza - Aves de Caza y Tiradas en Finca',
                'position' => 8,
                'search_engine' => 'google',
                'country' => 'es',
                'check_date' => today(),
                'impressions' => 890,
                'clicks' => 124,
                'click_through_rate' => 13.93,
                'average_position' => 7.6
            ],
            
            // Codornices
            [
                'keyword' => 'codornices para caza',
                'url' => '/productos/aves-de-caza/codornices',
                'page_title' => 'Codornices - Los Llanos Caza',
                'position' => 3,
                'search_engine' => 'google',
                'country' => 'es',
                'check_date' => today(),
                'impressions' => 456,
                'clicks' => 78,
                'click_through_rate' => 17.11,
                'average_position' => 3.2
            ],
            [
                'keyword' => 'comprar codornices',
                'url' => '/productos/aves-de-caza/codornices',
                'page_title' => 'Codornices - Los Llanos Caza',
                'position' => 5,
                'search_engine' => 'google',
                'country' => 'es',
                'check_date' => today(),
                'impressions' => 234,
                'clicks' => 43,
                'click_through_rate' => 18.38,
                'average_position' => 4.8
            ],

            // Faisanes
            [
                'keyword' => 'faisanes caza',
                'url' => '/productos/aves-de-caza/faisanes',
                'page_title' => 'Faisanes - Los Llanos Caza',
                'position' => 6,
                'search_engine' => 'google',
                'country' => 'es',
                'check_date' => today(),
                'impressions' => 334,
                'clicks' => 52,
                'click_through_rate' => 15.57,
                'average_position' => 5.9
            ],
            [
                'keyword' => 'faisanes de caza precio',
                'url' => '/productos/aves-de-caza/faisanes',
                'page_title' => 'Faisanes - Los Llanos Caza',
                'position' => 15,
                'search_engine' => 'google',
                'country' => 'es',
                'check_date' => today(),
                'impressions' => 167,
                'clicks' => 12,
                'click_through_rate' => 7.19,
                'average_position' => 14.7
            ],

            // Perdices
            [
                'keyword' => 'perdices caza',
                'url' => '/productos/aves-de-caza/perdices',
                'page_title' => 'Perdices - Los Llanos Caza',
                'position' => 4,
                'search_engine' => 'google',
                'country' => 'es',
                'check_date' => today(),
                'impressions' => 567,
                'clicks' => 89,
                'click_through_rate' => 15.70,
                'average_position' => 3.8
            ],
            [
                'keyword' => 'perdices rojas caza',
                'url' => '/productos/aves-de-caza/perdices',
                'page_title' => 'Perdices - Los Llanos Caza',
                'position' => 2,
                'search_engine' => 'google',
                'country' => 'es',
                'check_date' => today(),
                'impressions' => 289,
                'clicks' => 67,
                'click_through_rate' => 23.18,
                'average_position' => 2.1
            ],

            // Patos
            [
                'keyword' => 'patos para cazar',
                'url' => '/productos/aves-de-caza/patos',
                'page_title' => 'Patos - Los Llanos Caza',
                'position' => 7,
                'search_engine' => 'google',
                'country' => 'es',
                'check_date' => today(),
                'impressions' => 412,
                'clicks' => 58,
                'click_through_rate' => 14.08,
                'average_position' => 6.8
            ],

            // Tiradas en Finca
            [
                'keyword' => 'tiradas en finca',
                'url' => '/productos/sueltas',
                'page_title' => 'Tiradas en Finca - Los Llanos Caza',
                'position' => 9,
                'search_engine' => 'google',
                'country' => 'es',
                'check_date' => today(),
                'impressions' => 678,
                'clicks' => 76,
                'click_through_rate' => 11.21,
                'average_position' => 8.9
            ],
            [
                'keyword' => 'sueltas de caza',
                'url' => '/productos/sueltas',
                'page_title' => 'Tiradas en Finca - Los Llanos Caza',
                'position' => 11,
                'search_engine' => 'google',
                'country' => 'es',
                'check_date' => today(),
                'impressions' => 445,
                'clicks' => 43,
                'click_through_rate' => 9.66,
                'average_position' => 10.8
            ]
        ];

        // Crear también datos históricos (últimos 7 días) para mostrar tendencias
        foreach ($keywordData as $data) {
            // Crear el registro actual
            KeywordRanking::create($data);
            
            // Crear registros históricos con variaciones aleatorias
            for ($i = 1; $i <= 7; $i++) {
                $historicalData = $data;
                $historicalData['check_date'] = today()->subDays($i);
                
                // Añadir variación aleatoria a la posición (±3 posiciones)
                $variation = rand(-3, 3);
                $historicalData['position'] = max(1, min(100, $data['position'] + $variation));
                $historicalData['average_position'] = $historicalData['position'] + (rand(-5, 5) / 10);
                
                // Ajustar métricas basadas en la posición
                $positionFactor = (101 - $historicalData['position']) / 100;
                $historicalData['impressions'] = round($data['impressions'] * $positionFactor * (0.8 + rand(0, 40) / 100));
                $historicalData['clicks'] = round($historicalData['impressions'] * ($data['click_through_rate'] / 100) * (0.8 + rand(0, 40) / 100));
                $historicalData['click_through_rate'] = $historicalData['impressions'] > 0 ? 
                    round(($historicalData['clicks'] / $historicalData['impressions']) * 100, 2) : 0;
                
                KeywordRanking::create($historicalData);
            }
        }

        $this->command->info('Se crearon ' . (count($keywordData) * 8) . ' registros de posicionamiento de keywords (actual + 7 días históricos)');
    }
}
