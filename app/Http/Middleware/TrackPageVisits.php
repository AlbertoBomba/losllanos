<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PageVisit;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class TrackPageVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Solo trackear peticiones GET y que no sean APIs, admin, ni archivos estáticos
        if ($request->isMethod('GET') && 
            !$request->is('api/*') && 
            !$request->is('admin/*') &&
            !$this->isStaticFile($request)) {
            
            $this->trackVisit($request);
        }

        return $response;
    }

    protected function trackVisit(Request $request)
    {
        try {
            $userAgent = $request->userAgent() ?? '';
            $referer = $request->header('referer');

            // Obtener o generar session ID para el tracking
            $sessionId = session()->getId() ?: $request->ip() . '_' . now()->timestamp;
            
            // Verificar si es un visitante único (basado en cookie)
            $visitorId = Cookie::get('visitor_id');
            $isUniqueVisitor = false;
            
            if (!$visitorId) {
                $visitorId = uniqid() . '_' . now()->timestamp;
                $isUniqueVisitor = true;
                Cookie::queue('visitor_id', $visitorId, 60 * 24 * 365); // 1 año
            }

            // Detectar dispositivo usando user agent
            $deviceType = $this->getDeviceType($userAgent);

            // Obtener navegador y OS
            $browser = $this->getBrowser($userAgent);
            $os = $this->getOperatingSystem($userAgent);

            // Analizar fuente de tráfico
            $trafficData = $this->analyzeTrafficSource($request, $referer);

            // Obtener título de la página
            $pageTitle = $this->getPageTitle($request->path());

            PageVisit::create([
                'url' => $request->fullUrl(),
                'page_title' => $pageTitle,
                'ip_address' => $request->ip(),
                'user_agent' => $userAgent,
                'referer' => $referer,
                'traffic_source' => $trafficData['source'],
                'traffic_medium' => $trafficData['medium'],
                'search_engine' => $trafficData['search_engine'],
                'search_keywords' => $trafficData['keywords'],
                'utm_source' => $trafficData['utm_source'],
                'utm_medium' => $trafficData['utm_medium'],
                'utm_campaign' => $trafficData['utm_campaign'],
                'device_type' => $deviceType,
                'browser' => $browser,
                'os' => $os,
                'country' => $this->getCountryFromIp($request->ip()),
                'city' => null,
                'session_duration' => 0,
                'is_unique_visitor' => $isUniqueVisitor,
                'session_id' => $sessionId,
                'visited_at' => now()
            ]);

        } catch (\Exception $e) {
            Log::error('Error tracking page visit: ' . $e->getMessage());
        }
    }

    protected function isStaticFile(Request $request)
    {
        $staticExtensions = ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'svg', 'ico', 'woff', 'woff2', 'ttf', 'pdf'];
        $path = $request->path();
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        
        return in_array(strtolower($extension), $staticExtensions);
    }

    protected function getDeviceType($userAgent)
    {
        $userAgent = strtolower($userAgent);
        
        if (preg_match('/mobile|android|iphone|ipod|blackberry|windows phone/', $userAgent)) {
            return 'mobile';
        } elseif (preg_match('/ipad|tablet/', $userAgent)) {
            return 'tablet';
        }
        
        return 'desktop';
    }

    protected function getBrowser($userAgent)
    {
        $browsers = [
            'Chrome' => '/Chrome\/[\d.]+/',
            'Firefox' => '/Firefox\/[\d.]+/',
            'Safari' => '/Version\/[\d.]+.*Safari/',
            'Edge' => '/Edg\/[\d.]+/',
            'Opera' => '/Opera\/[\d.]+/',
            'Internet Explorer' => '/MSIE [\d.]+/'
        ];

        foreach ($browsers as $browser => $pattern) {
            if (preg_match($pattern, $userAgent)) {
                return $browser;
            }
        }

        return 'Unknown';
    }

    protected function getOperatingSystem($userAgent)
    {
        $systems = [
            'Windows' => '/Windows NT [\d.]+/',
            'macOS' => '/Mac OS X [\d_.]+/',
            'iOS' => '/iPhone OS [\d_]+/',
            'Android' => '/Android [\d.]+/',
            'Linux' => '/Linux/'
        ];

        foreach ($systems as $os => $pattern) {
            if (preg_match($pattern, $userAgent)) {
                return $os;
            }
        }

        return 'Unknown';
    }

    protected function getPageTitle($path)
    {
        $titles = [
            '/' => 'Inicio - Los Llanos Caza',
            'perdices' => 'Perdices - Los Llanos Caza',
            'codornices' => 'Codornices - Los Llanos Caza', 
            'faisanes' => 'Faisanes - Los Llanos Caza',
            'palomas' => 'Palomas - Los Llanos Caza',
            'tiradas-en-finca' => 'Tiradas en Finca - Los Llanos Caza',
            'contacto' => 'Contacto - Los Llanos Caza',
            'politica-privacidad' => 'Política de Privacidad - Los Llanos Caza',
            'terminos-condiciones' => 'Términos y Condiciones - Los Llanos Caza'
        ];

        return $titles[$path] ?? ucfirst(str_replace('-', ' ', $path)) . ' - Los Llanos Caza';
    }

    protected function getCountryFromIp($ip)
    {
        // Para desarrollo local, retorna España
        if ($ip === '127.0.0.1' || $ip === '::1') {
            return 'España';
        }

        // Aquí se puede integrar con servicios como GeoIP2, ip-api.com, etc.
        return null;
    }

    protected function analyzeTrafficSource(Request $request, $referer)
    {
        $trafficData = [
            'source' => 'direct',
            'medium' => 'none',
            'search_engine' => null,
            'keywords' => null,
            'utm_source' => null,
            'utm_medium' => null,
            'utm_campaign' => null
        ];

        // Analizar parámetros UTM primero
        if ($request->has('utm_source')) {
            $trafficData['utm_source'] = $request->get('utm_source');
            $trafficData['utm_medium'] = $request->get('utm_medium');
            $trafficData['utm_campaign'] = $request->get('utm_campaign');
            $trafficData['source'] = $request->get('utm_source', 'utm');
            $trafficData['medium'] = $request->get('utm_medium', 'unknown');
            return $trafficData;
        }

        // Si no hay referer, es tráfico directo
        if (empty($referer)) {
            return $trafficData;
        }

        $refererHost = parse_url($referer, PHP_URL_HOST);
        $currentHost = parse_url($request->url(), PHP_URL_HOST);

        // Si el referer es el mismo dominio, es navegación interna
        if ($refererHost === $currentHost) {
            $trafficData['source'] = 'internal';
            $trafficData['medium'] = 'referral';
            return $trafficData;
        }

        // Detectar motores de búsqueda
        $searchEngines = [
            'google' => [
                'domains' => ['google.com', 'google.es', 'google.co.uk', 'google.fr', 'google.de', 'google.it', 'google.pt'],
                'query_params' => ['q', 'query']
            ],
            'bing' => [
                'domains' => ['bing.com', 'msn.com'],
                'query_params' => ['q', 'query']
            ],
            'yahoo' => [
                'domains' => ['yahoo.com', 'yahoo.es', 'search.yahoo.com'],
                'query_params' => ['p', 'q']
            ],
            'duckduckgo' => [
                'domains' => ['duckduckgo.com', 'ddg.gg'],
                'query_params' => ['q']
            ],
            'yandex' => [
                'domains' => ['yandex.com', 'yandex.ru'],
                'query_params' => ['text', 'q']
            ],
            'baidu' => [
                'domains' => ['baidu.com'],
                'query_params' => ['wd', 'word']
            ]
        ];

        foreach ($searchEngines as $engine => $config) {
            foreach ($config['domains'] as $domain) {
                if (strpos($refererHost, $domain) !== false) {
                    $trafficData['source'] = 'organic';
                    $trafficData['medium'] = 'search';
                    $trafficData['search_engine'] = $engine;
                    
                    // Intentar extraer palabras clave
                    $keywords = $this->extractSearchKeywords($referer, $config['query_params']);
                    if ($keywords) {
                        $trafficData['keywords'] = $keywords;
                    }
                    
                    return $trafficData;
                }
            }
        }

        // Detectar redes sociales
        $socialNetworks = [
            'facebook' => ['facebook.com', 'fb.com', 'm.facebook.com'],
            'twitter' => ['twitter.com', 't.co', 'x.com'],
            'instagram' => ['instagram.com'],
            'linkedin' => ['linkedin.com', 'lnkd.in'],
            'pinterest' => ['pinterest.com', 'pin.it'],
            'youtube' => ['youtube.com', 'youtu.be'],
            'tiktok' => ['tiktok.com'],
            'whatsapp' => ['whatsapp.com', 'wa.me'],
            'telegram' => ['telegram.org', 't.me'],
            'reddit' => ['reddit.com', 'redd.it']
        ];

        foreach ($socialNetworks as $network => $domains) {
            foreach ($domains as $domain) {
                if (strpos($refererHost, $domain) !== false) {
                    $trafficData['source'] = $network;
                    $trafficData['medium'] = 'social';
                    return $trafficData;
                }
            }
        }

        // Si llegamos aquí, es tráfico de referencia general
        $trafficData['source'] = $refererHost;
        $trafficData['medium'] = 'referral';

        return $trafficData;
    }

    protected function extractSearchKeywords($referer, $queryParams)
    {
        $parsedUrl = parse_url($referer);
        if (!isset($parsedUrl['query'])) {
            return null;
        }

        parse_str($parsedUrl['query'], $queryArray);
        
        foreach ($queryParams as $param) {
            if (isset($queryArray[$param]) && !empty($queryArray[$param])) {
                return urldecode($queryArray[$param]);
            }
        }

        return null;
    }
}
