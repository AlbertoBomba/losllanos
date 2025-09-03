@extends('layouts.frontend')

@section('title', ' Reseñas de Cazadores - Los Llanos Toledo ✔️')
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
            gap: 2px;
        }

        .star {
            color: #d1d5db;
            font-size: 1.25rem;
            transition: color 0.2s ease;
        }

        .star.filled {
            color: #f59e0b;
        }

        .service-filter {
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .service-filter.active {
            background-color: #8b5e3c;
            color: white;
        }

        /* Responsive optimizations */
        @media (max-width: 640px) {
            .star {
                font-size: 1rem;
            }
            
            .service-filter {
                font-size: 0.75rem;
                padding: 0.5rem 1rem;
            }
            
            .hero-stats {
                gap: 1rem;
            }
            
            .hero-stat-value {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .service-filter {
                font-size: 0.7rem;
                padding: 0.4rem 0.8rem;
            }
        }

        /* Smooth transitions for filtered cards */
        .review-card {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .review-card.hidden {
            opacity: 0;
            transform: translateY(20px);
        }
    </style>

    <!-- Hero Section -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3]">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/galery/19.JPG')}}" 
                 alt="Cazadores satisfechos" 
                 class="w-full h-full object-cover"
                 style="object-position: center;">
        </div>
        
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-display font-bold mb-4 sm:mb-6 leading-tight tracking-wide uppercase">
                Reseñas de Cazadores
            </h1>
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl mb-6 sm:mb-8 text-gray-200 max-w-4xl mx-auto leading-relaxed px-2">
                Descubre las experiencias de cazadores que han vivido momentos únicos en nuestras cacerías. <br class="hidden sm:block">
                <strong>Sus palabras son nuestro mejor aval.</strong>
            </p>
            
            <!-- Stats rápidas -->
            <div class="hero-stats flex flex-wrap justify-center gap-4 sm:gap-6 md:gap-8 mb-6 sm:mb-8">
                <div class="text-center min-w-[80px]">
                    <div class="hero-stat-value text-2xl sm:text-3xl font-bold text-[#f59e0b]">{{ number_format($stats['total_reviews']) }}</div>
                    <div class="text-xs sm:text-sm uppercase tracking-wide">Reseñas</div>
                </div>
                <div class="text-center min-w-[80px]">
                    <div class="hero-stat-value text-2xl sm:text-3xl font-bold text-[#f59e0b]">{{ number_format($stats['average_rating'], 1) }}/5</div>
                    <div class="text-xs sm:text-sm uppercase tracking-wide">Puntuación Media</div>
                </div>
                <div class="text-center min-w-[80px]">
                    <div class="hero-stat-value text-2xl sm:text-3xl font-bold text-[#f59e0b]">{{ number_format($stats['five_star_count']) }}</div>
                    <div class="text-xs sm:text-sm uppercase tracking-wide">5 Estrellas</div>
                </div>
            </div>

            <a href="{{ route('reviews.create') }}"  title="Ir al formulario para escribir una reseña"
               class="inline-block bg-[#8b5e3c] hover:bg-[#4b5d3a] text-white px-4 sm:px-6 md:px-8 py-3 sm:py-4 rounded-full font-bold text-sm sm:text-base md:text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                Escribe tu Reseña
            </a>
        </div>
    </section>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 mx-4 sm:mx-6 max-w-4xl lg:mx-auto mt-6">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Reseñas Destacadas -->
    @if($featuredReviews->count() > 0)
    <section class="py-8 sm:py-12 lg:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-12">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-gray-900 mb-2 sm:mb-4">
                    Experiencias Destacadas
                </h2>
                <p class="text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto px-2">
                    Las mejores valoraciones de cazadores que han confiado en nosotros
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                @foreach($featuredReviews as $review)
                    <div class="review-card bg-white rounded-xl shadow-lg p-4 sm:p-6 lg:p-8 border border-gray-100">
                        <!-- Rating -->
                        <div class="flex items-center justify-between mb-3 sm:mb-4">
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $i <= $review->rating ? 'filled' : '' }}">★</span>
                                @endfor
                            </div>
                            <span class="bg-[#8b5e3c] text-white px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-semibold">
                                Destacada
                            </span>
                        </div>

                        <!-- Title -->
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-2 sm:mb-3 line-clamp-2">
                            {{ $review->title }}
                        </h3>

                        <!-- Content -->
                        <p class="text-gray-700 mb-4 sm:mb-6 leading-relaxed text-sm sm:text-base line-clamp-4">
                            {{ Str::limit($review->content, 150) }}
                        </p>

                        <!-- Author Info -->
                        <div class="flex items-center justify-between pt-3 sm:pt-4 border-t border-gray-100">
                            <div class="min-w-0 flex-1">
                                <div class="font-semibold text-gray-900 text-sm sm:text-base truncate">{{ $review->reviewer_name }}</div>
                                @if($review->reviewer_location)
                                    <div class="text-xs sm:text-sm text-gray-500 truncate">{{ $review->reviewer_location }}</div>
                                @endif
                            </div>
                            <div class="text-xs sm:text-sm text-gray-500 ml-2 flex-shrink-0">
                                {{ $review->created_at->format('d/m/Y') }}
                            </div>
                        </div>

                        <!-- Service Type -->
                        <div class="mt-3 sm:mt-4">
                            <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
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
    <section class="py-6 sm:py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-2 sm:gap-3 lg:gap-4">
                <button data-filter="all" class="service-filter active px-3 sm:px-4 lg:px-6 py-2 sm:py-3 rounded-full font-semibold text-xs sm:text-sm uppercase tracking-wide border-2 border-gray-300 hover:border-[#8b5e3c] transition-all">
                    Todas las Reseñas
                </button>
                <button data-filter="caza_perdiz" class="service-filter px-3 sm:px-4 lg:px-6 py-2 sm:py-3 rounded-full font-semibold text-xs sm:text-sm uppercase tracking-wide border-2 border-gray-300 hover:border-[#8b5e3c] transition-all">
                    Caza de Perdiz
                </button>
                <button data-filter="caza_faisan" class="service-filter px-3 sm:px-4 lg:px-6 py-2 sm:py-3 rounded-full font-semibold text-xs sm:text-sm uppercase tracking-wide border-2 border-gray-300 hover:border-[#8b5e3c] transition-all">
                    Caza de Faisán
                </button>
                <button data-filter="caza_codorniz" class="service-filter px-3 sm:px-4 lg:px-6 py-2 sm:py-3 rounded-full font-semibold text-xs sm:text-sm uppercase tracking-wide border-2 border-gray-300 hover:border-[#8b5e3c] transition-all">
                    Caza de Codorniz
                </button>
                <button data-filter="tiradas_finca" class="service-filter px-3 sm:px-4 lg:px-6 py-2 sm:py-3 rounded-full font-semibold text-xs sm:text-sm uppercase tracking-wide border-2 border-gray-300 hover:border-[#8b5e3c] transition-all">
                    Tiradas en Finca
                </button>
            </div>
        </div>
    </section>

    <!-- Todas las Reseñas -->
    <section class="py-8 sm:py-12 lg:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-12">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-gray-900 mb-2 sm:mb-4">
                    Todas las Reseñas
                </h2>
                <p class="text-lg sm:text-xl text-gray-600">
                    {{ $reviews->total() }} reseñas verificadas de cazadores
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-6 lg:gap-8" id="reviews-container">
                @foreach($reviews as $review)
                    <div class="review-card bg-white rounded-xl shadow-md hover:shadow-lg p-4 sm:p-6 border border-gray-100" 
                         data-service="{{ $review->service_type }}">
                        <!-- Rating -->
                        <div class="flex items-center justify-between mb-3 sm:mb-4">
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $i <= $review->rating ? 'filled' : '' }}">★</span>
                                @endfor
                            </div>
                            <span class="text-xs sm:text-sm text-gray-500 flex-shrink-0 ml-2">
                                {{ $review->created_at->format('d/m/Y') }}
                            </span>
                        </div>

                        <!-- Title -->
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-2 sm:mb-3 line-clamp-2">
                            {{ $review->title }}
                        </h3>

                        <!-- Content -->
                        <p class="text-gray-700 mb-3 sm:mb-4 leading-relaxed text-sm line-clamp-3">
                            {{ Str::limit($review->content, 120) }}
                        </p>

                        <!-- Author and Service -->
                        <div class="flex items-center justify-between pt-3 sm:pt-4 border-t border-gray-100">
                            <div class="min-w-0 flex-1">
                                <div class="font-semibold text-gray-900 text-sm truncate">{{ $review->reviewer_name }}</div>
                                @if($review->reviewer_location)
                                    <div class="text-xs text-gray-500 truncate">{{ $review->reviewer_location }}</div>
                                @endif
                            </div>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 ml-2 flex-shrink-0">
                                {{ ucfirst(str_replace('_', ' ', $review->service_type)) }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            @if($reviews->hasPages())
                <div class="mt-8 sm:mt-12 flex justify-center">
                    <div class="w-full max-w-sm">
                        {{ $reviews->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-8 sm:py-12 lg:py-16 bg-[#8b5e3c] text-white">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold mb-4 sm:mb-6">
                ¿Has Cazado con Nosotros?
            </h2>
            <p class="text-lg sm:text-xl mb-6 sm:mb-8 text-gray-200 max-w-2xl mx-auto">
                Comparte tu experiencia con otros cazadores. Tu opinión es muy valiosa para nosotros.
            </p>
            <a href="{{ route('reviews.create') }}" title="Ir al formulario para escribir una reseña"
               class="inline-block bg-white text-[#8b5e3c] hover:bg-gray-100 px-4 sm:px-6 lg:px-8 py-3 sm:py-4 rounded-full font-bold text-sm sm:text-base lg:text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                Escribir Reseña
            </a>
        </div>
    </section>

    <script>
        // Filtrado de reseñas con optimizaciones para móviles
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.service-filter');
            const reviewCards = document.querySelectorAll('[data-service]');
            let isFiltering = false;

            // Debounce function para mejorar rendimiento
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            // Función de filtrado optimizada
            function filterReviews(filter) {
                if (isFiltering) return;
                isFiltering = true;

                // Batch DOM operations
                requestAnimationFrame(() => {
                    reviewCards.forEach((card, index) => {
                        const service = card.getAttribute('data-service');
                        const shouldShow = filter === 'all' || service === filter;
                        
                        if (shouldShow) {
                            // Mostrar con animación escalonada
                            card.style.display = 'block';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, index * 50); // Delay escalonado para efecto visual
                        } else {
                            // Ocultar inmediatamente
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300);
                        }
                    });

                    // Scroll suave a la sección de reseñas en móviles
                    if (window.innerWidth <= 768) {
                        const reviewsSection = document.getElementById('reviews-container');
                        if (reviewsSection) {
                            setTimeout(() => {
                                reviewsSection.scrollIntoView({ 
                                    behavior: 'smooth', 
                                    block: 'start' 
                                });
                            }, 100);
                        }
                    }

                    setTimeout(() => {
                        isFiltering = false;
                    }, 500);
                });
            }

            // Event listeners con debounce
            const debouncedFilter = debounce(filterReviews, 100);

            filterButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const filter = this.getAttribute('data-filter');

                    // Update active button
                    filterButtons.forEach(btn => {
                        btn.classList.remove('active');
                        btn.setAttribute('aria-pressed', 'false');
                    });
                    this.classList.add('active');
                    this.setAttribute('aria-pressed', 'true');

                    // Filter cards
                    debouncedFilter(filter);
                });

                // Mejorar accesibilidad
                button.setAttribute('role', 'button');
                button.setAttribute('aria-pressed', button.classList.contains('active') ? 'true' : 'false');
            });

            // Intersection Observer para animaciones de scroll
            if ('IntersectionObserver' in window) {
                const observerOptions = {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }
                    });
                }, observerOptions);

                // Observe review cards for scroll animations
                reviewCards.forEach(card => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    observer.observe(card);
                });
            }

            // Touch optimization for mobile devices
            if ('ontouchstart' in window) {
                filterButtons.forEach(button => {
                    button.style.webkitTapHighlightColor = 'transparent';
                });
            }
        });
    </script>

@endsection
