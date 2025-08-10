<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\KeywordRanking;
use Carbon\Carbon;

class CheckKeywordRankings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seo:check-rankings {--simulate : Simular verificación con datos aleatorios}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verificar posiciones de keywords en Google';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔍 Iniciando verificación de posiciones de keywords...');
        
        if ($this->option('simulate')) {
            $this->simulateRankingCheck();
        } else {
            $this->info('Para obtener posiciones reales, necesitas configurar:');
            $this->info('- Google Search Console API');
            $this->info('- SEMrush API');
            $this->info('- Ahrefs API');
            $this->info('- O cualquier otra herramienta de SEO');
            $this->info('');
            $this->info('Por ahora, usa --simulate para generar datos de prueba');
        }

        return 0;
    }

    private function simulateRankingCheck()
    {
        $this->info('📊 Simulando verificación de posiciones...');
        
        // Obtener keywords únicas del último día
        $existingKeywords = KeywordRanking::select('keyword', 'url', 'page_title')
            ->distinct()
            ->where('check_date', '>=', now()->subDay())
            ->get();

        if ($existingKeywords->isEmpty()) {
            $this->warn('No se encontraron keywords para verificar.');
            return;
        }

        $today = today();
        $newRankings = 0;
        $updatedRankings = 0;

        foreach ($existingKeywords as $keywordData) {
            // Verificar si ya existe un registro para hoy
            $existingToday = KeywordRanking::where('keyword', $keywordData->keyword)
                ->where('url', $keywordData->url)
                ->where('check_date', $today)
                ->first();

            if ($existingToday) {
                continue; // Ya verificado hoy
            }

            // Obtener el último registro para calcular tendencia
            $lastRanking = KeywordRanking::where('keyword', $keywordData->keyword)
                ->where('url', $keywordData->url)
                ->orderBy('check_date', 'desc')
                ->first();

            // Simular nueva posición con variación realista
            $lastPosition = $lastRanking ? $lastRanking->position : rand(10, 50);
            $variation = rand(-5, 5); // Variación de ±5 posiciones
            $newPosition = max(1, min(100, $lastPosition + $variation));

            // Calcular métricas simuladas basadas en la posición
            $impressions = $this->calculateImpressionsFromPosition($newPosition);
            $ctr = $this->calculateCTRFromPosition($newPosition);
            $clicks = round($impressions * ($ctr / 100));

            // Crear el nuevo registro
            KeywordRanking::create([
                'keyword' => $keywordData->keyword,
                'url' => $keywordData->url,
                'page_title' => $keywordData->page_title,
                'position' => $newPosition,
                'search_engine' => 'google',
                'country' => 'es',
                'check_date' => $today,
                'impressions' => $impressions,
                'clicks' => $clicks,
                'click_through_rate' => $ctr,
                'average_position' => $newPosition + (rand(-5, 5) / 10)
            ]);

            $newRankings++;

            // Mostrar progreso
            if ($newRankings % 5 == 0) {
                $this->info("Verificadas {$newRankings} keywords...");
            }
        }

        $this->info("✅ Verificación completada:");
        $this->info("  - {$newRankings} nuevas posiciones registradas");
        $this->info("  - Fecha: {$today->format('d/m/Y')}");
        
        // Mostrar resumen de mejoras/declives
        $this->showRankingChanges();
    }

    private function calculateImpressionsFromPosition($position)
    {
        // Simulación realista: posiciones más altas = más impresiones
        $baseImpressions = match(true) {
            $position <= 3 => rand(500, 1500),
            $position <= 10 => rand(200, 800),
            $position <= 20 => rand(50, 300),
            $position <= 50 => rand(10, 100),
            default => rand(1, 20)
        };

        return $baseImpressions;
    }

    private function calculateCTRFromPosition($position)
    {
        // CTR típico por posición (aproximado)
        $ctr = match(true) {
            $position == 1 => rand(25, 35),
            $position == 2 => rand(15, 25),
            $position == 3 => rand(10, 18),
            $position <= 5 => rand(7, 12),
            $position <= 10 => rand(3, 8),
            $position <= 20 => rand(1, 4),
            default => rand(0.1, 1) * 10
        };

        return round($ctr / 10, 2); // Convertir a decimal
    }

    private function showRankingChanges()
    {
        $improved = collect(KeywordRanking::getImprovedKeywords(1));
        $declined = collect(KeywordRanking::getDeclinedKeywords(1));

        if ($improved->count() > 0) {
            $this->info("\n📈 Keywords que mejoraron:");
            foreach ($improved->take(5) as $keyword) {
                $this->line("  {$keyword->keyword}: {$keyword->previous_position} → {$keyword->current_position} (+{$keyword->improvement})");
            }
        }

        if ($declined->count() > 0) {
            $this->warn("\n📉 Keywords que empeoraron:");
            foreach ($declined->take(5) as $keyword) {
                $this->line("  {$keyword->keyword}: {$keyword->previous_position} → {$keyword->current_position} (-{$keyword->decline})");
            }
        }
    }
}
