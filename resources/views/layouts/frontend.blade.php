<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Los Llanos - Bienvenido')</title>
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'Club de Tiro Los Llanos - Toledo. Coto de caza, tiradas deportivas, alquiler de instalaciones. Tu lugar para la caza y el tiro deportivo.')">
    <meta name="keywords" content="@yield('keywords', 'club tiro, coto caza, Toledo, tiradas deportivas, perdices, faisanes, codornices, caza menor')">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Club de Tiro Los Llanos">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Los Llanos - Club de Tiro y Caza')">
    <meta property="og:description" content="@yield('description', 'Club de Tiro Los Llanos - Toledo. Tu destino para la caza y el tiro deportivo.')">
    <meta property="og:image" content="{{ asset('images/general/og-image.jpg') }}">
    <meta property="og:site_name" content="Club de Tiro Los Llanos">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'Los Llanos - Club de Tiro y Caza')">
    <meta property="twitter:description" content="@yield('description', 'Club de Tiro Los Llanos - Toledo. Tu destino para la caza y el tiro deportivo.')">
    <meta property="twitter:image" content="{{ asset('images/general/og-image.jpg') }}">
    
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />
    
    <!-- DNS prefetch for external resources -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    
    <!-- Critical Font Preloads - Optimized for FCP & LCP -->
    <!-- Highest priority: Most visible fonts first with fetchpriority -->
    <link rel="preload" href="/fonts/oswald/TK3iWkUHHAIjg752HT8Ghe4.woff2" as="font" type="font/woff2" crossorigin="anonymous" fetchpriority="high">
    <link rel="preload" href="/fonts/montserrat/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2" as="font" type="font/woff2" crossorigin="anonymous" fetchpriority="high">
    
    <!-- Medium priority: Secondary fonts -->
    <link rel="preload" href="/fonts/oswald/TK3iWkUHHAIjg752GT8G.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/fonts/figtree/_Xms-HUzqDCFdgfMm4q9DbZs.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    
    <!-- Preconnect for font loading optimization -->
    <link rel="preconnect" href="{{ asset('/fonts') }}" crossorigin>
    
    <!-- Font Display Strategy: Prevent layout shift -->
    <style>
        /* Critical font fallback to prevent FOIT and optimize FCP */
        .font-display { 
            font-family: 'Arial Black', system-ui, sans-serif;
            /* Metrics matching for seamless swap */
            line-height: 1.1;
            letter-spacing: -0.01em;
        }
        .font-action { 
            font-family: 'Helvetica Neue', 'Arial', system-ui, sans-serif;
            /* Metrics matching for seamless swap */
            line-height: 1.4;
            letter-spacing: -0.005em;
        }
        .font-sans { 
            font-family: system-ui, -apple-system, 'Segoe UI', sans-serif;
            /* Metrics matching for seamless swap */
            line-height: 1.6;
            letter-spacing: normal;
        }
        
        /* Critical inline CSS for immediate render */
        h1, h2, h3, .header { 
            font-family: 'Arial Black', system-ui, sans-serif;
            line-height: 1.1;
        }
        
        .btn, button, .button {
            font-family: 'Helvetica Neue', system-ui, sans-serif;
            line-height: 1.4;
        }
        
        body, p, .content {
            font-family: system-ui, -apple-system, sans-serif;
            line-height: 1.6;
        }
        
        /* Prevent layout shift during font swap */
        * {
            font-display: swap;
            text-rendering: optimizeSpeed;
        }
    </style>
    
    <!-- Fonts - Advanced Optimized Loading -->
    <!-- Scripts y estilos compilados (incluyen las fuentes locales) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Meta tags adicionales -->
    <meta name="description" content="@yield('description', 'Bienvenido a Los Llanos')">
    <meta name="author" content="Los Llanos - Club de Tiro">
    <meta name="robots" content="@yield('robots', 'index, follow')">
    <meta name="language" content="es">

    
<!-- Google Analytics se carga condicionalmente a través del sistema de cookies -->

</head>
<body class="font-sans antialiased">

    @livewire('navigation-menu-public')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @livewire('footer-public')

    <!-- Cookie Consent Banner -->
    @include('components.cookie-banner')

</body>
</html>
