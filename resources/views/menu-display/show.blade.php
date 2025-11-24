<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Carta - {{ $restaurant->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Crimson+Text:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/rustic-farm" rel="stylesheet">
    <style>
        .font-rustic { font-family: 'Rustic Farm', 'Crimson Text', serif; }
        .font-serif { font-family: 'Rustic Farm', 'Crimson Text', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
        body { 
            background: 
                /* Textura de fondo con madera oscura */
                repeating-linear-gradient(
                    45deg,
                    #2d1b14 0px,
                    #3d2a1f 2px,
                    #2d1b14 4px,
                    #1a0f0a 6px
                ),
                /* Base degradada */
                radial-gradient(ellipse at center, #3d2a1f 0%, #2d1b14 50%, #1a0f0a 100%);
            background-attachment: fixed;
            min-height: 100vh;
        }
        .wood-texture {
            background: 
                /* Vetas de madera */
                repeating-linear-gradient(
                    90deg,
                    #3d2a1f 0px,
                    #4a3728 3px,
                    #5d4133 6px,
                    #6b4e3a 9px,
                    #4a3728 12px,
                    #3d2a1f 15px
                ),
                /* Base de madera envejecida */
                linear-gradient(135deg, 
                    #2d1b14 0%, 
                    #4a3728 15%, 
                    #5d4133 30%, 
                    #6b4e3a 45%, 
                    #4a3728 60%, 
                    #3d2a1f 75%, 
                    #2d1b14 100%
                );
            position: relative;
            box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.3);
        }
        .wood-texture::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                /* Nudos y imperfecciones */
                radial-gradient(ellipse at 20% 30%, rgba(45, 27, 20, 0.8) 0%, transparent 40%),
                radial-gradient(ellipse at 70% 60%, rgba(61, 42, 31, 0.6) 0%, transparent 35%),
                radial-gradient(ellipse at 85% 20%, rgba(45, 27, 20, 0.7) 0%, transparent 30%),
                radial-gradient(ellipse at 15% 80%, rgba(61, 42, 31, 0.5) 0%, transparent 40%),
                /* Vetas adicionales */
                repeating-linear-gradient(
                    88deg,
                    transparent 0px,
                    rgba(139, 69, 19, 0.15) 1px,
                    transparent 2px,
                    transparent 8px,
                    rgba(101, 67, 33, 0.2) 9px,
                    transparent 10px
                ),
                /* Desgaste y pátina */
                repeating-linear-gradient(
                    92deg,
                    transparent 0px,
                    rgba(0, 0, 0, 0.1) 1px,
                    transparent 3px,
                    transparent 12px
                );
            opacity: 0.8;
        }
        .wood-texture::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                /* Manchas de edad */
                radial-gradient(circle at 40% 70%, rgba(101, 67, 33, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 25%, rgba(139, 69, 19, 0.2) 0%, transparent 60%),
                radial-gradient(circle at 10% 45%, rgba(45, 27, 20, 0.4) 0%, transparent 40%),
                /* Textura de grano fino */
                repeating-linear-gradient(
                    89deg,
                    transparent 0px,
                    rgba(210, 180, 140, 0.05) 0.5px,
                    transparent 1px
                );
            opacity: 0.6;
            z-index: 1;
        }
        .parchment {
            background: linear-gradient(135deg, #f4f1e8 0%, #e8dcc0 100%);
            box-shadow: inset 0 0 20px rgba(139, 69, 19, 0.1);
        }
        .vintage-border {
            border: 2px solid #8b4513;
            border-radius: 8px;
            position: relative;
        }
        .vintage-border::before {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border: 1px solid #d2691e;
            border-radius: 10px;
            z-index: -1;
            box-shadow: 
                0 0 15px rgba(139, 69, 19, 0.3),
                inset 0 0 10px rgba(45, 27, 20, 0.2);
        }
        
        /* Efecto de madera envejecida para elementos específicos */
        .aged-wood {
            background: 
                /* Vetas pronunciadas */
                repeating-linear-gradient(
                    0deg,
                    rgba(139, 69, 19, 0.1) 0px,
                    transparent 1px,
                    transparent 3px,
                    rgba(101, 67, 33, 0.15) 4px,
                    transparent 5px,
                    transparent 12px
                ),
                /* Base madera */
                linear-gradient(180deg, #4a3728 0%, #5d4133 50%, #3d2a1f 100%);
            position: relative;
        }
        
        .aged-wood::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                /* Nudos pequeños */
                radial-gradient(ellipse at 25% 40%, rgba(45, 27, 20, 0.6) 0%, transparent 25%),
                radial-gradient(ellipse at 75% 70%, rgba(61, 42, 31, 0.4) 0%, transparent 30%);
            opacity: 0.7;
        }
        
        /* Navegación sticky mejorada */
        #category-nav {
            position: -webkit-sticky !important;
            position: sticky !important;
            top: 0 !important;
            z-index: 9999 !important;
            transition: all 0.3s ease-in-out;
            will-change: transform;
        }
        
        /* Asegurar que el sticky funcione en todos los navegadores */
        @supports (position: sticky) {
            #category-nav {
                position: sticky !important;
            }
        }
        
        /* Fallback para navegadores más antiguos */
        @supports not (position: sticky) {
            #category-nav {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                right: 0 !important;
                width: 100% !important;
            }
        }
        
        .nav-link {
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .nav-link:hover::before {
            left: 100%;
        }
        
        /* Suavizar las transiciones del scroll */
        html {
            scroll-behavior: smooth;
        }
        
        /* Ajustar el offset para las secciones */
        section, div[id] {
            scroll-margin-top: 120px;
        }
        
        /* Mejorar la visibilidad del menú sticky */
        #category-nav.scrolled {
            background: rgba(77, 56, 40, 0.98) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        
        /* Animaciones para el precio del menú */
        @keyframes shimmer {
            0% { transform: translateX(-100%) skewX(-12deg); opacity: 0; }
            50% { opacity: 0.3; }
            100% { transform: translateX(300%) skewX(-12deg); opacity: 0; }
        }
        
        .price-shimmer {
            animation: shimmer 3s infinite;
        }
        
        /* Efecto hover mejorado para el precio */
        .price-container:hover {
            box-shadow: 
                0 0 30px rgba(255, 191, 0, 0.4),
                0 10px 40px rgba(0, 0, 0, 0.4),
                inset 0 0 20px rgba(255, 191, 0, 0.1);
        }
        
        /* Gradiente dorado animado */
        .golden-gradient {
            background: linear-gradient(45deg, #d97706, #fbbf24, #f59e0b, #d97706);
            background-size: 400% 400%;
            animation: gradientShift 4s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="min-h-screen font-sans text-amber-50">
    <!-- Header del restaurante -->
    <div class="wood-texture shadow-2xl border-b-4 border-amber-600" style="box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6), inset 0 0 30px rgba(139, 69, 19, 0.2);">
        <div class="container mx-auto px-4 py-12 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                @if($restaurant->logo)
                    <img src="{{ $restaurant->logo }}" alt="{{ $restaurant->name }}" class="h-24 mx-auto mb-6 filter sepia">
                @endif
                <h1 class="text-5xl md:text-7xl font-rustic font-bold text-amber-100 mb-6 drop-shadow-2xl">{{ $restaurant->name }}</h1>
                @if($restaurant->description)
                    <div class="parchment vintage-border p-6 mb-8 max-w-3xl mx-auto">
                        <p class="text-xl text-amber-900 font-serif leading-relaxed">{{ $restaurant->description }}</p>
                    </div>
                @endif
                
                @if($restaurant->phone || $restaurant->address)
                    <div class="flex flex-wrap justify-center gap-8 text-amber-200">
                        @if($restaurant->phone)
                            <div class="flex items-center gap-3 bg-black bg-opacity-30 px-4 py-2 rounded-lg">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <span class="font-medium">{{ $restaurant->phone }}</span>
                            </div>
                        @endif
                        @if($restaurant->address)
                            <div class="flex items-center gap-3 bg-black bg-opacity-30 px-4 py-2 rounded-lg">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="font-medium">{{ $restaurant->address }}</span>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Navegación de categorías -->
    @if($categories->count() > 1 || $dailyMenus->isNotEmpty())
        <div id="category-nav" class="wood-texture border-b-2 border-amber-700 shadow-xl backdrop-blur-sm" style="position: sticky; top: 0; z-index: 9999; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4), inset 0 0 20px rgba(139, 69, 19, 0.15);">
            <div class="container mx-auto px-4 relative" style="z-index: 10;">
                <nav class="flex justify-center flex-wrap gap-2 md:gap-4 py-4 overflow-x-auto">
                    <!-- Enlace a Menús Diarios si existen -->
                    @if($dailyMenus->isNotEmpty())
                        <a href="#daily-menus" 
                           class="nav-link bg-amber-900 bg-opacity-70 hover:bg-opacity-90 text-amber-100 hover:text-white px-4 py-2 rounded-lg font-rustic font-semibold transition-all duration-300 border border-amber-600 hover:border-amber-400 shadow-md hover:shadow-lg whitespace-nowrap scroll-link"
                           data-target="daily-menus">
                            🍽️ Menús del Día
                        </a>
                    @endif
                    
                    <!-- Enlaces a categorías -->
                    @foreach($categories as $category)
                        <a href="#category-{{ $category->id }}" 
                           class="nav-link bg-amber-900 bg-opacity-70 hover:bg-opacity-90 text-amber-100 hover:text-white px-4 py-2 rounded-lg font-rustic font-semibold transition-all duration-300 border border-amber-600 hover:border-amber-400 shadow-md hover:shadow-lg whitespace-nowrap scroll-link"
                           data-target="category-{{ $category->id }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </nav>
            </div>
        </div>
    @endif

    <!-- Contenido de la carta -->
    <div class="container mx-auto px-4 py-8 max-w-6xl" style="margin-top: 0; padding-top: 2rem;">
        <!-- Menús Diarios -->
        @if($dailyMenus->isNotEmpty())
            <div id="daily-menus" class="mb-16 lg:mb-20 pt-4 px-2 md:px-0">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-rustic font-bold text-amber-100 mb-6 drop-shadow-lg">Menús del Día</h2>
                    <div class="parchment vintage-border p-4 max-w-2xl mx-auto">
                        <p class="text-lg text-amber-900 font-serif">Nuestras propuestas especiales de temporada</p>
                    </div>
                    <div class="w-32 h-1 bg-gradient-to-r from-transparent via-amber-600 to-transparent mx-auto mt-8 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-8 lg:gap-8 mb-8 space-y-8 lg:space-y-0">
                    @foreach($dailyMenus as $dailyMenu)
                        <div class="parchment vintage-border overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:scale-105 mb-12 lg:mb-0 mx-2 md:mx-0 shadow-lg">
                            <div class="wood-texture p-6 md:p-8 text-amber-100 relative z-10" style="box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.3);">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-2xl md:text-3xl font-rustic font-bold mb-2 text-amber-100 drop-shadow-md">{{ $dailyMenu->name }}</h3>
                                        @if($dailyMenu->date)
                                            <p class="text-amber-200 font-serif">{{ $dailyMenu->formatted_date }}</p>
                                        @endif
                                    </div>
                                    <div class="text-right relative">
                                        <!-- Contenedor principal del precio -->
                                        <div class="price-container bg-gradient-to-br from-amber-800 via-amber-900 to-amber-950 p-6 rounded-xl border-2 border-amber-600 shadow-2xl transform hover:scale-105 transition-all duration-300 relative overflow-hidden">
                                            <!-- Efecto de brillo dorado animado -->
                                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-yellow-400 to-transparent opacity-20 price-shimmer"></div>
                                            
                                            <!-- Decoración superior -->
                                            <div class="absolute top-0 left-0 right-0 h-1 golden-gradient"></div>
                                            
                                            <!-- Contenido del precio -->
                                            <div class="relative z-10 text-center">
                                                <!-- Icono decorativo -->
                                                <div class="flex justify-center mb-2">
                                                    <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                                
                                                <!-- Precio principal -->
                                                <div class="text-4xl md:text-5xl font-bold text-yellow-100 mb-1 drop-shadow-lg font-rustic">
                                                    {{ $dailyMenu->formatted_price }}
                                                </div>
                                                
                                                <!-- Línea separadora decorativa -->
                                                <div class="flex items-center justify-center mb-2">
                                                    <div class="h-px golden-gradient w-20 rounded-full shadow-lg"></div>
                                                </div>
                                                
                                                <!-- Texto descriptivo -->
                                                <div class="text-amber-200 text-sm font-rustic uppercase tracking-wider">
                                                    Menú Completo
                                                </div>
                                            </div>
                                            
                                            <!-- Decoración inferior -->
                                            <div class="absolute bottom-0 left-0 right-0 h-1 golden-gradient"></div>
                                        </div>
                                    </div>
                                </div>
                                @if($dailyMenu->description)
                                    <div class="bg-black bg-opacity-30 p-4 mt-4 rounded-lg border border-amber-600">
                                        <p class="text-amber-100 font-serif leading-relaxed">{{ $dailyMenu->description }}</p>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="p-6 md:p-8 space-y-6 md:space-y-8 bg-white">
                                <!-- Primeros platos -->
                                <div>
                                    <h4 class="text-2xl font-rustic font-bold text-gray-900 mb-4 flex items-center border-b border-gray-300 pb-3">
                                        <span class="bg-gray-800 text-white text-base px-4 py-2 rounded-lg mr-4 font-sans">1º</span>
                                        Primeros Platos
                                    </h4>
                                    <div class="grid grid-cols-1 gap-4">
                                        @foreach($dailyMenu->first_courses as $course)
                                            <div class="flex items-center text-gray-800 bg-gray-50 p-4 rounded-lg border border-gray-200 shadow-sm">
                                                <svg class="w-6 h-6 text-green-600 mr-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="font-sans text-lg">{{ $course }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Segundos platos -->
                                <div>
                                    <h4 class="text-2xl font-rustic font-bold text-gray-900 mb-4 flex items-center border-b border-gray-300 pb-3">
                                        <span class="bg-gray-800 text-white text-base px-4 py-2 rounded-lg mr-4 font-sans">2º</span>
                                        Segundos Platos
                                    </h4>
                                    <div class="grid grid-cols-1 gap-4">
                                        @foreach($dailyMenu->second_courses as $course)
                                            <div class="flex items-center text-gray-800 bg-gray-50 p-4 rounded-lg border border-gray-200 shadow-sm">
                                                <svg class="w-6 h-6 text-blue-600 mr-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="font-sans text-lg">{{ $course }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Postres -->
                                <div>
                                    <h4 class="text-2xl font-rustic font-bold text-gray-900 mb-4 flex items-center border-b border-gray-300 pb-3">
                                        <svg class="w-7 h-7 text-pink-600 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                        Postres
                                    </h4>
                                    <div class="grid grid-cols-1 gap-4">
                                        @foreach($dailyMenu->desserts as $dessert)
                                            <div class="flex items-center text-gray-800 bg-gray-50 p-4 rounded-lg border border-gray-200 shadow-sm">
                                                <svg class="w-6 h-6 text-purple-600 mr-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="font-sans text-lg">{{ $dessert }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Bebidas incluidas -->
                                @if($dailyMenu->drinks && count($dailyMenu->drinks) > 0)
                                    <div class="border-t border-gray-300 pt-6">
                                        <h4 class="text-xl font-serif font-bold text-gray-900 mb-4">Incluye:</h4>
                                        <div class="flex flex-wrap gap-3">
                                            @foreach($dailyMenu->drinks as $drink)
                                                <span class="bg-blue-100 text-blue-800 text-base px-4 py-2 rounded-lg font-sans border border-blue-300">{{ $drink }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Notas -->
                                @if($dailyMenu->notes)
                                    <div class="border-t border-gray-300 pt-6">
                                        <div class="bg-yellow-50 border-2 border-yellow-300 rounded-lg p-5 shadow-sm">
                                            <p class="text-gray-800 font-sans text-lg leading-relaxed">{{ $dailyMenu->notes }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Separador entre menús diarios (solo móvil) -->
                        @if(!$loop->last)
                            <div class="lg:hidden flex items-center justify-center py-6 mb-4">
                                <div class="flex items-center w-full max-w-xs">
                                    <div class="flex-grow h-px bg-gradient-to-r from-transparent via-amber-400 to-amber-600"></div>
                                    <div class="mx-4 text-amber-400">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="flex-grow h-px bg-gradient-to-r from-amber-600 via-amber-400 to-transparent"></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        @if($categories->isEmpty() && $dailyMenus->isEmpty())
            <div class="text-center py-16">
                <div class="parchment vintage-border p-8 max-w-md mx-auto">
                    <svg class="w-16 h-16 text-amber-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <h3 class="text-xl font-serif font-bold text-amber-900 mb-2">Carta en construcción</h3>
                    <p class="text-amber-800 font-serif">La carta de este restaurante se está preparando con mucho cariño.</p>
                </div>
            </div>
        @elseif($categories->isNotEmpty())
            @foreach($categories as $index => $category)
                <div id="category-{{ $category->id }}" class="mb-20 {{ $index > 0 ? 'pt-12' : '' }}">
                    <!-- Cabecera de la categoría -->
                    <div class="text-center mb-12">
                        <h2 class="text-4xl md:text-5xl font-rustic font-bold text-amber-100 mb-6 drop-shadow-lg">{{ $category->name }}</h2>
                        @if($category->description)
                            <div class="parchment vintage-border p-4 max-w-2xl mx-auto">
                                <p class="text-lg text-amber-900 font-serif leading-relaxed">{{ $category->description }}</p>
                            </div>
                        @endif
                        <div class="w-32 h-1 bg-gradient-to-r from-transparent via-amber-600 to-transparent mx-auto mt-8 rounded-full"></div>
                    </div>

                    <!-- Elementos de la categoría -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        @foreach($category->activeMenuItems as $item)
                            <div class="group relative">
                                <div class="parchment vintage-border p-6 hover:shadow-2xl transition-all duration-500 transform hover:scale-105 h-full">
                                    <!-- Contenido del elemento -->
                                    <div class="bg-white p-4 rounded-lg mb-4 border border-gray-200 shadow-sm">
                                        <div class="flex justify-between items-start mb-3">
                                            <h3 class="text-2xl md:text-3xl font-rustic font-bold text-gray-900 flex-1 pr-4 leading-tight">
                                                {{ $item->name }}
                                                @if($item->is_special)
                                                    <span class="inline-block ml-2">
                                                        <svg class="w-6 h-6 text-amber-600 inline" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                        </svg>
                                                    </span>
                                                @endif
                                            </h3>
                                            @if($item->price)
                                                <div class="text-right bg-gray-800 text-white px-4 py-3 rounded-lg shadow-md">
                                                    <span class="text-2xl md:text-3xl font-bold font-sans">{{ $item->formatted_price }}</span>
                                                </div>
                                            @else
                                                <div class="text-right bg-gray-600 text-white px-4 py-3 rounded-lg shadow-md">
                                                    <span class="text-xl font-sans">Consultar</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    @if($item->description)
                                        <div class="bg-white p-4 rounded-lg border border-amber-300 mb-6 shadow-sm">
                                            <p class="text-gray-800 font-sans text-lg leading-relaxed">{{ $item->description }}</p>
                                        </div>
                                    @endif

                                    <!-- Información adicional -->
                                    <div class="space-y-4">
                                        <!-- Info dietética -->
                                        @if($item->dietary_info && count($item->dietary_info) > 0)
                                            <div class="bg-white p-4 rounded-lg border border-gray-200 mb-4">
                                                <div class="flex flex-wrap gap-3">
                                                    @foreach($item->dietary_info as $info)
                                                        @php
                                                        $dietaryLabels = [
                                                            'vegetariano' => ['🌱 Vegetariano', 'bg-green-100 text-green-800 border-green-300'],
                                                            'vegano' => ['🌿 Vegano', 'bg-green-100 text-green-800 border-green-300'],
                                                            'sin_gluten' => ['🌾 Sin gluten', 'bg-blue-100 text-blue-800 border-blue-300'],
                                                            'sin_lactosa' => ['🥛 Sin lactosa', 'bg-purple-100 text-purple-800 border-purple-300'],
                                                            'picante' => ['🌶️ Picante', 'bg-red-100 text-red-800 border-red-300'],
                                                            'casero' => ['🏠 Casero', 'bg-amber-100 text-amber-800 border-amber-300']
                                                        ];
                                                        $label = $dietaryLabels[$info] ?? [$info, 'bg-gray-100 text-gray-800 border-gray-300'];
                                                        @endphp
                                                        <span class="px-4 py-2 text-sm font-sans font-semibold rounded-lg border {{ $label[1] }}">
                                                            {{ $label[0] }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Alérgenos -->
                                        @if($item->allergens && count($item->allergens) > 0)
                                            <div class="bg-white border border-orange-200 p-4 rounded-lg">
                                                <p class="text-base text-gray-800 font-sans font-semibold mb-3">⚠️ Contiene alérgenos:</p>
                                                <div class="flex flex-wrap gap-2">
                                                    @foreach($item->allergens as $allergen)
                                                        @php
                                                        $allergenLabels = [
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
                                                        <span class="px-3 py-1 text-sm bg-orange-50 text-orange-800 rounded-lg border border-orange-300 font-sans">
                                                            {{ $allergenLabels[$allergen] ?? $allergen }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Footer -->
    <footer class="wood-texture border-t-4 border-amber-600 mt-20" style="box-shadow: 0 -15px 30px rgba(0, 0, 0, 0.4), inset 0 0 25px rgba(139, 69, 19, 0.2);">
        <div class="container mx-auto px-4 py-12 relative z-10">
            <div class="text-center">
                @if($restaurant->website || $restaurant->email)
                    <div class="flex flex-wrap justify-center gap-8 mb-6">
                        @if($restaurant->website)
                            <a href="{{ $restaurant->website }}" target="_blank" 
                               class="bg-black bg-opacity-30 hover:bg-opacity-50 text-amber-200 hover:text-amber-100 px-4 py-2 rounded-lg transition-all duration-300 font-serif font-medium">
                                🌐 Sitio web
                            </a>
                        @endif
                        @if($restaurant->email)
                            <a href="mailto:{{ $restaurant->email }}" 
                               class="bg-black bg-opacity-30 hover:bg-opacity-50 text-amber-200 hover:text-amber-100 px-4 py-2 rounded-lg transition-all duration-300 font-serif font-medium">
                                📧 {{ $restaurant->email }}
                            </a>
                        @endif
                    </div>
                @endif
                
                <div class="flex justify-center">
                    <a href="{{ route('menu.pdf', $restaurant) }}" 
                       class="bg-amber-800 hover:bg-amber-700 text-amber-100 px-6 py-3 rounded-lg font-rustic font-semibold transition-all duration-300 flex items-center gap-3 border-2 border-amber-600 hover:border-amber-400 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        📜 Descargar carta completa
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            const sections = [];
            
            // Recopilar todas las secciones
            navLinks.forEach(link => {
                const targetId = link.getAttribute('data-target');
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    sections.push({
                        id: targetId,
                        element: targetElement,
                        link: link
                    });
                }
            });

            // Función para actualizar el enlace activo
            function updateActiveLink() {
                const navHeight = document.getElementById('category-nav')?.offsetHeight || 100;
                const scrollTop = window.pageYOffset;
                
                let activeSection = null;
                
                // Encontrar la sección actual
                sections.forEach(section => {
                    const sectionTop = section.element.offsetTop - navHeight - 20;
                    const sectionBottom = sectionTop + section.element.offsetHeight;
                    
                    if (scrollTop >= sectionTop && scrollTop < sectionBottom) {
                        activeSection = section;
                    }
                });
                
                // Si estamos cerca del final de la página, activar la última sección
                if (!activeSection && sections.length > 0) {
                    const lastSection = sections[sections.length - 1];
                    const docHeight = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
                    const windowHeight = window.innerHeight;
                    
                    if (scrollTop + windowHeight >= docHeight - 100) {
                        activeSection = lastSection;
                    }
                }
                
                // Actualizar clases activas
                sections.forEach(section => {
                    if (section === activeSection) {
                        section.link.classList.remove('bg-amber-900', 'bg-opacity-70');
                        section.link.classList.add('bg-amber-600', 'bg-opacity-90', 'border-amber-300', 'shadow-lg', 'scale-105');
                    } else {
                        section.link.classList.remove('bg-amber-600', 'bg-opacity-90', 'border-amber-300', 'shadow-lg', 'scale-105');
                        section.link.classList.add('bg-amber-900', 'bg-opacity-70');
                    }
                });
            }

            // Navegación suave para el scroll
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('data-target');
                    const targetElement = document.getElementById(targetId);
                    
                    if (targetElement) {
                        const navHeight = document.getElementById('category-nav')?.offsetHeight || 100;
                        const elementPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - navHeight - 10;
                        
                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                        
                        // Actualizar inmediatamente el enlace activo
                        setTimeout(updateActiveLink, 500);
                    }
                });
            });

            // Escuchar el scroll para actualizar el enlace activo
            let ticking = false;
            function onScroll() {
                if (!ticking) {
                    requestAnimationFrame(function() {
                        updateActiveLink();
                        ticking = false;
                    });
                    ticking = true;
                }
            }
            
            window.addEventListener('scroll', onScroll);
            
            // Actualizar al cargar la página
            updateActiveLink();

            // Mejorar el comportamiento sticky
            const categoryNav = document.getElementById('category-nav');
            if (categoryNav) {
                // Forzar el comportamiento sticky desde el inicio
                categoryNav.style.position = 'sticky';
                categoryNav.style.top = '0';
                categoryNav.style.zIndex = '9999';
                
                let lastScrollTop = 0;
                
                function handleScroll() {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    
                    // Añadir clase para mejorar la visibilidad cuando se hace scroll
                    if (scrollTop > 50) {
                        categoryNav.classList.add('scrolled', 'shadow-2xl');
                        if (!categoryNav.style.background.includes('rgba')) {
                            categoryNav.style.background = 'rgba(77, 56, 40, 0.98)';
                        }
                    } else {
                        categoryNav.classList.remove('scrolled', 'shadow-2xl');
                        categoryNav.style.background = '';
                    }
                    
                    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
                }
                
                // Usar tanto scroll como resize para asegurar compatibilidad
                window.addEventListener('scroll', handleScroll, { passive: true });
                window.addEventListener('resize', handleScroll, { passive: true });
                
                // Ejecutar una vez al cargar
                handleScroll();
            }
        });
    </script>
</body>
</html>