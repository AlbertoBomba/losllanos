<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateCanonicalSitemap extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'sitemap:canonical';

    /**
     * The console command description.
     */
    protected $description = 'Genera un sitemap con URLs canónicas para resolver problemas de contenido duplicado';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generando sitemap con URLs canónicas...');
        
        // URLs canónicas principales de la nueva estructura
        $canonicalUrls = [
            [
                'url' => '/',
                'priority' => '1.0',
                'changefreq' => 'weekly',
                'lastmod' => now()->format('Y-m-d')
            ],
            [
                'url' => '/productos',
                'priority' => '0.9',
                'changefreq' => 'weekly',
                'lastmod' => now()->format('Y-m-d')
            ],
            [
                'url' => '/productos/aves-de-caza',
                'priority' => '0.8',
                'changefreq' => 'weekly',
                'lastmod' => now()->format('Y-m-d')
            ],
            [
                'url' => '/productos/aves-de-caza/perdices',
                'priority' => '0.8',
                'changefreq' => 'monthly',
                'lastmod' => now()->format('Y-m-d')
            ],
            [
                'url' => '/productos/aves-de-caza/faisanes',
                'priority' => '0.8',
                'changefreq' => 'monthly',
                'lastmod' => now()->format('Y-m-d')
            ],
            [
                'url' => '/productos/aves-de-caza/codornices',
                'priority' => '0.8',
                'changefreq' => 'monthly',
                'lastmod' => now()->format('Y-m-d')
            ],
            [
                'url' => '/productos/aves-de-caza/palomas',
                'priority' => '0.8',
                'changefreq' => 'monthly',
                'lastmod' => now()->format('Y-m-d')
            ],
            [
                'url' => '/productos/sueltas',
                'priority' => '0.8',
                'changefreq' => 'weekly',
                'lastmod' => now()->format('Y-m-d')
            ],
            [
                'url' => '/blog-de-caza',
                'priority' => '0.7',
                'changefreq' => 'weekly',
                'lastmod' => now()->format('Y-m-d')
            ],
            [
                'url' => '/contacto',
                'priority' => '0.6',
                'changefreq' => 'monthly',
                'lastmod' => now()->format('Y-m-d')
            ],
            [
                'url' => '/quienes-somos',
                'priority' => '0.5',
                'changefreq' => 'monthly',
                'lastmod' => now()->format('Y-m-d')
            ],
            [
                'url' => '/reseñas',
                'priority' => '0.5',
                'changefreq' => 'weekly',
                'lastmod' => now()->format('Y-m-d')
            ],
        ];
        
        // Generar el XML del sitemap
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        foreach ($canonicalUrls as $urlData) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>https://clubdetiro-losllanos.es' . $urlData['url'] . '</loc>' . "\n";
            $xml .= '    <lastmod>' . $urlData['lastmod'] . '</lastmod>' . "\n";
            $xml .= '    <changefreq>' . $urlData['changefreq'] . '</changefreq>' . "\n";
            $xml .= '    <priority>' . $urlData['priority'] . '</priority>' . "\n";
            $xml .= '  </url>' . "\n";
        }
        
        $xml .= '</urlset>';
        
        // Guardar el sitemap
        $sitemapPath = public_path('sitemap-canonical.xml');
        File::put($sitemapPath, $xml);
        
        $this->info('✅ Sitemap canónico generado en: ' . $sitemapPath);
        $this->info('📋 URLs incluidas: ' . count($canonicalUrls));
        
        // Mostrar URLs generadas
        $this->info('🔗 URLs canónicas incluidas:');
        foreach ($canonicalUrls as $urlData) {
            $this->line('   → https://clubdetiro-losllanos.es' . $urlData['url'] . ' (Prioridad: ' . $urlData['priority'] . ')');
        }
        
        $this->info('');
        $this->info('📝 Próximos pasos:');
        $this->line('1. Subir el archivo sitemap-canonical.xml a tu servidor');
        $this->line('2. Enviar el sitemap a Google Search Console');
        $this->line('3. Verificar que todas las redirecciones 301 funcionen');
        $this->line('4. Usar "Inspeccionar URL" en Search Console para las páginas principales');
        
        return 0;
    }
}
