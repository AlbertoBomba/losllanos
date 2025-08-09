@extends('layouts.frontend')

@section('title', 'Tiradas en Finca por Meses - Temporada de Caza | Los Llanos Toledo')
@section('description', 'Organiza tu temporada de caza con nuestras tiradas en finca mes a mes: Octubre, Noviembre, Diciembre, Enero, Febrero y Marzo. Planificación perfecta para toda la temporada.')

@section('content')

    <!-- Hero Section -->
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3]">
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
            <h1 class="text-5xl md:text-7xl font-display font-bold mb-6 leading-tight tracking-wide uppercase">
                Tiradas en Finca
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-3xl mx-auto leading-relaxed font-medium">
                <em class="font-display text-2xl md:text-3xl">Tu temporada de caza perfectamente planificada</em><br><br>
                Organiza tus <strong>tiradas en finca mes a mes</strong> durante toda la temporada. 
                Cada mes ofrece condiciones únicas y experiencias excepcionales.
            </p>
            
            <!-- Quick Stats -->
            <div class="flex flex-col sm:flex-row gap-8 justify-center items-center">
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
                    Temporada Mes a Mes
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-sans leading-relaxed">
                    Cada mes de la temporada ofrece condiciones únicas y oportunidades excepcionales. 
                    Planifica tus tiradas según las mejores características de cada período.
                </p>
            </div>

            <!-- Months Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                
                <!-- Octubre Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                    <!-- Image Container -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/cazador-perdiz-2.webp')}}" 
                             alt="Tiradas en Octubre" 
                             class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-110">
                        
                        <!-- Month Badge -->
                        <div class="absolute top-4 left-4 bg-[#8b5e3c] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Octubre
                        </div>
                        
                        <!-- Temperature Badge -->
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#8b5e3c] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Templado
                        </div>
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Octubre
                        </h3>
                        
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Inicio de temporada</strong> con temperaturas agradables y aves en excelente forma. 
                            Condiciones ideales para comenzar la temporada.
                        </p>
                        
                        <!-- Features -->
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-thermometer-half text-[#8b5e3c] mr-2"></i>
                                <span class="text-gray-700 font-sans">Temperaturas suaves</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-leaf text-[#8b5e3c] mr-2"></i>
                                <span class="text-gray-700 font-sans">Vegetación otoñal</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-star text-[#8b5e3c] mr-2"></i>
                                <span class="text-gray-700 font-sans">Aves en forma óptima</span>
                            </div>
                        </div>
                        
                        <!-- CTA Button -->
                        <button onclick="window.open('tel:+34925123456', '_self')" 
                                class="w-full bg-[#8b5e3c] hover:bg-[#7a5235] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Consultar Octubre
                        </button>
                    </div>
                </div>

                <!-- Noviembre Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                    <!-- Image Container -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/cazador-faisan.webp')}}" 
                             alt="Tiradas en Noviembre" 
                             class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-110">
                        
                        <!-- Month Badge -->
                        <div class="absolute top-4 left-4 bg-[#4b5d3a] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Noviembre
                        </div>
                        
                        <!-- Temperature Badge -->
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#4b5d3a] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Fresco
                        </div>
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Noviembre
                        </h3>
                        
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Mes dorado de la temporada</strong>. Condiciones perfectas con temperaturas frescas 
                            y aves en su mejor momento de actividad.
                        </p>
                        
                        <!-- Features -->
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
                        
                        <!-- CTA Button -->
                        <button onclick="window.open('tel:+34925123456', '_self')" 
                                class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Consultar Noviembre
                        </button>
                    </div>
                </div>

                <!-- Diciembre Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                    <!-- Image Container -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/historia-caza-2.webp')}}" 
                             alt="Tiradas en Diciembre" 
                             class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-110">
                        
                        <!-- Month Badge -->
                        <div class="absolute top-4 left-4 bg-[#059669] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Diciembre
                        </div>
                        
                        <!-- Temperature Badge -->
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#059669] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Frío
                        </div>
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Diciembre
                        </h3>
                        
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Ambiente navideño</strong> en las tiradas. El frío concentra las aves y 
                            proporciona jornadas memorables en un entorno único.
                        </p>
                        
                        <!-- Features -->
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
                        
                        <!-- CTA Button -->
                        <button onclick="window.open('tel:+34925123456', '_self')" 
                                class="w-full bg-[#059669] hover:bg-[#047857] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Consultar Diciembre
                        </button>
                    </div>
                </div>

                <!-- Enero Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                    <!-- Image Container -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/finca.webp')}}" 
                             alt="Tiradas en Enero" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        
                        <!-- Month Badge -->
                        <div class="absolute top-4 left-4 bg-[#6366f1] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Enero
                        </div>
                        
                        <!-- Temperature Badge -->
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#6366f1] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Muy Frío
                        </div>
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Enero
                        </h3>
                        
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Año nuevo, nuevas aventuras</strong>. Las bajas temperaturas hacen que las aves 
                            se comporten de manera predecible, ideal para planificar.
                        </p>
                        
                        <!-- Features -->
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
                        
                        <!-- CTA Button -->
                        <button onclick="window.open('tel:+34925123456', '_self')" 
                                class="w-full bg-[#6366f1] hover:bg-[#5855eb] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Consultar Enero
                        </button>
                    </div>
                </div>

                <!-- Febrero Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                    <!-- Image Container -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/perdiz-volando.webp')}}" 
                             alt="Tiradas en Febrero" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        
                        <!-- Month Badge -->
                        <div class="absolute top-4 left-4 bg-[#dc2626] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Febrero
                        </div>
                        
                        <!-- Temperature Badge -->
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#dc2626] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Frío
                        </div>
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Febrero
                        </h3>
                        
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Mes de transición</strong> hacia la primavera. Las aves comienzan a prepararse 
                            para la época reproductiva, aumentando su actividad.
                        </p>
                        
                        <!-- Features -->
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
                        
                        <!-- CTA Button -->
                        <button onclick="window.open('tel:+34925123456', '_self')" 
                                class="w-full bg-[#dc2626] hover:bg-[#b91c1c] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Consultar Febrero
                        </button>
                    </div>
                </div>

                <!-- Marzo Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105 group">
                    <!-- Image Container -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/cazador-perdiz-2.webp')}}" 
                             alt="Tiradas en Marzo" 
                             class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-110">
                        
                        <!-- Month Badge -->
                        <div class="absolute top-4 left-4 bg-[#f59e0b] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Marzo
                        </div>
                        
                        <!-- Temperature Badge -->
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#f59e0b] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Templado
                        </div>
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Marzo
                        </h3>
                        
                        <p class="text-gray-600 font-sans text-sm mb-4 leading-relaxed">
                            <strong>Final de temporada</strong> con el despertar de la primavera. Últimas oportunidades 
                            para disfrutar de las tiradas antes del período de veda.
                        </p>
                        
                        <!-- Features -->
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
                        
                        <!-- CTA Button -->
                        <button onclick="window.open('tel:+34925123456', '_self')" 
                                class="w-full bg-[#f59e0b] hover:bg-[#d97706] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Consultar Marzo
                        </button>
                    </div>
                </div>
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

    <!-- Testimonial Section -->
    <section class="relative min-h-[60vh] w-full overflow-hidden flex items-center justify-center">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/finca.webp')}}" 
                 alt="Cliente satisfecho tiradas mensuales" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-70 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 container mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto">
                <p class="text-2xl md:text-3xl text-white font-display leading-loose md:leading-loose font-medium italic tracking-wide mb-8">
                    "Planificar las tiradas mes a mes con Los Llanos ha transformado mi temporada de caza. 
                    Cada mes ofrece experiencias únicas y todas han sido memorables."
                </p>
                <div class="text-gray-300 font-sans">
                    - Rafael M., Cliente Habitual desde 2015
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="py-20 bg-[#4b5d3a]">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-display font-bold text-white mb-6 uppercase tracking-wide">
                    Planifica tu Temporada Perfecta
                </h2>
                <p class="text-xl text-gray-200 mb-8 font-sans leading-relaxed">
                    Contacta ahora y organiza tus tiradas en finca para toda la temporada. 
                    Cada mes tiene su momento perfecto para la caza.
                </p>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="window.open('tel:+34925123456', '_self')" 
                            class="bg-white text-[#4b5d3a] hover:bg-gray-100 px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fas fa-phone mr-2"></i>
                        Llamar Ahora: 925 123 456
                    </button>
                    <button onclick="window.open('https://wa.me/34925123456?text=Hola,%20quiero%20información%20sobre%20tiradas%20en%20finca%20por%20meses', '_blank')" 
                            class="border-2 border-white text-white hover:bg-white hover:text-[#4b5d3a] px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105">
                        <i class="fab fa-whatsapp mr-2"></i>
                        Contactar por WhatsApp
                    </button>
                </div>
                
                <div class="mt-8 text-gray-200 font-sans text-sm">
                    <p>📍 <strong>Los Llanos, Toledo</strong> | 🕒 <strong>Temporada Oct-Mar</strong> | 🎯 <strong>6 meses disponibles</strong></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fixed CTA Widget -->
    <div id="ctaWidget" class="fixed right-4 lg:right-6 top-1/2 transform -translate-y-1/2 z-40 opacity-0 invisible transition-all duration-500">
        <div class="bg-gradient-to-br from-[#4b5d3a] to-[#3a4a2c] rounded-2xl shadow-2xl p-4 lg:p-6 w-16 lg:w-64 lg:max-w-xs">
            <!-- Header - Solo en desktop -->
            <div class="hidden lg:block text-center mb-4">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-calendar-alt text-[#4b5d3a] text-xl"></i>
                </div>
                <h3 class="font-display font-bold text-white text-lg uppercase tracking-wide">
                    Tiradas en Finca
                </h3>
                <p class="text-sm text-gray-200 font-sans mt-2 leading-relaxed">
                    ¿Te interesa? Contacta ahora
                </p>
            </div>
            
            <!-- Action Buttons -->
            <div class="space-y-2 lg:space-y-3">
                <button onclick="window.open('tel:+34925123456', '_self')" class="w-full bg-white hover:bg-gray-100 text-[#4b5d3a] p-3 lg:py-3 lg:px-4 rounded-lg font-action font-semibold text-xs lg:text-sm tracking-wide transition-all duration-300 hover:scale-105 shadow-lg flex items-center justify-center" title="Llamar">
                    <i class="fas fa-phone lg:mr-2"></i>
                    <span class="hidden lg:inline">Llamar</span>
                </button>
                <button onclick="window.open('mailto:info@losllanos.com?subject=Consulta Tiradas en Finca - Los Llanos', '_self')" class="w-full bg-[#8b5e3c] hover:bg-[#7a5235] text-white p-3 lg:py-3 lg:px-4 rounded-lg font-action font-semibold text-xs lg:text-sm tracking-wide transition-all duration-300 hover:scale-105 shadow-lg flex items-center justify-center" title="Email">
                    <i class="fas fa-envelope lg:mr-2"></i>
                    <span class="hidden lg:inline">Email</span>
                </button>
                <button onclick="window.open('https://wa.me/34925123456?text=Hola,%20me%20interesan%20las%20tiradas%20en%20finca%20mensuales', '_blank')" class="w-full bg-green-500 hover:bg-green-600 text-white p-3 lg:py-3 lg:px-4 rounded-lg font-action font-semibold text-xs lg:text-sm tracking-wide transition-all duration-300 hover:scale-105 shadow-lg flex items-center justify-center" title="WhatsApp">
                    <i class="fab fa-whatsapp lg:mr-2"></i>
                    <span class="hidden lg:inline">WhatsApp</span>
                </button>
            </div>
            
            <!-- Close Button -->
            <button id="closeCta" class="absolute -top-1 -right-1 lg:-top-2 lg:-right-2 w-5 h-5 lg:w-6 lg:h-6 bg-red-500 hover:bg-red-600 text-white rounded-full flex items-center justify-center text-xs transition-all duration-300">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white w-12 h-12 rounded-full shadow-lg opacity-0 invisible transition-all duration-300">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // CTA Widget functionality
            const ctaWidget = document.getElementById('ctaWidget');
            const closeCta = document.getElementById('closeCta');
            let ctaShown = false;
            let ctaClosed = false;

            function showCtaWidget() {
                if (!ctaClosed && !ctaShown) {
                    ctaWidget.classList.remove('opacity-0', 'invisible');
                    ctaWidget.classList.add('opacity-100', 'visible');
                    ctaShown = true;
                }
            }

            function hideCtaWidget() {
                ctaWidget.classList.add('opacity-0', 'invisible');
                ctaWidget.classList.remove('opacity-100', 'visible');
                ctaClosed = true;
            }

            // Show CTA after scrolling down
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 800) {
                    showCtaWidget();
                }
            });

            // Close CTA widget
            if (closeCta) {
                closeCta.addEventListener('click', hideCtaWidget);
            }

            // Scroll to Top functionality
            const scrollToTopBtn = document.getElementById('scrollToTop');
            
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    scrollToTopBtn.classList.remove('opacity-0', 'invisible');
                    scrollToTopBtn.classList.add('opacity-100', 'visible');
                } else {
                    scrollToTopBtn.classList.add('opacity-0', 'invisible');
                    scrollToTopBtn.classList.remove('opacity-100', 'visible');
                }
            });

            scrollToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>

@endsection
