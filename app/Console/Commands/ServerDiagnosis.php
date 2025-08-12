<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class ServerDiagnosis extends Command
{
    protected $signature = 'server:diagnose';
    protected $description = 'Diagnóstico completo del servidor y sitemaps';

    public function handle()
    {
        $this->info('🔍 DIAGNÓSTICO COMPLETO DEL SERVIDOR');
        $this->info('══════════════════════════════════════════');
        $this->line('');

        $baseUrl = config('app.url');
        
        // 1. Verificar configuración básica
        $this->info('1️⃣  CONFIGURACIÓN BÁSICA:');
        $this->line("   APP_URL: {$baseUrl}");
        $this->line("   APP_ENV: " . config('app.env'));
        $this->line("   APP_DEBUG: " . (config('app.debug') ? 'true' : 'false'));
        $this->line('');

        // 2. Verificar archivos locales
        $this->info('2️⃣  ARCHIVOS XML LOCALES:');
        $publicPath = public_path();
        $xmlFiles = glob($publicPath . '/*.xml');
        
        if (empty($xmlFiles)) {
            $this->error('   ❌ No se encontraron archivos XML');
        } else {
            foreach ($xmlFiles as $file) {
                $filename = basename($file);
                $size = filesize($file);
                $lastmod = date('Y-m-d H:i:s', filemtime($file));
                $this->info("   ✅ {$filename} - {$size} bytes - {$lastmod}");
            }
        }
        $this->line('');

        // 3. Verificar contenido del sitemap index
        $this->info('3️⃣  CONTENIDO SITEMAP INDEX:');
        $sitemapIndexPath = public_path('sitemap_index.xml');
        if (File::exists($sitemapIndexPath)) {
            $content = File::get($sitemapIndexPath);
            $this->line('   Contenido:');
            foreach (explode("\n", $content) as $line) {
                $this->line("   " . trim($line));
            }
        } else {
            $this->error('   ❌ sitemap_index.xml no existe');
        }
        $this->line('');

        // 4. Probar URLs directamente
        $this->info('4️⃣  PRUEBAS DE ACCESIBILIDAD:');
        $urlsToTest = [
            'sitemap_index.xml',
            'sitemap.xml',
            'sitemap-pages.xml',
            'sitemap-posts.xml',
            'sitemap-products.xml'
        ];

        foreach ($urlsToTest as $file) {
            $url = $baseUrl . '/' . $file;
            $this->line("   Probando: {$url}");
            
            try {
                $response = Http::timeout(10)
                    ->withOptions(['verify' => false])
                    ->get($url);
                
                $status = $response->status();
                $size = strlen($response->body());
                
                if ($status === 200) {
                    $this->info("   ✅ {$file} - HTTP {$status} - {$size} bytes");
                } else {
                    $this->error("   ❌ {$file} - HTTP {$status}");
                }
            } catch (\Exception $e) {
                $this->error("   ❌ {$file} - ERROR: " . $e->getMessage());
            }
        }
        $this->line('');

        // 5. Probar pings directos a Google/Bing
        $this->info('5️⃣  PRUEBAS DE PING DIRECTAS:');
        $mainSitemap = $baseUrl . '/sitemap_index.xml';
        
        // Google
        $googlePingUrl = 'https://www.google.com/ping?sitemap=' . urlencode($mainSitemap);
        $this->line("   URL Google: {$googlePingUrl}");
        
        try {
            $response = Http::timeout(15)
                ->withOptions(['verify' => false, 'http_errors' => false])
                ->get($googlePingUrl);
            
            $this->line("   Respuesta Google: HTTP {$response->status()}");
            if ($response->body()) {
                $this->line("   Contenido: " . substr($response->body(), 0, 200));
            }
        } catch (\Exception $e) {
            $this->error("   Error Google: " . $e->getMessage());
        }

        // Bing
        $bingPingUrl = 'https://www.bing.com/ping?sitemap=' . urlencode($mainSitemap);
        $this->line("   URL Bing: {$bingPingUrl}");
        
        try {
            $response = Http::timeout(15)
                ->withOptions(['verify' => false, 'http_errors' => false])
                ->get($bingPingUrl);
            
            $this->line("   Respuesta Bing: HTTP {$response->status()}");
            if ($response->body()) {
                $this->line("   Contenido: " . substr($response->body(), 0, 200));
            }
        } catch (\Exception $e) {
            $this->error("   Error Bing: " . $e->getMessage());
        }

        $this->line('');

        // 6. Verificar robots.txt
        $this->info('6️⃣  VERIFICANDO ROBOTS.TXT:');
        $robotsUrl = $baseUrl . '/robots.txt';
        try {
            $response = Http::timeout(10)
                ->withOptions(['verify' => false])
                ->get($robotsUrl);
            
            if ($response->successful()) {
                $this->info('   ✅ robots.txt accesible');
                $content = $response->body();
                if (str_contains($content, 'sitemap')) {
                    $this->info('   ✅ Contiene referencia a sitemap');
                } else {
                    $this->warn('   ⚠️  No contiene referencia a sitemap');
                }
            } else {
                $this->error('   ❌ robots.txt no accesible - HTTP ' . $response->status());
            }
        } catch (\Exception $e) {
            $this->error('   ❌ Error accediendo robots.txt: ' . $e->getMessage());
        }

        $this->line('');
        $this->info('7️⃣  RECOMENDACIONES:');
        $this->line('   • Verificar que el servidor web esté sirviendo archivos .xml');
        $this->line('   • Comprobar que no haya cache del servidor bloqueando');
        $this->line('   • Verificar permisos de archivos (644 para .xml)');
        $this->line('   • Probar URLs manualmente en navegador');
        $this->line('   • Los pings pueden fallar hasta que Google/Bing reconozcan el sitio');

        return 0;
    }
}
