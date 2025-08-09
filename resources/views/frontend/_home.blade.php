@extends('layouts.frontend')

@section('title', 'Los Llanos - Inicio')
@section('description', 'Bienvenido a Los Llanos, tu fuente de información y noticias locales')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Bienvenido a Los Llanos
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100">
                Tu fuente confiable de información y noticias locales
            </p>
            <div class="space-x-4">
                <a href="#latest-posts" 
                   class="inline-block bg-white text-blue-600 font-semibold px-8 py-3 rounded-lg hover:bg-gray-100 transition duration-300">
                    Ver Últimas Noticias
                </a>
                <a href="#newsletter" 
                   class="inline-block border-2 border-white text-white font-semibold px-8 py-3 rounded-lg hover:bg-white hover:text-blue-600 transition duration-300">
                    Suscríbete
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Latest Posts Section -->
@if($latestPosts->count() > 0)
<section id="latest-posts" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Últimas Noticias
            </h2>
            <p class="text-xl text-gray-600">
                Mantente informado con nuestras últimas publicaciones
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($latestPosts as $post)
            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                @if($post->featured_image)
                <img src="{{ $post->featured_image_url }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center">
                    <span class="text-white text-lg font-semibold">Los Llanos</span>
                </div>
                @endif
                
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                        <a href="{{ $post->url }}" class="hover:text-blue-600 transition duration-300">
                            {{ $post->title }}
                        </a>
                    </h3>
                    
                    @if($post->excerpt)
                    <p class="text-gray-600 mb-4">
                        {{ Str::limit($post->excerpt, 120) }}
                    </p>
                    @endif
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">
                            {{ $post->created_at->format('d M Y') }}
                        </span>
                        <a href="{{ $post->url }}" 
                           class="text-blue-600 font-semibold hover:text-blue-800 transition duration-300">
                            Leer más →
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="#" 
               class="inline-block bg-blue-600 text-white font-semibold px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                Ver Todas las Noticias
            </a>
        </div>
    </div>
</section>
@endif

<!-- About Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                    Conoce Los Llanos
                </h2>
                <p class="text-lg text-gray-600 mb-6">
                    Somos tu fuente confiable de información local. Nos dedicamos a mantener 
                    a la comunidad informada sobre los acontecimientos más importantes de nuestra región.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    Desde noticias locales hasta eventos comunitarios, estamos aquí para 
                    conectar y informar a nuestros vecinos.
                </p>
                <a href="#" 
                   class="inline-block bg-blue-600 text-white font-semibold px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                    Conoce Más
                </a>
            </div>
            <div class="text-center">
                <div class="bg-gradient-to-r from-blue-400 to-blue-600 rounded-lg p-8 text-white">
                    <h3 class="text-2xl font-bold mb-4">¿Por qué elegirnos?</h3>
                    <ul class="space-y-4 text-left">
                        <li class="flex items-center">
                            <svg class="w-6 h-6 mr-3 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Información verificada y confiable
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 mr-3 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Cobertura local especializada
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 mr-3 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Comunidad comprometida
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Section -->
@livewire('reviews-section')

<!-- Review Form Section -->
@livewire('review-form')

<!-- Newsletter Section -->
<section id="newsletter" class="py-16 bg-gray-800 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Mantente Informado
        </h2>
        <p class="text-xl text-gray-300 mb-8">
            Suscríbete a nuestro newsletter y recibe las noticias más importantes directamente en tu email
        </p>
        
        @livewire('newsletter-hero')
        
        <p class="text-sm text-gray-400 mt-4">
            No compartimos tu información. Puedes darte de baja en cualquier momento.
        </p>
    </div>
</section>
@endsection
