@extends('layouts.frontend')

@section('title', '✔️ Política de Cookies - Los Llanos')
@section('description', 'Información detallada sobre el uso de cookies en el sitio web del Club de Tiro Los Llanos. Gestiona tus preferencias de cookies.')

@section('content')
<section class="pt-32 pb-20 bg-[#f5f1e3]">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl lg:text-5xl font-display font-bold text-dark mb-4 uppercase tracking-wide">
                    🍪 Política de Cookies
                </h1>
                <p class="text-xl text-gray-600 font-sans leading-relaxed">
                    Todo lo que necesitas saber sobre las cookies en nuestro sitio web
                </p>
                <div class="text-sm text-gray-500 mt-4">
                    Última actualización: {{ date('d/m/Y') }}
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-xl shadow-lg p-8 lg:p-12 space-y-8">
                
                <!-- ¿Qué son las cookies? -->
                <section>
                    <h2 class="text-2xl font-display font-bold text-dark mb-4 flex items-center">
                        <span class="mr-3">❓</span>
                        ¿Qué son las cookies?
                    </h2>
                    <div class="prose prose-lg max-w-none font-sans text-gray-700 leading-relaxed">
                        <p>
                            Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas nuestro sitio web. 
                            Nos ayudan a mejorar tu experiencia de navegación, recordar tus preferencias y analizar cómo usas nuestro sitio.
                        </p>
                        <p>
                            Las cookies no contienen información personal identificable por sí solas y no pueden dañar tu dispositivo.
                        </p>
                    </div>
                </section>

                <!-- Tipos de cookies que usamos -->
                <section>
                    <h2 class="text-2xl font-display font-bold text-dark mb-6 flex items-center">
                        <span class="mr-3">🔍</span>
                        Tipos de cookies que utilizamos
                    </h2>
                    
                    <div class="grid gap-6">
                        <!-- Cookies Esenciales -->
                        <div class="border border-green-200 bg-green-50 rounded-lg p-6">
                            <div class="flex items-center mb-4">
                                <span class="text-2xl mr-3">🔒</span>
                                <h3 class="text-xl font-semibold text-green-800">Cookies Esenciales</h3>
                                <span class="ml-auto bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold">SIEMPRE ACTIVAS</span>
                            </div>
                            <p class="text-green-700 mb-4">
                                Estas cookies son necesarias para el funcionamiento básico del sitio web y no se pueden desactivar.
                            </p>
                            <div class="bg-white rounded p-4">
                                <h4 class="font-semibold text-green-800 mb-2">Ejemplos:</h4>
                                <ul class="text-sm text-green-700 space-y-1">
                                    <li>• Cookies de sesión para mantener tu navegación</li>
                                    <li>• Cookies de seguridad para proteger el sitio</li>
                                    <li>• Cookies para recordar tus preferencias básicas</li>
                                    <li>• Cookies de consentimiento de cookies</li>
                                </ul>
                                <p class="text-xs text-green-600 mt-3">
                                    <strong>Duración:</strong> Sesión de navegación o hasta 1 año
                                </p>
                            </div>
                        </div>

                        <!-- Cookies de Análisis -->
                        <div class="border border-blue-200 bg-blue-50 rounded-lg p-6">
                            <div class="flex items-center mb-4">
                                <span class="text-2xl mr-3">📊</span>
                                <h3 class="text-xl font-semibold text-blue-800">Cookies de Análisis</h3>
                                <span class="ml-auto bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold">OPCIONAL</span>
                            </div>
                            <p class="text-blue-700 mb-4">
                                Nos ayudan a entender cómo los visitantes interactúan con nuestro sitio web recopilando información de forma anónima.
                            </p>
                            <div class="bg-white rounded p-4">
                                <h4 class="font-semibold text-blue-800 mb-2">Proveedor: Google Analytics</h4>
                                <ul class="text-sm text-blue-700 space-y-1">
                                    <li>• _ga: Distingue a los usuarios únicos</li>
                                    <li>• _ga_*: Mantiene el estado de la sesión</li>
                                    <li>• _gid: Distingue a los usuarios únicos</li>
                                </ul>
                                <p class="text-xs text-blue-600 mt-3">
                                    <strong>Duración:</strong> Entre 24 horas y 2 años<br>
                                    <strong>Finalidad:</strong> Análisis de tráfico web, estadísticas de uso
                                </p>
                            </div>
                        </div>

                        <!-- Cookies Funcionales -->
                        <div class="border border-purple-200 bg-purple-50 rounded-lg p-6">
                            <div class="flex items-center mb-4">
                                <span class="text-2xl mr-3">⚙️</span>
                                <h3 class="text-xl font-semibold text-purple-800">Cookies Funcionales</h3>
                                <span class="ml-auto bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-semibold">OPCIONAL</span>
                            </div>
                            <p class="text-purple-700 mb-4">
                                Permiten funcionalidades mejoradas y personalización, como recordar tus preferencias de idioma.
                            </p>
                            <div class="bg-white rounded p-4">
                                <h4 class="font-semibold text-purple-800 mb-2">Ejemplos:</h4>
                                <ul class="text-sm text-purple-700 space-y-1">
                                    <li>• Preferencias de idioma</li>
                                    <li>• Configuraciones de usuario</li>
                                    <li>• Datos de formularios guardados</li>
                                    <li>• Preferencias de visualización</li>
                                </ul>
                                <p class="text-xs text-purple-600 mt-3">
                                    <strong>Duración:</strong> Entre 30 días y 1 año
                                </p>
                            </div>
                        </div>

                        <!-- Cookies de Marketing -->
                        <div class="border border-orange-200 bg-orange-50 rounded-lg p-6">
                            <div class="flex items-center mb-4">
                                <span class="text-2xl mr-3">🎯</span>
                                <h3 class="text-xl font-semibold text-orange-800">Cookies de Marketing</h3>
                                <span class="ml-auto bg-gray-500 text-white px-3 py-1 rounded-full text-xs font-semibold">NO UTILIZADAS</span>
                            </div>
                            <p class="text-orange-700 mb-4">
                                Actualmente no utilizamos cookies de marketing o publicidad en nuestro sitio web.
                            </p>
                            <div class="bg-white rounded p-4">
                                <p class="text-sm text-orange-600">
                                    En el futuro, si decidimos utilizar este tipo de cookies, te informaremos y pediremos tu consentimiento específico.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Gestión de cookies -->
                <section class="bg-[#8b5e3c] text-white rounded-lg p-6">
                    <h2 class="text-2xl font-display font-bold mb-4 flex items-center">
                        <span class="mr-3">🎛️</span>
                        Gestiona tus cookies
                    </h2>
                    <p class="mb-6 text-lg">
                        Tienes control total sobre las cookies que utilizamos en nuestro sitio. 
                        Puedes cambiar tus preferencias en cualquier momento.
                    </p>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="font-semibold mb-3 text-lg">🔧 Gestionar preferencias</h3>
                            <button onclick="window.cookieManager?.showSettingsModal()" 
                                    class="w-full bg-white text-[#8b5e3c] px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-300">
                                Configurar Cookies
                            </button>
                        </div>
                        
                        <div>
                            <h3 class="font-semibold mb-3 text-lg">🌐 Cookies del navegador</h3>
                            <p class="text-sm mb-3">
                                También puedes gestionar las cookies directamente desde tu navegador:
                            </p>
                            <ul class="text-sm space-y-1">
                                <li>• Chrome: Configuración > Privacidad y seguridad</li>
                                <li>• Firefox: Opciones > Privacidad y seguridad</li>
                                <li>• Safari: Preferencias > Privacidad</li>
                                <li>• Edge: Configuración > Privacidad</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Información legal -->
                <section>
                    <h2 class="text-2xl font-display font-bold text-dark mb-4 flex items-center">
                        <span class="mr-3">⚖️</span>
                        Base legal y cumplimiento
                    </h2>
                    <div class="prose prose-lg max-w-none font-sans text-gray-700 leading-relaxed">
                        <p>
                            El uso de cookies en nuestro sitio web cumple con:
                        </p>
                        <ul>
                            <li><strong>RGPD:</strong> Reglamento General de Protección de Datos (UE) 2016/679</li>
                            <li><strong>LOPD-GDD:</strong> Ley Orgánica 3/2018 de Protección de Datos Personales</li>
                            <li><strong>LSSI-CE:</strong> Ley 34/2002 de Servicios de la Sociedad de la Información</li>
                        </ul>
                        
                        <div class="bg-gray-100 rounded-lg p-4 mt-4">
                            <h4 class="font-semibold mb-2">🛡️ Tus derechos sobre las cookies:</h4>
                            <ul class="text-sm space-y-1">
                                <li>• <strong>Información:</strong> Derecho a saber qué cookies utilizamos</li>
                                <li>• <strong>Acceso:</strong> Conocer qué datos recopilamos</li>
                                <li>• <strong>Control:</strong> Activar o desactivar cookies no esenciales</li>
                                <li>• <strong>Eliminación:</strong> Borrar cookies almacenadas</li>
                                <li>• <strong>Oposición:</strong> Rechazar el uso de cookies de análisis</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Contacto -->
                <section class="bg-[#4b5d3a] text-white rounded-lg p-6">
                    <h2 class="text-2xl font-display font-bold mb-4 flex items-center">
                        <span class="mr-3">📞</span>
                        ¿Tienes dudas sobre las cookies?
                    </h2>
                    <div class="font-sans leading-relaxed">
                        <p class="mb-4">
                            Si tienes alguna pregunta sobre nuestra política de cookies o quieres ejercer 
                            tus derechos, no dudes en contactarnos:
                        </p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p><strong>📧 Email:</strong> att@clubdetiro-losllanos.es</p>
                                <p><strong>📱 Teléfono:</strong> +34 608 910 639</p>
                            </div>
                            <div>
                                <p><strong>🏢 Dirección:</strong></p>
                                <p>Club de Tiro Los Llanos<br>
                                Toledo, España</p>
                            </div>
                        </div>
                        
                        <div class="mt-6 pt-4 border-t border-white/20">
                            <p class="text-sm">
                                <strong>Enlaces relacionados:</strong> 
                                <a href="{{ route('politica-privacidad') }}" class="underline hover:text-gray-200">
                                    Política de Privacidad
                                </a>
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Actualización -->
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <h3 class="font-semibold text-yellow-800 mb-2 flex items-center">
                        <span class="mr-2">🔄</span>
                        Actualizaciones de esta política
                    </h3>
                    <p class="text-yellow-700 text-sm">
                        Nos reservamos el derecho de actualizar esta Política de Cookies. 
                        Cualquier cambio será notificado en esta página con la fecha de actualización correspondiente.
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
