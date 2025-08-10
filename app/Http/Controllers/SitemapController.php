<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    /**
     * Mostrar la página de administración de sitemap
     */
    public function index()
    {
        $stats = [
            'static_pages' => count($this->getStaticPages()),
            'blog_posts' => Post::where('published', true)->count(),
            'total_urls' => count($this->getStaticPages()) + Post::where('published', true)->count(),
            'last_updated' => $this->getLastUpdateDate()
        ];

        return view('admin.sitemap.index', compact('stats'));
    }

    /**
     * Generar y mostrar el sitemap XML
     */
    public function generate(Request $request)
    {
        $format = $request->get('format', 'xml');
        
        if ($format === 'download') {
            return $this->downloadSitemap();
        }

        $sitemap = $this->buildSitemap();
        
        if ($format === 'json') {
            return response()->json([
                'sitemap' => $sitemap,
                'total_urls' => count($sitemap),
                'generated_at' => now()->toISOString()
            ]);
        }

        // Retornar XML
        return response($this->generateXML($sitemap))
            ->header('Content-Type', 'application/xml');
    }
    
    /**
     * Generar sitemap para mostrar en admin
     */
    public function generateSitemap()
    {
        return $this->generate(request());
    }
    
    /**
     * Actualizar sitemap (regenerar y devolver estadísticas actualizadas)
     */
    public function updateSitemap()
    {
        $sitemap = $this->buildSitemap();
        
        return response()->json([
            'success' => true,
            'message' => 'Sitemap actualizado correctamente',
            'stats' => [
                'static_pages' => count($this->getStaticPages()),
                'blog_posts' => Post::where('published', true)->count(),
                'total_urls' => count($sitemap),
                'last_updated' => now()->format('d/m/Y H:i'),
                'generated_at' => now()->toISOString()
            ]
        ]);
    }
    
    /**
     * Vista previa del sitemap en formato XML
     */
    public function previewSitemap()
    {
        $sitemap = $this->buildSitemap();
        $xml = $this->generateXML($sitemap);
        
        return response($xml)
            ->header('Content-Type', 'text/plain');
    }
    
    /**
     * Obtener sitemap en formato JSON
     */
    public function jsonSitemap()
    {
        $sitemap = $this->buildSitemap();
        
        return response()->json([
            'sitemap' => $sitemap,
            'total_urls' => count($sitemap),
            'generated_at' => now()->toISOString(),
            'categories' => [
                'static_pages' => count($this->getStaticPages()),
                'blog_posts' => Post::where('published', true)->count()
            ]
        ]);
    }

    /**
     * Descargar el sitemap como archivo XML
     */
    public function downloadSitemap()
    {
        $sitemap = $this->buildSitemap();
        $xml = $this->generateXML($sitemap);
        
        $filename = 'sitemap-' . now()->format('Y-m-d') . '.xml';
        
        return Response::make($xml, 200, [
            'Content-Type' => 'application/xml',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Content-Length' => strlen($xml)
        ]);
    }

    /**
     * Construir el array completo del sitemap
     */
    private function buildSitemap()
    {
        $sitemap = [];
        
        // Agregar páginas estáticas
        foreach ($this->getStaticPages() as $page) {
            $sitemap[] = [
                'url' => url($page['url']),
                'lastmod' => $page['lastmod'],
                'changefreq' => $page['changefreq'],
                'priority' => $page['priority']
            ];
        }

        // Agregar posts del blog desde la base de datos
        $posts = Post::where('published', true)
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($posts as $post) {
            $sitemap[] = [
                'url' => url('/blog-de-caza/' . $post->slug),
                'lastmod' => $post->updated_at->toISOString(),
                'changefreq' => 'monthly',
                'priority' => '0.7'
            ];
        }

        return $sitemap;
    }

    /**
     * Generar el XML del sitemap
     */
    private function generateXML($sitemap)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($sitemap as $url) {
            $xml .= '    <url>' . "\n";
            $xml .= '        <loc>' . htmlspecialchars($url['url']) . '</loc>' . "\n";
            $xml .= '        <lastmod>' . $url['lastmod'] . '</lastmod>' . "\n";
            $xml .= '        <changefreq>' . $url['changefreq'] . '</changefreq>' . "\n";
            $xml .= '        <priority>' . $url['priority'] . '</priority>' . "\n";
            $xml .= '    </url>' . "\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }

    /**
     * Obtener todas las páginas estáticas del sitio
     */
    private function getStaticPages()
    {
        $baseDate = now()->startOfDay()->toISOString();
        
        return [
            // Página principal
            [
                'url' => '/',
                'lastmod' => $baseDate,
                'changefreq' => 'daily',
                'priority' => '1.0'
            ],
            
            // Productos principales
            [
                'url' => '/productos',
                'lastmod' => $baseDate,
                'changefreq' => 'weekly',
                'priority' => '0.9'
            ],
            [
                'url' => '/productos/aves-de-caza',
                'lastmod' => $baseDate,
                'changefreq' => 'weekly',
                'priority' => '0.9'
            ],
            
            // Páginas de aves específicas
            [
                'url' => '/productos/aves-de-caza/perdices',
                'lastmod' => $baseDate,
                'changefreq' => 'weekly',
                'priority' => '0.8'
            ],
            [
                'url' => '/productos/aves-de-caza/faisanes',
                'lastmod' => $baseDate,
                'changefreq' => 'weekly',
                'priority' => '0.8'
            ],
            [
                'url' => '/productos/aves-de-caza/codornices',
                'lastmod' => $baseDate,
                'changefreq' => 'weekly',
                'priority' => '0.8'
            ],
            [
                'url' => '/productos/aves-de-caza/palomas',
                'lastmod' => $baseDate,
                'changefreq' => 'weekly',
                'priority' => '0.8'
            ],
            
            // Tiradas en finca
            [
                'url' => '/productos/sueltas',
                'lastmod' => $baseDate,
                'changefreq' => 'weekly',
                'priority' => '0.8'
            ],
            
            // Blog principal
            [
                'url' => '/blog-de-caza',
                'lastmod' => $this->getLastBlogUpdate(),
                'changefreq' => 'daily',
                'priority' => '0.8'
            ],

            // Páginas legales
            [
                'url' => '/politica-de-privacidad',
                'lastmod' => $baseDate,
                'changefreq' => 'yearly',
                'priority' => '0.3'
            ],
            [
                'url' => '/terminos-y-condiciones',
                'lastmod' => $baseDate,
                'changefreq' => 'yearly',
                'priority' => '0.3'
            ],
            [
                'url' => '/politica-de-cookies',
                'lastmod' => $baseDate,
                'changefreq' => 'yearly',
                'priority' => '0.3'
            ],
            [
                'url' => '/contacto',
                'lastmod' => $baseDate,
                'changefreq' => 'monthly',
                'priority' => '0.6'
            ],
        ];
    }

    /**
     * Obtener la fecha de la última actualización del blog
     */
    private function getLastBlogUpdate()
    {
        $lastPost = Post::where('published', true)
            ->orderBy('updated_at', 'desc')
            ->first();

        return $lastPost ? $lastPost->updated_at->toISOString() : now()->toISOString();
    }

    /**
     * Obtener la fecha de última actualización general
     */
    private function getLastUpdateDate()
    {
        $lastPost = Post::where('published', true)
            ->orderBy('updated_at', 'desc')
            ->first();

        return $lastPost ? $lastPost->updated_at->format('d/m/Y H:i') : 'Sin contenido dinámico';
    }    /**
     * Generar sitemap para robots.txt
     */
    public function robotsTxt()
    {
        $content = "User-agent: *\n";
        $content .= "Disallow: /admin\n";
        $content .= "Disallow: /login\n";
        $content .= "Disallow: /dashboard\n\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($content)
            ->header('Content-Type', 'text/plain');
    }
}
