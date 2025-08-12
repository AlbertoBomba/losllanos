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
        
        $pingResults = [];
        
        if ($isDevelopment) {
            // En desarrollo, simular respuestas exitosas
            $pingResults['google'] = [
                'success' => true,
                'status_code' => 200,
                'message' => 'Modo desarrollo - Ping simulado (requiere dominio público para funcionar realmente)',
                'ping_url' => 'https://www.google.com/ping?sitemap=' . urlencode($sitemapUrl),
                'development_mode' => true
            ];
            
            $pingResults['bing'] = [
                'success' => true,
                'status_code' => 200,
                'message' => 'Modo desarrollo - Ping simulado (requiere dominio público para funcionar realmente)',
                'ping_url' => 'https://www.bing.com/ping?sitemap=' . urlencode($sitemapUrl),
                'development_mode' => true
            ];
        } else {
            // En producción, hacer ping real
            try {
                // Ping Google
                $googlePingUrl = 'https://www.google.com/ping?sitemap=' . urlencode($sitemapUrl);
                $googleResponse = Http::timeout(10)->get($googlePingUrl);
                $pingResults['google'] = [
                    'success' => $googleResponse->successful(),
                    'status_code' => $googleResponse->status(),
                    'message' => $googleResponse->successful() ? 'Notificado correctamente' : 'Error en notificación',
                    'ping_url' => $googlePingUrl
                ];
                
                // Ping Bing  
                $bingPingUrl = 'https://www.bing.com/ping?sitemap=' . urlencode($sitemapUrl);
                $bingResponse = Http::timeout(10)->get($bingPingUrl);
                $pingResults['bing'] = [
                    'success' => $bingResponse->successful(),
                    'status_code' => $bingResponse->status(),
                    'message' => $bingResponse->successful() ? 'Notificado correctamente' : 'Error en notificación',
                    'ping_url' => $bingPingUrl
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
            'development_mode' => $isDevelopment,
            'app_url' => $appUrl
        ], 200, [], JSON_PRETTY_PRINT);
    }
    
    /**
     * Mostrar vista de prueba con botones
     */
    public function testView()
    {
        return view('test-ping');
    }
}
