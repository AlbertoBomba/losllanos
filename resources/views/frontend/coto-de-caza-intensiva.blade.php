@extends('layouts.frontend')

@section('title', ' [ Coto de caza intensiva ] Los Llanos Toledo ✔️')
@section('description', '⭐ Coto de caza intensiva en parcelas de gran tamaño sembradas de trigo. 
Disfruta de una experiencia de caza única y exclusiva.')

@section('content')

    <!-- Hero Section -->
    <section class="relative min-h-[50vh] sm:min-h-[60vh] lg:min-h-[70vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3] p-2 sm:p-4">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/cazador-codorniz.webp')}}" 
                 alt="Faisanes comunes para suelta Los Llanos Toledo" 
                 class="w-full h-full object-cover object-center sm:object-top">
        </div>
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 sm:bg-opacity-60 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-3 sm:px-6 max-w-5xl mx-auto pt-16 sm:pt-20 lg:pt-24">
            
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-display font-bold mb-4 sm:mb-6 leading-tight tracking-wide uppercase">
               Coto de caza intensiva
            </h1>
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl mb-6 sm:mb-8 text-gray-200 max-w-4xl mx-auto leading-relaxed font-medium">
                <em class="font-display text-lg sm:text-xl md:text-2xl lg:text-3xl">Disponemos de amplias parcelas para</em><br class="hidden sm:block"><br class="hidden sm:block">
                <strong>disfrutar de una jornada privada de caza de codorniz durante todo el año</strong>, ideales para el entrenamiento 
                de perros de caza.
            </p>
            
            <!-- CTA Button -->
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                <button onclick="window.open('tel:+34608910639', '_self')" 
                        class="bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white px-6 sm:px-8 py-3 sm:py-4 rounded-full font-action font-bold text-base sm:text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                    <i class="fas fa-phone mr-2"></i>
                    Reservar
                </button>
                <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20información%20sobre%20codornices%20comunes', '_blank')" 
                        class="border-2 border-white text-white hover:bg-white hover:text-gray-900 px-6 sm:px-8 py-3 sm:py-4 rounded-full font-action font-bold text-base sm:text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105">
                    <i class="fab fa-whatsapp mr-2"></i>
                    WhatsApp
                </button>
            </div>
        </div>
    </section>

    <!-- Product Details Section -->
    <section class="py-12 sm:py-16 lg:py-20 bg-white">
        <div class="container mx-auto px-3 sm:px-6">
            <!-- Breadcrumb -->
            <nav class="flex mb-6 sm:mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm sm:text-base">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" title="Ir a la página de inicio" class="inline-flex items-center text-base sm:text-lg lg:text-xl font-medium text-gray-700 hover:text-[#4b5d3a]">
                            <svg class="w-3 h-3 mr-1 sm:mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            <span class="hidden sm:inline">Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('productos') }}" title="Ir a la página de productos" class="inline-flex items-center text-base sm:text-lg lg:text-xl font-medium text-gray-700 hover:text-[#4b5d3a]">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ml-1 font-medium text-gray-500 md:ml-2">Productos</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('productos.sueltas') }}" title="Ir a la categoría de aves de caza" class="inline-flex items-center text-base sm:text-lg lg:text-xl font-medium text-gray-700 hover:text-[#4b5d3a]">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ml-1 font-medium text-gray-500 md:ml-2 hidden sm:inline">Sueltas en finca</span>
                                <span class="ml-1 font-medium text-gray-500 md:ml-2 sm:hidden">Sueltas</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 font-medium text-gray-500 md:ml-2 hidden sm:inline">coto de caza intensiva</span>
                            <span class="ml-1 font-medium text-gray-500 md:ml-2 sm:hidden">coto intensiva</span>
                        </div>
                    </li>
                </ol>
            </nav>
            
            <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 items-start max-w-7xl mx-auto">
                <!-- Image Gallery -->
                <div class="relative order-1 lg:order-1">
                    <div class="aspect-w-16 aspect-h-12 rounded-xl sm:rounded-2xl overflow-hidden shadow-xl sm:shadow-2xl mb-4 sm:mb-6">
                        <img src="{{asset('images/general/codornices.webp')}}" 
                             alt="Codornices comunes gran porte Los Llanos Toledo" 
                             class="main-image w-full h-48 sm:h-64 md:h-80 lg:h-96 object-cover object-top transition-opacity duration-500"
                             id="mainImage">
                    </div>
                    
                    <!-- Thumbnail Gallery -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 sm:gap-4">
                        <img src="{{asset('images/general/codorniz-volando.webp')}}" 
                             alt="Faisán común en acción"
                             class="thumbnail w-full h-16 sm:h-20 md:h-24 object-cover object-top rounded-md sm:rounded-lg cursor-pointer border-2 border-[#4b5d3a] opacity-100"
                             onclick="changeMainImage(this, '{{asset('images/general/codorniz-volando.webp')}}')">
                        <img src="{{asset('images/general/codornices.webp')}}" 
                             alt="codornices en su hábitat"
                             class="thumbnail w-full h-16 sm:h-20 md:h-24 object-cover rounded-md sm:rounded-lg cursor-pointer border-2 border-gray-300 opacity-70 hover:opacity-100"
                             onclick="changeMainImage(this, '{{asset('images/general/codornices.webp')}}')">
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="space-y-6 sm:space-y-8 order-2 lg:order-2">
                    <!-- Header -->
                    <div>
                        <div class="flex flex-wrap items-center gap-2 sm:gap-4 mb-3 sm:mb-4">
                            <span class="bg-[#4b5d3a] text-white px-2 sm:px-3 py-1 rounded-full font-action font-semibold text-xs sm:text-sm tracking-wide uppercase">
                                Codornices
                            </span>
                            <span class="bg-green-100 text-green-800 px-2 sm:px-3 py-1 rounded-full font-action font-semibold text-xs sm:text-sm">
                                Todo el año
                            </span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-dark mb-3 sm:mb-4 uppercase tracking-wide leading-tight">
                           Coto intensivo codorniz
                        </h2>
                        <div class="flex flex-col sm:flex-row sm:items-center mb-4 sm:mb-6">
                            <div class="text-2xl sm:text-3xl font-display font-bold text-[#4b5d3a] mb-1 sm:mb-0 sm:mr-4">Precio a consultar</div>
                            <span class="text-base sm:text-lg font-sans text-gray-600">por jornada</span>
                        </div>
                    </div>
                    <!-- CTA Buttons -->
                    <div class="space-y-3 sm:space-y-4">
                        <button onclick="window.open('tel:+34608910639', '_self')" 
                                class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-3 sm:py-4 px-4 sm:px-6 rounded-lg font-action font-bold text-base sm:text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            <span class="hidden sm:inline">Llamar para disponibilidad</span>
                            <span class="sm:hidden">Llamar ahora</span>
                        </button>
                        
                        <div class="grid sm:grid-cols-2 gap-3 sm:gap-4">
                            <button onclick="window.open('mailto:att@clubdetiro-losllanos.es?subject=Consulta Codornices - Los Llanos&body=Hola,%20me%20interesa%20información%20sobre%20codornices.%20Por%20favor%20contacten%20conmigo.', '_self')" 
                                    class="w-full border-2 border-[#4b5d3a] text-[#4b5d3a] hover:bg-[#4b5d3a] hover:text-white py-2 sm:py-3 px-3 sm:px-4 rounded-lg font-action font-semibold text-sm sm:text-base tracking-wide uppercase transition-all duration-300">
                                <i class="fas fa-envelope mr-2"></i>
                                Email
                            </button>
                            <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20información%20sobre%20codornices%20para%20coto%20de%20caza%20intensivo.', '_blank')" 
                                    class="w-full bg-green-500 hover:bg-green-600 text-white py-2 sm:py-3 px-3 sm:px-4 rounded-lg font-action font-semibold text-sm sm:text-base tracking-wide uppercase transition-all duration-300">
                                <i class="fab fa-whatsapp mr-2"></i>
                                WhatsApp
                            </button>
                        </div>

                         <!-- Description -->
                        <div class="flex w-full mx-auto p-3 sm:p-4 items-center justify-center mt-8 sm:mt-12">
                            <p class="text-gray-600 font-sans leading-relaxed text-base sm:text-lg lg:text-xl max-w-4xl text-left">
                                <strong>Coto Intensivo</strong><br >
                                Disponemos de parcelas para solar <strong>codornices todo el año.</strong><br />
                                Todos los días del año las parcelas están sembradas de cereal, para que las codornices se camuflen y dificulten la búsqueda al perro.
                                <br />
                                Solo se podrán tirar a las especies que se suelten (Codorniz).
                                <br />
                                En tiempo de veda abierta tenemos fincas para soltar perdices, faisanes. Suelta a mano sobre puestos, como también cazar por días conejos, perdices al salto...
                                <br />
                                Precios y fechas contactando con nosotros.
                            </p>
                        </div>
                        
                        <!-- Features -->
                        <div class="grid sm:grid-cols-2 gap-4 sm:gap-6">
                            <div class="space-y-3 sm:space-y-4">
                                <h3 class="text-lg sm:text-xl font-display font-bold text-dark uppercase tracking-wide">
                                    Características
                                </h3>
                                <div class="space-y-2 sm:space-y-3">
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">Vuelo rápido y ágil</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">Tamaño compacto</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">Gran desafío deportivo</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">Excelente adaptación</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-y-3 sm:space-y-4">
                                <h3 class="text-lg sm:text-xl font-display font-bold text-dark uppercase tracking-wide">
                                    Servicios Incluidos
                                </h3>
                                <div class="space-y-2 sm:space-y-3">
                                    <div class="flex items-center">
                                        <i class="fas fa-certificate text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">Certificados sanitarios</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-user-tie text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">Asesoramiento técnico</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-phone text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">Soporte personalizado</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           
        </div>
    </section>
    <!-- Why Choose Us Section -->
    <section class="py-12 sm:py-16 lg:py-20 bg-[#f5f1e3]">
        <div class="container mx-auto px-3 sm:px-6">
            <div class="text-center mb-8 sm:mb-12 lg:mb-16">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-dark mb-3 sm:mb-4 uppercase tracking-wide leading-tight">
                    ¿Por Qué Elegir Nuestros <span class="block sm:inline">cotos intensivos de codornices?</span>
                </h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 max-w-6xl mx-auto">
                <!-- Reason 1 -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-6 sm:p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-[#4b5d3a] rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-star text-white text-lg sm:text-2xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-display font-bold text-dark mb-2 sm:mb-4 uppercase tracking-wide">
                        Gran Porte
                    </h3>
                </div>
                
                <!-- Reason 2 -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-6 sm:p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-feather-alt text-white text-lg sm:text-2xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-display font-bold text-dark mb-2 sm:mb-4 uppercase tracking-wide">
                        Camuflaje Natural
                    </h3>
                </div>

                <!-- Reason 3 -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-6 sm:p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300 sm:col-span-2 lg:col-span-1">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-[#059669] rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-mountain text-white text-lg sm:text-2xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-display font-bold text-dark mb-2 sm:mb-4 uppercase tracking-wide">
                       Amplia parcela exclusiva
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Flotante usando componente -->
    <x-floating-cta 
        text="Temp. 25/26"
        year="Perdides y Faisanes"
        url="{{route('productos.sueltas')}}"
        position="bottom-right"
        icon="fas fa-bullseye"
        newLabel="Tiradas en finca!"
        tooltip="Reserva tu tirada para 2025" />


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
});
</script>

@endsection
