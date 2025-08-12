<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class DiagnoseSitemaps extends Command
{
    protected $signature = 'sitemap:diagnose';
    protected $description = 'Diagnosticar problemas con sitemaps';

    public function handle()
    {
        $this->info('🔍 DIAGNOSTICANDO PROBLEMAS DE SITEMAPS');
        $this->info('════════════════════════════════════════');
        
        $baseUrl = config('app.url');
        $this->line("Base URL: {$baseUrl}");
        $this->line('');

        // 1. Verificar archivos locales
        $this->info('📁 1. VERIFICANDO ARCHIVOS LOCALES:');
        $publicPath = public_path();
        $xmlFiles = [
            'sitemap_index.xml',
            'sitemap_posts.xml', 
            'sitemap_pages.xml',
            'sitemap_categories.xml',
            'sitemap_tags.xml',
            'sitemap_images.xml'
        ];

        foreach ($xmlFiles as $file) {
            $fullPath = $publicPath . '/' . $file;
            if (File::exists($fullPath)) {
                $size = File::size($fullPath);
                $this->info("   ✅ {$file} - {$size} bytes");
            } else {
                $this->error("   ❌ {$file} - NO EXISTE");
            }
        }

        $this->line('');

        // 2. Verificar permisos
        $this->info('🔒 2. VERIFICANDO PERMISOS:');
        if (is_readable($publicPath)) {
            $this->info('   ✅ Directorio public/ es legible');
        } else {
            $this->error('   ❌ Directorio public/ NO es legible');
        }

        if (is_writable($publicPath)) {
            $this->info('   ✅ Directorio public/ es escribible');
        } else {
            $this->error('   ❌ Directorio public/ NO es escribible');
        }

        $this->line('');

        // 3. Verificar URLs (solo si no es localhost)
        if (!str_contains($baseUrl, 'localhost') && !str_contains($baseUrl, '127.0.0.1')) {
            $this->info('🌐 3. VERIFICANDO URLS PÚBLICAS:');
            
            foreach ($xmlFiles as $file) {
                $url = $baseUrl . '/' . $file;
                $this->line("   Probando: {$url}");
                
                try {
                    $response = Http::timeout(10)
                        ->withOptions(['verify' => false])
                        ->get($url);
                    
                    if ($response->successful()) {
                        $this->info("   ✅ {$file} - HTTP {$response->status()}");
                    } else {
                        $this->error("   ❌ {$file} - HTTP {$response->status()}");
                    }
                } catch (\Exception $e) {
                    $this->error("   ❌ {$file} - EXCEPCIÓN: " . $e->getMessage());
                }
            }
        } else {
            $this->warn('⚠️  Saltando verificación URLs (entorno local detectado)');
        }

        $this->line('');

        // 4. Mostrar configuración
        $this->info('⚙️  4. CONFIGURACIÓN ACTUAL:');
        $this->line('   APP_ENV: ' . config('app.env'));
        $this->line('   APP_URL: ' . config('app.url'));
        $this->line('   APP_DEBUG: ' . (config('app.debug') ? 'true' : 'false'));
        
        $this->line('');

        // 5. Comandos recomendados
        $this->info('🔧 5. COMANDOS RECOMENDADOS:');
        $this->line('   # Si los archivos no existen:');
        $this->line('   php artisan sitemap:generate');
        $this->line('');
        $this->line('   # Si hay problemas de permisos (Linux/Unix):');
        $this->line('   chmod 644 public/*.xml');
        $this->line('   chown www-data:www-data public/*.xml');
        $this->line('');
        $this->line('   # Para probar manualmente:');
        $this->line('   curl -I ' . $baseUrl . '/sitemap_index.xml');
        
        return 0;
    }
}
