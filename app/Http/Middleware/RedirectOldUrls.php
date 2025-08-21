<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectOldUrls
{
    /**
     * Maneja redirects 301 para URLs de la web antigua
     * Ayuda a resolver problemas de contenido duplicado en Google Search Console
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->path();
        $url = $request->url();
        
        // Array de redirects mapeados
        $redirects = [
            // URLs principales duplicadas
            'index.html' => '/',
            'index.php' => '/',
            'home.html' => '/',
            'main.html' => '/',
            'Galeria/index.php' => '/',
            
            // URLs con espacios y caracteres especiales
            'Coto%20Intensivo/index.html' => '/productos/Sueltas/coto-de-caza-intensiva',
            'Coto Intensivo/index.html' => '/productos/Sueltas/coto-de-caza-intensiva',
            
            // Archivos PHP antiguos
            'Tiradas/index.php' => '/productos/sueltas',
            'TiradasPro/Sueltas.php' => '/productos/sueltas',
            'Noticias/verNoticiaWEB.php' => '/blog-de-caza',
            'Socios/WebSocios.php' => '/contacto',
            'Mercadillo/AltaAnuncio.php' => '/contacto',
            
            // Archivos HTML antiguos
            'ventacazamenor/index.html' => '/productos/aves-de-caza',
            'Contacto/contact.html' => '/contacto',
            'Instalaciones/index.html' => '/quienes-somos',
            
            // Variaciones comunes
            'productos.html' => '/productos',
            'servicios.html' => '/productos',
            'galeria.html' => '/productos',
            'gallery.html' => '/productos',
            'about.html' => '/quienes-somos',
            'contact.html' => '/contacto',
            'blog.html' => '/blog-de-caza',
            'news.html' => '/blog-de-caza',
        ];
        
        // Verificar si la URL actual necesita redirect
        foreach ($redirects as $oldPath => $newPath) {
            if ($path === $oldPath || $path === ltrim($oldPath, '/')) {
                return redirect($newPath, 301);
            }
        }
        
        // Manejo especial para URLs con parámetros GET antiguos
        if ($request->has('page')) {
            $page = $request->get('page');
            
            switch ($page) {
                case 'productos':
                case 'product':
                case 'catalog':
                    return redirect('/productos', 301);
                case 'contacto':
                case 'contact':
                    return redirect('/contacto', 301);
                case 'blog':
                case 'noticias':
                case 'news':
                    return redirect('/blog-de-caza', 301);
                case 'quienes-somos':
                case 'about':
                case 'empresa':
                    return redirect('/quienes-somos', 301);
            }
        }
        
        // Manejo de URLs con extensiones no deseadas en la nueva estructura
        if (preg_match('/^(.+)\.(html|php|asp|aspx)$/', $path, $matches)) {
            $cleanPath = $matches[1];
            
            // Lista de paths válidos sin extensión
            $validPaths = [
                'productos', 'contacto', 'quienes-somos', 'blog-de-caza',
                'productos/aves-de-caza', 'productos/sueltas',
                'productos/aves-de-caza/perdices', 'productos/aves-de-caza/faisanes',
                'productos/aves-de-caza/codornices', 'productos/aves-de-caza/palomas'
            ];
            
            if (in_array($cleanPath, $validPaths)) {
                return redirect('/' . $cleanPath, 301);
            }
        }
        
        return $next($request);
    }
}
