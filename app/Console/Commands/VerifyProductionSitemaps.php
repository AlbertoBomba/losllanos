<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VerifyProductionSitemaps extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'production:verify-sitemaps';

    /**
     * The description of the console command.
     */
    protected $description = 'Verificar que todos los sitemaps funcionen correctamente en producción';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔍 VERIFICANDO SITEMAPS EN PRODUCCIÓN');
        $this->line('════════════════════════════════════════');
        
        $baseUrl = config('app.url');
        $this->line("Base URL: {$baseUrl}");
        $this->newLine();
        
        // Lista de sitemaps a verificar
        $sitemaps = [
            'sitemap_index.xml' => 'Sitemap Principal',
            'sitemap_posts.xml' => 'Posts',
            'sitemap_pages.xml' => 'Páginas',
            'sitemap_categories.xml' => 'Categorías',
            'sitemap_tags.xml' => 'Etiquetas',
            'sitemap_images.xml' => 'Imágenes'
        ];
        
        $results = [];
        $totalErrors = 0;
        
        foreach ($sitemaps as $filename => $description) {
            $url = rtrim($baseUrl, '/') . '/' . $filename;
            
            $this->line("📄 Verificando {$description}...");
            
            try {
                $response = Http::timeout(10)
                    ->withOptions([
                        'verify' => true, // Verificar SSL en producción
                        'http_errors' => false
                    ])
                    ->get($url);
                
                if ($response->successful()) {
                    $size = strlen($response->body());
                    $this->info("   ✅ OK - {$response->status()} ({$size} bytes)");
                    
                    // Verificar que sea XML válido
                    $xml = $response->body();
                    if (strpos($xml, '<?xml') === 0 && strpos($xml, '<urlset') !== false || strpos($xml, '<sitemapindex') !== false) {
                        $this->info("   ✅ Formato XML válido");
                        $results[$filename] = [
                            'status' => 'OK',
                            'code' => $response->status(),
                            'size' => $size,
                            'valid_xml' => true
                        ];
                    } else {
                        $this->error("   ❌ Contenido no es XML válido");
                        $results[$filename] = [
                            'status' => 'ERROR',
                            'code' => $response->status(),
                            'size' => $size,
                            'valid_xml' => false
                        ];
                        $totalErrors++;
                    }
                } else {
                    $this->error("   ❌ Error HTTP: {$response->status()}");
                    $results[$filename] = [
                        'status' => 'ERROR',
                        'code' => $response->status(),
                        'size' => 0,
                        'valid_xml' => false
                    ];
                    $totalErrors++;
                }
                
            } catch (\Exception $e) {
                $this->error("   ❌ Excepción: " . $e->getMessage());
                $results[$filename] = [
                    'status' => 'EXCEPTION',
                    'code' => 0,
                    'size' => 0,
                    'valid_xml' => false,
                    'error' => $e->getMessage()
                ];
                $totalErrors++;
            }
            
            $this->newLine();
        }
        
        // Mostrar resumen
        $this->line('📊 RESUMEN DE VERIFICACIÓN');
        $this->line('════════════════════════════════════════');
        
        foreach ($results as $filename => $result) {
            $status = $result['status'] === 'OK' ? '✅' : '❌';
            $this->line("{$status} {$filename} - {$result['status']} ({$result['code']})");
        }
        
        $this->newLine();
        
        if ($totalErrors === 0) {
            $this->info('🎉 TODOS LOS SITEMAPS FUNCIONAN CORRECTAMENTE');
            $this->info('✅ Sistema listo para notificar a Google y Bing');
            
            // Ofrecer hacer ping automático
            if ($this->confirm('¿Deseas notificar ahora a Google y Bing?')) {
                $this->call('sitemap:ping');
            }
        } else {
            $this->error("⚠️  {$totalErrors} sitemaps tienen problemas");
            $this->error('❌ Corrige los errores antes de notificar a los motores de búsqueda');
        }
        
        $this->newLine();
        $this->line('🔧 COMANDOS ÚTILES:');
        $this->line('   php artisan sitemap:generate    - Regenerar sitemaps');
        $this->line('   php artisan sitemap:ping        - Notificar motores de búsqueda');
        $this->line('   php artisan production:check    - Verificar configuración general');
        
        return $totalErrors === 0 ? 0 : 1;
    }
}
