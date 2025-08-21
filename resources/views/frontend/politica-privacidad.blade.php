@extends('layouts.frontend')

@section('title', '✔️ Política de Privacidad y Cookies - Los Llanos')
@section('description', 'Conoce nuestra política de privacidad y el uso de cookies en el Club de Tiro Los Llanos. Transparencia total sobre el tratamiento de tus datos.')

@section('content')
<section class="pt-32 pb-20 bg-[#f5f1e3]">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl lg:text-5xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                    🔒 Política de Privacidad y Cookies
                </h1>
                <p class="text-xl text-gray-600 font-sans leading-relaxed">
                    En Los Llanos respetamos tu privacidad y somos transparentes sobre cómo utilizamos tus datos
                </p>
                <div class="text-sm text-gray-500 mt-4">
                    Última actualización: {{ date('d/m/Y') }}
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-xl shadow-lg p-8 lg:p-12 space-y-8">
                
                <!-- Información General -->
                <section>
                    <h2 class="text-2xl font-display font-bold text-dark mb-4 flex items-center">
                        <span class="mr-3">ℹ️</span>
                        Información General
                    </h2>
                    <div class="prose prose-lg max-w-none font-sans text-gray-700 leading-relaxed">
                        <p>
                            <strong>Club de Tiro Los Llanos</strong> (en adelante, "nosotros", "nuestro" o "la empresa") 
                            se compromete a proteger y respetar tu privacidad. Esta política explica cómo recopilamos, 
                            utilizamos y protegemos tu información personal cuando visitas nuestro sitio web.
                        </p>
                        <p class="mb-4">
                            <strong>Responsable del tratamiento:</strong> Los Llanos Toledo<br>
                            <strong>Contacto:</strong> att@clubdetiro-losllanos.es | 608 910 639
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Data Collection -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-database text-[#4b5d3a] mr-3"></i>
                        ¿Qué datos recopilamos?
                    </h2>
                    <div class="space-y-6">
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-xl font-action font-bold text-dark mb-3">Datos de identificación</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>Nombre y apellidos</li>
                                <li>Dirección de correo electrónico</li>
                                <li>Número de teléfono</li>
                                <li>Dirección postal (cuando sea necesario para el servicio)</li>
                            </ul>
                        </div>
                        
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-xl font-action font-bold text-dark mb-3">Datos de navegación</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>Dirección IP</li>
                                <li>Información del navegador y dispositivo</li>
                                <li>Páginas visitadas y tiempo de permanencia</li>
                                <li>Cookies y tecnologías similares</li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-xl font-action font-bold text-dark mb-3">Datos comerciales</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>Historial de consultas y pedidos</li>
                                <li>Preferencias de productos</li>
                                <li>Comunicaciones mantenidas</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Purpose of Data Processing -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-bullseye text-[#8b5e3c] mr-3"></i>
                        ¿Para qué utilizamos tus datos?
                    </h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-[#f5f1e3] rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3 flex items-center">
                                <i class="fas fa-handshake text-[#4b5d3a] mr-2"></i>
                                Gestión de servicios
                            </h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-1 text-sm">
                                <li>Procesar consultas y pedidos</li>
                                <li>Proporcionar información sobre productos</li>
                                <li>Gestionar la relación comercial</li>
                                <li>Atención al cliente</li>
                            </ul>
                        </div>

                        <div class="bg-[#f5f1e3] rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3 flex items-center">
                                <i class="fas fa-envelope text-[#8b5e3c] mr-2"></i>
                                Comunicaciones
                            </h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-1 text-sm">
                                <li>Envío de newsletters (con consentimiento)</li>
                                <li>Comunicaciones comerciales</li>
                                <li>Notificaciones de servicios</li>
                                <li>Respuesta a consultas</li>
                            </ul>
                        </div>

                        <div class="bg-[#f5f1e3] rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3 flex items-center">
                                <i class="fas fa-chart-line text-[#059669] mr-2"></i>
                                Mejora del servicio
                            </h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-1 text-sm">
                                <li>Análisis de navegación web</li>
                                <li>Mejora de la experiencia de usuario</li>
                                <li>Desarrollo de nuevos productos</li>
                                <li>Estadísticas agregadas</li>
                            </ul>
                        </div>

                        <div class="bg-[#f5f1e3] rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-3 flex items-center">
                                <i class="fas fa-gavel text-[#dc2626] mr-2"></i>
                                Cumplimiento legal
                            </h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-1 text-sm">
                                <li>Obligaciones fiscales y contables</li>
                                <li>Requerimientos legales</li>
                                <li>Prevención de fraude</li>
                                <li>Cumplimiento normativo</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Legal Basis -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-balance-scale text-[#059669] mr-3"></i>
                        Base legal del tratamiento
                    </h2>
                    <div class="bg-gray-50 rounded-xl p-6">
                        <div class="prose prose-lg max-w-none text-gray-700">
                            <p class="mb-4">El tratamiento de tus datos se basa en:</p>
                            <ul class="list-disc list-inside space-y-2">
                                <li><strong>Ejecución de un contrato:</strong> Para gestionar pedidos y servicios contratados</li>
                                <li><strong>Interés legítimo:</strong> Para mejorar nuestros servicios y comunicaciones comerciales</li>
                                <li><strong>Consentimiento:</strong> Para el envío de newsletters y comunicaciones promocionales</li>
                                <li><strong>Cumplimiento legal:</strong> Para obligaciones fiscales y normativas</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Data Sharing -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-share-alt text-[#8b5e3c] mr-3"></i>
                        ¿Compartimos tus datos?
                    </h2>
                    <div class="bg-[#f5f1e3] rounded-xl p-6">
                        <div class="prose prose-lg max-w-none text-gray-700">
                            <p class="mb-4">
                                <strong>No vendemos ni alquilamos tus datos personales a terceros.</strong> 
                                Solo compartimos información en las siguientes circunstancias:
                            </p>
                            <ul class="list-disc list-inside space-y-2">
                                <li>Con proveedores de servicios necesarios para la prestación de nuestros servicios (transporte, pago, etc.)</li>
                                <li>Cuando sea requerido por ley o autoridades competentes</li>
                                <li>Para proteger nuestros derechos legales</li>
                                <li>Con tu consentimiento expreso</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Data Retention -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-clock text-[#4b5d3a] mr-3"></i>
                        ¿Cuánto tiempo conservamos tus datos?
                    </h2>
                    <div class="space-y-4">
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-2">Datos de clientes activos</h3>
                            <p class="text-gray-700">Durante la relación comercial y hasta 6 años después para cumplir obligaciones legales.</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-2">Datos de navegación</h3>
                            <p class="text-gray-700">Máximo 2 años desde la última visita al sitio web.</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-action font-bold text-dark mb-2">Newsletters y comunicaciones</h3>
                            <p class="text-gray-700">Hasta que retires el consentimiento o te des de baja.</p>
                        </div>
                    </div>
                </div>

                <!-- Your Rights -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-user-shield text-[#059669] mr-3"></i>
                        Tus derechos
                    </h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="bg-[#f5f1e3] rounded-lg p-4">
                                <h4 class="font-action font-bold text-dark mb-2 flex items-center">
                                    <i class="fas fa-eye text-[#4b5d3a] mr-2"></i>
                                    Derecho de acceso
                                </h4>
                                <p class="text-gray-700 text-sm">Conocer qué datos tenemos sobre ti y cómo los utilizamos.</p>
                            </div>
                            
                            <div class="bg-[#f5f1e3] rounded-lg p-4">
                                <h4 class="font-action font-bold text-dark mb-2 flex items-center">
                                    <i class="fas fa-edit text-[#8b5e3c] mr-2"></i>
                                    Derecho de rectificación
                                </h4>
                                <p class="text-gray-700 text-sm">Corregir datos inexactos o incompletos.</p>
                            </div>
                            
                            <div class="bg-[#f5f1e3] rounded-lg p-4">
                                <h4 class="font-action font-bold text-dark mb-2 flex items-center">
                                    <i class="fas fa-trash text-[#dc2626] mr-2"></i>
                                    Derecho de supresión
                                </h4>
                                <p class="text-gray-700 text-sm">Solicitar la eliminación de tus datos cuando sea procedente.</p>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="bg-[#f5f1e3] rounded-lg p-4">
                                <h4 class="font-action font-bold text-dark mb-2 flex items-center">
                                    <i class="fas fa-ban text-[#059669] mr-2"></i>
                                    Derecho de oposición
                                </h4>
                                <p class="text-gray-700 text-sm">Oponerte al tratamiento de tus datos en determinadas circunstancias.</p>
                            </div>
                            
                            <div class="bg-[#f5f1e3] rounded-lg p-4">
                                <h4 class="font-action font-bold text-dark mb-2 flex items-center">
                                    <i class="fas fa-download text-[#6366f1] mr-2"></i>
                                    Derecho de portabilidad
                                </h4>
                                <p class="text-gray-700 text-sm">Recibir tus datos en un formato estructurado y legible.</p>
                            </div>
                            
                            <div class="bg-[#f5f1e3] rounded-lg p-4">
                                <h4 class="font-action font-bold text-dark mb-2 flex items-center">
                                    <i class="fas fa-pause text-[#f59e0b] mr-2"></i>
                                    Derecho de limitación
                                </h4>
                                <p class="text-gray-700 text-sm">Solicitar la limitación del tratamiento de tus datos.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mt-6">
                        <h4 class="font-action font-bold text-dark mb-3 flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                            ¿Cómo ejercer tus derechos?
                        </h4>
                        <p class="text-gray-700 mb-4">
                            Puedes ejercer tus derechos enviando un correo electrónico a <strong>att@clubdetiro-losllanos.es</strong> 
                            o llamando al <strong>608 910 639</strong>. Te responderemos en un plazo máximo de 30 días.
                        </p>
                        <p class="text-gray-700 text-sm">
                            Si no estás satisfecho con nuestra respuesta, puedes presentar una reclamación ante la 
                            Agencia Española de Protección de Datos (www.aepd.es).
                        </p>
                    </div>
                </div>

                <!-- Security -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-shield-alt text-[#059669] mr-3"></i>
                        Seguridad de tus datos
                    </h2>
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <div class="prose prose-lg max-w-none text-gray-700">
                            <p class="mb-4">
                                Implementamos medidas técnicas y organizativas apropiadas para proteger tus datos personales 
                                contra el acceso no autorizado, la pérdida, destrucción o alteración:
                            </p>
                            <ul class="list-disc list-inside space-y-2">
                                <li>Cifrado SSL en todas las comunicaciones</li>
                                <li>Acceso restringido a datos personales</li>
                                <li>Copias de seguridad regulares</li>
                                <li>Formación del personal en protección de datos</li>
                                <li>Revisiones periódicas de seguridad</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="mb-12">
                    <h2 class="text-3xl font-display font-bold text-dark mb-6 uppercase tracking-wide flex items-center">
                        <i class="fas fa-envelope text-[#8b5e3c] mr-3"></i>
                        Contacto
                    </h2>
                    <div class="bg-[#f5f1e3] rounded-xl p-8">
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-xl font-action font-bold text-dark mb-4">Responsable del tratamiento</h3>
                                <div class="space-y-2 text-gray-700">
                                    <p><strong>Los Llanos Toledo</strong></p>
                                    <p>Toledo, España</p>
                                    <p>📧 att@clubdetiro-losllanos.es</p>
                                    <p>📞 608 910 639</p>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-action font-bold text-dark mb-4">¿Dudas sobre privacidad?</h3>
                                <div class="space-y-3">
                                    <button onclick="window.open('mailto:att@clubdetiro-losllanos.es?subject=Consulta sobre Política de Privacidad', '_self')" 
                                            class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300">
                                        <i class="fas fa-envelope mr-2"></i>
                                        Enviar consulta
                                    </button>
                                    <button onclick="window.open('tel:+34608910639', '_self')" 
                                            class="w-full border-2 border-[#4b5d3a] text-[#4b5d3a] hover:bg-[#4b5d3a] hover:text-white py-3 px-4 rounded-lg font-action font-semibold tracking-wide uppercase transition-all duration-300">
                                        <i class="fas fa-phone mr-2"></i>
                                        Llamar directamente
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Updates -->
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
                    <h3 class="text-xl font-action font-bold text-dark mb-3 flex items-center">
                        <i class="fas fa-sync-alt text-yellow-600 mr-2"></i>
                        Actualizaciones de esta política
                    </h3>
                    <p class="text-gray-700">
                        Nos reservamos el derecho de actualizar esta Política de Privacidad. 
                        Te notificaremos de cualquier cambio significativo por correo electrónico o 
                        mediante un aviso destacado en nuestro sitio web. 
                        <strong>Última actualización: Agosto 2025</strong>
                    </p>
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
