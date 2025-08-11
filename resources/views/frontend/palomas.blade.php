@extends('layouts.frontend')

@section('title', 'Venta de palomas | Los Llanos Toledo')
@section('description', 'Venta de palomas para sueltas deportivas. Vuelo rápido y adaptabilidad excelente. Certificados sanitarios, transporte especializado desde Toledo.')

@section('content')

    <!-- Hero Section -->
    <section class="relative min-h-[80vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3]">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/historia-caza-2.webp')}}" 
                 alt="Palomas para suelta Los Llanos Toledo" 
                 class="w-full h-full object-cover object-center">
        </div>
        
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-6 max-w-5xl mx-auto pt-20">
            <div class="mb-6">
                <span class="bg-[#4b5d3a] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                    Vuelo Rápido y Ágil
                </span>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-display font-bold mb-6 leading-tight tracking-wide uppercase">
                Venta de palomas
            </h1>
            
            <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-4xl mx-auto leading-relaxed font-medium">
                <em class="font-display text-2xl md:text-3xl">Velocidad y precisión en cada lance</em><br><br>
                <strong>Palomas de gran calidad y resistencia</strong>, perfectas para sueltas deportivas. 
                Su vuelo rápido y adaptabilidad las convierten en el objetivo ideal para la caza.
            </p>
            
            <!-- Quick Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto mb-8">
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-display font-bold text-[#4b5d3a] mb-1">Todo el año</div>
                    <div class="text-gray-200 font-sans text-sm">Disponibilidad</div>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-display font-bold text-[#4b5d3a] mb-1">Vuelo Rápido</div>
                    <div class="text-gray-200 font-sans text-sm">Gran Agilidad</div>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-display font-bold text-[#4b5d3a] mb-1">Resistentes</div>
                    <div class="text-gray-200 font-sans text-sm">Alta Adaptabilidad</div>
                </div>
            </div>
            
            <!-- CTA Button -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="window.open('tel:+34608910639', '_self')" 
                        class="bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                    <i class="fas fa-phone mr-2"></i>
                    Consultar Precio
                </button>
                <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20información%20sobre%20palomas%20para%20suelta', '_blank')" 
                        class="border-2 border-white text-white hover:bg-white hover:text-gray-900 px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105">
                    <i class="fab fa-whatsapp mr-2"></i>
                    WhatsApp
                </button>
            </div>
        </div>
    </section>

    <!-- Product Details Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
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
                        <a href="{{ route('productos.aves-de-caza') }}" title="Ir a la categoría de aves de caza" class="inline-flex items-center text-xl font-medium text-gray-700  hover:text-[#4b5d3a]">
                            <div class="flex items-center text-xl">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ml-1  font-medium text-gray-500 md:ml-2">Aves de caza</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center text-xl">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1  font-medium text-gray-500 md:ml-2">Palomas</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="grid lg:grid-cols-2 gap-16 items-start max-w-7xl mx-auto">
                <!-- Image Gallery -->
                <div class="relative">
                    <div class="aspect-w-16 aspect-h-12 rounded-2xl overflow-hidden shadow-2xl mb-6">
                        <img src="{{asset('images/general/paloma-volando.webp')}}" 
                             alt="Palomas para suelta Los Llanos Toledo" 
                             class="main-image w-full h-96 object-cover object-center transition-opacity duration-500"
                             id="mainImage">
                    </div>
                    
                    <!-- Thumbnail Gallery -->
                    <div class="grid grid-cols-3 gap-4">
                        <img src="{{asset('images/general/paloma-volando.webp')}}" 
                             alt="Palomas en vuelo"
                             class="thumbnail w-full h-24 object-cover object-center rounded-lg cursor-pointer border-2 border-[#4b5d3a] opacity-100"
                             onclick="changeMainImage(this, '{{asset('images/general/paloma-volando.webp')}}')">
                        <img src="{{asset('images/general/cazador-paloma-2.webp')}}" 
                             alt="Cazador contra palomas"
                             class="thumbnail w-full h-24 object-cover rounded-lg cursor-pointer border-2 border-gray-300 opacity-70 hover:opacity-100"
                             onclick="changeMainImage(this, '{{asset('images/general/cazador-paloma-2.webp')}}')">
                        {{-- <img src="{{asset('images/general/cazador-paloma-2.webp')}}" 
                             alt="Hábitat palomas"
                             class="thumbnail w-full h-24 object-cover rounded-lg cursor-pointer border-2 border-gray-300 opacity-70 hover:opacity-100"
                             onclick="changeMainImage(this, '{{asset('images/general/finca.webp')}}')"> --}}
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="space-y-8">
                    <!-- Header -->
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <span class="bg-[#4b5d3a] text-white px-3 py-1 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                                Palomas
                            </span>
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full font-action font-semibold text-sm">
                                Disponible todo el año
                            </span>
                        </div>
                        
                        <h2 class="text-4xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                            Palomas Deportivas
                        </h2>
                        
                        <div class="flex items-center mb-6">
                            <div class="text-3xl font-display font-bold text-[#4b5d3a] mr-4">Precio a consultar</div>
                            <div class="text-gray-500 font-sans">por unidad</div>
                        </div>
                    </div>
                    <!-- CTA Buttons -->
                    <div class="space-y-4">
                        <button onclick="window.open('tel:+34608910639', '_self')" 
                                class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-4 px-6 rounded-lg font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Llamar para Consultar Precio
                        </button>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <button onclick="window.open('mailto:att@clubdetiro-losllanos.es?subject=Consulta Palomas - Los Llanos&body=Hola,%20me%20interesa%20información%20sobre%20palomas%20para%20suelta.%20Por%20favor%20contacten%20conmigo.', '_self')" 
                                    class="w-full border-2 border-[#4b5d3a] text-[#4b5d3a] hover:bg-[#4b5d3a] hover:text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300">
                                <i class="fas fa-envelope mr-2"></i>
                                Email
                            </button>
                            <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20información%20sobre%20palomas%20para%20suelta', '_blank')" 
                                    class="w-full bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300">
                                <i class="fab fa-whatsapp mr-2"></i>
                                WhatsApp
                            </button>
                        </div>
                    </div>
                    
                    <!-- Technical Info -->
                    <div class="bg-[#f5f1e3] rounded-2xl p-6">
                        <h3 class="text-xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                            Información Técnica
                        </h3>
                        <div class="grid md:grid-cols-2 gap-4 text-sm">
                            <div><strong>Disponibilidad:</strong> Todo el año</div>
                            <div><strong>Tipo:</strong> Paloma deportiva</div>
                            <div><strong>Origen:</strong> Toledo, España</div>
                            <div><strong>Certificaciones:</strong> Sanitarias incluidas</div>
                            <div><strong>Ideal para:</strong> Sueltas deportivas</div>
                            <div><strong>Entrega:</strong> Bajo pedido</div>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-600 font-sans leading-relaxed text-lg">
                            Nuestras <strong>palomas deportivas</strong> son ideales para sueltas y actividades 
                            cinegéticas. Destacan por su vuelo rápido, gran agilidad y excelente adaptabilidad 
                            a diferentes entornos.
                        </p>
                        
                        <p class="text-gray-600 font-sans leading-relaxed">
                            Su resistencia y capacidad de vuelo las convierten en la opción perfecta para 
                            cazadores que buscan un desafío dinámico y emocionante en sus jornadas.
                        </p>
                    </div>
                    
                    <!-- Features -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <h3 class="text-xl font-display font-bold text-dark uppercase tracking-wide">
                                Características
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-[#4b5d3a] mr-3"></i>
                                    <span class="font-sans text-gray-700">Vuelo rápido y ágil</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-[#4b5d3a] mr-3"></i>
                                    <span class="font-sans text-gray-700">Gran resistencia</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-[#4b5d3a] mr-3"></i>
                                    <span class="font-sans text-gray-700">Excelente adaptabilidad</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-[#4b5d3a] mr-3"></i>
                                    <span class="font-sans text-gray-700">Perfectas para deportes</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <h3 class="text-xl font-display font-bold text-dark uppercase tracking-wide">
                                Servicios Incluidos
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-certificate text-[#4b5d3a] mr-3"></i>
                                    <span class="font-sans text-gray-700">Certificados sanitarios</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-truck text-[#4b5d3a] mr-3"></i>
                                    <span class="font-sans text-gray-700">Transporte especializado</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-user-tie text-[#4b5d3a] mr-3"></i>
                                    <span class="font-sans text-gray-700">Asesoramiento técnico</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-[#4b5d3a] mr-3"></i>
                                    <span class="font-sans text-gray-700">Soporte personalizado</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 bg-[#f5f1e3]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                    ¿Por Qué Elegir Nuestras Palomas?
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-sans leading-relaxed">
                    Palomas seleccionadas por su rapidez, resistencia y perfecta adaptación a sueltas deportivas.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Reason 1 -->
                <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[#4b5d3a] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-tachometer-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                        Velocidad
                    </h3>
                    <p class="text-gray-600 font-sans leading-relaxed">
                        Su vuelo rápido y ágil proporciona un desafío dinámico que 
                        mantiene la emoción durante toda la jornada.
                    </p>
                </div>

                <!-- Reason 2 -->
                <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                        Resistencia
                    </h3>
                    <p class="text-gray-600 font-sans leading-relaxed">
                        Gran resistencia y fortaleza que garantiza un rendimiento 
                        excepcional en cualquier condición climática.
                    </p>
                </div>

                <!-- Reason 3 -->
                <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[#059669] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                        Disponibilidad
                    </h3>
                    <p class="text-gray-600 font-sans leading-relaxed">
                        Disponibles durante todo el año, perfectas para cualquier 
                        planificación de eventos cinegéticos.
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
                 alt="Cliente satisfecho con palomas Los Llanos" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-70 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 container mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto">
                <p class="text-2xl md:text-3xl text-white font-display leading-loose md:leading-loose font-medium italic tracking-wide mb-8">
                    "Las palomas de Los Llanos son perfectas para nuestras actividades deportivas. 
                    Su velocidad y resistencia hacen de cada suelta una experiencia emocionante."
                </p>
                <div class="text-gray-300 font-sans">
                    - Carlos R., Organizador de Eventos
                </div>
            </div>
        </div>
    </section>


    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white w-12 h-12 rounded-full shadow-lg opacity-0 invisible transition-all duration-300">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image gallery functionality
            window.changeMainImage = function(thumbnail, imageSrc) {
                const mainImage = document.getElementById('mainImage');
                const thumbnails = document.querySelectorAll('.thumbnail');
                
                // Update main image
                mainImage.style.opacity = '0';
                setTimeout(() => {
                    mainImage.src = imageSrc;
                    mainImage.style.opacity = '1';
                }, 250);
                
                // Update thumbnail styles
                thumbnails.forEach(thumb => {
                    thumb.classList.remove('border-[#4b5d3a]', 'opacity-100');
                    thumb.classList.add('border-gray-300', 'opacity-70');
                });
                
                thumbnail.classList.remove('border-gray-300', 'opacity-70');
                thumbnail.classList.add('border-[#4b5d3a]', 'opacity-100');
            };
            

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
