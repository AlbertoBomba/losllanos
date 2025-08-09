<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Los Llanos - Bienvenido')</title>
    
    <!-- Fonts - Ahora cargadas localmente -->
    <!-- Scripts y estilos compilados (incluyen las fuentes locales) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Meta tags adicionales -->
    <meta name="description" content="@yield('description', 'Bienvenido a Los Llanos')">
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
