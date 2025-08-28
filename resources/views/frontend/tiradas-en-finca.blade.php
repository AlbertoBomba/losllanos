@extends('layouts.frontend')

@section('title', '[ cazar perdices y faisanes ] Los Llanos Toledo ✔️')
@section('description', '⭐ Temporada de caza. Nuestras tiradas en finca mes a mes: Octubre, Noviembre, Diciembre, Enero, Febrero y Marzo. 
Además coto de caza intensivo de codornices.')

@section('content')

    <!-- Hero Section -->
    <section class="relative min-h-[50vh] sm:min-h-[60vh] lg:min-h-[70vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3] p-2 sm:p-4">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/finca.webp')}}" 
                 alt="Tiradas en finca Los Llanos" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-6 max-w-4xl mx-auto pt-20">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-display font-bold mb-6 leading-tight tracking-wide uppercase">
               Cazar perdices y faisanes.
            </h1>
            <!--description short-->
            <p class="hidden sm:block text-xl md:text-2xl mb-8 text-gray-200 max-w-3xl mx-auto leading-relaxed font-medium">
                Organiza tus <strong>jornadas en nuestro coto de caza de perdices y faisanes,</strong> 
            </p>
            <!-- Quick Stats -->
            <div class="hidden sm:flex flex-col sm:flex-row gap-8 justify-center items-center">
                <div class="text-center">
                    <div class="text-3xl font-display font-bold text-[#8b5e3c] mb-1">6</div>
                    <div class="text-gray-200 font-sans text-sm">Meses disponibles</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-display font-bold text-[#8b5e3c] mb-1">Oct-Mar</div>
                    <div class="text-gray-200 font-sans text-sm">Temporada completa</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-display font-bold text-[#8b5e3c] mb-1">100%</div>
                    <div class="text-gray-200 font-sans text-sm">Garantizado</div>
                </div>
            </div>
             <!-- CTA Button -->
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center p-4">
                <button onclick="window.open('tel:+34608910639', '_self')" 
                        class="bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white px-6 sm:px-8 py-3 sm:py-4 rounded-full font-action font-bold text-base sm:text-lg tracking-wide uppercase transition-all duration-300 shadow-lg">
                    <i class="fas fa-phone mr-2"></i>
                    Reservar puesto
                </button>
                <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20información%20sobre%20codornices%20comunes', '_blank')" 
                        class="border-2 border-white text-white hover:bg-white hover:text-gray-900 px-6 sm:px-8 py-3 sm:py-4 rounded-full font-action font-bold text-base sm:text-lg tracking-wide uppercase transition-all duration-300">
                    <i class="fab fa-whatsapp mr-2"></i>
                    WhatsApp
                </button>
            </div>
        </div>
    </section>

    <!-- Main Months Section -->
    <section class="py-20 bg-[#f5f1e3] relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-image-pattern opacity-5" 
                 style="background-image: url('{{asset('images/general/historia-caza-2.webp')}}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
            <div class="absolute inset-0 bg-[#f5f1e3] bg-opacity-90"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-dark mb-4 uppercase tracking-wide font-display">
                    Tipo de sueltas
                </h2>
                 <!-- Description type suelta -->
                <p class="hidden sm:block text-xl text-gray-600 max-w-3xl mx-auto font-sans leading-relaxed">
                    Cada mes de la temporada ofrece condiciones únicas y oportunidades excepcionales. 
                    Planifica tus tiradas según las mejores características de cada período, 
                    y el tipo de animal que deseas cazar.
                </p>
            </div>

            <!-- Months Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                {{-- coto intensivo codorniz Card --}}
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 group">
                  
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/codornices.webp')}}" 
                             alt="Codornices en la cebabada" 
                             class="w-full h-full object-cover object-top transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-[#8b5e3c] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Coto intensivo
                        </div>
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#8b5e3c] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Codorniz
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Codornices
                        </h3>
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Amplias parcelas sembradas de cereal</strong> perfectas para disfrutar de una buena jornada.
                        </p>
                        <div class="flex items-center justify-center w-full">
                            <a href="{{route('productos.Sueltas.coto-de-caza-intensiva')}}" class="w-full text-center bg-[#8b5e3c] hover:bg-[#7a5235] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 shadow-lg">
                                <i class="fas fa-calendar mr-2"></i>
                                Consultar 
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Sueltas de Perdices Card --}}
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 group">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/cazador-perdiz-2.webp')}}" 
                             alt="Sueltas de perdices Los Llanos" 
                             class="w-full h-full object-cover object-center transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-[#4b5d3a] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Temporada
                        </div>
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#4b5d3a] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Oct-Mar
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Sueltas de Perdices
                        </h3>
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Tiradas programadas en finca</strong> con perdices y faisanes. Jornadas completas con comida incluida.
                        </p>
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-calendar-alt text-[#4b5d3a] mr-2"></i>
                                <span class="text-gray-700 font-sans">Fechas programadas</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-utensils text-[#4b5d3a] mr-2"></i>
                                <span class="text-gray-700 font-sans">Comida incluida</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-users text-[#4b5d3a] mr-2"></i>
                                <span class="text-gray-700 font-sans">Hasta 23 puestos</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <a href="{{route('productos.Sueltas.suelta-de-perdices')}}" class="w-full text-center bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 shadow-lg">
                                <i class="fas fa-calendar mr-2"></i>
                                Calendario y precios
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Sueltas de faisanes Card --}}
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 group">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/cazador-faisan.webp')}}" 
                             alt="Sueltas de faisanes Los Llanos" 
                             class="w-full h-full object-cover object-center transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-[#f59e0b] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Temporada
                        </div>
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#f59e0b] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Oct-Mar
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Sueltas de faisanes
                        </h3>
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Tiradas programadas en finca</strong> con faisanes de gran porte. Jornadas completas con comida incluida.
                        </p>
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-calendar-alt text-[#f59e0b] mr-2"></i>
                                <span class="text-gray-700 font-sans">Fechas programadas</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-utensils text-[#f59e0b] mr-2"></i>
                                <span class="text-gray-700 font-sans">Comida incluida</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-users text-[#f59e0b] mr-2"></i>
                                <span class="text-gray-700 font-sans">Hasta 23 puestos</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <a href="{{route('productos.Sueltas.suelta-de-faisanes')}}" class="w-full text-center bg-[#f59e0b] hover:bg-[#d97706] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 shadow-lg">
                                <i class="fas fa-calendar mr-2"></i>
                                Calendario y precios
                            </a>
                        </div>
                    </div>
                </div>

                
                {{-- <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                   
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/cazador-faisan.webp')}}" 
                             alt="Tiradas en Noviembre" 
                             class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-110">
                        
                      
                        <div class="absolute top-4 left-4 bg-[#4b5d3a] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Noviembre
                        </div>
                        
                       
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#4b5d3a] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Fresco
                        </div>
                        
                       
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Noviembre
                        </h3>
                        
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Mes dorado de la temporada</strong>. Condiciones perfectas con temperaturas frescas 
                            y aves en su mejor momento de actividad.
                        </p>
                        
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-crown text-[#4b5d3a] mr-2"></i>
                                <span class="text-gray-700 font-sans">Mes dorado</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-wind text-[#4b5d3a] mr-2"></i>
                                <span class="text-gray-700 font-sans">Vientos favorables</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-bullseye text-[#4b5d3a] mr-2"></i>
                                <span class="text-gray-700 font-sans">Máxima actividad</span>
                            </div>
                        </div>
                        
                        <button onclick="window.open('tel:+34608910639', '_self')" 
                                class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Consultar Noviembre
                        </button>
                    </div>
                </div> --}}

                <!-- Diciembre Card -->
                {{-- <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                  
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/historia-caza-2.webp')}}" 
                             alt="Tiradas en Diciembre" 
                             class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-110">
                        
                        
                        <div class="absolute top-4 left-4 bg-[#059669] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Diciembre
                        </div>
                        
                       
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#059669] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Frío
                        </div>
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    
                    
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Diciembre
                        </h3>
                        
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Ambiente navideño</strong> en las tiradas. El frío concentra las aves y 
                            proporciona jornadas memorables en un entorno único.
                        </p>
                        
                        
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-snowflake text-[#059669] mr-2"></i>
                                <span class="text-gray-700 font-sans">Ambiente invernal</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-gift text-[#059669] mr-2"></i>
                                <span class="text-gray-700 font-sans">Temporada especial</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-crosshairs text-[#059669] mr-2"></i>
                                <span class="text-gray-700 font-sans">Aves concentradas</span>
                            </div>
                        </div>
                        
                        <button onclick="window.open('tel:+34608910639', '_self')" 
                                class="w-full bg-[#059669] hover:bg-[#047857] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Consultar Diciembre
                        </button>
                    </div>
                </div> --}}

                <!-- Enero Card -->
                {{-- <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                    
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/finca.webp')}}" 
                             alt="Tiradas en Enero" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        
                       
                        <div class="absolute top-4 left-4 bg-[#6366f1] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Enero
                        </div>
                        
                        
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#6366f1] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Muy Frío
                        </div>
                        
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    
                   
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Enero
                        </h3>
                        
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Año nuevo, nuevas aventuras</strong>. Las bajas temperaturas hacen que las aves 
                            se comporten de manera predecible, ideal para planificar.
                        </p>
                        
                       
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-calendar-alt text-[#6366f1] mr-2"></i>
                                <span class="text-gray-700 font-sans">Nuevo año</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-icicles text-[#6366f1] mr-2"></i>
                                <span class="text-gray-700 font-sans">Temperaturas bajas</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-route text-[#6366f1] mr-2"></i>
                                <span class="text-gray-700 font-sans">Vuelos predecibles</span>
                            </div>
                        </div>
                        
                        <!-
                        <button onclick="window.open('tel:+34608910639', '_self')" 
                                class="w-full bg-[#6366f1] hover:bg-[#5855eb] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Consultar Enero
                        </button>
                    </div>
                </div> --}}

                <!-- Febrero Card -->
                {{-- <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                   
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/perdiz-volando.webp')}}" 
                             alt="Tiradas en Febrero" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        
                       
                        <div class="absolute top-4 left-4 bg-[#dc2626] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Febrero
                        </div>
                        
                       
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#dc2626] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Frío
                        </div>
                        
                       
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    
                    
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Febrero
                        </h3>
                        
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Mes de transición</strong> hacia la primavera. Las aves comienzan a prepararse 
                            para la época reproductiva, aumentando su actividad.
                        </p>
                        
                        
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-heart text-[#dc2626] mr-2"></i>
                                <span class="text-gray-700 font-sans">Mes del amor</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-seedling text-[#dc2626] mr-2"></i>
                                <span class="text-gray-700 font-sans">Preparación primaveral</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-chart-line text-[#dc2626] mr-2"></i>
                                <span class="text-gray-700 font-sans">Mayor actividad</span>
                            </div>
                        </div>
                        
                        
                        <button onclick="window.open('tel:+34608910639', '_self')" 
                                class="w-full bg-[#dc2626] hover:bg-[#b91c1c] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Consultar Febrero
                        </button>
                    </div>
                </div> --}}

                <!-- Marzo Card -->
                {{-- <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                   
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/cazador-perdiz-2.webp')}}" 
                             alt="Tiradas en Marzo" 
                             class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-110">
                        
                       
                        <div class="absolute top-4 left-4 bg-[#f59e0b] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Marzo
                        </div>
                        
                       
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#f59e0b] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Templado
                        </div>
                        
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    
                   
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Marzo
                        </h3>
                        
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Final de temporada</strong> con el despertar de la primavera. Últimas oportunidades 
                            para disfrutar de las tiradas antes del período de veda.
                        </p>
                        
                       
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-flag-checkered text-[#f59e0b] mr-2"></i>
                                <span class="text-gray-700 font-sans">Final temporada</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-sun text-[#f59e0b] mr-2"></i>
                                <span class="text-gray-700 font-sans">Llegada primavera</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-clock text-[#f59e0b] mr-2"></i>
                                <span class="text-gray-700 font-sans">Últimas oportunidades</span>
                            </div>
                        </div>
                        
                       
                        <button onclick="window.open('tel:+34608910639', '_self')" 
                                class="w-full bg-[#f59e0b] hover:bg-[#d97706] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Consultar Marzo
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Why Choose Monthly Planning Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                    ¿Por Qué Planificar Mes a Mes?
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-sans leading-relaxed">
                    Cada mes de la temporada ofrece condiciones únicas que influyen en el comportamiento de las aves 
                    y en la experiencia de caza.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Advantage 1 -->
                <div class="bg-[#f5f1e3] rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[#4b5d3a] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-check text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                        Planificación Perfecta
                    </h3>
                    <p class="text-gray-600 font-sans leading-relaxed">
                        Organiza tu temporada completa conociendo las ventajas específicas 
                        de cada mes para maximizar tus jornadas de caza.
                    </p>
                </div>

                <!-- Advantage 2 -->
                <div class="bg-[#f5f1e3] rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-thermometer-three-quarters text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                        Condiciones Óptimas
                    </h3>
                    <p class="text-gray-600 font-sans leading-relaxed">
                        Cada mes presenta condiciones climáticas y de terreno específicas 
                        que afectan directamente al éxito de las tiradas.
                    </p>
                </div>

                <!-- Advantage 3 -->
                <div class="bg-[#f5f1e3] rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[#059669] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-bullseye text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                        Mejores Resultados
                    </h3>
                    <p class="text-gray-600 font-sans leading-relaxed">
                        Adaptamos nuestras estrategias a las características de cada mes 
                        para garantizar experiencias excepcionales.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal de Aviso -->
    <div id="calendarioModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <!-- Overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-75 transition-opacity"></div>
        
        <!-- Modal Content -->
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl max-w-lg w-full mx-4 transform transition-all">
                <!-- Header -->
                <div class=" bg-gray-900 p-6 rounded-t-2xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                        </div>
                        <button onclick="closeModal()" class="text-white hover:text-yellow-300 transition-colors">
                            <i class="fas fa-times text-2xl"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Body -->
                <div class=" bg-gray-900">
                    <div class="container mx-auto px-2">
                        <div class="max-w-4xl mx-auto text-center">
                            <h2 class="text-4xl font-display font-bold text-white mb-4 uppercase tracking-wide">
                                Calendario no disponible
                            </h2>
                            <p class="text-xl text-gray-200 mb-8 font-sans leading-relaxed">
                                Aun no tenemos las fechas confirmadas, para la temporada 25/26. Si quieres recibir en su mail
                                nuestro calendario, suscríbete
                            </p>
                            <div class="max-w-2xl mx-auto">
                                @livewire('newsletter-hero')
                                <p class="text-gray-300 text-sm mt-4 font-sans">
                                    * No compartimos tu información. Puedes darte de baja en cualquier momento.
                                </p> 
                            </div>
                        </div>
                    </div>
                   

                    <!-- Botones de acción -->
                    <div class="space-y-3 p-4">
                        <button onclick="closeModal()" 
                                class="w-full border-2 border-gray-300 text-white hover:bg-gray-50 py-2 px-6 rounded-lg font-semibold tracking-wide transition-all duration-300">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Funciones del modal
        function openModal() {
            document.getElementById('calendarioModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevenir scroll del body
        }
        
        function closeModal() {
            document.getElementById('calendarioModal').classList.add('hidden');
            document.body.style.overflow = 'auto'; // Restaurar scroll del body
        }
        
        // Cerrar modal al hacer clic fuera de él
        document.getElementById('calendarioModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
        
        // Cerrar modal con tecla Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
        
        // Abrir modal automáticamente al cargar la página (después de 1.5 segundos)
        //window.addEventListener('load', function() {
        //    setTimeout(function() {
        //        openModal();
        //    }, 1500);
        // });
    </script>

@endsection
