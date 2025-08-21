@extends('layouts.frontend')

@section('title', '[ Aves de Caza ] Los Llanos ✔️')
@section('description', '⭐ Venta de aves de caza de máxima calidad: perdices, faisanes, codornices y palomas. Certificados sanitarios incluidos, transporte especializado. Más de 30 años de experiencia.')

@section('content')

    <!-- Hero Section -->
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3] ">
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
        <div class="container mx-auto px-6 relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" title="Ir a la página de inicio" class="inline-flex items-center text-xl font-medium text-gray-700  hover:text-[#4b5d3a]">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('productos') }}" title="Ir a la página de productos" class="inline-flex items-center text-xl font-medium text-gray-700  hover:text-[#4b5d3a]">
                            <div class="flex items-center text-xl">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ml-1  font-medium text-gray-500 md:ml-2">Productos</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center text-xl">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1  font-medium text-gray-500 md:ml-2">Aves de caza</span>
                        </div>
                    </li>
                </ol>
            </nav>
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
                        
                        <a href="{{route('productos.aves-de-caza.perdices')}}" title="Consultar la ficha de perdices" class="w-full bg-[#8b5e3c] hover:bg-[#7a5235] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            Consultar 
                        </a>
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
                        
                       <a href="{{route('productos.aves-de-caza.faisanes')}}" title="Consultar la ficha de faisanes" class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            Consultar
                       </a>
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
                            Codornices (Coturnix coturnix)
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
                        <a href="{{route('productos.aves-de-caza.codornices')}}" title="Consultar la ficha de codornices" class="w-full bg-[#6b7280] hover:bg-[#5b6370] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            Consultar
                        </a>
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
                        
                        <a href="{{route('productos.aves-de-caza.palomas')}}" title="Consultar la ficha de palomas" class="w-full bg-[#059669] hover:bg-[#047857] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            Consultar
                        </a>
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
