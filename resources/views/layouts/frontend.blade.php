<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Los Llanos - Bienvenido')</title>
    
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

    
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z16ZCQ3398"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z16ZCQ3398');
</script>



</head>
<body class="font-sans antialiased">

    @livewire('navigation-menu-public')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @livewire('footer-public')

</body>
</html>
