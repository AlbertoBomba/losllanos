<!-- Footer -->
<footer class="bg-black text-white py-1">
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
                    <button onclick="window.open('tel:+34608910639', '_self')" 
                            class="bg-white text-[#4b5d3a] hover:bg-gray-100 px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fas fa-phone mr-2"></i>
                        Llamar Ahora 
                    </button>
                    <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20quiero%20información%20sobre%20tiradas%20en%20finca%20por%20meses', '_blank')" 
                            class="border-2 border-white text-white hover:bg-white hover:text-[#4b5d3a] px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105">
                        <i class="fab fa-whatsapp mr-2"></i>
                        Contactar por WhatsApp
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section -->
    <section class="py-20 bg-gray-900  mb-10">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-display font-bold text-white mb-4 uppercase tracking-wide">
                    Mantente Informado
                </h2>
                <p class="text-xl text-gray-200 mb-8 font-sans leading-relaxed">
                    Suscríbete a nuestro newsletter y recibe los últimos artículos, consejos y noticias 
                    del mundo de la caza directamente en tu correo.
                </p>
                <div class="max-w-2xl mx-auto">
                    @livewire('newsletter-hero')
                    <p class="text-gray-300 text-sm mt-4 font-sans">
                         * No compartimos tu información. Puedes darte de baja en cualquier momento.
                    </p> 
                </div>
            </div>
        </div>
    </section>
    <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
            <!-- Logo and Description -->
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <div class="text-2xl font-display font-bold text-[#4b5d3a] mb-4 uppercase tracking-wide">
                    <a href="{{ route('home') }}" class="flex items-center" title="Ir a la página de inicio">
                        <img src="{{ asset('images/logo/logo-venta-aves-caza.png') }}" class="h-16 lg:h-20 object-cover" alt="Club de tiro los llanos">
                    </a>
                </div>
                <p class="text-gray-300 mb-6 font-sans leading-relaxed">
                    ¡Mantente conectado con nosotros en redes sociales!
                </p>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/TiradasPerdizfaisanPaloma" title="Ir a la página de Facebook" target="_blank" class="w-10 h-10 bg-gray-700 hover:bg-[#4b5d3a] rounded-full flex items-center justify-center transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    {{-- <a href="#" class="w-10 h-10 bg-gray-700 hover:bg-[#4b5d3a] rounded-full flex items-center justify-center transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-700 hover:bg-[#4b5d3a] rounded-full flex items-center justify-center transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-700 hover:bg-[#4b5d3a] rounded-full flex items-center justify-center transition">
                        <i class="fab fa-twitter"></i>
                    </a> --}}
                </div>
            </div>

            <!-- Menu -->
            <div>
                <h3 class="text-xl font-display font-bold mb-4 uppercase tracking-wide">Navegación</h3>
                <ul class="space-y-2 font-sans">
                    <li><a href="{{asset('blog')}}" title="Ir a la sección de blog" class="text-gray-300 hover:text-[#4b5d3a] transition">Blog</a></li>
                    <li><a href="{{asset('productos')}}" title="Ir a la sección de productos" class="text-gray-300 hover:text-[#4b5d3a] transition">Productos</a></li>
                    <li><a href="https://clubdetiro-losllanos.es/#quienes-somos" title="Ir a la sección de quiénes somos" class="text-gray-300 hover:text-[#4b5d3a] transition">Quiénes Somos</a></li>
                    <li><a href="{{asset('reseñas')}}" title="Ir a la sección de reseñas" class="text-gray-300 hover:text-[#4b5d3a] transition">Reseñas</a></li>
                    <li><a href="{{asset('contacto')}}" title="Ir a la sección de contacto" class="text-gray-300 hover:text-[#4b5d3a] transition">Contacto</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-xl font-display font-bold mb-4 uppercase tracking-wide">Contacto</h3>
                <div class="space-y-4 font-sans">
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-[#4b5d3a] mt-1 mr-3"></i>
                        <div>
                            <p class="text-gray-300">Finca Los Llanos,</p>
                            <p class="text-gray-300">Bargas (Toledo), España</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone text-[#4b5d3a] mr-3"></i>
                        <span class="text-gray-300">608 910 639</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-[#4b5d3a] mr-3"></i>
                        <span class="text-gray-300">att@clubdetiro-losllanos.es</span>
                    </div>
                    
                    <div class="mt-8 space-y-4">
                            <!-- Botón Cómo llegar -->
                            <a href="https://www.google.com/maps/dir/?api=1&destination=39.976943,-4.063520&destination_place_id=ChIJ12345678901234567890" 
                               title="Cómo llegar a la Finca Los Llanos, (google maps)"
                                target="_blank" 
                               rel="noopener noreferrer"
                               class="w-full bg-blue-600 text-white font-medium py-4 px-6 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-all duration-200 flex items-center justify-center">
                                <i class="fas fa-route mr-2"></i>
                                Cómo Llegar
                            </a>
                        </div>
                </div>
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="text-xl font-display font-bold mb-4 uppercase tracking-wide">Redes Sociales</h3>
                <div class="space-y-2 font-sans">
                    <a href="https://www.facebook.com/TiradasPerdizfaisanPaloma" title="Ir a la página de Facebook" class="block text-gray-300 hover:text-[#4b5d3a] transition">Facebook</a>
                    {{-- <a href="#" class="block text-gray-300 hover:text-[#4b5d3a] transition">Instagram</a>
                    <a href="#" class="block text-gray-300 hover:text-[#4b5d3a] transition">YouTube</a>
                    <a href="#" class="block text-gray-300 hover:text-[#4b5d3a] transition">Twitter</a> --}}
                </div>
            </div>

            <!-- Enlaces de Interés -->
            <div>
                <h3 class="text-xl font-display font-bold mb-4 uppercase tracking-wide">Enlaces de Interés</h3>
                <div class="space-y-2 font-sans">
                    <a href="https://fecaza.com/" title="Ir a la página de la Federación Española de Caza enlace externo" target="_blank" rel="noopener noreferrer" class="block text-gray-300 hover:text-[#4b5d3a] transition">
                        <i class="fas fa-external-link-alt mr-2 text-sm"></i>
                        Federación Española de Caza
                    </a>
                    <a href="https://fccm.es/" title="Ir a la página de la Federación de Caza de Castilla-La Mancha enlace externo" target="_blank" rel="noopener noreferrer" class="block text-gray-300 hover:text-[#4b5d3a] transition">
                        <i class="fas fa-external-link-alt mr-2 text-sm"></i>
                        Federación de Caza de Castilla-La Mancha
                    </a>
                    <div class="text-xs text-gray-400 mt-3 italic">
                        Enlaces a organizaciones oficiales del sector cinegético
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="border-t border-gray-700 mt-12 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center font-sans">
                <div class="flex flex-wrap justify-center md:justify-start space-x-6 mb-4 md:mb-0">
                    <a href="{{asset('politica-privacidad')}}" title="Ir a la página de Política de Privacidad" class="text-gray-300 hover:text-[#4b5d3a] transition">Política de Privacidad</a>
                    <a href="{{asset('terminos-condiciones')}}" title="Ir a la página de Términos y Condiciones" class="text-gray-300 hover:text-[#4b5d3a] transition">Términos y Condiciones</a>
                    <button onclick="window.cookieManager?.showSettingsModal()" 
                            title="Gestionar preferencias de cookies"
                            class="text-gray-300 hover:text-[#4b5d3a] transition cursor-pointer underline">
                        🍪 Gestionar Cookies
                    </button>
                </div>
                <p class="text-gray-400">©Copyright 2025, Todos los Derechos Reservados. 
                    <a href="https://bycolor.es/dise%C3%B1o-web-en-toledo" title="Información sobre la empresa de desarrollo" class="text-gray-300 hover:text-[#4b5d3a] transition">
                        Diseño y Desarrollo por bycolor.es
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>