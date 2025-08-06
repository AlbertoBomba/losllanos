<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Los Llanos - Bienvenido')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Meta tags adicionales -->
    <meta name="description" content="@yield('description', 'Bienvenido a Los Llanos')">
    <meta name="keywords" content="@yield('keywords', 'los llanos, blog, noticias')">
</head>
<body class="font-sans antialiased">
    <!-- Header -->
    <header class="bg-white shadow-lg">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-gray-800">Los Llanos</h1>
                    </a>
                </div>
                
                <div class="flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Inicio</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Blog</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Contacto</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-2">
                    <h3 class="text-lg font-semibold mb-4">Los Llanos</h3>
                    <p class="text-gray-400">Tu fuente de información y noticias locales.</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Enlaces</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contacto</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Política de Privacidad</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <p class="text-gray-400 mb-4">Suscríbete para recibir las últimas noticias.</p>
                    @livewire('newsletter-subscription')
                </div>
            </div>
            
            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Los Llanos. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

</body>
</html>
