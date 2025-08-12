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
        
        // Generar archivos XML del sitemap
        $this->generateSitemapFiles();
        
        // Verificar si estamos en modo desarrollo ANTES de notificar
        $appUrl = config('app.url');
        $isDevelopment = $this->isDevelopmentMode($appUrl);
        
        // FORZAR simulación en desarrollo
        if ($isDevelopment) {
            $pingResults = [
                'google' => [
                    'success' => true,
                    'status_code' => 200,
                    'message' => 'Simulado en modo desarrollo - No se envían pings reales',
                    'development_mode' => true,
                    'forced_simulation' => true
                ],
                'bing' => [
                    'success' => true,
                    'status_code' => 200,
                    'message' => 'Simulado en modo desarrollo - No se envían pings reales', 
                    'development_mode' => true,
                    'forced_simulation' => true
                ]
            ];
        } else {
            // Solo en producción hacer ping real
            $pingResults = $this->notifySearchEngines();
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Sitemap actualizado y motores de búsqueda notificados',
            'stats' => [
                'static_pages' => count($this->getStaticPages()),
                'blog_posts' => Post::where('published', true)->count(),
                'total_urls' => count($sitemap),
                'last_updated' => now()->format('d/m/Y H:i'),
                'generated_at' => now()->toISOString()
            ],
            'ping_results' => $pingResults,
            'debug_info' => [
                'app_url' => $appUrl,
                'is_development' => $isDevelopment,
                'environment' => app()->environment()
            ]
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate')
          ->header('Pragma', 'no-cache')
          ->header('Expires', '0');
    }
    
    /**
     * Notificar a los motores de búsqueda sobre la actualización del sitemap
     */
    private function notifySearchEngines()
    {
        try {
            // Usar la URL pública del sitio en producción
            $appUrl = config('app.url');
            $sitemapUrl = $appUrl . '/sitemap_index.xml';
            
            // Detección más robusta del modo desarrollo
            $isDevelopment = $this->isDevelopmentMode($appUrl);
            
            // Log para debugging
            \Illuminate\Support\Facades\Log::info('Sitemap ping debug', [
                'app_url' => $appUrl,
                'sitemap_url' => $sitemapUrl,
                'is_development' => $isDevelopment,
                'environment' => app()->environment()
            ]);
            
            // SIEMPRE simular en desarrollo - no hacer pings reales
            if ($isDevelopment) {
                return [
                    'google' => [
                        'success' => true,
                        'status_code' => 200,
                        'message' => 'Simulado en modo desarrollo (no se envían pings reales)',
                        'development_mode' => true,
                        'app_url' => $appUrl,
                        'ping_url' => 'https://www.google.com/ping?sitemap=' . urlencode($sitemapUrl)
                    ],
                    'bing' => [
                        'success' => true,
                        'status_code' => 200,
                        'message' => 'Simulado en modo desarrollo (no se envían pings reales)',
                        'development_mode' => true,
                        'app_url' => $appUrl,
                        'ping_url' => 'https://www.bing.com/ping?sitemap=' . urlencode($sitemapUrl)
                    ]
                ];
            }
            
            // Solo en producción hacer pings reales
            $sitemapAccessible = $this->verifySitemapAccessibility($sitemapUrl);
            
            if (!$sitemapAccessible) {
                return [
                    'google' => [
                        'success' => false,
                        'status_code' => 404,
                        'message' => 'Sitemap no accesible públicamente desde Internet',
                        'development_mode' => false,
                        'sitemap_accessible' => false
                    ],
                    'bing' => [
                        'success' => false,
                        'status_code' => 404,
                        'message' => 'Sitemap no accesible públicamente desde Internet',
                        'development_mode' => false,
                        'sitemap_accessible' => false
                    ]
                ];
            }
            
            $results = [
                'google' => $this->pingGoogle($sitemapUrl),
                'bing' => $this->pingBing($sitemapUrl)
            ];
            
            return $results;
            
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Sitemap ping error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            
            return [
                'error' => true,
                'message' => 'Error al notificar motores de búsqueda: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Detectar si estamos en modo desarrollo
     */
    private function isDevelopmentMode($appUrl)
    {
        // Verificar múltiples indicadores de desarrollo
        $developmentIndicators = [
            str_contains($appUrl, 'localhost'),
            str_contains($appUrl, '127.0.0.1'),
            str_contains($appUrl, '::1'),
            str_contains($appUrl, '.local'),
            str_contains($appUrl, ':8000'),
            str_contains($appUrl, ':3000'),
            app()->environment('local'),
            app()->environment('dev'),
            app()->environment('development')
        ];
        
        return in_array(true, $developmentIndicators);
    }
    
    /**
     * Verificar si el sitemap es accesible públicamente
     */
    private function verifySitemapAccessibility($sitemapUrl)
    {
        try {
            // En desarrollo, configurar para evitar problemas SSL
            $httpClient = \Illuminate\Support\Facades\Http::timeout(10);
            
            // Si estamos probando desde localhost a un dominio real, 
            // configurar opciones de SSL más permisivas
            if (str_contains(config('app.url'), '.es') || str_contains(config('app.url'), '.com')) {
                $httpClient = $httpClient->withOptions([
                    'verify' => false, // Solo para testing desde desarrollo
                ]);
            }
            
            $response = $httpClient->get($sitemapUrl);
            return $response->successful() && str_contains($response->body(), '<?xml');
        } catch (\Exception $e) {
            // Log del error para debugging
            \Illuminate\Support\Facades\Log::info('Sitemap accessibility check failed', [
                'url' => $sitemapUrl,
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }
    
    /**
     * Ping a Google Search Console
     */
    private function pingGoogle($sitemapUrl)
    {
        try {
            $isDevelopment = $this->isDevelopmentMode(config('app.url'));
            
            if ($isDevelopment) {
                \Illuminate\Support\Facades\Log::info('Simulando ping a Google para desarrollo: ' . $sitemapUrl);
                return [
                    'success' => true,
                    'status_code' => 200,
                    'message' => 'Notificación simulada en modo desarrollo'
                ];
            }
            
            $googlePingUrl = 'https://www.google.com/ping?sitemap=' . urlencode($sitemapUrl);
            
            \Illuminate\Support\Facades\Log::info('Enviando ping a Google: ' . $googlePingUrl);
            
            $response = \Illuminate\Support\Facades\Http::timeout(30)
                ->withOptions([
                    'verify' => false, // Desactivar verificación SSL para testing local
                    'http_errors' => false // No lanzar excepciones por códigos HTTP
                ])
                ->get($googlePingUrl);
            
            $statusCode = $response->status();
            $message = 'Notificación ' . ($response->successful() ? 'exitosa' : 'fallida') . " - Código: {$statusCode}";
            
            \Illuminate\Support\Facades\Log::info("Respuesta de Google: {$statusCode}");
            
            return [
                'success' => $response->successful(),
                'status_code' => $statusCode,
                'message' => $message
            ];
            
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Google ping failed', [
                'sitemap_url' => $sitemapUrl,
                'error' => $e->getMessage()
            ]);
            
            return [
                'success' => false,
                'status_code' => 0,
                'message' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Ping a Bing Webmaster Tools
     */
    private function pingBing($sitemapUrl)
    {
        try {
            $isDevelopment = $this->isDevelopmentMode(config('app.url'));
            
            if ($isDevelopment) {
                \Illuminate\Support\Facades\Log::info('Simulando ping a Bing para desarrollo: ' . $sitemapUrl);
                return [
                    'success' => true,
                    'status_code' => 200,
                    'message' => 'Notificación simulada en modo desarrollo'
                ];
            }
            
            $bingPingUrl = 'https://www.bing.com/ping?sitemap=' . urlencode($sitemapUrl);
            
            \Illuminate\Support\Facades\Log::info('Enviando ping a Bing: ' . $bingPingUrl);
            
            $response = \Illuminate\Support\Facades\Http::timeout(30)
                ->withOptions([
                    'verify' => false, // Desactivar verificación SSL para testing local
                    'http_errors' => false // No lanzar excepciones por códigos HTTP
                ])
                ->get($bingPingUrl);
            
            $statusCode = $response->status();
            $message = 'Notificación ' . ($response->successful() ? 'exitosa' : 'fallida') . " - Código: {$statusCode}";
            
            \Illuminate\Support\Facades\Log::info("Respuesta de Bing: {$statusCode}");
            
            return [
                'success' => $response->successful(),
                'status_code' => $statusCode,
                'message' => $message
            ];
            
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Bing ping failed', [
                'sitemap_url' => $sitemapUrl,
                'error' => $e->getMessage()
            ]);
            
            return [
                'success' => false,
                'status_code' => 0,
                'message' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Generar archivos de sitemap XML
     */
    private function generateSitemapFiles()
    {
        // Ejecutar el comando artisan para generar los archivos XML
        \Illuminate\Support\Facades\Artisan::call('sitemap:generate');
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
