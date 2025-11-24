<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Editar Menú Diario - {{ $restaurant->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center gap-4 mb-8">
                <a href="{{ route('menu-management.restaurant', $restaurant) }}" 
                   class="text-gray-600 hover:text-gray-800 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Editar Menú Diario</h1>
                    <p class="text-gray-600 mt-1">{{ $restaurant->name }} → {{ $dailyMenu->name }}</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6">
                    <form action="{{ route('menu-management.daily-menu.update', [$restaurant, $dailyMenu]) }}" method="POST" class="space-y-8">
                        @csrf
                        @method('PUT')
                        
                        <!-- Información básica -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nombre del Menú *
                                </label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name', $dailyMenu->name) }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="Ej: Menú del Día, Menú Ejecutivo..."
                                       required>
                                @error('name')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                                    Precio del Menú Completo (€) *
                                </label>
                                <input type="number" 
                                       id="price" 
                                       name="price" 
                                       value="{{ old('price', $dailyMenu->price) }}"
                                       step="0.01"
                                       min="0"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="15.50"
                                       required>
                                @error('price')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Descripción General del Menú
                            </label>
                            <textarea id="description" 
                                      name="description" 
                                      rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                      placeholder="Descripción del menú, qué incluye, características especiales...">{{ old('description', $dailyMenu->description) }}</textarea>
                            @error('description')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha Específica (opcional)
                            </label>
                            <input type="date" 
                                   id="date" 
                                   name="date" 
                                   value="{{ old('date', $dailyMenu->date ? $dailyMenu->date->format('Y-m-d') : '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <p class="text-sm text-gray-500 mt-1">Dejar vacío para que esté siempre disponible</p>
                            @error('date')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Primeros platos -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Primeros Platos *
                            </label>
                            <div id="first-courses-container" class="space-y-3">
                                @php
                                    $firstCourses = old('first_courses', $dailyMenu->first_courses ?? []);
                                @endphp
                                @if(!empty($firstCourses))
                                    @foreach($firstCourses as $index => $course)
                                        <div class="flex gap-2 course-item">
                                            <input type="text" 
                                                   name="first_courses[]" 
                                                   value="{{ $course }}"
                                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                   placeholder="Nombre del primer plato">
                                            <button type="button" onclick="removeCourse(this)" class="px-3 py-2 text-red-600 hover:text-red-800">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex gap-2 course-item">
                                        <input type="text" 
                                               name="first_courses[]" 
                                               class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                               placeholder="Nombre del primer plato">
                                        <button type="button" onclick="removeCourse(this)" class="px-3 py-2 text-red-600 hover:text-red-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" onclick="addCourse('first-courses-container', 'first_courses')" 
                                    class="mt-3 text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Añadir primer plato
                            </button>
                            @error('first_courses')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Segundos platos -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Segundos Platos *
                            </label>
                            <div id="second-courses-container" class="space-y-3">
                                @php
                                    $secondCourses = old('second_courses', $dailyMenu->second_courses ?? []);
                                @endphp
                                @if(!empty($secondCourses))
                                    @foreach($secondCourses as $index => $course)
                                        <div class="flex gap-2 course-item">
                                            <input type="text" 
                                                   name="second_courses[]" 
                                                   value="{{ $course }}"
                                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                   placeholder="Nombre del segundo plato">
                                            <button type="button" onclick="removeCourse(this)" class="px-3 py-2 text-red-600 hover:text-red-800">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex gap-2 course-item">
                                        <input type="text" 
                                               name="second_courses[]" 
                                               class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                               placeholder="Nombre del segundo plato">
                                        <button type="button" onclick="removeCourse(this)" class="px-3 py-2 text-red-600 hover:text-red-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" onclick="addCourse('second-courses-container', 'second_courses')" 
                                    class="mt-3 text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Añadir segundo plato
                            </button>
                            @error('second_courses')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Postres -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Postres *
                            </label>
                            <div id="desserts-container" class="space-y-3">
                                @php
                                    $desserts = old('desserts', $dailyMenu->desserts ?? []);
                                @endphp
                                @if(!empty($desserts))
                                    @foreach($desserts as $index => $dessert)
                                        <div class="flex gap-2 course-item">
                                            <input type="text" 
                                                   name="desserts[]" 
                                                   value="{{ $dessert }}"
                                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                   placeholder="Nombre del postre">
                                            <button type="button" onclick="removeCourse(this)" class="px-3 py-2 text-red-600 hover:text-red-800">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex gap-2 course-item">
                                        <input type="text" 
                                               name="desserts[]" 
                                               class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                               placeholder="Nombre del postre">
                                        <button type="button" onclick="removeCourse(this)" class="px-3 py-2 text-red-600 hover:text-red-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" onclick="addCourse('desserts-container', 'desserts')" 
                                    class="mt-3 text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Añadir postre
                            </button>
                            @error('desserts')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Bebidas incluidas (opcional) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Bebidas Incluidas (opcional)
                            </label>
                            <div id="drinks-container" class="space-y-3">
                                @php
                                    $drinks = old('drinks', $dailyMenu->drinks ?? []);
                                @endphp
                                @if(!empty($drinks))
                                    @foreach($drinks as $index => $drink)
                                        <div class="flex gap-2 course-item">
                                            <input type="text" 
                                                   name="drinks[]" 
                                                   value="{{ $drink }}"
                                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                   placeholder="Bebida incluida">
                                            <button type="button" onclick="removeCourse(this)" class="px-3 py-2 text-red-600 hover:text-red-800">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" onclick="addCourse('drinks-container', 'drinks')" 
                                    class="mt-3 text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Añadir bebida
                            </button>
                        </div>

                        <!-- Notas adicionales -->
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                                Notas Adicionales
                            </label>
                            <textarea id="notes" 
                                      name="notes" 
                                      rows="2"
                                      maxlength="500"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                      placeholder="Ej: Incluye pan y bebida, Solo de lunes a viernes, etc...">{{ old('notes', $dailyMenu->notes) }}</textarea>
                            <p class="text-sm text-gray-500 mt-1">Máximo 500 caracteres</p>
                            @error('notes')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Estado activo -->
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" value="1" 
                                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                       {{ old('is_active', $dailyMenu->is_active) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm font-medium text-gray-700">Menú activo</span>
                            </label>
                            <p class="text-sm text-gray-500 mt-1">Los menús inactivos no se mostrarán en la carta pública</p>
                        </div>

                        <div class="flex justify-between pt-6">
                            <a href="{{ route('menu-management.restaurant', $restaurant) }}" 
                               class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-6 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors duration-200">
                                Actualizar Menú Diario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addCourse(containerId, fieldName) {
            const container = document.getElementById(containerId);
            const newCourseDiv = document.createElement('div');
            newCourseDiv.className = 'flex gap-2 course-item';
            newCourseDiv.innerHTML = `
                <input type="text" 
                       name="${fieldName}[]" 
                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="${getPlaceholder(fieldName)}">
                <button type="button" onclick="removeCourse(this)" class="px-3 py-2 text-red-600 hover:text-red-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            `;
            container.appendChild(newCourseDiv);
        }

        function removeCourse(button) {
            const container = button.closest('.course-item').parentNode;
            if (container.children.length > 1) {
                button.closest('.course-item').remove();
            }
        }

        function getPlaceholder(fieldName) {
            switch(fieldName) {
                case 'first_courses': return 'Nombre del primer plato';
                case 'second_courses': return 'Nombre del segundo plato';
                case 'desserts': return 'Nombre del postre';
                case 'drinks': return 'Bebida incluida';
                default: return '';
            }
        }
    </script>
</body>
</html>