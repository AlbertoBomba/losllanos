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
    
    <!-- Fonts - Ahora cargadas localmente -->
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
