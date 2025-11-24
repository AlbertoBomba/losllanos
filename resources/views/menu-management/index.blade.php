<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Gestión de Cartas de Restaurante</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Gestión de Cartas de Restaurante</h1>
                    <p class="text-gray-600">Crea y gestiona las cartas de tus restaurantes de forma sencilla</p>
                </div>
                <a href="{{ route('menu-management.restaurant.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Nuevo Restaurante
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if($restaurants->isEmpty())
                <div class="text-center py-16 bg-white rounded-lg shadow-sm">
                    <div class="max-w-md mx-auto">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H5m0 0h2M7 21V5a2 2 0 012-2h8a2 2 0 012 2v16M9 10h6M9 14h6"/>
                        </svg>
                        <h3 class="text-xl font-medium text-gray-900 mb-2">No hay restaurantes creados</h3>
                        <p class="text-gray-600 mb-6">Comienza creando tu primer restaurante para gestionar su carta.</p>
                        <a href="{{ route('menu-management.restaurant.create') }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                            Crear Primer Restaurante
                        </a>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($restaurants as $restaurant)
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-200">
                            @if($restaurant->cover_image)
                                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $restaurant->cover_image }}')"></div>
                            @else
                                <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H5m0 0h2M7 21V5a2 2 0 012-2h8a2 2 0 012 2v16M9 10h6M9 14h6"/>
                                    </svg>
                                </div>
                            @endif
                            
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $restaurant->name }}</h3>
                                @if($restaurant->description)
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $restaurant->description }}</p>
                                @endif
                                
                                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                    <span>{{ $restaurant->menuCategories->count() }} categorías</span>
                                    <span>{{ $restaurant->menuItems->count() }} elementos</span>
                                </div>
                                
                                <div class="flex gap-2">
                                    <a href="{{ route('menu-management.restaurant', $restaurant) }}" 
                                       class="flex-1 bg-blue-50 text-blue-700 hover:bg-blue-100 px-4 py-2 rounded-lg text-sm font-medium text-center transition-colors duration-200">
                                        Gestionar
                                    </a>
                                    <a href="{{ route('menu.show', $restaurant) }}" 
                                       target="_blank"
                                       class="flex-1 bg-green-50 text-green-700 hover:bg-green-100 px-4 py-2 rounded-lg text-sm font-medium text-center transition-colors duration-200">
                                        Ver Carta
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>
</html>