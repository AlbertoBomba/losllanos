@extends('layouts.frontend')

@section('title', e( $post->title ))
@section('description', e( Str::limit(strip_tags($post->content), 155) ))


@section('content')
 <!-- Main Content -->
    <section class="pt-32 pb-20 bg-[#f5f1e3]">
        
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="flex mb-8" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}" class="inline-flex items-center text-xl font-medium text-gray-700  hover:text-[#4b5d3a]">
                                <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                </svg>
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog-de-caza') }}" class="inline-flex items-center text-xl font-medium text-gray-700  hover:text-[#4b5d3a]">
                                <div class="flex items-center text-xl">
                                    <svg class="w-3 h-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="ml-1  font-medium  md:ml-2">Blog de caza</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center text-xl">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ml-1  font-medium text-gray-500 md:ml-2">{{ $post->title }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <!-- Article Content -->
                <div>
                    <article class="bg-white rounded-2xl shadow-xl overflow-hidden">
                        <!-- Article Header -->
                        <div class="relative h-96">
                            @if($post->featured_image)
                                <!-- Image -->
                                <img src="{{ $post->featured_image_url }}" 
                                    alt="{{ $post->title }}" 
                                    class="w-full h-full object-cover">
                                <div class="absolute top-4 left-4">
                                    <span class="bg-[#8b5e3c] text-white px-4 py-2 rounded-full font-action font-semibold text-sm uppercase tracking-wide">Destacado</span>
                                </div>
                            @else
                                <div class="w-full h-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center">
                                    <span class="text-white text-lg font-semibold">Los Llanos</span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Article Info -->
                        <div class="p-8 lg:p-12">
                            <!-- Meta Information -->
                            <div class="flex flex-wrap items-center justify-between mb-6 text-sm text-gray-500 font-sans">
                                <div class="flex items-center space-x-6 mb-2 lg:mb-0">
                                    <div class="flex items-center">
                                        <i class="far fa-calendar-alt mr-2"></i>
                                        <span> Publicado el {{ $post->created_at->format('d/m/Y \a \l\a\s H:i') }}</span>
                                    </div>
                                </div>
                                
                                <!-- Social Share -->
                                <x-social-share :title="$post->title" :description="Str::limit(strip_tags($post->content), 100)" show-labels="true" />
                            </div>
                            <!-- Article Title -->
                            <h1 class="text-3xl lg:text-4xl font-display font-bold text-dark mb-6 leading-tight">
                               {{$post->title}}
                            </h1>
                            <!-- Author -->
                            <div class="flex items-center mb-8 pb-8 border-b border-gray-200">
                                <img src="{{asset('images/follows/folow_1.jpg')}}" 
                                     class="w-14 h-14 rounded-full mr-4" alt="Emilio Bomba">
                                <div>
                                    <h2 class="font-sans font-semibold text-gray-800">Emilio Bomba</h2>
                                    <p class="text-sm text-gray-600 font-sans">Experto en Caza Mayor | + 30 años de experiencia</p>
                                </div>
                            </div>
                            <!-- Article Content -->
                            <div class="article-content font-sans text-lg leading-relaxed">
                                <p class="text-xl text-gray-700 mb-8 font-medium italic">
                                   {!! nl2br(e($post->content)) !!}
                                </p>
                            </div>
                            <!-- Tags -->
                            {{-- <div class="mt-12 pt-8 border-t border-gray-200">
                                <h4 class="font-action font-semibold text-gray-800 mb-4">Etiquetas:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-sans">equipo de caza</span>
                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-sans">rifles</span>
                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-sans">visores</span>
                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-sans">caza mayor</span>
                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-sans">accesorios</span>
                                </div>
                            </div> --}}
                        </div>
                    </article>

                    <div class="mt-12">
                        <livewire:comment-section :post="$post" />
                    </div>
                    
            </div>
        </div>
    </section>
    
@endsection
