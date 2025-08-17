@props([
    'modalId' => 'calendarioModal',
    'title' => 'Calendario Temporada 2024-2025',
    'message' => 'Aún no disponemos del calendario de tiradas de perdiz, faisán y paloma para la temporada 2024-2025.',
    'autoOpen' => true,
    'autoOpenDelay' => 1500,
    'showAlternatives' => true,
    'checkSubscription' => true,
    'useBackendCheck' => true,
    'expirationDays' => 30,
    'emailSubject' => 'Suscripción Newsletter - Temporada 2024-2025',
    'emailBody' => 'Hola,%0A%0AMe gustaría suscribirme a vuestras newsletters para estar informado sobre:%0A%0A- Calendario de tiradas de perdiz, faisán y paloma 2024-2025%0A- Todas las novedades de Los Llanos%0A%0AGracias.',
    'whatsappMessage' => 'Hola, me interesa información sobre el calendario de tiradas 2024-2025',
    'phone' => '+34608910639',
    'email' => 'att@clubdetiro-losllanos.es'
])

@php
    use App\Helpers\NewsletterHelper;
    $backendSubscriptionCheck = $useBackendCheck ? NewsletterHelper::isUserSubscribed() : false;
@endphp

<!-- Modal de Aviso -->
<div id="{{ $modalId }}" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-75 transition-opacity"></div>
    
    <!-- Modal Content -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative bg-white rounded-2xl shadow-2xl max-w-lg w-full mx-4 transform transition-all">
            <!-- Header -->
            <div class="bg-gradient-to-r from-[#8b5e3c] to-[#4b5d3a] p-6 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-times text-3xl text-yellow-300 mr-3 animate-pulse"></i>
                        <h3 class="text-xl font-bold text-white">{{ $title }}</h3>
                    </div>
                    <button onclick="closeModal('{{ $modalId }}')" class="text-white hover:text-yellow-300 transition-colors">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Body -->
            <div class="p-6">
                <div class="text-center mb-6">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                        <div class="flex items-center justify-center mb-2">
                            <i class="fas fa-exclamation-triangle text-2xl mr-2"></i>
                            <strong class="text-lg">¡Importante!</strong>
                        </div>
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                </div>
                
                @if($showAlternatives)
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                        <div>
                            <h4 class="font-semibold text-blue-800 mb-2">¿Qué puedes hacer mientras tanto?</h4>
                            <ul class="text-blue-700 text-sm space-y-1">
                                <li>• Suscríbete a nuestras newsletters</li>
                                <li>• Consulta nuestro coto intensivo de codornices (disponible todo el año)</li>
                                <li>• Contáctanos para más información</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                
                <!-- Botones de acción -->
                <div class="space-y-3">
                    <button onclick="suscribeNewsletter('{{ $modalId }}', '{{ $email }}', '{{ $emailSubject }}', '{{ $emailBody }}')" 
                            class="w-full bg-gradient-to-r from-[#4b5d3a] to-[#8b5e3c] hover:from-[#3a4a2c] hover:to-[#7a5235] text-white py-3 px-6 rounded-lg font-bold tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fas fa-envelope mr-2"></i>
                        Suscribirme a las Newsletter
                    </button>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <button onclick="window.open('tel:{{ $phone }}', '_self')" 
                                class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg font-semibold text-sm tracking-wide uppercase transition-all duration-300">
                            <i class="fas fa-phone mr-1"></i>
                            Llamar
                        </button>
                        <button onclick="window.open('https://wa.me/{{ str_replace('+', '', $phone) }}?text={{ $whatsappMessage }}', '_blank')" 
                                class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg font-semibold text-sm tracking-wide uppercase transition-all duration-300">
                            <i class="fab fa-whatsapp mr-1"></i>
                            WhatsApp
                        </button>
                    </div>
                    
                    <button onclick="closeModal('{{ $modalId }}')" 
                            class="w-full border-2 border-gray-300 text-gray-700 hover:bg-gray-50 py-2 px-6 rounded-lg font-semibold tracking-wide transition-all duration-300">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@if($autoOpen && !$backendSubscriptionCheck)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if($checkSubscription)
        // Función para verificar suscripción
        function checkIfUserSubscribed() {
            // Verificación del backend (ya realizada en PHP)
            const backendCheck = {{ $backendSubscriptionCheck ? 'true' : 'false' }};
            if (backendCheck) {
                return true;
            }
            
            // Método 1: Verificar localStorage
            const localStorageSubscribed = localStorage.getItem('newsletter_subscribed');
            if (localStorageSubscribed) {
                const subscriptionDate = localStorage.getItem('newsletter_subscribed_date');
                if (subscriptionDate) {
                    const daysSinceSubscription = Math.floor((new Date() - new Date(subscriptionDate)) / (1000 * 60 * 60 * 24));
                    if (daysSinceSubscription < {{ $expirationDays }}) {
                        return true;
                    }
                }
            }
            
            // Método 2: Verificar cookie
            function getCookie(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
                return null;
            }
            
            const cookieSubscribed = getCookie('newsletter_subscribed');
            if (cookieSubscribed === 'true') {
                return true;
            }
            
            // Método 3: Verificar sessionStorage (para esta sesión)
            const sessionSubscribed = sessionStorage.getItem('newsletter_subscribed_session');
            if (sessionSubscribed === 'true') {
                return true;
            }
            
            return false;
        }
        
        // Solo mostrar modal si el usuario NO está suscrito
        if (!checkIfUserSubscribed()) {
            setTimeout(function() {
                openModal('{{ $modalId }}');
            }, {{ $autoOpenDelay }});
        }
        @else
        // Mostrar modal sin verificar suscripción
        setTimeout(function() {
            openModal('{{ $modalId }}');
        }, {{ $autoOpenDelay }});
        @endif
    });
@elseif($autoOpen && $backendSubscriptionCheck)
<!-- Usuario ya suscrito según backend, no mostrar modal -->
<script>
    console.log('Modal no mostrado: usuario ya suscrito según verificación del servidor');
@endif
    });
</script>
@endif

<script>
    // Funciones del modal globales (solo se definen una vez)
    if (typeof window.modalFunctions === 'undefined') {
        window.modalFunctions = true;
        
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        function suscribeNewsletter(modalId, email, subject, body) {
            // Función para marcar suscripción usando múltiples métodos
            function markSubscription() {
                const currentDate = new Date().toISOString();
                
                // Método 1: localStorage (persistente)
                try {
                    localStorage.setItem('newsletter_subscribed', 'true');
                    localStorage.setItem('newsletter_subscribed_date', currentDate);
                } catch(e) {
                    console.log('localStorage no disponible:', e);
                }
                
                // Método 2: Cookie (persistente, funciona si localStorage falla)
                function setCookie(name, value, days) {
                    const expires = new Date();
                    expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
                    document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/;SameSite=Lax`;
                }
                
                setCookie('newsletter_subscribed', 'true', {{ $expirationDays }});
                setCookie('newsletter_subscribed_date', currentDate, {{ $expirationDays }});
                
                // Método 3: sessionStorage (para esta sesión)
                try {
                    sessionStorage.setItem('newsletter_subscribed_session', 'true');
                } catch(e) {
                    console.log('sessionStorage no disponible:', e);
                }
            }
            
            markSubscription();
            window.open('mailto:' + email + '?subject=' + subject + '&body=' + body, '_self');
            closeModal(modalId);
        }
        
        // Event listeners globales
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('modal-overlay')) {
                closeModal(e.target.closest('.modal-container').id);
            }
        });
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const openModals = document.querySelectorAll('[id$="Modal"]:not(.hidden)');
                openModals.forEach(modal => closeModal(modal.id));
            }
        });
    }
    
    // Event listener específico para este modal
    document.getElementById('{{ $modalId }}').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal('{{ $modalId }}');
        }
    });
</script>
