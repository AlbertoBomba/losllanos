<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>{{ $restaurant->name }} - Gestión de Carta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
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
            .mobile-text-center {
                text-align: center;
            }
            .mobile-hidden {
                display: none;
            }
            .mobile-show {
                display: block;
            }
        }
        @media (min-width: 641px) {
            .mobile-show {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-3 sm:px-4 py-4 sm:py-8">
        <div class="max-w-6xl mx-auto">
            <!-- Header responsive -->
            <div class="mb-6 sm:mb-8">
                <!-- Navegación back y título -->
                <div class="flex items-center gap-3 mb-4">
                    <a href="{{ route('menu-management.index') }}" 
                       class="text-gray-600 hover:text-gray-800 transition-colors duration-200 p-2 -m-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                    <div class="flex-1 min-w-0">
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 truncate">{{ $restaurant->name }}</h1>
                        <p class="text-gray-600 text-sm sm:text-base">Gestiona la carta de tu restaurante</p>
                    </div>
                </div>

                <!-- Botones de acción - Layout responsive -->
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
                    <a href="{{ route('menu.show', $restaurant) }}" 
                       target="_blank"
                       class="bg-green-600 hover:bg-green-700 text-white px-4 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center gap-2 text-sm sm:text-base">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Ver Carta Pública
                    </a>
                    <a href="{{ route('menu-management.daily-menu.create', $restaurant) }}" 
                       class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center gap-2 text-sm sm:text-base">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4M8 7H3a1 1 0 00-1 1v9a2 2 0 002 2h12a2 2 0 002-2V8a1 1 0 00-1-1h-5M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7"/>
                        </svg>
                        <span class="hidden sm:inline">Nuevo </span>Menú Diario
                    </a>
                    <a href="{{ route('menu-management.category.create', $restaurant) }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center gap-2 text-sm sm:text-base">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span class="hidden sm:inline">Nueva </span>Categoría
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if($restaurant->menuCategories->isEmpty())
                <div class="text-center py-12 sm:py-16 bg-white rounded-lg shadow-sm">
                    <div class="max-w-md mx-auto px-4">
                        <svg class="w-12 h-12 sm:w-16 sm:h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <h3 class="text-lg sm:text-xl font-medium text-gray-900 mb-2">No hay categorías creadas</h3>
                        <p class="text-gray-600 mb-6 text-sm sm:text-base">Comienza creando categorías para organizar tu carta.</p>
                        <a href="{{ route('menu-management.category.create', $restaurant) }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 text-sm sm:text-base">
                            Crear Primera Categoría
                        </a>
                    </div>
                </div>
            @else
                <div class="space-y-6" id="categories-container">
                    @foreach($restaurant->menuCategories as $category)
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden" data-category-id="{{ $category->id }}">
                            <!-- Header de categoría responsive -->
                            <div class="bg-gray-50 px-4 sm:px-6 py-4 border-b border-gray-200">
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
                                    <!-- Título y drag handle -->
                                    <div class="flex items-center gap-3">
                                        <div class="cursor-move hidden sm:block">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $category->name }}</h3>
                                            @if($category->description)
                                                <p class="text-sm text-gray-600 mt-1">{{ $category->description }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <!-- Botones de acción -->
                                    <div class="flex items-center gap-2 sm:gap-2">
                                        <a href="{{ route('menu-management.item.create', [$restaurant, $category]) }}" 
                                           class="bg-blue-50 text-blue-700 hover:bg-blue-100 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                            </svg>
                                            <span class="hidden sm:inline">Añadir </span>Elemento
                                        </a>
                                        <form action="{{ route('menu-management.category.delete', $category) }}" method="POST" class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                    onclick="showDeleteModal(this.closest('form'), '{{ $category->name }}', 'Categoría')"
                                                    class="bg-red-50 hover:bg-red-100 text-red-700 hover:text-red-800 px-3 py-2 sm:p-2 rounded-lg transition-colors duration-200 flex items-center gap-1.5 text-sm font-medium border border-red-200"
                                                    title="Eliminar categoría">
                                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                <span class="hidden sm:inline">Eliminar</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Contenido de categoría responsive -->
                            <div class="p-4 sm:p-6">
                                @if($category->menuItems->isEmpty())
                                    <div class="text-center py-6 sm:py-8">
                                        <p class="text-gray-500 mb-4 text-sm sm:text-base">No hay elementos en esta categoría</p>
                                        <a href="{{ route('menu-management.item.create', [$restaurant, $category]) }}" 
                                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 inline-flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                            </svg>
                                            Añadir Primer Elemento
                                        </a>
                                    </div>
                                @else
                                    <!-- Grid responsive de elementos -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4" data-items-container="{{ $category->id }}">
                                        @foreach($category->menuItems as $item)
                                            <div class="border border-gray-200 rounded-lg p-3 sm:p-4 hover:shadow-sm transition-shadow duration-200" data-item-id="{{ $item->id }}">
                                                <!-- Header del elemento con botón eliminar -->
                                                <div class="flex justify-between items-start mb-3">
                                                    <div class="flex-1 min-w-0">
                                                        <h4 class="font-semibold text-gray-900 text-sm sm:text-base leading-tight">{{ $item->name }}</h4>
                                                        
                                                        <!-- Badges en móvil -->
                                                        <div class="flex flex-wrap gap-1 mt-2">
                                                            @if($item->is_special)
                                                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Especial</span>
                                                            @endif
                                                            @if(!$item->is_available)
                                                                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">No disponible</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Botón eliminar - más claro para desktop -->
                                                    <form action="{{ route('menu-management.item.delete', $item) }}" method="POST" class="ml-2 hidden sm:inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" 
                                                                onclick="showDeleteModal(this.closest('form'), '{{ $item->name }}', 'Plato')"
                                                                class="bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-700 p-1.5 rounded border border-red-200 transition-colors duration-200"
                                                                title="Eliminar plato">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                                
                                                <!-- Descripción -->
                                                @if($item->description)
                                                    <p class="text-xs sm:text-sm text-gray-600 mb-2 leading-relaxed">{{ $item->description }}</p>
                                                @endif
                                                
                                                <!-- Precio -->
                                                @if($item->price)
                                                    <p class="text-base sm:text-lg font-bold text-gray-900 mb-2">{{ $item->formatted_price }}</p>
                                                @endif
                                                
                                                <!-- Alérgenos -->
                                                @if($item->allergens && count($item->allergens) > 0)
                                                    <div class="mt-2 pt-2 border-t border-gray-100">
                                                        <p class="text-xs text-gray-500">
                                                            <span class="font-medium">Alérgenos:</span> {{ implode(', ', array_slice($item->allergens, 0, 3)) }}@if(count($item->allergens) > 3)...@endif
                                                        </p>
                                                    </div>
                                                @endif
                                                
                                                <!-- Botones de acción móvil - más claros -->
                                                <div class="mt-3 pt-3 border-t border-gray-100 sm:hidden">
                                                    <div class="flex flex-col gap-2">
                                                        <a href="{{ route('menu-management.item.edit', [$restaurant, $item]) }}" 
                                                           class="bg-blue-50 hover:bg-blue-100 text-blue-700 hover:text-blue-800 px-3 py-2.5 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2 text-sm font-medium border border-blue-200">
                                                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                            </svg>
                                                            Editar Plato
                                                        </a>
                                                        <form action="{{ route('menu-management.item.delete', $item) }}" method="POST" class="inline delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" 
                                                                    onclick="showDeleteModal(this.closest('form'), '{{ $item->name }}', 'Plato')"
                                                                    class="w-full bg-red-50 hover:bg-red-100 text-red-700 hover:text-red-800 px-3 py-2.5 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2 text-sm font-medium border border-red-200">
                                                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                                </svg>
                                                                Eliminar Plato
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Sección de Menús Diarios responsive -->
            <div class="mt-8 sm:mt-12">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Menús Diarios</h2>
                    <a href="{{ route('menu-management.daily-menu.create', $restaurant) }}" 
                       class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center gap-2 text-sm sm:text-base">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span class="hidden sm:inline">Nuevo </span>Menú Diario
                    </a>
                </div>

                @if($restaurant->dailyMenus->isEmpty())
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 sm:p-8 text-center">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4M8 7H3a1 1 0 00-1 1v9a2 2 0 002 2h12a2 2 0 002-2V8a1 1 0 00-1-1h-5M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7"/>
                        </svg>
                        <h3 class="text-base sm:text-lg font-medium text-gray-900 mb-2">No hay menús diarios creados</h3>
                        <p class="text-gray-600 mb-4 text-sm sm:text-base">Crea menús diarios con estructura de primeros, segundos y postres.</p>
                        <a href="{{ route('menu-management.daily-menu.create', $restaurant) }}" 
                           class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-3 rounded-lg font-medium transition-colors duration-200 text-sm sm:text-base">
                            Crear Primer Menú Diario
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                        @foreach($restaurant->dailyMenus as $dailyMenu)
                            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                                <div class="p-4 sm:p-6">
                                    <!-- Header del menú diario responsive -->
                                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-4 gap-3">
                                        <div class="flex-1 min-w-0">
                                            <div class="flex flex-col sm:flex-row sm:items-center gap-2 mb-2">
                                                <h3 class="text-lg font-semibold text-gray-900">{{ $dailyMenu->name }}</h3>
                                                
                                                <!-- Badges -->
                                                <div class="flex flex-wrap gap-2">
                                                    @if($dailyMenu->date && $dailyMenu->is_for_today)
                                                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Hoy</span>
                                                    @elseif($dailyMenu->date)
                                                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">{{ $dailyMenu->formatted_date }}</span>
                                                    @endif
                                                    @if(!$dailyMenu->is_active)
                                                        <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Inactivo</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <p class="text-xl sm:text-2xl font-bold text-orange-600">{{ $dailyMenu->formatted_price }}</p>
                                        </div>
                                        
                                        <!-- Botones de acción responsive -->
                                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 sm:gap-2 sm:mt-0">
                                            <!-- Botón editar - más claro en móvil -->
                                            <a href="{{ route('menu-management.daily-menu.edit', [$restaurant, $dailyMenu]) }}" 
                                               class="bg-blue-50 hover:bg-blue-100 text-blue-700 hover:text-blue-800 px-3 py-2 sm:p-2 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2 text-sm font-medium border border-blue-200">
                                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                <span class="sm:hidden">Editar Menú</span>
                                            </a>
                                            
                                            <!-- Botón eliminar - más claro en móvil -->
                                            <form action="{{ route('menu-management.daily-menu.delete', $dailyMenu) }}" method="POST" class="inline w-full sm:w-auto delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        onclick="showDeleteModal(this.closest('form'), '{{ $dailyMenu->name }}', 'Menú Diario')"
                                                        class="w-full sm:w-auto bg-red-50 hover:bg-red-100 text-red-700 hover:text-red-800 px-3 py-2 sm:p-2 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2 text-sm font-medium border border-red-200">
                                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    <span class="sm:hidden">Eliminar</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    @if($dailyMenu->description)
                                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">{{ $dailyMenu->description }}</p>
                                    @endif

                                    <!-- Secciones del menú responsive -->
                                    <div class="space-y-4">
                                        <!-- Primeros platos -->
                                        <div class="bg-gray-50 p-3 rounded-lg">
                                            <h4 class="text-sm font-semibold text-gray-800 mb-2 flex items-center gap-2">
                                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">1º</span>
                                                Primeros Platos
                                            </h4>
                                            <div class="grid grid-cols-1 gap-1">
                                                @foreach($dailyMenu->first_courses as $course)
                                                    <div class="text-sm text-gray-700 bg-white px-2 py-1 rounded">• {{ $course }}</div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Segundos platos -->
                                        <div class="bg-gray-50 p-3 rounded-lg">
                                            <h4 class="text-sm font-semibold text-gray-800 mb-2 flex items-center gap-2">
                                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">2º</span>
                                                Segundos Platos
                                            </h4>
                                            <div class="grid grid-cols-1 gap-1">
                                                @foreach($dailyMenu->second_courses as $course)
                                                    <div class="text-sm text-gray-700 bg-white px-2 py-1 rounded">• {{ $course }}</div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Postres -->
                                        <div class="bg-gray-50 p-3 rounded-lg">
                                            <h4 class="text-sm font-semibold text-gray-800 mb-2 flex items-center gap-2">
                                                <span class="bg-pink-100 text-pink-800 text-xs px-2 py-1 rounded">🍰</span>
                                                Postres
                                            </h4>
                                            <div class="grid grid-cols-1 gap-1">
                                                @foreach($dailyMenu->desserts as $dessert)
                                                    <div class="text-sm text-gray-700 bg-white px-2 py-1 rounded">• {{ $dessert }}</div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Bebidas incluidas -->
                                        @if($dailyMenu->drinks && count($dailyMenu->drinks) > 0)
                                            <div class="bg-blue-50 p-3 rounded-lg">
                                                <h4 class="text-sm font-semibold text-blue-800 mb-2 flex items-center gap-2">
                                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">🥤</span>
                                                    Bebidas Incluidas
                                                </h4>
                                                <div class="grid grid-cols-1 gap-1">
                                                    @foreach($dailyMenu->drinks as $drink)
                                                        <div class="text-sm text-blue-700 bg-white px-2 py-1 rounded">• {{ $drink }}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Notas -->
                                    @if($dailyMenu->notes)
                                        <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                                            <div class="flex items-start gap-2">
                                                <svg class="w-4 h-4 text-yellow-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                <p class="text-sm text-yellow-800 leading-relaxed">{{ $dailyMenu->notes }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal de confirmación para eliminar -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center p-4 z-50 hidden">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 transform transition-all">
            <!-- Header del modal -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Confirmar Eliminación</h3>
                </div>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Contenido del modal -->
            <div class="p-6">
                <div class="mb-4">
                    <p class="text-gray-700 text-sm leading-relaxed mb-3">
                        ¿Estás seguro de que deseas eliminar el siguiente elemento?
                    </p>
                    <div class="bg-red-50 border-l-4 border-red-400 p-3 rounded">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-red-800" id="deleteItemName">
                                    <!-- Se llenará dinámicamente -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-3 rounded mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-800" id="deleteWarningText">
                                <strong>¡Atención!</strong> Esta acción no se puede deshacer.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones del modal -->
            <div class="flex items-center justify-end gap-3 px-6 py-4 bg-gray-50 rounded-b-lg">
                <button id="cancelDelete" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    Cancelar
                </button>
                <button id="confirmDelete" class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                    Sí, Eliminar
                </button>
            </div>
        </div>
    </div>

    <script>
        // Variables globales para el modal
        let currentDeleteForm = null;
        let currentItemName = '';

        // Funciones del modal de confirmación
        function showDeleteModal(form, itemName, itemType = 'elemento') {
            currentDeleteForm = form;
            currentItemName = itemName;
            
            // Actualizar el contenido del modal
            document.getElementById('deleteItemName').textContent = `${itemType}: ${itemName}`;
            
            // Actualizar el texto de advertencia según el tipo
            const warningElement = document.getElementById('deleteWarningText');
            let warningText = '<strong>¡Atención!</strong> Esta acción no se puede deshacer.';
            
            if (itemType === 'Categoría') {
                warningText = '<strong>¡CUIDADO!</strong> Al eliminar esta categoría, todos los platos que contenga también serán eliminados. Esta acción no se puede deshacer.';
            } else if (itemType === 'Menú Diario') {
                warningText = '<strong>¡Atención!</strong> Se eliminará el menú diario completo con todos sus platos. Esta acción no se puede deshacer.';
            }
            
            warningElement.innerHTML = warningText;
            
            // Mostrar el modal
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            // Agregar clase para la animación
            setTimeout(() => {
                modal.querySelector('.bg-white').classList.add('scale-100');
            }, 10);
        }

        function hideDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            currentDeleteForm = null;
            currentItemName = '';
        }

        function confirmDeleteAction() {
            if (currentDeleteForm) {
                // Crear input hidden para indicar que es confirmado
                const confirmedInput = document.createElement('input');
                confirmedInput.type = 'hidden';
                confirmedInput.name = 'confirmed';
                confirmedInput.value = '1';
                currentDeleteForm.appendChild(confirmedInput);
                
                // Enviar el formulario
                currentDeleteForm.submit();
            }
            hideDeleteModal();
        }

        // Event listeners para el modal
        document.addEventListener('DOMContentLoaded', function() {
            // Botón cerrar modal (X)
            document.getElementById('closeModal').addEventListener('click', hideDeleteModal);
            
            // Botón cancelar
            document.getElementById('cancelDelete').addEventListener('click', hideDeleteModal);
            
            // Botón confirmar eliminación
            document.getElementById('confirmDelete').addEventListener('click', confirmDeleteAction);
            
            // Cerrar modal al hacer click en el fondo
            document.getElementById('deleteModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    hideDeleteModal();
                }
            });
            
            // Cerrar modal con tecla Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !document.getElementById('deleteModal').classList.contains('hidden')) {
                    hideDeleteModal();
                }
            });
        });

        // Funcionalidad de drag & drop para reordenar categorías
        const categoriesContainer = document.getElementById('categories-container');
        if (categoriesContainer) {
            new Sortable(categoriesContainer, {
                animation: 150,
                ghostClass: 'opacity-50',
                onEnd: function(evt) {
                    updateOrder();
                }
            });
        }

        function updateOrder() {
            const items = [];
            
            // Recopilar orden de categorías
            document.querySelectorAll('[data-category-id]').forEach((element, index) => {
                const categoryId = element.getAttribute('data-category-id');
                items.push({
                    type: 'category',
                    id: categoryId,
                    order: index
                });
            });

            // Enviar al servidor
            fetch('{{ route('menu-management.update-order') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ items: items })
            });
        }
    </script>
</body>
</html>