@extends('layouts.frontend')

@section('title', ' [ suelta de perdices ] Los Llanos Toledo ✔️')
@section('description', '⭐ Realizamos suelta de perdices en nuestra finca. Jornada completa de caza, con almuerzo y comida en nuestro
restaurante privado. Más de 30 años realizando sueltas...')

@section('content')

    <!-- Hero Section -->
    <section class="relative min-h-[50vh] sm:min-h-[60vh] lg:min-h-[70vh] flex items-center justify-center overflow-hidden bg-[#f5f1e3] p-2 sm:p-4">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/cazador-perdiz-2.webp')}}" 
                 alt="cazando perdices en finca los llanos" 
                 class="w-full h-full object-cover object-center sm:object-top">
        </div>
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 sm:bg-opacity-60 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-3 sm:px-6 max-w-5xl mx-auto pt-16 sm:pt-20 lg:pt-24">
            
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-display font-bold mb-4 sm:mb-6 leading-tight tracking-wide uppercase">
                Calendario de suelta de perdices  en Finca los llanos
            </h1>
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl mb-6 sm:mb-8 text-gray-200 max-w-4xl mx-auto leading-relaxed font-medium">
                <em class="font-display text-lg sm:text-xl md:text-2xl lg:text-3xl">Disponemos de 23 puestos.</em><br class="hidden sm:block"><br class="hidden sm:block">
                <strong>Realizamos sueltas para empresas privada.</strong> Tú pones la fecha, y nosotros nos encargamos del resto.
            </p>
            
            <!-- CTA Button -->
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                <button onclick="window.open('tel:+34608910639', '_self')" 
                        class="bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white px-6 sm:px-8 py-3 sm:py-4 rounded-full font-action font-bold text-base sm:text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                    <i class="fas fa-phone mr-2"></i>
                    Reservar
                </button>
                <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20información%20sobre%20perdices%20comunes', '_blank')" 
                        class="border-2 border-white text-white hover:bg-white hover:text-gray-900 px-6 sm:px-8 py-3 sm:py-4 rounded-full font-action font-bold text-base sm:text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105">
                    <i class="fab fa-whatsapp mr-2"></i>
                    WhatsApp
                </button>
            </div>
        </div>
    </section>

    <!-- Product Details Section -->
    <section class="py-12 sm:py-16 lg:py-20 bg-white">
        <div class="container mx-auto px-3 sm:px-6">
            <!-- Breadcrumb -->
            <nav class="flex mb-6 sm:mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm sm:text-base">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" title="Ir a la página de inicio" class="inline-flex items-center text-base sm:text-lg lg:text-xl font-medium text-gray-700 hover:text-[#4b5d3a]">
                            <svg class="w-3 h-3 mr-1 sm:mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            <span class="hidden sm:inline">Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('productos') }}" title="Ir a la página de productos" class="inline-flex items-center text-base sm:text-lg lg:text-xl font-medium text-gray-700 hover:text-[#4b5d3a]">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ml-1 font-medium text-gray-500 md:ml-2">Productos</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('productos.sueltas') }}" title="Ir a la categoría de aves de caza" class="inline-flex items-center text-base sm:text-lg lg:text-xl font-medium text-gray-700 hover:text-[#4b5d3a]">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ml-1 font-medium text-gray-500 md:ml-2 hidden sm:inline">Sueltas en finca</span>
                                <span class="ml-1 font-medium text-gray-500 md:ml-2 sm:hidden">Sueltas</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 font-medium text-gray-500 md:ml-2 hidden sm:inline">Perdices</span>
                            <span class="ml-1 font-medium text-gray-500 md:ml-2 sm:hidden">Perdices</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div>
                <!-- Tabla de Fechas y Precios -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h3 class="text-2xl font-display font-bold text-dark mb-6 text-center uppercase tracking-wide">
                        📅 Calendario de Sueltas 2024/2025
                    </h3>
                    <!-- Notas 1 -->
                    <div class="mt-6 bg-[#f5f1e3] rounded-lg p-4 mb-6">
                        <h4 class="font-action font-bold text-dark mb-2 flex items-center">
                            <span class="mr-2">📋</span>
                            ¿Que incluiye la suelta? 
                        </h4>
                        <ul class="text-sm text-gray-700 space-y-1">
                            <li>• 2 personas</li>
                            <li>• Café</li>
                            <li>• Migas</li>
                            <li>• Taco a media mañana</li>
                            <li>• Café</li>
                            <li>• Servicio restaurante incluido</li>
                            <li>• A partir de 2 personas, 25 € (Comida acompañante)</li>
                        </ul>
                    </div>
                    <!--Cards de fechas tiradas - Responsive-->
                    
                    <!-- Vista de Tabla para Desktop -->
                    <div class="hidden lg:block overflow-x-auto">
                        <table class="w-full text-sm text-center">
                            <thead>
                                <tr class="bg-[#8b5e3c] text-white">
                                    <th class="px-3 py-3 font-action font-bold uppercase tracking-wide">Fecha</th>
                                    <th class="px-3 py-3 font-action font-bold uppercase tracking-wide">Especies</th>
                                    <th class="px-3 py-3 font-action font-bold uppercase tracking-wide">Cantidad</th>
                                    <th class="px-3 py-3 font-action font-bold uppercase tracking-wide">Puestos</th>
                                    <th class="px-3 py-3 font-action font-bold uppercase tracking-wide">%</th>
                                    <th class="px-3 py-3 font-action font-bold uppercase tracking-wide">Precio €</th>
                                    <th class="px-3 py-3 font-action font-bold uppercase tracking-wide">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Domingo 26•10 -->
                                <tr class="border-b hover:bg-gray-50 transition-colors">
                                    <td class="px-3 py-4 font-semibold text-dark bg-[#d4b896]">
                                        <div class="text-sm font-bold">DOMINGO</div>
                                        <div class="text-lg">26•10</div>
                                        <div class="w-8 h-1 bg-[#8b5e3c] mx-auto mt-1"></div>
                                    </td>
                                    <td class="px-3 py-4 font-semibold text-[#4b5d3a] bg-gray-100">PERDICES</td>
                                    <td class="px-3 py-4 font-bold text-dark">1000</td>
                                    <td class="px-3 py-4 text-dark">23</td>
                                    <td class="px-3 py-4 text-dark">45</td>
                                    <td class="px-3 py-4 font-bold text-[#8b5e3c] text-lg">450</td>
                                    <td class="px-3 py-3">
                                        <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20la%20tirada%20del%20DOMINGO%2026%20de%20OCTUBRE.%20¿Podrían%20darme%20más%20información?', '_blank')" 
                                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-lg font-action font-semibold text-xs tracking-wide uppercase transition-all duration-300">
                                            <i class="fab fa-whatsapp mr-1"></i>
                                            Reservar
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Domingo 9•11 -->
                                <tr class="border-b hover:bg-gray-50 transition-colors">
                                    <td class="px-3 py-4 font-semibold text-dark bg-[#d4b896]">
                                        <div class="text-sm font-bold">DOMINGO</div>
                                        <div class="text-lg">9•11</div>
                                        <div class="w-8 h-1 bg-[#8b5e3c] mx-auto mt-1"></div>
                                    </td>
                                    <td class="px-3 py-4 font-semibold text-[#4b5d3a] bg-gray-100">PERDICES</td>
                                    <td class="px-3 py-4 font-bold text-dark">1000</td>
                                    <td class="px-3 py-4 text-dark">23</td>
                                    <td class="px-3 py-4 text-dark">45</td>
                                    <td class="px-3 py-4 font-bold text-[#8b5e3c] text-lg">450</td>
                                    <td class="px-3 py-3">
                                        <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20la%20tirada%20del%20DOMINGO%209%20de%20NOVIEMBRE.%20¿Podrían%20darme%20más%20información?', '_blank')" 
                                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-lg font-action font-semibold text-xs tracking-wide uppercase transition-all duration-300">
                                            <i class="fab fa-whatsapp mr-1"></i>
                                            Reservar
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Domingo 23•11 -->
                                <tr class="border-b hover:bg-gray-50 transition-colors">
                                    <td class="px-3 py-4 font-semibold text-dark bg-[#d4b896]">
                                        <div class="text-sm font-bold">DOMINGO</div>
                                        <div class="text-lg">23•11</div>
                                        <div class="w-8 h-1 bg-[#8b5e3c] mx-auto mt-1"></div>
                                    </td>
                                    <td class="px-3 py-4 font-semibold text-[#4b5d3a] bg-gray-100">
                                        <div>PERDICES</div>
                                        <div class="text-orange-600">FAISANES</div>
                                    </td>
                                    <td class="px-3 py-4 font-bold text-dark">
                                        <div>600</div>
                                        <div class="text-orange-600">400</div>
                                    </td>
                                    <td class="px-3 py-4 text-dark">23</td>
                                    <td class="px-3 py-4 text-dark">45</td>
                                    <td class="px-3 py-4 font-bold text-[#8b5e3c] text-lg">550</td>
                                    <td class="px-3 py-3">
                                        <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20la%20tirada%20ESPECIAL%20del%20DOMINGO%2023%20de%20NOVIEMBRE%20(Perdices%20%2B%20Faisanes).%20¿Podrían%20darme%20más%20información?', '_blank')" 
                                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-lg font-action font-semibold text-xs tracking-wide uppercase transition-all duration-300">
                                            <i class="fab fa-whatsapp mr-1"></i>
                                            Reservar
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Domingo 30•11 -->
                                <tr class="border-b hover:bg-gray-50 transition-colors">
                                    <td class="px-3 py-4 font-semibold text-dark bg-[#d4b896]">
                                        <div class="text-sm font-bold">DOMINGO</div>
                                        <div class="text-lg">30•11</div>
                                        <div class="w-8 h-1 bg-[#8b5e3c] mx-auto mt-1"></div>
                                    </td>
                                    <td class="px-3 py-4 font-semibold text-[#4b5d3a] bg-gray-100">PERDICES</td>
                                    <td class="px-3 py-4 font-bold text-dark">1000</td>
                                    <td class="px-3 py-4 text-dark">23</td>
                                    <td class="px-3 py-4 text-dark">45</td>
                                    <td class="px-3 py-4 font-bold text-[#8b5e3c] text-lg">450</td>
                                    <td class="px-3 py-3">
                                        <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20la%20tirada%20del%20DOMINGO%2030%20de%20NOVIEMBRE.%20¿Podrían%20darme%20más%20información?', '_blank')" 
                                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-lg font-action font-semibold text-xs tracking-wide uppercase transition-all duration-300">
                                            <i class="fab fa-whatsapp mr-1"></i>
                                            Reservar
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Domingo 14•12 -->
                                <tr class="border-b hover:bg-gray-50 transition-colors">
                                    <td class="px-3 py-4 font-semibold text-dark bg-[#d4b896]">
                                        <div class="text-sm font-bold">DOMINGO</div>
                                        <div class="text-lg">14•12</div>
                                        <div class="w-8 h-1 bg-[#8b5e3c] mx-auto mt-1"></div>
                                    </td>
                                    <td class="px-3 py-4 font-semibold text-[#4b5d3a] bg-gray-100">
                                        <div>PERDICES</div>
                                        <div class="text-orange-600">FAISANES</div>
                                    </td>
                                    <td class="px-3 py-4 font-bold text-dark">
                                        <div>600</div>
                                        <div class="text-orange-600">400</div>
                                    </td>
                                    <td class="px-3 py-4 text-dark">23</td>
                                    <td class="px-3 py-4 text-dark">45</td>
                                    <td class="px-3 py-4 font-bold text-[#8b5e3c] text-lg">550</td>
                                    <td class="px-3 py-3">
                                        <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20la%20tirada%20ESPECIAL%20del%20DOMINGO%2014%20de%20DICIEMBRE%20(Perdices%20%2B%20Faisanes).%20¿Podrían%20darme%20más%20información?', '_blank')" 
                                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-lg font-action font-semibold text-xs tracking-wide uppercase transition-all duration-300">
                                            <i class="fab fa-whatsapp mr-1"></i>
                                            Reservar
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Sábado 20•12 -->
                                <tr class="border-b hover:bg-gray-50 transition-colors">
                                    <td class="px-3 py-4 font-semibold text-dark bg-[#d4b896]">
                                        <div class="text-sm font-bold">SÁBADO</div>
                                        <div class="text-lg">20•12</div>
                                        <div class="w-8 h-1 bg-[#8b5e3c] mx-auto mt-1"></div>
                                    </td>
                                    <td class="px-3 py-4 font-semibold text-[#4b5d3a] bg-gray-100">PERDICES</td>
                                    <td class="px-3 py-4 font-bold text-dark">1000</td>
                                    <td class="px-3 py-4 text-dark">23</td>
                                    <td class="px-3 py-4 text-dark">45</td>
                                    <td class="px-3 py-4 font-bold text-[#8b5e3c] text-lg">450</td>
                                    <td class="px-3 py-3">
                                        <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20la%20tirada%20del%20SÁBADO%2020%20de%20DICIEMBRE.%20¿Podrían%20darme%20más%20información?', '_blank')" 
                                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-lg font-action font-semibold text-xs tracking-wide uppercase transition-all duration-300">
                                            <i class="fab fa-whatsapp mr-1"></i>
                                            Reservar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Vista de Cards para Móvil y Tablet -->
                    <div class="lg:hidden space-y-4">
                        
                        <!-- Card: Domingo 26•10 -->
                        <div class="bg-gradient-to-r from-[#d4b896] to-white rounded-lg shadow-md border-l-4 border-[#8b5e3c] hover:shadow-lg transition-all duration-300">
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="bg-[#d4b896] rounded-lg p-3 text-center min-w-[80px]">
                                        <div class="text-xs font-bold text-dark">DOMINGO</div>
                                        <div class="text-lg font-bold text-dark">26•10</div>
                                        <div class="w-6 h-0.5 bg-[#8b5e3c] mx-auto mt-1"></div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-[#8b5e3c]">450€</div>
                                        <div class="text-xs text-gray-600">por cazador</div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 text-sm">
                                    <div>
                                        <span class="font-semibold text-gray-600">Especies:</span>
                                        <div class="text-[#4b5d3a] font-bold">PERDICES</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">Cantidad:</span>
                                        <div class="font-bold text-dark">1000</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">Puestos:</span>
                                        <div class="text-dark">23 máx.</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">%:</span>
                                        <div class="text-dark">45</div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20la%20tirada%20del%20DOMINGO%2026%20de%20OCTUBRE.%20¿Podrían%20darme%20más%20información?', '_blank')" 
                                            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-action font-semibold text-sm tracking-wide uppercase transition-all duration-300">
                                        <i class="fab fa-whatsapp mr-2"></i>
                                        Reservar puesto
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Domingo 9•11 -->
                        <div class="bg-gradient-to-r from-[#d4b896] to-white rounded-lg shadow-md border-l-4 border-[#8b5e3c] hover:shadow-lg transition-all duration-300">
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="bg-[#d4b896] rounded-lg p-3 text-center min-w-[80px]">
                                        <div class="text-xs font-bold text-dark">DOMINGO</div>
                                        <div class="text-lg font-bold text-dark">9•11</div>
                                        <div class="w-6 h-0.5 bg-[#8b5e3c] mx-auto mt-1"></div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-[#8b5e3c]">450€</div>
                                        <div class="text-xs text-gray-600">por cazador</div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 text-sm">
                                    <div>
                                        <span class="font-semibold text-gray-600">Especies:</span>
                                        <div class="text-[#4b5d3a] font-bold">PERDICES</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">Cantidad:</span>
                                        <div class="font-bold text-dark">1000</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">Puestos:</span>
                                        <div class="text-dark">23 máx.</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">%:</span>
                                        <div class="text-dark">45</div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20la%20tirada%20del%20DOMINGO%209%20de%20NOVIEMBRE.%20¿Podrían%20darme%20más%20información?', '_blank')" 
                                            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-action font-semibold text-sm tracking-wide uppercase transition-all duration-300">
                                        <i class="fab fa-whatsapp mr-2"></i>
                                        Reservar puesto
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Domingo 23•11 (Especial - Perdices + Faisanes) -->
                        <div class="bg-gradient-to-r from-[#d4b896] to-white rounded-lg shadow-md border-l-4 border-[#8b5e3c] hover:shadow-lg transition-all duration-300">
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="bg-[#d4b896] rounded-lg p-3 text-center min-w-[80px]">
                                        <div class="text-xs font-bold text-dark">DOMINGO</div>
                                        <div class="text-lg font-bold text-dark">23•11</div>
                                        <div class="w-6 h-0.5 bg-[#8b5e3c] mx-auto mt-1"></div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-[#8b5e3c]">550€</div>
                                        <div class="text-xs text-gray-600">por cazador</div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 text-sm">
                                    <div>
                                        <span class="font-semibold text-gray-600">Especies:</span>
                                        <div class="text-[#4b5d3a] font-bold">PERDICES</div>
                                        <div class="text-orange-600 font-bold">FAISANES</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">Cantidad:</span>
                                        <div class="font-bold text-dark">600</div>
                                        <div class="font-bold text-orange-600">400</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">Puestos:</span>
                                        <div class="text-dark">23 máx.</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">%:</span>
                                        <div class="text-dark">45</div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20la%20tirada%20ESPECIAL%20del%20DOMINGO%2023%20de%20NOVIEMBRE%20(Perdices%20%2B%20Faisanes).%20¿Podrían%20darme%20más%20información?', '_blank')" 
                                            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-action font-semibold text-sm tracking-wide uppercase transition-all duration-300">
                                        <i class="fab fa-whatsapp mr-2"></i>
                                        Reservar puesto
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Domingo 30•11 -->
                        <div class="bg-gradient-to-r from-[#d4b896] to-white rounded-lg shadow-md border-l-4 border-[#8b5e3c] hover:shadow-lg transition-all duration-300">
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="bg-[#d4b896] rounded-lg p-3 text-center min-w-[80px]">
                                        <div class="text-xs font-bold text-dark">DOMINGO</div>
                                        <div class="text-lg font-bold text-dark">30•11</div>
                                        <div class="w-6 h-0.5 bg-[#8b5e3c] mx-auto mt-1"></div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-[#8b5e3c]">450€</div>
                                        <div class="text-xs text-gray-600">por cazador</div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 text-sm">
                                    <div>
                                        <span class="font-semibold text-gray-600">Especies:</span>
                                        <div class="text-[#4b5d3a] font-bold">PERDICES</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">Cantidad:</span>
                                        <div class="font-bold text-dark">1000</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">Puestos:</span>
                                        <div class="text-dark">23 máx.</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">%:</span>
                                        <div class="text-dark">45</div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20la%20tirada%20del%20DOMINGO%2030%20de%20NOVIEMBRE.%20¿Podrían%20darme%20más%20información?', '_blank')" 
                                            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-action font-semibold text-sm tracking-wide uppercase transition-all duration-300">
                                        <i class="fab fa-whatsapp mr-2"></i>
                                        Reservar puesto
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Domingo 14•12 (Especial - Perdices + Faisanes) -->
                        <div class="bg-gradient-to-r from-[#d4b896] to-white rounded-lg shadow-md border-l-4 border-[#8b5e3c] hover:shadow-lg transition-all duration-300">
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="bg-[#d4b896] rounded-lg p-3 text-center min-w-[80px]">
                                        <div class="text-xs font-bold text-dark">DOMINGO</div>
                                        <div class="text-lg font-bold text-dark">14•12</div>
                                        <div class="w-6 h-0.5 bg-[#8b5e3c] mx-auto mt-1"></div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-[#8b5e3c]">550€</div>
                                        <div class="text-xs text-gray-600">por cazador</div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 text-sm">
                                    <div>
                                        <span class="font-semibold text-gray-600">Especies:</span>
                                        <div class="text-[#4b5d3a] font-bold">PERDICES</div>
                                        <div class="text-orange-600 font-bold">FAISANES</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">Cantidad:</span>
                                        <div class="font-bold text-dark">600</div>
                                        <div class="font-bold text-orange-600">400</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">Puestos:</span>
                                        <div class="text-dark">23 máx.</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">%:</span>
                                        <div class="text-dark">45</div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20la%20tirada%20ESPECIAL%20del%20DOMINGO%2014%20de%20DICIEMBRE%20(Perdices%20%2B%20Faisanes).%20¿Podrían%20darme%20más%20información?', '_blank')" 
                                            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-action font-semibold text-sm tracking-wide uppercase transition-all duration-300">
                                        <i class="fab fa-whatsapp mr-2"></i>
                                        Reservar puesto
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Sábado 20•12 -->
                        <div class="bg-gradient-to-r from-[#d4b896] to-white rounded-lg shadow-md border-l-4 border-[#8b5e3c] hover:shadow-lg transition-all duration-300">
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="bg-[#d4b896] rounded-lg p-3 text-center min-w-[80px]">
                                        <div class="text-xs font-bold text-dark">SÁBADO</div>
                                        <div class="text-lg font-bold text-dark">20•12</div>
                                        <div class="w-6 h-0.5 bg-[#8b5e3c] mx-auto mt-1"></div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-[#8b5e3c]">450€</div>
                                        <div class="text-xs text-gray-600">por cazador</div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 text-sm">
                                    <div>
                                        <span class="font-semibold text-gray-600">Especies:</span>
                                        <div class="text-[#4b5d3a] font-bold">PERDICES</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">Cantidad:</span>
                                        <div class="font-bold text-dark">1000</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">Puestos:</span>
                                        <div class="text-dark">23 máx.</div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600">%:</span>
                                        <div class="text-dark">45</div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20la%20tirada%20del%20SÁBADO%2020%20de%20DICIEMBRE.%20¿Podrían%20darme%20más%20información?', '_blank')" 
                                            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-action font-semibold text-sm tracking-wide uppercase transition-all duration-300">
                                        <i class="fab fa-whatsapp mr-2"></i>
                                        Reservar puesto
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <!-- Notas 2 -->
                    <div class="mt-6 bg-[#f5f1e3] rounded-lg p-4">
                        <h4 class="font-action font-bold text-dark mb-2 flex items-center">
                            <span class="mr-2">📋</span>
                            *Información Importante 
                        </h4>
                        <ul class="text-sm text-gray-700 space-y-1">
                            <li>• Después de la tirada se  podrá salir a rebuscar.</li>
                            <li>• Si la tirada no se completa se soltarán las piezas correspondientes al porcentaje por puesto completado.</li>
                            <li>• Acompañantes, a partir de 2 personas 25 € (Comida acompañante)</li>
                            </ul>
                    </div>
                </div>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 items-start max-w-7xl mx-auto">
                <!-- Image Gallery -->
                <div class="relative order-1 lg:order-1">
                    <div class="aspect-w-16 aspect-h-12 rounded-xl sm:rounded-2xl overflow-hidden shadow-xl sm:shadow-2xl mb-4 sm:mb-6">
                        <img src="{{asset('images/general/cazador-perdiz-2.webp')}}" 
                             alt="cazador contra perdiz" 
                             class="main-image w-full h-48 sm:h-64 md:h-80 lg:h-96 object-cover object-top transition-opacity duration-500"
                             id="mainImage">
                        <video src="{{asset('media/tirada-los-llanos.mp4')}}"
                               class="main-video w-full h-48 sm:h-64 md:h-80 lg:h-96 object-cover object-center transition-opacity duration-500 hidden"
                               id="mainVideo"
                               controls
                               preload="metadata"
                               poster="{{asset('images/general/cazador-perdiz-2.webp')}}">
                        </video>
                    </div>
                    
                    <!-- Thumbnail Gallery -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-4">
                        <img src="{{asset('images/galery/19.JPG')}}" 
                             alt="Faisán común en acción"
                             class="thumbnail w-full h-16 sm:h-20 md:h-24 object-cover object-top rounded-md sm:rounded-lg cursor-pointer border-2 border-[#4b5d3a] opacity-100"
                             onclick="changeMainImage(this, '{{asset('images/galery/19.JPG')}}')">
                        
                        <img src="{{asset('images/galery/G35.JPG')}}" 
                             alt="Puesta restaurante club de tiro los llanos"
                             class="thumbnail w-full h-16 sm:h-20 md:h-24 object-cover rounded-md sm:rounded-lg cursor-pointer border-2 border-gray-300 opacity-70 hover:opacity-100"
                             onclick="changeMainImage(this, '{{asset('images/galery/G35.JPG')}}')">
                        
                        <img src="{{asset('images/galery/16.JPG')}}" 
                             alt="restaurante interior club de tior los llanos"
                             class="thumbnail w-full h-16 sm:h-20 md:h-24 object-cover rounded-md sm:rounded-lg cursor-pointer border-2 border-gray-300 opacity-70 hover:opacity-100"
                             onclick="changeMainImage(this, '{{asset('images/galery/16.JPG')}}')">

                        <img src="{{asset('images/general/migas-castellanas.jpg')}}" 
                             alt="migas castellanas plato estrella de los llanos"
                             class="thumbnail w-full h-16 sm:h-20 md:h-24 object-cover rounded-md sm:rounded-lg cursor-pointer border-2 border-gray-300 opacity-70 hover:opacity-100"
                             onclick="changeMainImage(this, '{{asset('images/general/migas-castellanas.jpg')}}')">
                        
                        <!-- Video Thumbnail -->
                        <div class="thumbnail w-full h-16 sm:h-20 md:h-24 rounded-md sm:rounded-lg cursor-pointer border-2 border-gray-300 opacity-70 hover:opacity-100 relative overflow-hidden bg-black"
                             onclick="changeMainVideo(this, '{{asset('media/tirada-los-llanos.mp4')}}')">
                            <video src="{{asset('media/tirada-los-llanos.mp4')}}"
                                   class="w-full h-full object-cover"
                                   preload="metadata"
                                   muted>
                            </video>
                            <!-- Play button overlay -->
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40">
                                <div class="w-6 h-6 sm:w-8 sm:h-8 bg-white bg-opacity-90 rounded-full flex items-center justify-center">
                                    <i class="fas fa-play text-black text-xs sm:text-sm ml-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                
                <!-- Product Info -->
                <div class="space-y-6 sm:space-y-8 order-2 lg:order-2">
                    <!-- Header -->
                    <div>
                        <div class="flex flex-wrap items-center gap-2 sm:gap-4 mb-3 sm:mb-4">
                            <span class="bg-[#4b5d3a] text-white px-2 sm:px-3 py-1 rounded-full font-action font-semibold text-xs sm:text-sm tracking-wide uppercase">
                                Perdices
                            </span>
                            <span class="bg-green-100 text-green-800 px-2 sm:px-3 py-1 rounded-full font-action font-semibold text-xs sm:text-sm">
                                Oct/Mar
                            </span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-dark mb-3 sm:mb-4 uppercase tracking-wide leading-tight">
                           Tiradas privadas perdices
                        </h2>
                        <div class="flex flex-col sm:flex-row sm:items-center mb-4 sm:mb-6">
                            <div class="text-2xl sm:text-3xl font-display font-bold text-[#4b5d3a] mb-1 sm:mb-0 sm:mr-4">Precio a consultar</div>
                            <span class="text-base sm:text-lg font-sans text-gray-600">por jornada</span>
                        </div>
                    </div>
                    <!-- CTA Buttons -->
                    <div class="space-y-3 sm:space-y-4">
                        <button onclick="window.open('tel:+34608910639', '_self')" 
                                class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-3 sm:py-4 px-4 sm:px-6 rounded-lg font-action font-bold text-base sm:text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            <span class="hidden sm:inline">Llamar para disponibilidad</span>
                            <span class="sm:hidden">Llamar ahora</span>
                        </button>
                        
                        <div class="grid sm:grid-cols-2 gap-3 sm:gap-4">
                            <button onclick="window.open('mailto:att@clubdetiro-losllanos.es?subject=Consulta Perdices - Los Llanos&body=Hola,%20me%20interesa%20información%20sobre%20perdices.%20Por%20favor%20contacten%20conmigo.', '_self')" 
                                    class="w-full border-2 border-[#4b5d3a] text-[#4b5d3a] hover:bg-[#4b5d3a] hover:text-white py-2 sm:py-3 px-3 sm:px-4 rounded-lg font-action font-semibold text-sm sm:text-base tracking-wide uppercase transition-all duration-300">
                                <i class="fas fa-envelope mr-2"></i>
                                Email
                            </button>
                            <button onclick="window.open('https://wa.me/34608910639?text=Hola,%20me%20interesa%20información%20sobre%20perdices%20para%20coto%20de%20caza%20intensivo.', '_blank')" 
                                    class="w-full bg-green-500 hover:bg-green-600 text-white py-2 sm:py-3 px-3 sm:px-4 rounded-lg font-action font-semibold text-sm sm:text-base tracking-wide uppercase transition-all duration-300">
                                <i class="fab fa-whatsapp mr-2"></i>
                                WhatsApp
                            </button>
                        </div>

                         <!-- Description -->
                        <div class="flex w-full mx-auto p-3 sm:p-4 items-center justify-center mt-8 sm:mt-12">
                            <p class="text-gray-600 font-sans leading-relaxed text-base sm:text-lg lg:text-xl max-w-4xl text-left">
                                <strong>Suelta de perdices en campo de tiro los llanos.</strong><br >
                                Disponemos de granja propia de perdices lo que <strong>nos permite ser los más competivivos en los precios.</strong><br />
                                <br />
                                Nuestro restaurante privado da a nuestro clientes una nota de bienestar in igualable. Sentarse a la chimenea en una fría jornada de caza no tiene comparación.<br />
                                Llevamos más de 30 años organizando tiradas de perdices y faisanes con gran éxito entre nuestros clientes, siendo un refente en la zona de Toledo.<br />
                                <br />
                                Organizamos jornadas privadas para empresas o particulares. Si quieres organizar una tirada para tus clientes, con buena comida y buenos tiros no lo dudes...
                            </p>
                        </div>
                        
                        <!-- Features -->
                        <div class="grid sm:grid-cols-2 gap-4 sm:gap-6">
                            <div class="space-y-3 sm:space-y-4">
                                <h3 class="text-lg sm:text-xl font-display font-bold text-dark uppercase tracking-wide">
                                    Características
                                </h3>
                                <div class="space-y-2 sm:space-y-3">
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">23 puesto </span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">Rebusca al acabar la suelta</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">Servicio de restauración, con todas las comodidades</span>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-3 sm:space-y-4">
                                <h3 class="text-lg sm:text-xl font-display font-bold text-dark uppercase tracking-wide">
                                    Servicios Incluidos
                                </h3>
                                <div class="space-y-2 sm:space-y-3">
                                    <div class="flex items-center">
                                        <i class="fas fa-certificate text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">Certificados sanitarios</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-user-tie text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">Asesoramiento técnico</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-phone text-[#4b5d3a] mr-2 sm:mr-3 text-sm sm:text-base"></i>
                                        <span class="font-sans text-gray-700 text-sm sm:text-base">Soporte personalizado</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           
        </div>
    </section>
    <!-- Why Choose Us Section -->
    <section class="py-12 sm:py-16 lg:py-20 bg-[#f5f1e3]">
        <div class="container mx-auto px-3 sm:px-6">
            <div class="text-center mb-8 sm:mb-12 lg:mb-16">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-dark mb-3 sm:mb-4 uppercase tracking-wide leading-tight">
                    ¿Por Qué Elegir Nuestras <span class="block sm:inline">suelta de perdices?</span>
                </h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 max-w-6xl mx-auto">
                <!-- Reason 1 -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-6 sm:p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-[#4b5d3a] rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-star text-white text-lg sm:text-2xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-display font-bold text-dark mb-2 sm:mb-4 uppercase tracking-wide">
                        + 30 años experiencia
                    </h3>
                </div>
                
                <!-- Reason 2 -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-6 sm:p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-feather-alt text-white text-lg sm:text-2xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-display font-bold text-dark mb-2 sm:mb-4 uppercase tracking-wide">
                        Animales propios
                    </h3>
                </div>

                <!-- Reason 3 -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-6 sm:p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300 sm:col-span-2 lg:col-span-1">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-[#059669] rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-mountain text-white text-lg sm:text-2xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-display font-bold text-dark mb-2 sm:mb-4 uppercase tracking-wide">
                       Restaurante privado
                    </h3>
                </div>
            </div>
        </div>
    </section>


<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image gallery functionality
    window.changeMainImage = function(thumbnail, imageSrc) {
        const mainImage = document.getElementById('mainImage');
        const mainVideo = document.getElementById('mainVideo');
        const thumbnails = document.querySelectorAll('.thumbnail');
        
        // Hide video and show image
        mainVideo.classList.add('hidden');
        mainVideo.pause();
        mainImage.classList.remove('hidden');
        
        // Update main image
        mainImage.style.opacity = '0';
        setTimeout(() => {
            mainImage.src = imageSrc;
            mainImage.style.opacity = '1';
        }, 250);
        
        // Update thumbnail styles
        thumbnails.forEach(thumb => {
            thumb.classList.remove('border-[#4b5d3a]', 'opacity-100');
            thumb.classList.add('border-gray-300', 'opacity-70');
        });
        
        thumbnail.classList.remove('border-gray-300', 'opacity-70');
        thumbnail.classList.add('border-[#4b5d3a]', 'opacity-100');
    };
    
    // Video gallery functionality
    window.changeMainVideo = function(thumbnail, videoSrc) {
        const mainImage = document.getElementById('mainImage');
        const mainVideo = document.getElementById('mainVideo');
        const thumbnails = document.querySelectorAll('.thumbnail');
        
        // Hide image and show video
        mainImage.classList.add('hidden');
        mainVideo.classList.remove('hidden');
        
        // Update main video
        mainVideo.style.opacity = '0';
        setTimeout(() => {
            mainVideo.src = videoSrc;
            mainVideo.load(); // Reload the video element
            mainVideo.style.opacity = '1';
        }, 250);
        
        // Update thumbnail styles
        thumbnails.forEach(thumb => {
            thumb.classList.remove('border-[#4b5d3a]', 'opacity-100');
            thumb.classList.add('border-gray-300', 'opacity-70');
        });
        
        thumbnail.classList.remove('border-gray-300', 'opacity-70');
        thumbnail.classList.add('border-[#4b5d3a]', 'opacity-100');
    };
});
</script>

@endsection
