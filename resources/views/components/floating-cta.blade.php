@props([
    'text' => 'Tiradas en Finca',
    'year' => '2025',
    'url' => route('productos.sueltas'),
    'position' => 'bottom-right', // bottom-right, bottom-left, center-left, center-right
    'icon' => 'fas fa-bullseye',
    'newLabel' => '¡Nuevo!',
    'tooltip' => 'Reserva tu tirada para 2025'
])

@php
    // Configurar posiciones según el parámetro
    $positions = [
        'bottom-right' => 'fixed bottom-4 right-4 left-4 md:bottom-6 md:right-6 md:left-auto',
        'bottom-left' => 'fixed bottom-4 left-4 right-4 md:bottom-6 md:left-6 md:right-auto',
        'center-left' => 'fixed top-1/2 left-4 right-4 md:left-6 md:right-auto transform -translate-y-1/2',
        'center-right' => 'fixed top-1/2 right-4 left-4 md:right-6 md:left-auto transform -translate-y-1/2'
    ];
    
    $positionClass = $positions[$position] ?? $positions['bottom-right'];
@endphp

<!-- CTA Flotante - {{ $text }} {{ $year }} -->
<div id="floating-cta" class="{{ $positionClass }} z-50 animate-pulse w-auto md:w-auto">
    <div class="relative group">
        <!-- Efecto de resplandor animado -->
        <div class="absolute -inset-1 bg-gradient-to-r from-[#8b5e3c] via-[#4b5d3a] to-[#8b5e3c] rounded-lg md:rounded-full blur opacity-75 group-hover:opacity-100 transition duration-1000 animate-ping"></div>
        
        <!-- Botón principal -->
        <button onclick="window.open('{{ $url }}', '_self')" 
                class="relative bg-gradient-to-br from-[#8b5e3c] to-[#4b5d3a] text-white px-3 py-2 md:px-6 md:py-4 rounded-lg md:rounded-full font-bold text-sm md:text-base shadow-2xl hover:shadow-3xl transform hover:scale-105 md:hover:scale-110 transition-all duration-300 group-hover:from-[#4b5d3a] group-hover:to-[#8b5e3c] border-2 border-white w-full md:w-auto">
            
            <!-- Diseño para móvil: todo en una línea -->
            <div class="flex items-center justify-center space-x-2 md:space-x-3">
                <div class="relative">
                    <i class="{{ $icon }} text-base md:text-xl animate-spin-slow"></i>
                    <div class="absolute -top-1 -right-1 w-2 h-2 md:w-3 md:h-3 bg-red-500 rounded-full animate-bounce"></div>
                </div>
                
                <!-- Texto principal - en línea para móvil -->
                <div class="flex items-center space-x-1 md:space-x-0 md:block text-left">
                    <span class="text-xs md:text-sm font-action uppercase tracking-wider opacity-90">{{ $newLabel }}</span>
                    <span class="text-sm md:text-lg font-display font-bold leading-tight">{{ $text }}</span>
                    <span class="text-base md:text-xl font-bold text-yellow-300 animate-pulse">{{ $year }}</span>
                </div>
            </div>
            
            <!-- Efecto de brillo -->
            <div class="absolute inset-0 rounded-lg md:rounded-full opacity-0 group-hover:opacity-20 bg-gradient-to-r from-transparent via-white to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
        </button>
        
        <!-- Tooltip informativo -->
        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-3 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
            {{ $tooltip }}
            <div class="absolute top-full left-1/2 transform -translate-x-1/2 border-4 border-transparent border-t-gray-900"></div>
        </div>
    </div>
</div>

<!-- Estilos adicionales para animaciones personalizadas -->
<style>
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .animate-spin-slow {
        animation: spin-slow 3s linear infinite;
    }
    
    #floating-cta {
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    /* Efecto de parpadeo suave para el año */
    #floating-cta .animate-pulse {
        animation: pulse-custom 2s ease-in-out infinite;
    }
    
    @keyframes pulse-custom {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.6; }
    }
    
    /* Efecto de resplandor en hover */
    #floating-cta:hover .animate-ping {
        animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
    }
</style>
