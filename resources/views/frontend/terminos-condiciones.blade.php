@extends('layouts.frontend')

@section('title', 'Términos y Condiciones | Los Llanos Toledo')
@section('description', 'Términos y condiciones de uso de los servicios de Los Llanos Toledo. Condiciones de venta, entrega y políticas comerciales.')

@section('content')

    <!-- Hero Section -->
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3]">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/historia-caza-2.webp')}}" 
                 alt="Términos y Condiciones Los Llanos" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-6 max-w-4xl mx-auto pt-20">
            <h1 class="text-4xl md:text-6xl font-display font-bold mb-6 leading-tight tracking-wide uppercase">
                Términos y Condiciones
            </h1>
            <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto leading-relaxed font-medium">
                <strong>Condiciones claras y transparentes</strong> para el uso de nuestros servicios 
                y la compra de nuestros productos.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                
                <!-- Introduction -->
                <div class="mb-12">
                    <div class="bg-[#f5f1e3] rounded-2xl p-8 mb-8">
                        <h2 class="text-2xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                            Información General
                        </h2>
                        <div class="prose prose-lg max-w-none text-gray-700">
                            <p class="mb-4">
                                Los presentes términos y condiciones (en adelante, los "Términos") regulan el uso del sitio web 
                                y los servicios ofrecidos por <strong>Los Llanos Toledo</strong> (en adelante, "nosotros", "nuestro" o "Los Llanos").
                            </p>
                            <p class="mb-4">
                                Al acceder y utilizar este sitio web o solicitar nuestros servicios, aceptas cumplir con estos Términos. 
                                Si no estás de acuerdo, te pedimos que no utilices nuestros servicios.
                            </p>
                            <p class="mb-4">
                                <strong>Última actualización:</strong> Agosto 2025<br>
                                <strong>Empresa:</strong> Los Llanos Toledo<br>
                                <strong>Contacto:</strong> att@clubdetiro-losllanos.es | 925 123 456
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Company Information -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-building text-[#4b5d3a] mr-3"></i>
                        Información de la Empresa
                    </h2>
                    <div class="bg-gray-50 rounded-xl p-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-lg font-action font-bold text-dark mb-3">Datos de la empresa</h3>
                                <ul class="space-y-2 text-gray-700">
                                    <li><strong>Razón social:</strong> Los Llanos Toledo</li>
                                    <li><strong>Actividad:</strong> Cría y venta de aves de caza</li>
                                    <li><strong>Ubicación:</strong> Toledo, España</li>
                                    <li><strong>Teléfono:</strong> 925 123 456</li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-lg font-action font-bold text-dark mb-3">Contacto</h3>
                                <ul class="space-y-2 text-gray-700">
                                    <li><strong>Email:</strong> att@clubdetiro-losllanos.es</li>
                                    <li><strong>Web:</strong> clubdetiro-losllanos.es</li>
                                    <li><strong>Horario:</strong> L-V 9:00-18:00</li>
                                    <li><strong>Experiencia:</strong> Más de 30 años</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-list text-[#8b5e3c] mr-3"></i>
                        Nuestros Servicios
                    </h2>
                    <div class="space-y-6">
                        <div class="bg-[#f5f1e3] rounded-xl p-6">
                            <h3 class="text-xl font-action font-bold text-dark mb-3 flex items-center">
                                <i class="fas fa-feather-alt text-[#4b5d3a] mr-2"></i>
                                Venta de Aves de Caza
                            </h3>
                            <div class="prose prose-lg max-w-none text-gray-700">
                                <p class="mb-3">Ofrecemos las siguientes especies:</p>
                                <ul class="list-disc list-inside grid md:grid-cols-2 gap-2">
                                    <li>Perdices rojas de alta calidad</li>
                                    <li>Faisanes comunes de gran porte</li>
                                    <li>Codornices comunes deportivas</li>
                                    <li>Palomas para sueltas</li>
                                </ul>
                                <p class="mt-3 text-sm">
                                    Todas nuestras aves incluyen certificados sanitarios y garantía de origen. 
                                    Cumplimos con toda la normativa vigente en materia de sanidad animal.
                                </p>
                            </div>
                        </div>
                        
                        <div class="bg-[#f5f1e3] rounded-xl p-6">
                            <h3 class="text-xl font-action font-bold text-dark mb-3 flex items-center">
                                <i class="fas fa-calendar-alt text-[#8b5e3c] mr-2"></i>
                                Organización de Tiradas en Finca
                            </h3>
                            <div class="prose prose-lg max-w-none text-gray-700">
                                <p class="mb-3">Planificamos tiradas mensuales durante la temporada:</p>
                                <ul class="list-disc list-inside grid md:grid-cols-3 gap-2">
                                    <li>Octubre - Inicio temporada</li>
                                    <li>Noviembre - Mes dorado</li>
                                    <li>Diciembre - Ambiente navideño</li>
                                    <li>Enero - Año nuevo</li>
                                    <li>Febrero - Transición primaveral</li>
                                    <li>Marzo - Final temporada</li>
                                </ul>
                            </div>
                        </div>

                        <div class="bg-[#f5f1e3] rounded-xl p-6">
                            <h3 class="text-xl font-action font-bold text-dark mb-3 flex items-center">
                                <i class="fas fa-truck text-[#059669] mr-2"></i>
                                Servicios Adicionales
                            </h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-1">
                                <li>Transporte especializado de aves</li>
                                <li>Asesoramiento técnico personalizado</li>
                                <li>Soporte durante las sueltas</li>
                                <li>Certificados sanitarios incluidos</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Terms of Sale -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-shopping-cart text-[#059669] mr-3"></i>
                        Condiciones de Venta
                    </h2>
                    <div class="space-y-6">
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3">Pedidos y Disponibilidad</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>Todos los pedidos están sujetos a disponibilidad de stock</li>
                                <li>Los precios pueden variar según temporada y disponibilidad</li>
                                <li>Se requiere confirmación previa para todos los pedidos</li>
                                <li>Reservamos el derecho de rechazar pedidos por motivos justificados</li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3">Precios y Pago</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>Los precios se consultan directamente y pueden variar</li>
                                <li>Incluyen IVA cuando sea aplicable</li>
                                <li>El pago se realiza según condiciones acordadas en cada caso</li>
                                <li>Aceptamos transferencia bancaria y otros métodos acordados</li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3">Entrega y Transporte</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>Disponemos de transporte especializado para aves</li>
                                <li>Las fechas de entrega se coordinan previamente</li>
                                <li>El cliente debe estar presente en la entrega</li>
                                <li>Los gastos de transporte se facturan por separado</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Quality and Guarantees -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-certificate text-[#8b5e3c] mr-3"></i>
                        Calidad y Garantías
                    </h2>
                    <div class="space-y-6">
                        <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3 flex items-center">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Garantías de Calidad
                            </h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>Todas las aves cuentan con certificados sanitarios válidos</li>
                                <li>Garantizamos el origen y trazabilidad de nuestros animales</li>
                                <li>Más de 30 años de experiencia en el sector</li>
                                <li>Cumplimiento estricto de la normativa sanitaria</li>
                                <li>Controles veterinarios regulares</li>
                            </ul>
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3 flex items-center">
                                <i class="fas fa-shield-alt text-blue-600 mr-2"></i>
                                Limitación de Responsabilidad
                            </h3>
                            <div class="prose prose-lg max-w-none text-gray-700">
                                <p class="mb-3">
                                    Nuestra responsabilidad se limita al cumplimiento de las condiciones acordadas. 
                                    No nos hacemos responsables de:
                                </p>
                                <ul class="list-disc list-inside space-y-1">
                                    <li>Daños causados por mal manejo posterior a la entrega</li>
                                    <li>Pérdidas derivadas del incumplimiento de recomendaciones técnicas</li>
                                    <li>Circunstancias extraordinarias o fuerza mayor</li>
                                    <li>Resultados de caza (factores externos múltiples)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Usage Terms -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-globe text-[#4b5d3a] mr-3"></i>
                        Uso del Sitio Web
                    </h2>
                    <div class="space-y-6">
                        <div class="bg-[#f5f1e3] rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3">Uso Permitido</h3>
                            <div class="prose prose-lg max-w-none text-gray-700">
                                <p class="mb-3">Este sitio web está destinado a:</p>
                                <ul class="list-disc list-inside space-y-1">
                                    <li>Información sobre nuestros productos y servicios</li>
                                    <li>Consultas comerciales y solicitudes de presupuesto</li>
                                    <li>Comunicación con nuestro equipo</li>
                                    <li>Acceso a contenido educativo sobre caza</li>
                                </ul>
                            </div>
                        </div>

                        <div class="bg-[#f5f1e3] rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3">Uso Prohibido</h3>
                            <div class="prose prose-lg max-w-none text-gray-700">
                                <p class="mb-3">Queda prohibido:</p>
                                <ul class="list-disc list-inside space-y-1">
                                    <li>Uso comercial no autorizado del contenido</li>
                                    <li>Reproducción sin permiso de textos o imágenes</li>
                                    <li>Actividades que puedan dañar o interferir el sitio</li>
                                    <li>Uso de información para actividades ilegales</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Intellectual Property -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-copyright text-[#059669] mr-3"></i>
                        Propiedad Intelectual
                    </h2>
                    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
                        <div class="prose prose-lg max-w-none text-gray-700">
                            <p class="mb-4">
                                Todo el contenido de este sitio web, incluyendo pero no limitado a textos, imágenes, 
                                logotipos, gráficos, videos y software, está protegido por derechos de autor y 
                                otras leyes de propiedad intelectual.
                            </p>
                            <p class="mb-4">
                                <strong>Los Llanos Toledo</strong> es propietario de todos los derechos sobre este contenido 
                                o tiene licencia para su uso. Queda prohibida la reproducción, distribución, 
                                modificación o uso comercial sin autorización expresa.
                            </p>
                            <p>
                                Para solicitar permisos de uso, contacta con nosotros en <strong>att@clubdetiro-losllanos.es</strong>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Cancellation and Returns -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-undo text-[#dc2626] mr-3"></i>
                        Cancelaciones y Devoluciones
                    </h2>
                    <div class="space-y-6">
                        <div class="bg-red-50 border border-red-200 rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3">Política de Cancelación</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>Las cancelaciones deben comunicarse con al menos 48 horas de antelación</li>
                                <li>Pedidos especiales pueden tener condiciones diferentes</li>
                                <li>Se aplican penalizaciones según cada caso específico</li>
                                <li>Circunstancias extraordinarias serán evaluadas individualmente</li>
                            </ul>
                        </div>

                        <div class="bg-red-50 border border-red-200 rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3">Devoluciones</h3>
                            <div class="prose prose-lg max-w-none text-gray-700">
                                <p class="mb-3">
                                    Debido a la naturaleza viva de nuestros productos, <strong>no se admiten devoluciones</strong> 
                                    salvo en casos de:
                                </p>
                                <ul class="list-disc list-inside space-y-1">
                                    <li>Incumplimiento de especificaciones acordadas</li>
                                    <li>Problemas sanitarios no detectables en origen</li>
                                    <li>Error en la entrega por nuestra parte</li>
                                </ul>
                                <p class="mt-3 text-sm">
                                    Cualquier reclamación debe presentarse en el momento de la entrega.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Legal Framework -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-gavel text-[#8b5e3c] mr-3"></i>
                        Marco Legal
                    </h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3">Legislación Aplicable</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2 text-sm">
                                <li>Código Civil español</li>
                                <li>Ley General de Defensa de Consumidores y Usuarios</li>
                                <li>Ley de Servicios de la Sociedad de la Información</li>
                                <li>Reglamento General de Protección de Datos (RGPD)</li>
                                <li>Normativa específica de sanidad animal</li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3">Resolución de Disputas</h3>
                            <div class="prose prose-lg max-w-none text-gray-700 text-sm">
                                <p class="mb-3">
                                    Para la resolución de cualquier controversia, las partes se someten 
                                    a los Juzgados y Tribunales de Toledo, renunciando expresamente 
                                    a cualquier otro fuero que pudiera corresponderles.
                                </p>
                                <p>
                                    Se priorizará siempre la resolución amistosa de conflictos mediante 
                                    negociación directa.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-envelope text-[#4b5d3a] mr-3"></i>
                        Contacto y Consultas
                    </h2>
                    <div class="bg-[#f5f1e3] rounded-xl p-8">
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-xl font-action font-bold text-dark mb-4">Información de Contacto</h3>
                                <div class="space-y-3 text-gray-700">
                                    <div class="flex items-center">
                                        <i class="fas fa-building text-[#4b5d3a] mr-3"></i>
                                        <span><strong>Los Llanos Toledo</strong></span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-map-marker-alt text-[#4b5d3a] mr-3"></i>
                                        <span>Toledo, España</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-envelope text-[#4b5d3a] mr-3"></i>
                                        <span>att@clubdetiro-losllanos.es</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-phone text-[#4b5d3a] mr-3"></i>
                                        <span>925 123 456</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-clock text-[#4b5d3a] mr-3"></i>
                                        <span>Lunes a Viernes: 9:00 - 18:00</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-action font-bold text-dark mb-4">¿Dudas sobre los términos?</h3>
                                <div class="space-y-3">
                                    <button onclick="window.open('mailto:att@clubdetiro-losllanos.es?subject=Consulta sobre Términos y Condiciones', '_self')" 
                                            class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300">
                                        <i class="fas fa-envelope mr-2"></i>
                                        Enviar consulta
                                    </button>
                                    <button onclick="window.open('tel:+34608910639', '_self')" 
                                            class="w-full border-2 border-[#4b5d3a] text-[#4b5d3a] hover:bg-[#4b5d3a] hover:text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300">
                                        <i class="fas fa-phone mr-2"></i>
                                        Llamar directamente
                                    </button>
                                    <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20tengo%20dudas%20sobre%20los%20términos%20y%20condiciones', '_blank')" 
                                            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300">
                                        <i class="fab fa-whatsapp mr-2"></i>
                                        WhatsApp
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Updates -->
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                    <h3 class="text-xl font-action font-bold text-dark mb-3 flex items-center">
                        <i class="fas fa-sync-alt text-blue-600 mr-2"></i>
                        Modificaciones de estos Términos
                    </h3>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        <p class="mb-3">
                            Nos reservamos el derecho de modificar estos Términos y Condiciones en cualquier momento. 
                            Las modificaciones serán efectivas desde su publicación en esta página.
                        </p>
                        <p class="mb-3">
                            Te recomendamos revisar periódicamente estos términos. El uso continuado de nuestros servicios 
                            tras la publicación de cambios constituye la aceptación de los mismos.
                        </p>
                        <p class="text-sm">
                            <strong>Fecha de última actualización: Agosto 2025</strong>
                        </p>
                    </div>
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
        });
    </script>

@endsection
