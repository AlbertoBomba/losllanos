@extends('layouts.frontend')

@section('title', 'Aves de Caza  | Los Llanos')
@section('description', 'Venta de aves de caza de máxima calidad: perdices, faisanes, codornices y palomas. Certificados sanitarios incluidos, transporte especializado. Más de 30 años de experiencia.')

@section('content')

    <!-- Hero Section -->
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3] pt-32 ">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/perdiz-volando.webp')}}" 
                 alt="Aves de caza Los Llanos" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-6 max-w-4xl mx-auto pt-20">
            <h1 class="text-5xl md:text-7xl font-display font-bold mb-6 leading-tight tracking-wide uppercase">
                Aves de Caza
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-3xl mx-auto leading-relaxed font-medium">
                <em class="font-display text-2xl md:text-3xl">Calidad garantizada desde 1992</em><br><br>
                Ofrecemos <strong>todas nuestras aves de caza</strong> de la máxima calidad, 
                criadas en libertad con todos los certificados sanitarios y garantía de origen.
            </p>
            
            <!-- Quick Stats -->
            <div class="flex flex-col sm:flex-row gap-8 justify-center items-center">
                <div class="text-center">
                    <div class="text-3xl font-display font-bold text-[#8b5e3c] mb-1">4</div>
                    <div class="text-gray-200 font-sans text-sm">Especies disponibles</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-display font-bold text-[#8b5e3c] mb-1">365</div>
                    <div class="text-gray-200 font-sans text-sm">Días al año</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-display font-bold text-[#8b5e3c] mb-1">100%</div>
                    <div class="text-gray-200 font-sans text-sm">Certificadas</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Birds Section -->
    <section class="py-20 bg-[#f5f1e3] relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-image-pattern opacity-5" 
                 style="background-image: url('{{asset('images/general/finca.webp')}}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
            <div class="absolute inset-0 bg-[#f5f1e3] bg-opacity-90"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-dark mb-4 uppercase tracking-wide font-display">
                    Nuestras Aves de Caza
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-sans leading-relaxed">
                    Cada especie es criada con el máximo cuidado, siguiendo estrictos protocolos de calidad. 
                    Todas nuestras aves incluyen certificados sanitarios y garantía de origen.
                </p>
            </div>

            <!-- Birds Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
                
                <!-- Perdices Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105">
                    <!-- Image Container with Rotating Images -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/perdiz-volando.webp')}}" 
                             alt="Perdices para suelta" 
                             class="bird-image active w-full h-full object-cover transition-opacity duration-1000"
                             data-category="perdices">
                        <img src="{{asset('images/general/cazador-perdiz-2.webp')}}" 
                             alt="Cazador con perdices" 
                             class="bird-image absolute inset-0 w-full h-full object-cover object-top transition-opacity duration-1000 opacity-0"
                             data-category="perdices">
                        
                        <!-- Species Badge -->
                        <div class="absolute top-4 left-4 bg-[#8b5e3c] text-white px-3 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Perdices
                        </div>
                        
                        <!-- Season Badge -->
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#8b5e3c] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Oct-Mar
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Perdices Rojas
                        </h3>
                        {{-- <p class="text-gray-600 mb-4 font-sans leading-relaxed">
                            La especie más demandada para sueltas. <strong>Perdices rojas de primera calidad</strong>, 
                            criadas en semi-libertad para mantener sus instintos naturales.
                        </p> --}}
                        
                        <!-- Features List -->
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-[#8b5e3c] mr-2 text-xs"></i>
                                <span class="font-sans">Criadas en semi-libertad</span>
                            </div>
                            <div class="flex items-center text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-[#8b5e3c] mr-2 text-xs"></i>
                                <span class="font-sans">Excelente vuelo y supervivencia</span>
                            </div>
                            <div class="flex items-center text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-[#8b5e3c] mr-2 text-xs"></i>
                                <span class="font-sans">Certificado sanitario incluido</span>
                            </div>
                        </div>
                        <!-- Price and Action -->
                        <div class="flex justify-between items-center mb-4">
                            <div class="text-xl font-display font-bold text-[#8b5e3c]">Precio a consultar </div>
                            <div class="text-gray-500 text-sm font-sans"></div>
                        </div>
                        <button class="w-full bg-[#8b5e3c] hover:bg-[#7a5235] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            Consultar 
                        </button>
                    </div>
                </div>

                <!-- Faisanes Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105">
                    <!-- Image Container with Rotating Images -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/cazador-faisan.webp')}}" 
                             alt="Faisanes para suelta" 
                             class="bird-image active w-full h-full object-cover object-top transition-opacity duration-1000"
                             data-category="faisanes">
                        <img src="{{asset('images/general/historia-caza-2.webp')}}" 
                             alt="Faisanes en el campo" 
                             class="bird-image absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0"
                             data-category="faisanes">
                        {{-- <img src="{{asset('images/general/finca.webp')}}" 
                             alt="Entorno natural faisanes" 
                             class="bird-image absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0"
                             data-category="faisanes"> --}}
                        
                        <!-- Species Badge -->
                        <div class="absolute top-4 left-4 bg-[#4b5d3a] text-white px-3 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Faisanes
                        </div>
                        
                        <!-- Season Badge -->
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#4b5d3a] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Oct - Mar
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Faisanes Comunes
                        </h3>
                        {{-- <p class="text-gray-600 mb-4 font-sans leading-relaxed">
                            <strong>Faisanes de gran porte y belleza</strong>, ideales para sueltas en fincas 
                            y cotos. Proporcionan lances espectaculares y gran satisfacción al cazador.
                        </p> --}}
                        
                        <!-- Features List -->
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-[#4b5d3a] mr-2 text-xs"></i>
                                <span class="font-sans">Gran porte y vistosidad</span>
                            </div>
                            <div class="flex items-center text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-[#4b5d3a] mr-2 text-xs"></i>
                                <span class="font-sans">Vuelo potente y directo</span>
                            </div>
                            <div class="flex items-center text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-[#4b5d3a] mr-2 text-xs"></i>
                                <span class="font-sans">Adaptación excelente al terreno</span>
                            </div>
                        </div>
                        
                        <!-- Price and Action -->
                        <div class="flex justify-between items-center mb-4">
                            <div class="text-xl font-display font-bold text-[#4b5d3a]">Precio a consultar</div>
                            <div class="text-gray-500 text-sm font-sans"></div>
                        </div>
                        
                        <button class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            Consultar
                        </button>
                    </div>
                </div>

                <!-- Codornices Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105">
                    <!-- Image Container with Rotating Images -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/codornices.webp')}}" 
                             alt="Codornices para suelta" 
                             class="bird-image active w-full h-full object-cover transition-opacity duration-1000"
                             data-category="codornices">
                        <img src="{{asset('images/general/codorniz-volando.webp')}}" 
                             alt="Codorniz volando" 
                             class="bird-image absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0"
                             data-category="codornices">
                        {{-- <img src="{{asset('images/general/cazador-codorniz.webp')}}" 
                             alt="Cazador con codornices" 
                             class="bird-image absolute inset-0 w-full h-full object-cover object-top transition-opacity duration-1000 opacity-0"
                             data-category="codornices"> --}}
                        
                        <!-- Species Badge -->
                        <div class="absolute top-4 left-4 bg-[#6b7280] text-white px-3 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Codornices
                        </div>
                        
                        <!-- Season Badge -->
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#6b7280] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Todo el año
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Codornices
                        </h3>
                        {{-- <p class="text-gray-600 mb-4 font-sans leading-relaxed">
                            <strong>Codornices de excelente calidad</strong>, perfectas para entrenamientos 
                            de perros y sueltas en parcelas. Vuelo característico y gran deportividad.
                        </p> --}}
                        
                        <!-- Features List -->
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-[#6b7280] mr-2 text-xs"></i>
                                <span class="font-sans">Perfectas para entrenamientos</span>
                            </div>
                            <div class="flex items-center text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-[#6b7280] mr-2 text-xs"></i>
                                <span class="font-sans">Vuelo rápido y característico</span>
                            </div>
                            <div class="flex items-center text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-[#6b7280] mr-2 text-xs"></i>
                                <span class="font-sans">Ideal para sueltas en parcelas</span>
                            </div>
                        </div>
                        
                        <!-- Price and Action -->
                        <div class="flex justify-between items-center mb-4">
                            <div class="text-xl font-display font-bold text-[#6b7280]">Precio a consultar</div>
                            <div class="text-gray-500 text-sm font-sans"></div>
                        </div>
                        
                        <button class="w-full bg-[#6b7280] hover:bg-[#5b6370] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            Consultar
                        </button>
                    </div>
                </div>

                <!-- Palomas Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105">
                    <!-- Image Container with Rotating Images -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{asset('images/general/paloma-volando.webp')}}" 
                             alt="Palomas para suelta" 
                             class="bird-image active w-full h-full object-cover transition-opacity duration-1000"
                             data-category="palomas">
                        <img src="{{asset('images/general/padre-hijo-cazando-perdices.webp')}}" 
                             alt="Caza de palomas" 
                             class="bird-image absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0"
                             data-category="palomas">
                        {{-- <img src="{{asset('images/general/finca.webp')}}" 
                             alt="Entorno natural palomas" 
                             class="bird-image absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0"
                             data-category="palomas"></img> --}}

                        <!-- Species Badge -->
                        <div class="absolute top-4 left-4 bg-[#059669] text-white px-3 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Palomas
                        </div>
                        
                        <!-- Season Badge -->
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#059669] px-3 py-1 rounded-full font-display font-bold text-xs">
                            Consultar disponibilidad
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                            Palomas Zurita
                        </h3>
                        {{-- <p class="text-gray-600 mb-4 font-sans leading-relaxed">
                            <strong>Palomas zurita de gran calidad</strong>, conocidas por su vuelo potente 
                            y velocidad. Ideales para sueltas que requieren gran deportividad.
                        </p> --}}
                        
                        <!-- Features List -->
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-[#059669] mr-2 text-xs"></i>
                                <span class="font-sans">Vuelo potente y veloz</span>
                            </div>
                            <div class="flex items-center text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-[#059669] mr-2 text-xs"></i>
                                <span class="font-sans">Gran resistencia y adaptación</span>
                            </div>
                            <div class="flex items-center text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-[#059669] mr-2 text-xs"></i>
                                <span class="font-sans">Máxima deportividad</span>
                            </div>
                        </div>
                        
                        <!-- Price and Action -->
                        <div class="flex justify-between items-center mb-4">
                            <div class="text-2xl font-display font-bold text-[#059669]">Precio a consultar</div>
                            <div class="text-gray-500 text-sm font-sans"></div>
                        </div>
                        
                        <button class="w-full bg-[#059669] hover:bg-[#047857] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            Consultar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                    Servicios Incluidos
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-sans leading-relaxed">
                    Ofrecemos un servicio completo que va más allá de la simple venta de aves. 
                    Todo lo necesario para que tu experiencia sea perfecta.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Service 1 -->
                <div class="text-center p-8 bg-[#f5f1e3] rounded-2xl hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-[#4b5d3a] rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-certificate text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                        Certificación Sanitaria
                    </h3>
                    <p class="text-gray-600 font-sans leading-relaxed">
                        Todas nuestras aves incluyen los certificados sanitarios correspondientes y 
                        cumplen con la normativa vigente.
                    </p>
                </div>

                <!-- Service 2 -->
                <div class="text-center p-8 bg-[#f5f1e3] rounded-2xl hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                        Transporte Especializado
                    </h3>
                    <p class="text-gray-600 font-sans leading-relaxed">
                        Disponemos de vehículos especializados para el transporte seguro de las aves 
                        hasta tu destino.
                    </p>
                </div>

                <!-- Service 3 -->
                <div class="text-center p-8 bg-[#f5f1e3] rounded-2xl hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-[#059669] rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-tie text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-dark mb-3 uppercase tracking-wide">
                        Asesoramiento Técnico
                    </h3>
                    <p class="text-gray-600 font-sans leading-relaxed">
                        Nuestros expertos te asesoran sobre la mejor elección según tus necesidades 
                        y el tipo de suelta.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Quote Section -->
    <section class="relative min-h-[60vh] w-full overflow-hidden flex items-center justify-center">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/padre-hijo-cazando-perdices.webp')}}" 
                 alt="Tradición familiar en Los Llanos" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-70 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 container mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto">
                <p class="text-2xl md:text-3xl text-white font-display leading-loose md:leading-loose font-medium italic tracking-wide">
                    "La calidad de nuestras aves es el resultado de más de 30 años de dedicación y experiencia. 
                    Cada ave que sale de nuestras instalaciones lleva consigo nuestra pasión por la caza y 
                    el compromiso con la excelencia."
                </p>
                <div class="mt-8 text-gray-300 font-sans">
                    - Emilio Bomba, Fundador
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA Section -->
    <section class="py-20 bg-[#f5f1e3]">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-display font-bold text-dark mb-6 uppercase tracking-wide">
                    ¿Necesitas Aves de Caza?
                </h2>
                <p class="text-xl text-gray-600 mb-8 font-sans leading-relaxed">
                    Contacta con nosotros para consultar disponibilidad, precios y condiciones. 
                    Te ayudamos a elegir las aves más adecuadas para tu suelta.
                </p>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="window.open('tel:+34925123456', '_self')" 
                            class="bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fas fa-phone mr-2"></i>
                        Llamar Ahora
                    </button>
                    <button onclick="window.open('mailto:info@losllanos.com?subject=Consulta Aves de Caza - Los Llanos', '_self')" 
                            class="border-2 border-[#4b5d3a] text-[#4b5d3a] hover:bg-[#4b5d3a] hover:text-white px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105">
                        <i class="fas fa-envelope mr-2"></i>
                        Enviar Email
                    </button>
                    <button onclick="window.open('https://wa.me/34925123456?text=Hola,%20me%20interesa%20información%20sobre%20aves%20de%20caza', '_blank')" 
                            class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fab fa-whatsapp mr-2"></i>
                        WhatsApp
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Fixed CTA Widget -->
    <div id="ctaWidget" class="fixed right-4 lg:right-6 top-1/2 transform -translate-y-1/2 z-40 opacity-0 invisible transition-all duration-500">
        <div class="bg-gradient-to-br from-[#4b5d3a] to-[#3a4a2c] rounded-2xl shadow-2xl p-4 lg:p-6 w-16 lg:w-64 lg:max-w-xs">
            <!-- Header - Solo en desktop -->
            <div class="hidden lg:block text-center mb-4">
                <div class="w-12 h-12 bg-[#8b5e3c] rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-crosshairs text-white text-xl"></i>
                </div>
                <h3 class="font-display font-bold text-white text-lg uppercase tracking-wide">
                    ¿Interesado?
                </h3>
                <p class="text-sm text-gray-200 font-sans mt-2 leading-relaxed">
                    Contacta con nuestros expertos
                </p>
            </div>
            
            <!-- Action Buttons -->
            <div class="space-y-2 lg:space-y-3">
                <!-- Móvil: Solo iconos | Desktop: Botones completos -->
                <button onclick="window.open('tel:+34925123456', '_self')" class="w-full bg-[#8b5e3c] hover:bg-[#7a5235] text-white p-3 lg:py-3 lg:px-4 rounded-lg font-action font-semibold text-xs lg:text-sm tracking-wide transition-all duration-300 hover:scale-105 shadow-lg flex items-center justify-center" title="Llamar">
                    <i class="fas fa-phone lg:mr-2"></i>
                    <span class="hidden lg:inline">Llamar</span>
                </button>
                <button onclick="window.open('mailto:info@losllanos.com?subject=Consulta Aves de Caza - Los Llanos', '_self')" class="w-full bg-white hover:bg-gray-100 text-[#4b5d3a] p-3 lg:py-3 lg:px-4 rounded-lg font-action font-semibold text-xs lg:text-sm tracking-wide transition-all duration-300 hover:scale-105 shadow-lg flex items-center justify-center" title="Enviar Email">
                    <i class="fas fa-envelope lg:mr-2"></i>
                    <span class="hidden lg:inline">Email</span>
                </button>
                <button onclick="window.open('https://wa.me/34925123456?text=Hola,%20me%20interesa%20información%20sobre%20aves%20de%20caza', '_blank')" class="w-full bg-green-500 hover:bg-green-600 text-white p-3 lg:py-3 lg:px-4 rounded-lg font-action font-semibold text-xs lg:text-sm tracking-wide transition-all duration-300 hover:scale-105 shadow-lg flex items-center justify-center" title="WhatsApp">
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

    <!-- JavaScript for Image Rotation and Widget -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image rotation functionality for bird cards
            function rotateBirdImages() {
                const categories = ['perdices', 'faisanes', 'codornices', 'palomas'];
                
                categories.forEach(category => {
                    const images = document.querySelectorAll(`.bird-image[data-category="${category}"]`);
                    if (images.length === 0) return;
                    
                    let currentIndex = 0;
                    
                    // Find currently active image
                    images.forEach((img, index) => {
                        if (img.classList.contains('active')) {
                            currentIndex = index;
                        }
                    });
                    
                    function showNextImage() {
                        // Hide current image
                        images[currentIndex].classList.remove('active');
                        images[currentIndex].style.opacity = '0';
                        
                        // Show next image
                        currentIndex = (currentIndex + 1) % images.length;
                        images[currentIndex].classList.add('active');
                        images[currentIndex].style.opacity = '1';
                    }
                    
                    // Rotate images every 4 seconds
                    setInterval(showNextImage, 4000);
                });
            }
            
            // Initialize image rotation
            rotateBirdImages();

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
            
            // Smooth hover effects for cards
            const birdCards = document.querySelectorAll('.bg-white.rounded-2xl');
            birdCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-8px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>

@endsection
