@extends('layouts.frontend')

@section('title', 'Perdices Rojas para Suelta - Venta Directa | Los Llanos Toledo')
@section('description', 'Venta de perdices rojas de máxima calidad para sueltas. Criadas en semi-libertad, certificados sanitarios incluidos, transporte especializado. Más de 30 años de experiencia en Toledo.')

@section('content')

    <!-- Hero Section -->
    <section class="relative min-h-[80vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3]">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/perdiz-volando.webp')}}" 
                 alt="Perdices rojas volando en libertad Los Llanos Toledo" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-6 max-w-5xl mx-auto pt-20">
            <div class="mb-6">
                <span class="bg-[#8b5e3c] text-white px-4 py-2 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                    Especie Premium
                </span>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-display font-bold mb-6 leading-tight tracking-wide uppercase">
                Perdices Rojas
            </h1>
            
            <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-4xl mx-auto leading-relaxed font-medium">
                <em class="font-display text-2xl md:text-3xl">La especie más demandada para sueltas</em><br><br>
                <strong>Perdices rojas de primera calidad</strong>, criadas en semi-libertad en el corazón de Toledo. 
                Mantenemos sus instintos naturales para garantizar un vuelo espectacular y gran supervivencia.
            </p>
            
            <!-- Quick Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto mb-8">
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-display font-bold text-[#8b5e3c] mb-1">Oct-Mar</div>
                    <div class="text-gray-200 font-sans text-sm">Temporada Principal</div>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-display font-bold text-[#8b5e3c] mb-1">Semi-libertad</div>
                    <div class="text-gray-200 font-sans text-sm">Crianza Natural</div>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-display font-bold text-[#8b5e3c] mb-1">100%</div>
                    <div class="text-gray-200 font-sans text-sm">Certificadas</div>
                </div>
            </div>
            
            <!-- CTA Button -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="window.open('tel:+34925123456', '_self')" 
                        class="bg-[#8b5e3c] hover:bg-[#7a5235] text-white px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                    <i class="fas fa-phone mr-2"></i>
                    Consultar Precio
                </button>
                <button onclick="window.open('https://wa.me/34925123456?text=Hola,%20me%20interesa%20información%20sobre%20perdices%20rojas', '_blank')" 
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
            <div class="grid lg:grid-cols-2 gap-16 items-start max-w-7xl mx-auto">
                
                <!-- Image Gallery -->
                <div class="relative">
                    <div class="aspect-w-16 aspect-h-12 rounded-2xl overflow-hidden shadow-2xl mb-6">
                        <img src="{{asset('images/general/perdiz-volando.webp')}}" 
                             alt="Perdices rojas volando calidad premium Los Llanos" 
                             class="main-image w-full h-96 object-cover transition-opacity duration-500"
                             id="mainImage">
                    </div>
                    
                    <!-- Thumbnail Gallery -->
                    <div class="grid grid-cols-3 gap-4">
                        <img src="{{asset('images/general/perdiz-volando.webp')}}" 
                             alt="Perdiz roja volando"
                             class="thumbnail w-full h-24 object-cover rounded-lg cursor-pointer border-2 border-[#8b5e3c] opacity-100"
                             onclick="changeMainImage(this, '{{asset('images/general/perdiz-volando.webp')}}')">
                        <img src="{{asset('images/general/cazador-perdiz-2.webp')}}" 
                             alt="Cazador con perdices rojas"
                             class="thumbnail w-full h-24 object-cover rounded-lg cursor-pointer border-2 border-gray-300 opacity-70 hover:opacity-100"
                             onclick="changeMainImage(this, '{{asset('images/general/cazador-perdiz-2.webp')}}')">
                        <img src="{{asset('images/general/historia-caza-uno.webp')}}" 
                             alt="Perdices en su hábitat natural"
                             class="thumbnail w-full h-24 object-cover rounded-lg cursor-pointer border-2 border-gray-300 opacity-70 hover:opacity-100"
                             onclick="changeMainImage(this, '{{asset('images/general/historia-caza-uno.webp')}}')">
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="space-y-8">
                    <!-- Header -->
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <span class="bg-[#8b5e3c] text-white px-3 py-1 rounded-full font-action font-semibold text-sm tracking-wide uppercase">
                                Perdices Rojas
                            </span>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full font-action font-semibold text-sm">
                                Disponible
                            </span>
                        </div>
                        
                        <h2 class="text-4xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                            Perdices Rojas Premium
                        </h2>
                        
                        <div class="flex items-center mb-6">
                            <div class="text-3xl font-display font-bold text-[#8b5e3c] mr-4">Precio a consultar</div>
                            <div class="text-gray-500 font-sans">por unidad</div>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-600 font-sans leading-relaxed text-lg">
                            Nuestras <strong>perdices rojas</strong> son criadas en condiciones de semi-libertad en fincas de Toledo, 
                            lo que les permite mantener sus instintos naturales de vuelo y supervivencia. Esta metodología garantiza 
                            aves de máxima calidad que proporcionan lances espectaculares durante las sueltas.
                        </p>
                        
                        <p class="text-gray-600 font-sans leading-relaxed">
                            Con más de 30 años de experiencia, hemos perfeccionado nuestro sistema de cría para ofrecer 
                            perdices que se adaptan perfectamente a cualquier tipo de terreno y condiciones de suelta.
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
                                    <i class="fas fa-check-circle text-[#8b5e3c] mr-3"></i>
                                    <span class="font-sans text-gray-700">Criadas en semi-libertad</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-[#8b5e3c] mr-3"></i>
                                    <span class="font-sans text-gray-700">Excelente vuelo y supervivencia</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-[#8b5e3c] mr-3"></i>
                                    <span class="font-sans text-gray-700">Instintos naturales preservados</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-[#8b5e3c] mr-3"></i>
                                    <span class="font-sans text-gray-700">Adaptación a todo tipo de terreno</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <h3 class="text-xl font-display font-bold text-dark uppercase tracking-wide">
                                Servicios Incluidos
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-certificate text-[#8b5e3c] mr-3"></i>
                                    <span class="font-sans text-gray-700">Certificados sanitarios</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-truck text-[#8b5e3c] mr-3"></i>
                                    <span class="font-sans text-gray-700">Transporte especializado</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-user-tie text-[#8b5e3c] mr-3"></i>
                                    <span class="font-sans text-gray-700">Asesoramiento técnico</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-[#8b5e3c] mr-3"></i>
                                    <span class="font-sans text-gray-700">Soporte personalizado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Technical Info -->
                    <div class="bg-[#f5f1e3] rounded-2xl p-6">
                        <h3 class="text-xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                            Información Técnica
                        </h3>
                        <div class="grid md:grid-cols-2 gap-4 text-sm">
                            <div><strong>Temporada principal:</strong> Octubre - Marzo</div>
                            <div><strong>Tipo de cría:</strong> Semi-libertad</div>
                            <div><strong>Origen:</strong> Toledo, España</div>
                            <div><strong>Certificaciones:</strong> Sanitarias incluidas</div>
                            <div><strong>Transporte:</strong> Vehículos especializados</div>
                            <div><strong>Disponibilidad:</strong> Bajo pedido</div>
                        </div>
                    </div>
                    
                    <!-- CTA Buttons -->
                    <div class="space-y-4">
                        <button onclick="window.open('tel:+34925123456', '_self')" 
                                class="w-full bg-[#8b5e3c] hover:bg-[#7a5235] text-white py-4 px-6 rounded-lg font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Llamar para Consultar Precio
                        </button>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <button onclick="window.open('mailto:info@losllanos.com?subject=Consulta Perdices Rojas - Los Llanos&body=Hola,%20me%20interesa%20información%20sobre%20perdices%20rojas.%20Por%20favor%20contacten%20conmigo.', '_self')" 
                                    class="w-full border-2 border-[#8b5e3c] text-[#8b5e3c] hover:bg-[#8b5e3c] hover:text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300">
                                <i class="fas fa-envelope mr-2"></i>
                                Email
                            </button>
                            <button onclick="window.open('https://wa.me/34925123456?text=Hola,%20me%20interesa%20información%20sobre%20perdices%20rojas%20para%20suelta', '_blank')" 
                                    class="w-full bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300">
                                <i class="fab fa-whatsapp mr-2"></i>
                                WhatsApp
                            </button>
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
                    ¿Por Qué Elegir Nuestras Perdices?
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-sans leading-relaxed">
                    Más de 30 años de experiencia nos avalan como referentes en la cría y venta de perdices rojas de calidad premium.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Reason 1 -->
                <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-star text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                        Calidad Premium
                    </h3>
                    <p class="text-gray-600 font-sans leading-relaxed">
                        Nuestras perdices son criadas siguiendo los más altos estándares de calidad, 
                        garantizando aves fuertes y con excelente capacidad de vuelo.
                    </p>
                </div>

                <!-- Reason 2 -->
                <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[#4b5d3a] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-leaf text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                        Cría Natural
                    </h3>
                    <p class="text-gray-600 font-sans leading-relaxed">
                        Criadas en condiciones de semi-libertad que preservan sus instintos naturales, 
                        resultando en aves más resistentes y adaptables.
                    </p>
                </div>

                <!-- Reason 3 -->
                <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-[#059669] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-handshake text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                        Servicio Completo
                    </h3>
                    <p class="text-gray-600 font-sans leading-relaxed">
                        Incluimos transporte especializado, certificados sanitarios y asesoramiento técnico 
                        personalizado para garantizar el éxito de tu suelta.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="relative min-h-[60vh] w-full overflow-hidden flex items-center justify-center">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/cazador-perdiz-2.webp')}}" 
                 alt="Cliente satisfecho con perdices Los Llanos" 
                 class="w-full h-full object-cover object-top">
        </div>
        
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-70 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 container mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto">
                <p class="text-2xl md:text-3xl text-white font-display leading-loose md:leading-loose font-medium italic tracking-wide mb-8">
                    "Las perdices de Los Llanos son sin duda las mejores que he comprado. Su vuelo es espectacular y 
                    la supervivencia en el campo es excelente. Llevan más de 30 años perfeccionando su sistema y se nota."
                </p>
                <div class="text-gray-300 font-sans">
                    - Juan Carlos M., Cliente desde 2018
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="py-20 bg-[#8b5e3c]">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-display font-bold text-white mb-6 uppercase tracking-wide">
                    ¿Listo para tu Próxima Suelta?
                </h2>
                <p class="text-xl text-gray-200 mb-8 font-sans leading-relaxed">
                    Contacta con nosotros ahora y consigue las mejores perdices rojas de Toledo. 
                    Te asesoramos personalmente y nos encargamos de todo.
                </p>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="window.open('tel:+34925123456', '_self')" 
                            class="bg-white text-[#8b5e3c] hover:bg-gray-100 px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fas fa-phone mr-2"></i>
                        Llamar Ahora: 925 123 456
                    </button>
                    <button onclick="window.open('https://wa.me/34925123456?text=Hola,%20quiero%20comprar%20perdices%20rojas%20para%20suelta', '_blank')" 
                            class="border-2 border-white text-white hover:bg-white hover:text-[#8b5e3c] px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105">
                        <i class="fab fa-whatsapp mr-2"></i>
                        Contactar por WhatsApp
                    </button>
                </div>
                
                <div class="mt-8 text-gray-200 font-sans text-sm">
                    <p>📍 <strong>Los Llanos, Toledo</strong> | 🕒 <strong>Atención personalizada</strong> | 🚚 <strong>Transporte incluido</strong></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fixed CTA Widget -->
    <div id="ctaWidget" class="fixed right-4 lg:right-6 top-1/2 transform -translate-y-1/2 z-40 opacity-0 invisible transition-all duration-500">
        <div class="bg-gradient-to-br from-[#8b5e3c] to-[#7a5235] rounded-2xl shadow-2xl p-4 lg:p-6 w-16 lg:w-64 lg:max-w-xs">
            <!-- Header - Solo en desktop -->
            <div class="hidden lg:block text-center mb-4">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-crosshairs text-[#8b5e3c] text-xl"></i>
                </div>
                <h3 class="font-display font-bold text-white text-lg uppercase tracking-wide">
                    Perdices Rojas
                </h3>
                <p class="text-sm text-gray-200 font-sans mt-2 leading-relaxed">
                    ¿Te interesa? Contacta ahora
                </p>
            </div>
            
            <!-- Action Buttons -->
            <div class="space-y-2 lg:space-y-3">
                <button onclick="window.open('tel:+34925123456', '_self')" class="w-full bg-white hover:bg-gray-100 text-[#8b5e3c] p-3 lg:py-3 lg:px-4 rounded-lg font-action font-semibold text-xs lg:text-sm tracking-wide transition-all duration-300 hover:scale-105 shadow-lg flex items-center justify-center" title="Llamar">
                    <i class="fas fa-phone lg:mr-2"></i>
                    <span class="hidden lg:inline">Llamar</span>
                </button>
                <button onclick="window.open('mailto:info@losllanos.com?subject=Consulta Perdices - Los Llanos', '_self')" class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white p-3 lg:py-3 lg:px-4 rounded-lg font-action font-semibold text-xs lg:text-sm tracking-wide transition-all duration-300 hover:scale-105 shadow-lg flex items-center justify-center" title="Email">
                    <i class="fas fa-envelope lg:mr-2"></i>
                    <span class="hidden lg:inline">Email</span>
                </button>
                <button onclick="window.open('https://wa.me/34925123456?text=Hola,%20me%20interesan%20las%20perdices%20rojas', '_blank')" class="w-full bg-green-500 hover:bg-green-600 text-white p-3 lg:py-3 lg:px-4 rounded-lg font-action font-semibold text-xs lg:text-sm tracking-wide transition-all duration-300 hover:scale-105 shadow-lg flex items-center justify-center" title="WhatsApp">
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
    <button id="scrollToTop" class="fixed bottom-8 right-8 bg-[#8b5e3c] hover:bg-[#7a5235] text-white w-12 h-12 rounded-full shadow-lg opacity-0 invisible transition-all duration-300">
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
                    thumb.classList.remove('border-[#8b5e3c]', 'opacity-100');
                    thumb.classList.add('border-gray-300', 'opacity-70');
                });
                
                thumbnail.classList.remove('border-gray-300', 'opacity-70');
                thumbnail.classList.add('border-[#8b5e3c]', 'opacity-100');
            };

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
