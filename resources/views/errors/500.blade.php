@extends('layouts.frontend')

@section('title', '✔️ Error del servidor - Los Llanos Toledo')
@section('description', 'Ha ocurrido un error temporal en el servidor. Estamos trabajando para solucionarlo.')

@section('content')

    <!-- 500 Hero Section -->
    <section class="relative min-h-[80vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3]">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/finca.webp')}}" 
                 alt="Error temporal Los Llanos" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-70 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-6 max-w-4xl mx-auto pt-20">
            <!-- Error Icon -->
            <div class="mb-8">
                <div class="w-32 h-32 bg-red-500 bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6 backdrop-blur-sm border border-red-300">
                    <i class="fas fa-tools text-red-300 text-6xl"></i>
                </div>
            </div>
            
            <h1 class="text-4xl md:text-6xl font-display font-bold mb-6 leading-tight tracking-wide uppercase">
                Error Temporal
            </h1>
            
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-8 mb-8">
                <p class="text-xl md:text-2xl mb-6 text-gray-200 leading-relaxed font-medium">
                    <em class="font-display text-2xl md:text-3xl text-[#8b5e3c]">Estamos trabajando para solucionarlo</em><br><br>
                    Ha ocurrido un <strong>error temporal en el servidor</strong>. 
                    Nuestro equipo está al tanto y lo solucionaremos pronto.
                </p>
                
                <!-- Error Details -->
                <div class="bg-red-500 bg-opacity-20 rounded-lg p-4 mb-6 border border-red-300">
                    <div class="flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-red-300 mr-2"></i>
                        <span class="font-action font-bold text-red-300 uppercase">Error 500 - Error del servidor</span>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <a href="{{route('home')}}" 
                   class="bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white px-6 py-4 rounded-lg font-action font-bold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg block">
                    <i class="fas fa-home mr-2"></i>
                    Volver al Inicio
                </a>
                <button onclick="location.reload()" 
                        class="bg-[#8b5e3c] hover:bg-[#7a5235] text-white px-6 py-4 rounded-lg font-action font-bold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                    <i class="fas fa-redo mr-2"></i>
                    Intentar de Nuevo
                </button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-[#4b5d3a]">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-display font-bold text-white mb-6 uppercase tracking-wide">
                    ¿Necesitas ayuda inmediata?
                </h2>
                <p class="text-xl text-gray-200 mb-8 font-sans leading-relaxed">
                    Si el error persiste, contáctanos directamente y te ayudaremos.
                </p>
                
                <div class="grid md:grid-cols-3 gap-4">
                    <button onclick="window.open('tel:+34608910639', '_self')" 
                            class="bg-white text-[#4b5d3a] hover:bg-gray-100 px-6 py-3 rounded-full font-action font-bold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fas fa-phone mr-2"></i>
                        Llamar
                    </button>
                    <button onclick="window.open('mailto:att@clubdetiro-losllanos.es?subject=Error en la web&body=Hola,%20he%20encontrado%20un%20error%20500%20en%20la%20web.', '_self')" 
                            class="bg-[#8b5e3c] hover:bg-[#7a5235] text-white px-6 py-3 rounded-full font-action font-bold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fas fa-envelope mr-2"></i>
                        Email
                    </button>
                    <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20he%20encontrado%20un%20error%20en%20la%20web', '_blank')" 
                            class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full font-action font-bold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fab fa-whatsapp mr-2"></i>
                        WhatsApp
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection
