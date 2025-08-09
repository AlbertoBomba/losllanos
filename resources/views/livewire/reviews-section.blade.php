<div>
    <!-- Custom Styles for Scrollbar and Reviews Carousel -->
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #4b5d3a;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #3a4a2c;
        }

        /* Reviews Carousel Styles */
        #reviewsCarousel {
            height: 450px; /* Fixed height to show exactly 3 reviews */
        }
        
        .carousel-wrapper {
            will-change: transform;
        }
        
        .review-card {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }
        
        .review-card:nth-child(n+4) {
            display: none;
        }
        
        .indicator {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .indicator.active {
            background-color: #4b5d3a !important;
        }
        
        .indicator:hover {
            background-color: #8b5e3c;
        }
        
        /* Smooth transitions for carousel movement */
        .carousel-transition {
            transition: transform 0.5s ease-in-out;
        }
    </style>

    <section class="py-20 bg-[#f5f1e3]">
        <div class="container mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl font-display font-bold text-dark mb-4 uppercase tracking-wide">Experiencias de Nuestros Clientes</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-sans leading-relaxed">
                    Descubre lo que dicen nuestros cazadores sobre sus experiencias en Los Llanos. 
                    Comparte tu propia experiencia y ayuda a otros a conocer la calidad de nuestros servicios.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Left: Customer Reviews Carousel -->
                <div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
                        <h3 class="text-2xl font-display font-bold text-dark mb-4 sm:mb-0 uppercase tracking-wide">Lo que dicen nuestros clientes</h3>
                        
                        <!-- Rating Summary -->
                        <div class="bg-white p-4 rounded-lg shadow-md border border-gray-200">
                            @if($totalReviews > 0)
                                <div class="flex items-center space-x-3">
                                    <div class="text-center">
                                        <div class="text-3xl font-bold text-[#4b5d3a] font-display">{{ $avgRate }}</div>
                                        <div class="flex text-yellow-400 text-sm justify-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= floor($averageRating))
                                                    ★
                                                @elseif($i <= $averageRating)
                                                    ☆
                                                @else
                                                    ☆
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-600 font-sans">
                                        <div class="font-semibold">Excelente</div>
                                        <div>Basado en {{ $totalReviews }} {{ $totalReviews === 1 ? 'reseña' : 'reseñas' }}</div>
                                        {{-- <div>Basado en 247 reseñas</div> --}}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Reviews Carousel Container -->
                    <div class="relative overflow-hidden" id="reviewsCarousel">
                        @if($reviews->count() > 0)
                            <div class="carousel-wrapper space-y-6 transition-transform duration-500 ease-in-out" id="carouselWrapper">
                                @foreach($reviews as $review)
                                    <!-- Reviews-->
                                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition review-card" data-review="0">
                                        <div class="flex items-center mb-3">
                                            <div class="flex text-yellow-400 text-lg">
                                                {!! $review->stars_html !!}
                                            </div>
                                            <span class="ml-2 text-sm text-gray-600">({{ $review->rating }}/5)</span>
                                        </div>
                                        <p class="text-gray-600 mb-4 font-sans leading-relaxed italic">
                                            {{ Str::limit($review->content, 120) }}
                                        </p>
                                        <div class="flex items-center">
                                            <div>
                                                <div class="font-semibold text-dark font-action">{{ $review->reviewer_name }} </div>
                                                <div class="text-gray-500 text-sm font-sans">
                                                    @if($review->reviewer_location)
                                                        <p class="text-xs text-gray-500 flex items-center mt-1">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            {{ $review->reviewer_location }}
                                                        </p>
                                                        <p class="text-xs text-gray-400 mt-2">
                                                            {{ $review->created_at->format('M Y') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Carousel Controls -->
                    <div class="flex justify-center items-center mt-8 space-x-4">
                        <button id="prevReview" class="bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-md" aria-label="Ver reseña anterior" title="Ver reseña anterior">
                            <i class="fas fa-chevron-left" aria-hidden="true"></i>
                        </button>
                        
                        <!-- Indicators -->
                        <div class="flex space-x-2" id="carouselIndicators" role="tablist" aria-label="Indicadores de reseñas">
                            <button class="w-3 h-3 bg-[#4b5d3a] rounded-full indicator active" data-slide="0" role="tab" aria-label="Ir a reseña 1" aria-selected="true"></button>
                            <button class="w-3 h-3 bg-gray-300 rounded-full indicator" data-slide="1" role="tab" aria-label="Ir a reseña 2" aria-selected="false"></button>
                            <button class="w-3 h-3 bg-gray-300 rounded-full indicator" data-slide="2" role="tab" aria-label="Ir a reseña 3" aria-selected="false"></button>
                            <button class="w-3 h-3 bg-gray-300 rounded-full indicator" data-slide="3" role="tab" aria-label="Ir a reseña 4" aria-selected="false"></button>
                            <button class="w-3 h-3 bg-gray-300 rounded-full indicator" data-slide="4" role="tab" aria-label="Ir a reseña 5" aria-selected="false"></button>
                            <button class="w-3 h-3 bg-gray-300 rounded-full indicator" data-slide="5" role="tab" aria-label="Ir a reseña 6" aria-selected="false"></button>
                            <button class="w-3 h-3 bg-gray-300 rounded-full indicator" data-slide="6" role="tab" aria-label="Ir a reseña 7" aria-selected="false"></button>
                            <button class="w-3 h-3 bg-gray-300 rounded-full indicator" data-slide="7" role="tab" aria-label="Ir a reseña 8" aria-selected="false"></button>
                        </div>
                        
                        <button id="nextReview" class="bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-md" aria-label="Ver siguiente reseña" title="Ver siguiente reseña">
                            <i class="fas fa-chevron-right" aria-hidden="true"></i>
                        </button>
                    </div>

                    <!-- Auto-play indicator and View All Button -->
                    <div class="flex flex-col sm:flex-row items-center justify-center mt-12 space-y-4 sm:space-y-0 ">
                        <div>
                            <a  class="w-full bg-[#8b5e3c] hover:bg-[#4b5d3a] text-white px-6 py-3 rounded-full font-action font-bold tracking-wide transition-all duration-300 shadow-md hover:shadow-lg text-center cursor-pointer">
                                <i class="fas fa-comments mr-2"></i>
                                Ver todos los comentarios
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right: Review Form -->
                <!-- Review Form Section -->
                @livewire('review-form')
            </div>
        </div>
    </section>

</div>
