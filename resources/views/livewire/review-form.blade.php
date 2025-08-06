<div id="review-form" class="bg-gray-50 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <!-- Encabezado -->
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    ✍️ Comparte tu Experiencia
                </h2>
                <p class="text-gray-600">
                    Tu opinión nos ayuda a mejorar y ayuda a otros viajeros a descubrir Los Llanos
                </p>
            </div>

            <!-- Mensajes de estado -->
            @if (session()->has('review_success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('review_success') }}
                </div>
            @endif

            @if (session()->has('review_info'))
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-6">
                    {{ session('review_info') }}
                </div>
            @endif

            @if (session()->has('review_warning'))
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6">
                    {{ session('review_warning') }}
                </div>
            @endif

            <!-- Formulario -->
            <form wire:submit.prevent="submitReview" class="space-y-6">
                <!-- Información personal -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="reviewer_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nombre completo *
                        </label>
                        <input wire:model="reviewer_name" type="text" id="reviewer_name" 
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="Tu nombre completo">
                        @error('reviewer_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="reviewer_email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email (opcional)
                        </label>
                        <input wire:model="reviewer_email" type="email" id="reviewer_email" 
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="tu@email.com">
                        @error('reviewer_email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="reviewer_location" class="block text-sm font-medium text-gray-700 mb-2">
                            Ciudad/País (opcional)
                        </label>
                        <input wire:model="reviewer_location" type="text" id="reviewer_location" 
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="Madrid, España">
                        @error('reviewer_location')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="service_type" class="block text-sm font-medium text-gray-700 mb-2">
                            Tipo de servicio (opcional)
                        </label>
                        <select wire:model="service_type" id="service_type" 
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Seleccionar...</option>
                            <option value="Turismo de Naturaleza">Turismo de Naturaleza</option>
                            <option value="Avistamiento de Aves">Avistamiento de Aves</option>
                            <option value="Safari Fotográfico">Safari Fotográfico</option>
                            <option value="Alojamiento Rural">Alojamiento Rural</option>
                            <option value="Turismo Gastronómico">Turismo Gastronómico</option>
                            <option value="Turismo Cultural">Turismo Cultural</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>

                <!-- Valoración -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Valoración general *
                    </label>
                    <div class="flex items-center space-x-2">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" 
                                    wire:click="$set('rating', {{ $i }})"
                                    class="text-3xl {{ $rating >= $i ? 'text-yellow-400' : 'text-gray-300' }} hover:text-yellow-400 transition-colors">
                                ★
                            </button>
                        @endfor
                        <span class="ml-4 text-sm text-gray-600">
                            ({{ $rating }}/5 - 
                            @switch($rating)
                                @case(1) Muy malo @break
                                @case(2) Malo @break
                                @case(3) Regular @break
                                @case(4) Bueno @break
                                @case(5) Excelente @break
                            @endswitch
                            )
                        </span>
                    </div>
                    @error('rating')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Título de la reseña -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Título de tu reseña *
                    </label>
                    <input wire:model="title" type="text" id="title" 
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Ej: Una experiencia inolvidable en Los Llanos">
                    <p class="mt-1 text-sm text-gray-500">{{ strlen($title) }}/150 caracteres</p>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contenido de la reseña -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Cuéntanos tu experiencia *
                    </label>
                    <textarea wire:model="content" id="content" rows="6" 
                              class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                              placeholder="Describe tu experiencia en Los Llanos: qué te gustó más, qué lugares visitaste, qué recomendarías a otros viajeros..."></textarea>
                    <p class="mt-1 text-sm text-gray-500">{{ strlen($content) }}/1000 caracteres (mínimo 20)</p>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botón de envío -->
                <div class="flex justify-center pt-6">
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-8 rounded-lg transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled">
                        <span wire:loading.remove>
                            🌟 Enviar Reseña
                        </span>
                        <span wire:loading>
                            Enviando...
                        </span>
                    </button>
                </div>

                <!-- Nota sobre moderación -->
                <div class="text-center pt-4">
                    <p class="text-sm text-gray-500">
                        📝 Tu reseña será revisada antes de ser publicada para garantizar la calidad del contenido.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
