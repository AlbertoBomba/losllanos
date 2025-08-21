@extends('layouts.frontend')

@section('title', ' Página no encontrada - Web Reestructurada | Los Llanos Toledo ✔️')
@section('description', '⭐La página que buscas ha cambiado de ubicación. Hemos reestructurado nuestra web para ofrecerte una mejor experiencia. Descubre nuestros productos y servicios.')

@section('content')

    <!-- 404 Hero Section -->
    <section class="relative min-h-[80vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3]">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/finca.webp')}}" 
                 alt="Los Llanos Toledo nueva web" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-70 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-6 max-w-5xl mx-auto pt-20">
            <!-- 404 Icon -->
            <div class="mb-8">
                <div class="w-32 h-32 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                    <i class="fas fa-map-marked-alt text-white text-6xl"></i>
                </div>
            </div>
            
            <h1 class="text-4xl md:text-6xl font-display font-bold mb-6 leading-tight tracking-wide uppercase">
                ¡Hemos renovado nuestra web!
            </h1>
            
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-8 mb-8">
                <p class="text-xl md:text-2xl mb-6 text-gray-200 leading-relaxed font-medium">
                    <em class="font-display text-2xl md:text-3xl text-[#8b5e3c]">La página que buscas ya no está aquí</em><br><br>
                    Hemos <strong>reestructurado completamente nuestra web</strong> para ofrecerte una mejor experiencia. 
                    Todo nuestro contenido está disponible en la nueva estructura.
                </p>
                
                <!-- Error Details -->
                <div class="bg-red-500 bg-opacity-20 rounded-lg p-4 mb-6 border border-red-300">
                    <div class="flex items-center justify-center mb-2">
                        <i class="fas fa-exclamation-triangle text-red-300 mr-2"></i>
                        <span class="font-action font-bold text-red-300 uppercase">Error 404 - Página no encontrada</span>
                    </div>
                    <p class="text-red-200 text-sm">
                        URL solicitada: <code class="bg-black bg-opacity-30 px-2 py-1 rounded">{{request()->url()}}</code>
                    </p>
                </div>
            </div>
            
            <!-- Quick Navigation -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <a href="{{route('home')}}" 
                   class="bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white px-6 py-4 rounded-lg font-action font-bold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg block">
                    <i class="fas fa-home mr-2"></i>
                    Ir al Inicio
                </a>
                <a href="{{route('productos')}}" 
                   class="bg-[#8b5e3c] hover:bg-[#7a5235] text-white px-6 py-4 rounded-lg font-action font-bold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg block">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    Ver Productos
                </a>
                <button onclick="window.open('tel:+34608910639', '_self')" 
                        class="bg-[#059669] hover:bg-[#047857] text-white px-6 py-4 rounded-lg font-action font-bold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                    <i class="fas fa-phone mr-2"></i>
                    Llamar Ahora
                </button>
            </div>
        </div>
    </section>

    <!-- New Structure Information -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                        Nuestra Nueva Estructura
                    </h2>
                    <p class="text-xl text-gray-600 font-sans leading-relaxed">
                        Encuentra fácilmente todo lo que buscas en nuestra web renovada
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Main Navigation -->
                    <div class="bg-[#f5f1e3] rounded-2xl p-8">
                        <h3 class="text-2xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                            <i class="fas fa-sitemap text-[#4b5d3a] mr-3"></i>
                            Secciones Principales
                        </h3>
                        <div class="space-y-4">
                            <a href="{{route('home')}}" 
                               class="flex items-center p-3 bg-white rounded-lg hover:shadow-md transition-all duration-300 group">
                                <i class="fas fa-home text-[#4b5d3a] mr-3 group-hover:scale-110 transition-transform"></i>
                                <div>
                                    <div class="font-action font-semibold text-dark">Página Principal</div>
                                    <div class="text-gray-600 text-sm">Inicio y presentación</div>
                                </div>
                            </a>
                            
                            <a href="{{route('productos')}}" 
                               class="flex items-center p-3 bg-white rounded-lg hover:shadow-md transition-all duration-300 group">
                                <i class="fas fa-shopping-cart text-[#8b5e3c] mr-3 group-hover:scale-110 transition-transform"></i>
                                <div>
                                    <div class="font-action font-semibold text-dark">Productos</div>
                                    <div class="text-gray-600 text-sm">Catálogo completo</div>
                                </div>
                            </a>
                            
                            <a href="{{route('blog-de-caza')}}" 
                               class="flex items-center p-3 bg-white rounded-lg hover:shadow-md transition-all duration-300 group">
                                <i class="fas fa-blog text-[#059669] mr-3 group-hover:scale-110 transition-transform"></i>
                                <div>
                                    <div class="font-action font-semibold text-dark">Blog de Caza</div>
                                    <div class="text-gray-600 text-sm">Artículos y noticias</div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Products Navigation -->
                    <div class="bg-[#f5f1e3] rounded-2xl p-8">
                        <h3 class="text-2xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                            <i class="fas fa-tags text-[#8b5e3c] mr-3"></i>
                            Nuestros Productos
                        </h3>
                        <div class="space-y-4">
                            <a href="{{route('productos.aves-de-caza')}}" 
                               class="flex items-center p-3 bg-white rounded-lg hover:shadow-md transition-all duration-300 group">
                                <i class="fas fa-feather-alt text-[#4b5d3a] mr-3 group-hover:scale-110 transition-transform"></i>
                                <div>
                                    <div class="font-action font-semibold text-dark">Aves de Caza</div>
                                    <div class="text-gray-600 text-sm">Perdices, faisanes, codornices, palomas</div>
                                </div>
                            </a>
                            
                            <a href="{{route('productos.sueltas')}}" 
                               class="flex items-center p-3 bg-white rounded-lg hover:shadow-md transition-all duration-300 group">
                                <i class="fas fa-calendar-alt text-[#8b5e3c] mr-3 group-hover:scale-110 transition-transform"></i>
                                <div>
                                    <div class="font-action font-semibold text-dark">Tiradas en Finca</div>
                                    <div class="text-gray-600 text-sm">Planificación mensual Oct-Mar</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-16 bg-[#f5f1e3]">
        <div class="container mx-auto px-6">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                    ¿Buscabas algo específico?
                </h2>
                <p class="text-gray-600 font-sans mb-8">
                    Estos enlaces te pueden ayudar a encontrar lo que necesitas:
                </p>
                
                <!-- Quick Links -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <a href="{{route('productos.aves-de-caza.perdices')}}" 
                       class="bg-white hover:bg-gray-50 p-4 rounded-lg shadow-md transition-all duration-300 hover:scale-105">
                        <i class="fas fa-dove text-[#8b5e3c] text-2xl mb-2"></i>
                        <div class="font-action font-semibold text-sm">Perdices</div>
                    </a>
                    <a href="{{route('productos.aves-de-caza.faisanes')}}" 
                       class="bg-white hover:bg-gray-50 p-4 rounded-lg shadow-md transition-all duration-300 hover:scale-105">
                        <i class="fas fa-feather-alt text-[#4b5d3a] text-2xl mb-2"></i>
                        <div class="font-action font-semibold text-sm">Faisanes</div>
                    </a>
                    <a href="{{route('productos.aves-de-caza.codornices')}}" 
                       class="bg-white hover:bg-gray-50 p-4 rounded-lg shadow-md transition-all duration-300 hover:scale-105">
                        <i class="fas fa-kiwi-bird text-[#059669] text-2xl mb-2"></i>
                        <div class="font-action font-semibold text-sm">Codornices</div>
                    </a>
                    <a href="{{route('productos.aves-de-caza.palomas')}}" 
                       class="bg-white hover:bg-gray-50 p-4 rounded-lg shadow-md transition-all duration-300 hover:scale-105">
                        <i class="fas fa-dove text-[#6366f1] text-2xl mb-2"></i>
                        <div class="font-action font-semibold text-sm">Palomas</div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="py-16 bg-[#4b5d3a]">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-display font-bold text-white mb-6 uppercase tracking-wide">
                    ¿Necesitas ayuda?
                </h2>
                <p class="text-xl text-gray-200 mb-8 font-sans leading-relaxed">
                    Si no encuentras lo que buscas, contáctanos directamente. 
                    Estaremos encantados de ayudarte.
                </p>
                
                <!-- Contact Methods -->
                <div class="grid md:grid-cols-3 gap-6">
                    <button onclick="window.open('tel:+34608910639', '_self')" 
                            class="bg-white text-[#4b5d3a] hover:bg-gray-100 px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fas fa-phone mr-2"></i>
                        608 910 639
                    </button>
                    <button onclick="window.open('mailto:att@clubdetiro-losllanos.es?subject=Consulta desde página 404&body=Hola,%20estaba%20buscando%20información%20y%20llegué%20a%20la%20página%20404.%20¿Podrían%20ayudarme?', '_self')" 
                            class="bg-[#8b5e3c] hover:bg-[#7a5235] text-white px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fas fa-envelope mr-2"></i>
                        Email
                    </button>
                    <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20llegué%20a%20la%20página%20404%20y%20necesito%20ayuda%20para%20encontrar%20información', '_blank')" 
                            class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fab fa-whatsapp mr-2"></i>
                        WhatsApp
                    </button>
                </div>
                
                <div class="mt-8 text-gray-200 font-sans text-sm">
                    <p>📍 <strong>Los Llanos, Toledo</strong> | 🕒 <strong>Más de 30 años de experiencia</strong> | ✅ <strong>Web renovada 2025</strong></p>
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

            // Auto redirect after 30 seconds if user doesn't interact
            let redirectTimer = setTimeout(() => {
                if (confirm('¿Te gustaría ir a nuestra página principal?')) {
                    window.location.href = '{{route("home")}}';
                }
            }, 30000);

            // Clear timer if user interacts with page
            ['click', 'scroll', 'mousemove', 'keypress'].forEach(event => {
                document.addEventListener(event, () => {
                    clearTimeout(redirectTimer);
                }, { once: true });
            });
        });
    </script>

@endsection
