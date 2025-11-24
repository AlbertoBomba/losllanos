<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Editar Elemento - {{ $item->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Estilos adicionales para móvil */
        @media (max-width: 640px) {
            .mobile-stack {
                flex-direction: column;
                align-items: stretch !important;
                gap: 0.75rem;
            }
            .mobile-full-width {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-3 sm:px-4 py-4 sm:py-8">
        <div class="max-w-2xl mx-auto">
            <div class="flex items-center gap-3 mb-6 sm:mb-8">
                <a href="{{ route('menu-management.restaurant', $restaurant) }}" 
                   class="text-gray-600 hover:text-gray-800 transition-colors duration-200 p-2 -m-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div class="flex-1 min-w-0">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Editar Elemento</h1>
                    <p class="text-gray-600 text-sm sm:text-base">{{ $restaurant->name }} → {{ $item->menuCategory->name }}</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-4 sm:p-6">
                    <form action="{{ route('menu-management.item.update', [$restaurant, $item]) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nombre del Plato *
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $item->name) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Ej: Paella de mariscos, Solomillo de ternera..."
                                   required>
                            @error('name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Descripción
                            </label>
                            <textarea id="description" 
                                      name="description" 
                                      rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                      placeholder="Descripción del plato, ingredientes principales, forma de preparación...">{{ old('description', $item->description) }}</textarea>
                            @error('description')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                                Precio (€)
                            </label>
                            <input type="number" 
                                   id="price" 
                                   name="price" 
                                   value="{{ old('price', $item->price) }}"
                                   step="0.01"
                                   min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="15.50">
                            <p class="text-sm text-gray-500 mt-1">Dejar vacío si el precio es "Consultar"</p>
                            @error('price')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alérgenos -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Alérgenos</label>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 sm:gap-3">
                                @php
                                $allergens = [
                                    'gluten' => 'Gluten',
                                    'crustaceos' => 'Crustáceos', 
                                    'huevos' => 'Huevos',
                                    'pescado' => 'Pescado',
                                    'cacahuetes' => 'Cacahuetes',
                                    'soja' => 'Soja',
                                    'lacteos' => 'Lácteos',
                                    'frutos_secos' => 'Frutos secos',
                                    'apio' => 'Apio',
                                    'mostaza' => 'Mostaza',
                                    'sesamo' => 'Sésamo',
                                    'sulfitos' => 'Sulfitos',
                                    'altramuces' => 'Altramuces',
                                    'moluscos' => 'Moluscos'
                                ];
                                @endphp
                                @foreach($allergens as $key => $label)
                                    <label class="flex items-center">
                                        <input type="checkbox" 
                                               name="allergens[]" 
                                               value="{{ $key }}"
                                               {{ in_array($key, old('allergens', $item->allergens ?? [])) ? 'checked' : '' }}
                                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-gray-700">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('allergens')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Información dietética -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Información Dietética</label>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 sm:gap-3">
                                @php
                                $dietaryInfo = [
                                    'vegetariano' => 'Vegetariano',
                                    'vegano' => 'Vegano',
                                    'sin_gluten' => 'Sin gluten',
                                    'sin_lactosa' => 'Sin lactosa',
                                    'picante' => 'Picante',
                                    'casero' => 'Casero'
                                ];
                                @endphp
                                @foreach($dietaryInfo as $key => $label)
                                    <label class="flex items-center">
                                        <input type="checkbox" 
                                               name="dietary_info[]" 
                                               value="{{ $key }}"
                                               {{ in_array($key, old('dietary_info', $item->dietary_info ?? [])) ? 'checked' : '' }}
                                               class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-gray-700">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('dietary_info')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Opciones especiales -->
                        <div class="space-y-4">
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="is_special" 
                                       value="1"
                                       {{ old('is_special', $item->is_special) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-yellow-600 shadow-sm focus:border-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm font-medium text-gray-700">Plato especial</span>
                            </label>
                            
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="is_available" 
                                       value="1"
                                       {{ old('is_available', $item->is_available ?? true) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm font-medium text-gray-700">Disponible</span>
                            </label>
                        </div>

                        <div class="flex flex-col sm:flex-row justify-between gap-3 pt-6">
                            <a href="{{ route('menu-management.restaurant', $restaurant) }}" 
                               class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200 text-center">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                Actualizar Elemento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>