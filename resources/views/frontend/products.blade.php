@extends('layouts.frontend')

@section('title', 'venta codornices para suelta - los llanos')
@section('description', 'Venta codornices, perdices, faisanes y palomas para suelta.
Todos los certificados sanitarios. Nos encargamos del transporte.')

@section('content')

    <!-- Hero Section -->
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3] pt-32">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/padre-hijo-cazando-perdices.webp')}}" 
                 alt="Productos de caza Los Llanos" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-6 max-w-4xl mx-auto pt-20">
            <h1 class="text-5xl md:text-7xl font-display font-bold mb-6 leading-tight tracking-wide uppercase">
                Recomendados la venta codornices para suelta
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-3xl mx-auto leading-relaxed font-medium">
                Ofrecemos dos líneas principales de productos: <strong>venta de aves de caza</strong> para sueltas y la <strong>organización de tiradas profesionales</strong>. 
                Más de 30 años de experiencia nos avalan.
            </p>
        </div>
    </section>

    <!-- Main Products Section -->
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
                    Dos Especialidades, Una Pasión
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-sans leading-relaxed">
                    Especializados en la venta de aves de caza de la máxima calidad y en la organización 
                    de tiradas profesionales. Cada producto refleja nuestro compromiso con la excelencia.
                </p>
            </div>

            <!-- Products Grid -->
            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">
                
                <!-- Aves de Caza Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105">
                    <!-- Image Container with Rotating Images -->
                    <div class="relative h-80 overflow-hidden">
                        <img src="{{asset('images/general/perdiz-volando.webp')}}" 
                             alt="Perdices para suelta" 
                             class="product-image active w-full h-full object-cover transition-opacity duration-1000"
                             data-category="aves">
                        <img src="{{asset('images/general/codornices.webp')}}" 
                             alt="Codornices para suelta" 
                             class="product-image absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0"
                             data-category="aves">
                        <img src="{{asset('images/general/paloma-volando.webp')}}" 
                             alt="Palomas para suelta" 
                             class="product-image absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0"
                             data-category="aves">
                        
                        <!-- Category Badge -->
                        <div class="absolute top-4 left-4 bg-[#4b5d3a] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Venta de Aves
                        </div>
                        
                        <!-- Price Badge -->
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#4b5d3a] px-4 py-2 rounded-full font-display font-bold text-sm">
                            Precios según especie
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-8">
                        <h3 class="text-3xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                            Aves de Caza
                        </h3>
                        <p class="text-gray-600 mb-6 font-sans leading-relaxed text-lg">
                            Venta directa de <strong>perdices, faisanes, codornices y palomas</strong> de la máxima calidad. 
                            Criadas en libertad, con todos los certificados sanitarios y garantía de origen.
                        </p>
                        
                        <!-- Features List -->
                        <div class="space-y-3 mb-8">
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-[#4b5d3a] mr-3"></i>
                                <span class="font-sans">Certificados sanitarios incluidos</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-[#4b5d3a] mr-3"></i>
                                <span class="font-sans">Transporte especializado disponible</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-[#4b5d3a] mr-3"></i>
                                <span class="font-sans">Asesoramiento técnico gratuito</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-[#4b5d3a] mr-3"></i>
                                <span class="font-sans">Disponibilidad todo el año</span>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <button class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-3 px-6 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                                Consultar Disponibilidad
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tiradas Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105">
                    <!-- Image Container with Rotating Images -->
                    <div class="relative h-80 overflow-hidden">
                        <img src="{{asset('images/general/cazador-perdiz-2.webp')}}" 
                             alt="Tiradas de perdiz organizadas" 
                             class="product-image active w-full h-full object-cover object-top transition-opacity duration-1000"
                             data-category="tiradas">
                        <img src="{{asset('images/general/cazador-faisan.webp')}}" 
                             alt="Tiradas de faisán organizadas" 
                             class="product-image absolute inset-0 w-full h-full object-cover object-top transition-opacity duration-1000 opacity-0"
                             data-category="tiradas">
                        <img src="{{asset('images/general/cazador-codorniz.webp')}}" 
                             alt="Tiradas de codorniz organizadas" 
                             class="product-image absolute inset-0 w-full h-full object-cover object-top transition-opacity duration-1000 opacity-0"
                             data-category="tiradas">
                        
                        <!-- Category Badge -->
                        <div class="absolute top-4 left-4 bg-[#8b5e3c] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                            Tiradas Organizadas
                        </div>
                        
                        <!-- Capacity Badge -->
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-[#8b5e3c] px-4 py-2 rounded-full font-display font-bold text-sm">
                            Máx. 20 puestos
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-8">
                        <h3 class="text-3xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                            Tiradas Profesionales
                        </h3>
                        <p class="text-gray-600 mb-6 font-sans leading-relaxed text-lg">
                            Organización completa de <strong>tiradas de perdiz, faisán y codorniz</strong>. 
                            Experiencia integral que incluye comida, merienda y el mejor ambiente cazador.
                        </p>
                        
                        <!-- Features List -->
                        <div class="space-y-3 mb-8">
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-[#8b5e3c] mr-3"></i>
                                <span class="font-sans">Comida y merienda incluidas</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-[#8b5e3c] mr-3"></i>
                                <span class="font-sans">Guías profesionales expertos</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-[#8b5e3c] mr-3"></i>
                                <span class="font-sans">Temporada: Octubre - Marzo</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-[#8b5e3c] mr-3"></i>
                                <span class="font-sans">Más de 47 tiradas por temporada</span>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <button class="w-full bg-[#8b5e3c] hover:bg-[#7a5235] text-white py-3 px-6 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                                Reservar Tirada
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section class="relative min-h-screen w-full overflow-hidden flex items-center justify-center">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/historia-caza-2.webp')}}" 
                 alt="Experiencia en caza Los Llanos" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-70 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 container mx-auto px-6">
            <div class="text-center max-w-5xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-8 uppercase tracking-wide">
                    Más de 30 Años de Experiencia
                </h2>
                <p class="text-2xl md:text-3xl text-white font-display leading-loose md:leading-loose font-medium italic tracking-wide mb-12">
                    "Desde 1992, hemos dedicado nuestra vida a perfeccionar estos dos pilares: la cría y venta de aves de caza de máxima calidad, 
                    y la organización de tiradas que crean recuerdos inolvidables. Cada ave que vendemos y cada tirada que organizamos 
                    lleva nuestra pasión y experiencia."
                </p>
                
                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-display font-bold text-[#8b5e3c] mb-2">30+</div>
                        <div class="text-white font-sans">Años de experiencia</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-display font-bold text-[#8b5e3c] mb-2">47+</div>
                        <div class="text-white font-sans">Tiradas por temporada</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-display font-bold text-[#8b5e3c] mb-2">4</div>
                        <div class="text-white font-sans">Especies disponibles</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-display font-bold text-[#8b5e3c] mb-2">100%</div>
                        <div class="text-white font-sans">Satisfacción garantizada</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA Section -->
    <section class="py-20 bg-[#f5f1e3]">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-display font-bold text-dark mb-6 uppercase tracking-wide">
                    ¿Listo para Empezar?
                </h2>
                <p class="text-xl text-gray-600 mb-8 font-sans leading-relaxed">
                    Contacta con nosotros para consultar disponibilidad de aves o reservar tu próxima tirada. 
                    Nuestro equipo te ayudará a encontrar exactamente lo que necesitas.
                </p>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="window.open('tel:+34925123456', '_self')" 
                            class="bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fas fa-phone mr-2"></i>
                        Llamar Ahora
                    </button>
                    <button onclick="window.open('mailto:info@losllanos.com?subject=Consulta Productos - Los Llanos', '_self')" 
                            class="border-2 border-[#4b5d3a] text-[#4b5d3a] hover:bg-[#4b5d3a] hover:text-white px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105">
                        <i class="fas fa-envelope mr-2"></i>
                        Enviar Email
                    </button>
                    <button onclick="window.open('https://wa.me/34925123456?text=Hola,%20me%20interesa%20información%20sobre%20sus%20productos', '_blank')" 
                            class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fab fa-whatsapp mr-2"></i>
                        WhatsApp
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for Image Rotation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image rotation functionality for product cards
            function rotateProductImages() {
                const categories = ['aves', 'tiradas'];
                
                categories.forEach(category => {
                    const images = document.querySelectorAll(`.product-image[data-category="${category}"]`);
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
            rotateProductImages();
            
            // Pause rotation on hover
            const productCards = document.querySelectorAll('.bg-white.rounded-2xl');
            productCards.forEach(card => {
                let interval;
                
                card.addEventListener('mouseenter', () => {
                    // Could pause rotation here if needed
                });
                
                card.addEventListener('mouseleave', () => {
                    // Resume rotation if needed
                });
            });
            
            // Smooth hover effects
            productCards.forEach(card => {
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
