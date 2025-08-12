@props([
    'showMap' => true,
    'showButtons' => true,
    'size' => 'md', // sm, md, lg
    'title' => 'Nuestra Ubicación'
])

@php
    $heightClasses = [
        'sm' => 'h-64',
        'md' => 'h-80',
        'lg' => 'h-96'
    ];
    
    $mapHeight = $heightClasses[$size] ?? $heightClasses['md'];
@endphp

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow-lg overflow-hidden']) }}>
    @if($showMap)
        <!-- Mapa Integrado -->
        <div class="relative bg-gray-200 {{ $mapHeight }}">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3045.6234567890123!2d-4.0123456789012345!3d39.98765432109876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sBargas%2C%20Toledo!5e0!3m2!1ses!2ses!4v1234567890123!5m2!1ses!2ses"
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    @endif
    
    <div class="p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-4 font-oswald">{{ $title }}</h3>
        
        <!-- Información de Ubicación -->
        <div class="space-y-4 mb-6">
            <div class="flex items-start">
                <i class="fas fa-map-marker-alt text-green-600 text-lg mt-1 mr-3"></i>
                <div>
                    <h4 class="font-semibold text-gray-900">Dirección</h4>
                    <p class="text-gray-700">
                        Finca Los Llanos<br>
                        Camino de las Perdices, s/n<br>
                        45593 Bargas, Toledo
                    </p>
                </div>
            </div>
            
            <div class="flex items-start">
                <i class="fas fa-phone text-green-600 text-lg mt-1 mr-3"></i>
                <div>
                    <h4 class="font-semibold text-gray-900">Teléfono</h4>
                    <p class="text-gray-700">+34 608 910 639</p>
                </div>
            </div>
            
            <div class="flex items-start">
                <i class="fas fa-car text-green-600 text-lg mt-1 mr-3"></i>
                <div>
                    <h4 class="font-semibold text-gray-900">Acceso</h4>
                    <p class="text-gray-700">A-40, salida 13 - Parking disponible</p>
                </div>
            </div>
        </div>
        
        @if($showButtons)
            <!-- Botones de Acción -->
            <div class="space-y-3">
                <!-- Cómo llegar -->
                <a href="https://www.google.com/maps/dir/?api=1&destination=39.9876,-4.0123&destination_place_id=ChIJa1b2c3d5Kw0RQ1Z3Y4Z5Z4Z" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="w-full bg-blue-600 text-white font-medium py-3 px-4 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-all duration-200 flex items-center justify-center text-sm">
                    <i class="fas fa-route mr-2"></i>
                    Cómo Llegar
                </a>
                
                <!-- WhatsApp -->
                <a href="https://wa.me/34608910639?text=Hola,%20me%20gustaría%20obtener%20información%20sobre%20los%20servicios%20de%20caza%20en%20Los%20Llanos." 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="w-full bg-green-500 text-white font-medium py-3 px-4 rounded-lg hover:bg-green-600 focus:ring-4 focus:ring-green-300 transition-all duration-200 flex items-center justify-center text-sm">
                    <i class="fab fa-whatsapp mr-2"></i>
                    WhatsApp
                </a>
                
                <!-- Llamar -->
                <a href="tel:+34608910639" 
                   class="w-full bg-gray-600 text-white font-medium py-3 px-4 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 transition-all duration-200 flex items-center justify-center text-sm">
                    <i class="fas fa-phone mr-2"></i>
                    Llamar
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Script para analytics de clics -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Rastrear clics en botones de ubicación
    const locationButtons = document.querySelectorAll('[href*="google.com/maps"], [href*="wa.me"], [href*="tel:"]');
    
    locationButtons.forEach(button => {
        button.addEventListener('click', function() {
            const action = this.href.includes('google.com/maps') ? 'directions' :
                          this.href.includes('wa.me') ? 'whatsapp' : 
                          this.href.includes('tel:') ? 'call' : 'unknown';
            
            // Aquí puedes agregar tracking analytics si lo necesitas
            console.log('Location action:', action);
            
            // Google Analytics 4 example (descomenta si tienes GA4)
            // gtag('event', 'location_interaction', {
            //     'action': action,
            //     'location': 'contact_page'
            // });
        });
    });
});
</script>
