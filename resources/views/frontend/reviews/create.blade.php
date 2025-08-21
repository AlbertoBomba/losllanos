@extends('layouts.frontend')

@section('title', '✔️ Escribe tu Reseña - Los Llanos')
@section('description', 'Comparte tu experiencia de caza con otros cazadores. Escribe una reseña sobre nuestras cacerías de perdiz, faisán, codorniz y paloma.')

@section('content')

    <!-- Hero Section -->
    <section class="relative min-h-[40vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3]">
        <div class="absolute inset-0 bg-gradient-to-r from-[#8b5e3c] to-[#4b5d3a] opacity-90 z-10"></div>
        
        <div class="relative z-20 text-center text-white px-6 max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-display font-bold mb-4 leading-tight tracking-wide uppercase">
                Escribe tu Reseña
            </h1>
            <p class="text-xl text-gray-200 max-w-2xl mx-auto">
                Ayuda a otros cazadores compartiendo tu experiencia con nosotros
            </p>
        </div>
    </section>

    <!-- Formulario -->
    <section class="py-16 bg-white">
        <div class="max-w-3xl mx-auto px-6">
            
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-8">
                    <strong class="font-bold">¡Ups! Hay algunos errores:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reviews.store') }}" method="POST" class="space-y-8">
                @csrf

                <!-- Información Personal -->
                <div class="bg-gray-50 rounded-xl p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Información Personal</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="reviewer_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nombre completo *
                            </label>
                            <input type="text" 
                                   id="reviewer_name" 
                                   name="reviewer_name" 
                                   value="{{ old('reviewer_name') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8b5e3c] focus:border-transparent"
                                   required>
                        </div>

                        <div>
                            <label for="reviewer_email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email *
                            </label>
                            <input type="email" 
                                   id="reviewer_email" 
                                   name="reviewer_email" 
                                   value="{{ old('reviewer_email') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8b5e3c] focus:border-transparent"
                                   required>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="reviewer_location" class="block text-sm font-semibold text-gray-700 mb-2">
                            Ubicación (opcional)
                        </label>
                        <input type="text" 
                               id="reviewer_location" 
                               name="reviewer_location" 
                               value="{{ old('reviewer_location') }}"
                               placeholder="ej: Madrid, España"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8b5e3c] focus:border-transparent">
                    </div>
                </div>

                <!-- Detalles de la Reseña -->
                <div class="bg-gray-50 rounded-xl p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Tu Experiencia</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="service_type" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tipo de Servicio *
                            </label>
                            <select id="service_type" 
                                    name="service_type" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8b5e3c] focus:border-transparent"
                                    required>
                                <option value="">Selecciona un servicio</option>
                                <option value="caza_perdiz" {{ old('service_type') == 'caza_perdiz' ? 'selected' : '' }}>Caza de Perdiz</option>
                                <option value="caza_faisan" {{ old('service_type') == 'caza_faisan' ? 'selected' : '' }}>Caza de Faisán</option>
                                <option value="caza_codorniz" {{ old('service_type') == 'caza_codorniz' ? 'selected' : '' }}>Caza de Codorniz</option>
                                <option value="caza_paloma" {{ old('service_type') == 'caza_paloma' ? 'selected' : '' }}>Caza de Paloma</option>
                                <option value="tiradas_finca" {{ old('service_type') == 'tiradas_finca' ? 'selected' : '' }}>Tiradas en Finca</option>
                                <option value="venta_aves" {{ old('service_type') == 'venta_aves' ? 'selected' : '' }}>Venta de Aves</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Puntuación *
                            </label>
                            <div class="flex space-x-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <label class="cursor-pointer">
                                        <input type="radio" 
                                               name="rating" 
                                               value="{{ $i }}" 
                                               class="sr-only"
                                               {{ old('rating') == $i ? 'checked' : '' }}
                                               required>
                                        <span class="star-button text-3xl text-gray-300 hover:text-[#f59e0b] transition-colors" data-rating="{{ $i }}">★</span>
                                    </label>
                                @endfor
                            </div>
                            <p class="text-sm text-gray-600 mt-2">Haz clic en las estrellas para puntuar</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                            Título de la reseña *
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}"
                               placeholder="ej: Experiencia increíble de caza de perdiz"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8b5e3c] focus:border-transparent"
                               maxlength="255"
                               required>
                    </div>

                    <div class="mt-6">
                        <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">
                            Cuéntanos tu experiencia *
                        </label>
                        <textarea id="content" 
                                  name="content" 
                                  rows="6"
                                  placeholder="Describe tu experiencia de caza, el trato recibido, las instalaciones, la calidad del servicio... (mínimo 50 caracteres)"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8b5e3c] focus:border-transparent resize-none"
                                  required>{{ old('content') }}</textarea>
                        <p class="text-sm text-gray-600 mt-2">Mínimo 50 caracteres</p>
                    </div>
                </div>

                <!-- Aviso -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-semibold text-blue-800">Información importante</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                <p>• Tu reseña será revisada antes de ser publicada</p>
                                <p>• Solo publicamos reseñas verificadas y constructivas</p>
                                <p>• Tu email no será mostrado públicamente</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" 
                            class="flex-1 bg-[#8b5e3c] hover:bg-[#4b5d3a] text-white px-8 py-4 rounded-full font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        Enviar Reseña
                    </button>
                    <a href="{{ route('reviews.index') }}" 
                       class="flex-1 text-center border-2 border-gray-300 text-gray-700 hover:border-gray-400 hover:bg-gray-50 px-8 py-4 rounded-full font-bold text-lg tracking-wide uppercase transition-all duration-300">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </section>

    <script>
        // Manejo de estrellas interactivas
        document.addEventListener('DOMContentLoaded', function() {
            const starButtons = document.querySelectorAll('.star-button');
            const ratingInputs = document.querySelectorAll('input[name="rating"]');

            starButtons.forEach((star, index) => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-rating');
                    
                    // Check the corresponding radio input
                    const radioInput = document.querySelector(`input[name="rating"][value="${rating}"]`);
                    if (radioInput) {
                        radioInput.checked = true;
                    }
                    
                    // Update star colors
                    updateStars(rating);
                });

                star.addEventListener('mouseenter', function() {
                    const rating = this.getAttribute('data-rating');
                    updateStars(rating);
                });
            });

            // Reset stars on mouse leave
            const starsContainer = document.querySelector('.flex.space-x-2');
            starsContainer.addEventListener('mouseleave', function() {
                const checkedInput = document.querySelector('input[name="rating"]:checked');
                if (checkedInput) {
                    updateStars(checkedInput.value);
                } else {
                    updateStars(0);
                }
            });

            function updateStars(rating) {
                starButtons.forEach((star, index) => {
                    const starRating = star.getAttribute('data-rating');
                    if (starRating <= rating) {
                        star.style.color = '#f59e0b';
                    } else {
                        star.style.color = '#d1d5db';
                    }
                });
            }

            // Initialize stars based on old input
            const checkedInput = document.querySelector('input[name="rating"]:checked');
            if (checkedInput) {
                updateStars(checkedInput.value);
            }
        });
    </script>

@endsection
