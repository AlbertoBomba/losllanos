@extends('layouts.frontend')

@section('title', '[ Blog de caza ] Los llanos Toledo ✔️')
@section('description', '⭐ Blog de caza, destinado a tener a todos nuestro usuarios 
informado sobre las últimas noticias y tendencias en el mundo de la caza.')

@section('content')
<!-- Main Blog Section -->
    <section class="pt-32 pb-20 bg-[#f5f1e3]">
        
        <div class="container mx-auto px-6">
            <!-- Breadcrumb -->
                <nav class="flex mb-8" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}" title="Ir a la página de inicio" class="inline-flex items-center text-xl font-medium text-gray-700  hover:text-[#4b5d3a]">
                                <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                </svg>
                                Inicio
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center text-xl">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ml-1  font-medium text-gray-500 md:ml-2">Blog de caza</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h1 class="text-4xl font-display font-bold text-dark mb-4 uppercase tracking-wide">Blogs de caza</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-sans leading-relaxed">
                    Explora nuestros artículos en el blog, para descubrir las últimas noticias sobre caza. 
                </p>
            </div>
            <!-- Featured Article -->
            <div class="mb-16">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 blog-card">
                    <div class="grid lg:grid-cols-2 gap-0">
                         @if($lastpost->featured_image)
                            <!-- Image -->
                            <div class="relative h-96 lg:h-[500px]">
                                <img src="{{ $lastpost->featured_image_url }}" 
                                    alt="{{ $lastpost->title }}" 
                                    class="w-full h-full object-cover">
                                <div class="absolute top-4 left-4">
                                    <span class="bg-[#8b5e3c] text-white px-4 py-2 rounded-full font-action font-semibold text-sm uppercase tracking-wide">Destacado</span>
                                </div>
                            </div>
                        @else
                            <div class="w-full h-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center">
                                <span class="text-white text-lg font-semibold">Los Llanos</span>
                            </div>
                        @endif
                        <!-- Content -->
                        <div class="flex items-center p-8 lg:p-12">
                            <div>
                                <!-- Date and Category -->
                                <div class="flex items-center text-gray-500 text-sm mb-4 font-sans">
                                    <i class="far fa-calendar-alt mr-2"></i>
                                    <span class="mr-4">{{ $lastpost->created_at->format('d M Y') }}</span>
                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-semibold uppercase">Destacado</span>
                                </div>
                                
                                <!-- Title -->
                                <h2 class="text-3xl lg:text-4xl font-display font-bold text-dark mb-4 leading-tight">
                                     {{ $lastpost->title }}
                                </h2>
                                <!-- Description -->
                                <p class="text-gray-600 text-lg leading-relaxed font-sans mb-6">
                                    {{ Str::limit($lastpost->content, 120) }}
                                </p>
                                <!-- Read Time and Author -->
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center">
                                         <img src="{{asset('images/follows/folow_1.jpg')}}" 
                                            class="w-8 h-8 rounded-full mr-2" alt="Autor Emilio Bomba">
                                        <span class="text-gray-600 text-sm font-sans">Por Emilio Bomba</span>
                                    </div>
                                </div>
                                <!-- CTA Button -->
                                <a href="{{ route('blog-de-caza.show', $lastpost->slug) }}" title="Ir al artículo completo: {{ $lastpost->title }}" class="inline-flex items-center bg-[#8b5e3c] hover:bg-[#4b5d3a] text-white px-8 py-4 rounded-lg font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                                    Leer Artículo
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Blog Post 1 -->
                @if($posts->count() > 0)
                    @foreach($posts as $post)
                        <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 blog-card">
                            <div class="relative">
                                @if($post->featured_image)
                                    <img src="{{ $post->featured_image_url }}" 
                                    alt="{{ $post->title }}" 
                                    class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center">
                                        <span class="text-white text-lg font-semibold">Los Llanos</span>
                                    </div>
                                @endif
                                
                                <!-- Video Indicator -->
                                @if($post->has_youtube_video)
                                    <div class="absolute top-3 right-3 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                        <i class="fab fa-youtube mr-1"></i>
                                        Video
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <!-- Date -->
                                <div class="flex items-center text-gray-500 text-sm mb-3 font-sans">
                                    <i class="far fa-calendar-alt mr-2"></i>
                                    {{ $post->created_at->format('d M Y') }}
                                </div>
                                <!-- Title -->
                                <h2 class="text-xl font-display font-bold text-dark mb-3 leading-tight">
                                    {{ $post->title }}
                                </h2>
                                <!-- Excerpt -->
                                <p class="text-gray-600 mb-4 font-sans leading-relaxed">
                                    {{ Str::limit($post->content, 120) }}
                                </p>
                                
                                <!-- Read More Link -->
                                <a href="{{ route('blog-de-caza.show', $post->slug) }}" title="Ir al artículo completo: {{ $post->title }}" class="text-[#4b5d3a] hover:text-[#3a4a2c] font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105">
                                    Leer Más →
                                </a>
                            </div>
                        </article>
                    @endforeach
                @endif
            </div>

            
        </div>
    </section>

@endsection
