<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Los Llanos</title>
    <meta name="description" content="{{ Str::limit(strip_tags($post->content), 155) }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <a href="{{ route('home') }}">
                        <span class="text-2xl font-bold text-gray-800">Los Llanos</span>
                    </a>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">
                        Inicio
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Inicio
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $post->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Article -->
        <article class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if($post->featured_image_url)
                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
            @endif
            
            <div class="p-8">
                <!-- Header -->
                <header class="mb-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
                    
                    <div class="flex items-center text-sm text-gray-500 space-x-4">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Por {{ $post->user->name }}
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8h0m-4-4h8a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2z"></path>
                            </svg>
                            {{ $post->created_at->format('d/m/Y') }}
                        </div>
                    </div>
                </header>

                <!-- Content -->
                <div class="prose prose-lg max-w-none">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <!-- Footer -->
                <footer class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            Publicado el {{ $post->created_at->format('d/m/Y \a \l\a\s H:i') }}
                        </div>
                        
                        <div class="flex space-x-3">
                            <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                ← Volver al inicio
                            </a>
                        </div>
                    </div>
                </footer>
            </div>
        </article>

        <!-- Newsletter Subscription -->
        <div class="mt-12 bg-gray-100 rounded-lg p-6">
            <div class="text-center">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">¿Te gustó este artículo?</h3>
                <p class="text-gray-600 mb-4">Suscríbete a nuestro newsletter para recibir más contenido como este.</p>
                
                <livewire:newsletter-subscription />
            </div>
        </div>

        <!-- Comments Section -->
        <div class="mt-12">
            <livewire:comment-section :post="$post" />
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="text-center text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} Los Llanos. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
