<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PingSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:ping {--url=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifica a los motores de búsqueda sobre actualizaciones del sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $appUrl = config('app.url');
        $sitemapUrl = $this->option('url') ?? $appUrl . '/sitemap_index.xml';
        
        $this->info('Notificando a los motores de búsqueda sobre el sitemap actualizado...');
        $this->info('Sitemap URL: ' . $sitemapUrl);
        $this->info('App URL: ' . $appUrl);
        
        // Verificar si estamos en desarrollo
        $isDevelopment = str_contains($appUrl, 'localhost') || str_contains($appUrl, '127.0.0.1');
        
        if ($isDevelopment) {
            $this->warn('⚠️  MODO DESARROLLO DETECTADO');
            $this->warn('Las notificaciones reales a Google/Bing requieren un dominio público accesible desde Internet.');
            $this->warn('En desarrollo, se mostrarán respuestas simuladas.');
            $this->newLine();
        }
        
        $results = [];
        
        // Ping Google
        $googleResult = $this->pingGoogle($sitemapUrl, $isDevelopment);
        $results['google'] = $googleResult;
        
        // Ping Bing
        $bingResult = $this->pingBing($sitemapUrl, $isDevelopment);
        $results['bing'] = $bingResult;
        
        // Mostrar resultados
        $this->displayResults($results);
        
        // Log results
        Log::info('Sitemap ping results', $results);
        
        return 0;
    }
    
    /**
     * Notificar a Google sobre el sitemap actualizado
     */
    private function pingGoogle($sitemapUrl, $isDevelopment = false)
    {
        try {
            if ($isDevelopment) {
                $this->line('📡 Simulando notificación a Google Search Console...');
                $this->info('✅ Google notificado correctamente (simulado)');
                return [
                    'success' => true,
                    'status_code' => 200,
                    'message' => 'Notificación simulada en modo desarrollo'
                ];
            }
            
            $googlePingUrl = 'https://www.google.com/ping?sitemap=' . urlencode($sitemapUrl);
            
            $this->line('📡 Notificando a Google Search Console...');
            
            $response = Http::timeout(30)->get($googlePingUrl);
            
            if ($response->successful()) {
                $this->info('✅ Google notificado correctamente');
                return [
                    'success' => true,
                    'status_code' => $response->status(),
                    'message' => 'Notificación exitosa'
                ];
            } else {
                $this->error('❌ Error al notificar a Google: ' . $response->status());
                return [
                    'success' => false,
                    'status_code' => $response->status(),
                    'message' => 'Error en la notificación'
                ];
            }
            
        } catch (\Exception $e) {
            $this->error('❌ Excepción al notificar a Google: ' . $e->getMessage());
            return [
                'success' => false,
                'status_code' => 0,
                'message' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Notificar a Bing sobre el sitemap actualizado
     */
    private function pingBing($sitemapUrl, $isDevelopment = false)
    {
        try {
            if ($isDevelopment) {
                $this->line('📡 Simulando notificación a Bing Webmaster Tools...');
                $this->info('✅ Bing notificado correctamente (simulado)');
                return [
                    'success' => true,
                    'status_code' => 200,
                    'message' => 'Notificación simulada en modo desarrollo'
                ];
            }
            
            $bingPingUrl = 'https://www.bing.com/ping?sitemap=' . urlencode($sitemapUrl);
            
            $this->line('📡 Notificando a Bing Webmaster Tools...');
            
            $response = Http::timeout(30)->get($bingPingUrl);
            
            if ($response->successful()) {
                $this->info('✅ Bing notificado correctamente');
                return [
                    'success' => true,
                    'status_code' => $response->status(),
                    'message' => 'Notificación exitosa'
                ];
            } else {
                $this->error('❌ Error al notificar a Bing: ' . $response->status());
                return [
                    'success' => false,
                    'status_code' => $response->status(),
                    'message' => 'Error en la notificación'
                ];
            }
            
        } catch (\Exception $e) {
            $this->error('❌ Excepción al notificar a Bing: ' . $e->getMessage());
            return [
                'success' => false,
                'status_code' => 0,
                'message' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Mostrar resultados en consola
     */
    private function displayResults($results)
    {
        $this->newLine();
        $this->info('🎯 RESULTADOS DE LAS NOTIFICACIONES:');
        $this->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        
        foreach ($results as $engine => $result) {
            $status = $result['success'] ? '✅ ÉXITO' : '❌ ERROR';
            $this->line(sprintf(
                '%s: %s (Código: %d)',
                strtoupper($engine),
                $status,
                $result['status_code']
            ));
            
            if (!$result['success']) {
                $this->line('   Mensaje: ' . $result['message']);
            }
        }
        
        $this->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        
        $successful = array_filter($results, fn($r) => $r['success']);
        $total = count($results);
        $successCount = count($successful);
        
        if ($successCount == $total) {
            $this->info("🎉 Todas las notificaciones enviadas correctamente ({$successCount}/{$total})");
        } else {
            $this->warn("⚠️  Algunas notificaciones fallaron ({$successCount}/{$total} exitosas)");
        }
    }
}
