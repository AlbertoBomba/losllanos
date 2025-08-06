<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Encabezado de la sección -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                🌟 Experiencias de Nuestros Visitantes
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Descubre lo que dicen quienes ya han vivido la magia de Los Llanos
            </p>
            
            @if($totalReviews > 0)
                <div class="flex items-center justify-center mt-6 space-x-4">
                    <div class="flex items-center">
                        <div class="flex text-yellow-400 text-lg">
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
                        <span class="ml-2 text-xl font-semibold text-gray-900">{{ $averageRating }}</span>
                        <span class="ml-2 text-gray-600">de 5 estrellas</span>
                    </div>
                    <div class="text-gray-500">
                        Basado en {{ $totalReviews }} {{ $totalReviews === 1 ? 'reseña' : 'reseñas' }}
                    </div>
                </div>
            @endif
        </div>

        @if($reviews->count() > 0)
            <!-- Grid de reseñas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
                @foreach($reviews as $review)
                    <div class="bg-gray-50 rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <!-- Valoración con estrellas -->
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                {!! $review->stars_html !!}
                            </div>
                            <span class="ml-2 text-sm text-gray-600">({{ $review->rating }}/5)</span>
                        </div>

                        <!-- Título de la reseña -->
                        <h3 class="font-semibold text-gray-900 mb-2 text-sm">
                            {{ $review->title }}
                        </h3>

                        <!-- Contenido de la reseña -->
                        <p class="text-gray-700 text-sm mb-4 leading-relaxed">
                            {{ Str::limit($review->content, 120) }}
                        </p>

                        <!-- Información del cliente -->
                        <div class="border-t border-gray-200 pt-3">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="font-medium text-gray-900 text-sm">
                                        {{ $review->reviewer_name }}
                                    </p>
                                    @if($review->reviewer_location)
                                        <p class="text-xs text-gray-500 flex items-center mt-1">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $review->reviewer_location }}
                                        </p>
                                    @endif
                                </div>
                                @if($review->service_type)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $review->service_type }}
                                    </span>
                                @endif
                            </div>
                            <p class="text-xs text-gray-400 mt-2">
                                {{ $review->created_at->format('M Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Llamada a la acción -->
            <div class="text-center mt-12">
                <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-lg p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        ¿Ya has visitado Los Llanos?
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Comparte tu experiencia y ayuda a otros viajeros a descubrir la belleza de nuestra región
                    </p>
                    <button onclick="scrollToReviewForm()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300">
                        Escribir una Reseña
                    </button>
                </div>
            </div>
        @else
            <!-- Estado vacío -->
            <div class="text-center py-12">
                <div class="bg-gray-50 rounded-lg p-8">
                    <h3 class="text-xl font-medium text-gray-900 mb-4">
                        Sé el primero en compartir tu experiencia
                    </h3>
                    <p class="text-gray-600 mb-6">
                        ¿Has visitado Los Llanos? Nos encantaría conocer tu opinión
                    </p>
                    <button onclick="scrollToReviewForm()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300">
                        Escribir la Primera Reseña
                    </button>
                </div>
            </div>
        @endif
    </div>

    <script>
        function scrollToReviewForm() {
            // Scroll hacia el formulario de reseñas (que crearemos a continuación)
            const reviewForm = document.getElementById('review-form');
            if (reviewForm) {
                reviewForm.scrollIntoView({ behavior: 'smooth' });
            } else {
                alert('El formulario de reseñas estará disponible próximamente');
            }
        }
    </script>
</div>
