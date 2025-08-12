<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestPingController extends Controller
{
    /**
     * Probar el ping a los motores de búsqueda
     */
    public function testPing()
    {
        $appUrl = config('app.url');
        $sitemapUrl = $appUrl . '/sitemap_index.xml';
        
        // Verificar si estamos en desarrollo
        $isDevelopment = str_contains($appUrl, 'localhost') || str_contains($appUrl, '127.0.0.1');
        
        // Verificar accesibilidad del sitemap
        $sitemapAccessible = $this->verifySitemapAccessibility($sitemapUrl);
        
        $pingResults = [];
        
        if ($isDevelopment || !$sitemapAccessible) {
            // En desarrollo o sitemap no accesible, simular respuestas exitosas
            $reason = !$sitemapAccessible ? 'Sitemap no accesible públicamente' : 'Modo desarrollo local';
            
            $pingResults['google'] = [
                'success' => true,
                'status_code' => 200,
                'message' => "Simulado - {$reason}",
                'ping_url' => 'https://www.google.com/ping?sitemap=' . urlencode($sitemapUrl),
                'development_mode' => true,
                'sitemap_accessible' => $sitemapAccessible
            ];
            
            $pingResults['bing'] = [
                'success' => true,
                'status_code' => 200,
                'message' => "Simulado - {$reason}",
                'ping_url' => 'https://www.bing.com/ping?sitemap=' . urlencode($sitemapUrl),
                'development_mode' => true,
                'sitemap_accessible' => $sitemapAccessible
            ];
        } else {
            // En producción con sitemap accesible, hacer ping real
            try {
                // Ping Google
                $googlePingUrl = 'https://www.google.com/ping?sitemap=' . urlencode($sitemapUrl);
                $googleResponse = Http::timeout(10)->get($googlePingUrl);
                $pingResults['google'] = [
                    'success' => $googleResponse->successful(),
                    'status_code' => $googleResponse->status(),
                    'message' => $googleResponse->successful() ? 'Notificado correctamente' : 'Error en notificación',
                    'ping_url' => $googlePingUrl,
                    'sitemap_accessible' => $sitemapAccessible
                ];
                
                // Ping Bing  
                $bingPingUrl = 'https://www.bing.com/ping?sitemap=' . urlencode($sitemapUrl);
                $bingResponse = Http::timeout(10)->get($bingPingUrl);
                $pingResults['bing'] = [
                    'success' => $bingResponse->successful(),
                    'status_code' => $bingResponse->status(),
                    'message' => $bingResponse->successful() ? 'Notificado correctamente' : 'Error en notificación',
                    'ping_url' => $bingPingUrl,
                    'sitemap_accessible' => $sitemapAccessible
                ];
                
            } catch (\Exception $e) {
                $pingResults['error'] = [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => basename($e->getFile())
                ];
            }
        }
        
        return response()->json([
            'sitemap_url' => $sitemapUrl,
            'ping_results' => $pingResults,
            'timestamp' => now()->toISOString(),
            'development_mode' => $isDevelopment || !$sitemapAccessible,
            'sitemap_accessible' => $sitemapAccessible,
            'app_url' => $appUrl
        ], 200, [], JSON_PRETTY_PRINT);
    }
    
    /**
     * Verificar si el sitemap es accesible
     */
    private function verifySitemapAccessibility($sitemapUrl)
    {
        try {
            $response = Http::timeout(5)->get($sitemapUrl);
            return $response->successful() && str_contains($response->body(), '<?xml');
        } catch (\Exception $e) {
            return false;
        }
    }
    
    /**
     * Mostrar vista de prueba con botones
     */
    public function testView()
    {
        return view('test-ping');
    }
    
    /**
     * Mostrar vista de diagnóstico completa
     */
    public function diagnostics()
    {
        return view('seo-diagnostics');
    }
    
    /**
     * Mostrar vista de preparación para producción
     */
    public function productionReady()
    {
        return view('production-ready');
    }
}
