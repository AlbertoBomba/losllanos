@extends('layouts.frontend')

@section('title', 'Reseñas de Cazadores - Los Llanos')
@section('description', 'Lee las opiniones y experiencias de otros cazadores que han disfrutado de nuestras cacerías de perdiz, faisán, codorniz y paloma en Los Llanos, Toledo.')

@section('content')

    <style>
        /* Animaciones para las cards de reseñas */
        .review-card {
            transition: all 0.3s ease-in-out;
        }
        
        .review-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .star-rating {
            display: inline-flex;
            align-items: center;
        }

        .star {
            color: #d1d5db;
            font-size: 1.25rem;
        }

        .star.filled {
            color: #f59e0b;
        }

        .service-filter {
            transition: all 0.3s ease;
        }

        .service-filter.active {
            background-color: #8b5e3c;
            color: white;
        }
    </style>

    <!-- Hero Section -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3]">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/backgrounds/reviews-hero.jpg')}}" 
                 alt="Cazadores satisfechos" 
                 class="w-full h-full object-cover"
                 style="object-position: center;">
        </div>
        
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-6 max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-display font-bold mb-6 leading-tight tracking-wide uppercase">
                Reseñas de Cazadores
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-3xl mx-auto leading-relaxed">
                Descubre las experiencias de cazadores que han vivido momentos únicos en nuestras cacerías. <br>
                <strong>Sus palabras son nuestro mejor aval.</strong>
            </p>
            
            <!-- Stats rápidas -->
            <div class="flex flex-wrap justify-center gap-8 mb-8">
                <div class="text-center">
                    <div class="text-3xl font-bold text-[#f59e0b]">{{ number_format($stats['total_reviews']) }}</div>
                    <div class="text-sm uppercase tracking-wide">Reseñas</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-[#f59e0b]">{{ number_format($stats['average_rating'], 1) }}/5</div>
                    <div class="text-sm uppercase tracking-wide">Puntuación Media</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-[#f59e0b]">{{ number_format($stats['five_star_count']) }}</div>
                    <div class="text-sm uppercase tracking-wide">5 Estrellas</div>
                </div>
            </div>

            <a href="{{ route('reviews.create') }}" 
               class="bg-[#8b5e3c] hover:bg-[#4b5d3a] text-white px-8 py-4 rounded-full font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                Escribe tu Reseña
            </a>
        </div>
    </section>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 mx-6 max-w-4xl mx-auto mt-6">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Reseñas Destacadas -->
    @if($featuredReviews->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-display font-bold text-gray-900 mb-4">
                    Experiencias Destacadas
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Las mejores valoraciones de cazadores que han confiado en nosotros
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredReviews as $review)
                    <div class="review-card bg-white rounded-xl shadow-lg p-8 border border-gray-100">
                        <!-- Rating -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $i <= $review->rating ? 'filled' : '' }}">★</span>
                                @endfor
                            </div>
                            <span class="bg-[#8b5e3c] text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Destacada
                            </span>
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            {{ $review->title }}
                        </h3>

                        <!-- Content -->
                        <p class="text-gray-700 mb-6 leading-relaxed">
                            {{ Str::limit($review->content, 150) }}
                        </p>

                        <!-- Author Info -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div>
                                <div class="font-semibold text-gray-900">{{ $review->reviewer_name }}</div>
                                @if($review->reviewer_location)
                                    <div class="text-sm text-gray-500">{{ $review->reviewer_location }}</div>
                                @endif
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ $review->created_at->format('d/m/Y') }}
                            </div>
                        </div>

                        <!-- Service Type -->
                        <div class="mt-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                {{ ucfirst(str_replace('_', ' ', $review->service_type)) }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Filtros de Servicios -->
    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-wrap justify-center gap-4">
                <button data-filter="all" class="service-filter active px-6 py-3 rounded-full font-semibold text-sm uppercase tracking-wide border-2 border-gray-300 hover:border-[#8b5e3c] transition-all">
                    Todas las Reseñas
                </button>
                <button data-filter="caza_perdiz" class="service-filter px-6 py-3 rounded-full font-semibold text-sm uppercase tracking-wide border-2 border-gray-300 hover:border-[#8b5e3c] transition-all">
                    Caza de Perdiz
                </button>
                <button data-filter="caza_faisan" class="service-filter px-6 py-3 rounded-full font-semibold text-sm uppercase tracking-wide border-2 border-gray-300 hover:border-[#8b5e3c] transition-all">
                    Caza de Faisán
                </button>
                <button data-filter="caza_codorniz" class="service-filter px-6 py-3 rounded-full font-semibold text-sm uppercase tracking-wide border-2 border-gray-300 hover:border-[#8b5e3c] transition-all">
                    Caza de Codorniz
                </button>
                <button data-filter="tiradas_finca" class="service-filter px-6 py-3 rounded-full font-semibold text-sm uppercase tracking-wide border-2 border-gray-300 hover:border-[#8b5e3c] transition-all">
                    Tiradas en Finca
                </button>
            </div>
        </div>
    </section>

    <!-- Todas las Reseñas -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-display font-bold text-gray-900 mb-4">
                    Todas las Reseñas
                </h2>
                <p class="text-xl text-gray-600">
                    {{ $reviews->total() }} reseñas verificadas de cazadores
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="reviews-container">
                @foreach($reviews as $review)
                    <div class="review-card bg-white rounded-xl shadow-md hover:shadow-lg p-6 border border-gray-100" 
                         data-service="{{ $review->service_type }}">
                        <!-- Rating -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $i <= $review->rating ? 'filled' : '' }}">★</span>
                                @endfor
                            </div>
                            <span class="text-sm text-gray-500">
                                {{ $review->created_at->format('d/m/Y') }}
                            </span>
                        </div>

                        <!-- Title -->
                        <h3 class="text-lg font-bold text-gray-900 mb-3">
                            {{ $review->title }}
                        </h3>

                        <!-- Content -->
                        <p class="text-gray-700 mb-4 leading-relaxed text-sm">
                            {{ Str::limit($review->content, 120) }}
                        </p>

                        <!-- Author and Service -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div>
                                <div class="font-semibold text-gray-900 text-sm">{{ $review->reviewer_name }}</div>
                                @if($review->reviewer_location)
                                    <div class="text-xs text-gray-500">{{ $review->reviewer_location }}</div>
                                @endif
                            </div>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                {{ ucfirst(str_replace('_', ' ', $review->service_type)) }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            @if($reviews->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $reviews->links() }}
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-[#8b5e3c] text-white">
        <div class="max-w-4xl mx-auto text-center px-6">
            <h2 class="text-3xl md:text-4xl font-display font-bold mb-6">
                ¿Has Cazado con Nosotros?
            </h2>
            <p class="text-xl mb-8 text-gray-200">
                Comparte tu experiencia con otros cazadores. Tu opinión es muy valiosa para nosotros.
            </p>
            <a href="{{ route('reviews.create') }}" 
               class="bg-white text-[#8b5e3c] hover:bg-gray-100 px-8 py-4 rounded-full font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                Escribir Reseña
            </a>
        </div>
    </section>

    <script>
        // Filtrado de reseñas
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.service-filter');
            const reviewCards = document.querySelectorAll('[data-service]');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');

                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filter cards
                    reviewCards.forEach(card => {
                        const service = card.getAttribute('data-service');
                        
                        if (filter === 'all' || service === filter) {
                            card.style.display = 'block';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, 100);
                        } else {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300);
                        }
                    });
                });
            });
        });
    </script>

@endsection
