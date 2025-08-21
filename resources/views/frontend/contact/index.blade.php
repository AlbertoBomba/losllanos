@extends('layouts.frontend')

@section('title', '✔️ Contacto - Los Llanos')
@section('description', 'Contacta con Los Llanos para consultas sobre nuestros servicios de caza: perdiz, faisán, codorniz, 
tiradas en finca y venta de aves. Te respondemos rápidamente.')

@section('content')
<!-- Hero Section -->

<section class="relative  min-h-[60vh]  bg-gradient-to-br from-green-800 to-green-900 py-20 overflow-hidden">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    {{-- <div class="absolute inset-0 bg-[url('/images/galery/13.JPG')] bg-cover bg-center bg-no-repeat opacity-30"></div> --}}
    <div class="absolute inset-0 z-0">
        <img src="{{asset('images/galery/13.JPG')}}" 
                alt="Cazadores satisfechos" 
                class="w-full h-full object-cover"
                style="object-position: center;">
    </div>
    <div class="relative container mx-auto px-6 pt-20">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 font-oswald">
                Contacta con Nosotros
            </h1>
            <p class="text-xl md:text-2xl mb-8 font-light">
                Estamos aquí para ayudarte con cualquier consulta sobre nuestros servicios de caza
            </p>
            <div class="flex flex-wrap justify-center gap-4 text-lg">
                <div class="flex items-center gap-2">
                    <i class="fas fa-phone text-green-400"></i>
                    <span>Respuesta Rápida</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-envelope text-green-400"></i>
                    <span>Atención Personalizada</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-clock text-green-400"></i>
                    <span>Disponible 7 días</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Content -->
<section class="py-16 bg-[#f5f1e3]">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-12">
            
            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 font-oswald">Envíanos tu Consulta</h2>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Nombre y Email -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nombre completo <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="name" 
                                       id="name"
                                       value="{{ old('name') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('name') border-red-500 @enderror"
                                       placeholder="Tu nombre completo"
                                       required>
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" 
                                       name="email" 
                                       id="email"
                                       value="{{ old('email') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('email') border-red-500 @enderror"
                                       placeholder="tu@email.com"
                                       required>
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Teléfono y Asunto -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Teléfono
                                </label>
                                <input type="tel" 
                                       name="phone" 
                                       id="phone"
                                       value="{{ old('phone') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('phone') border-red-500 @enderror"
                                       placeholder="+34 600 000 000">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    Asunto <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="subject" 
                                       id="subject"
                                       value="{{ old('subject') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('subject') border-red-500 @enderror"
                                       placeholder="Asunto de tu consulta"
                                       required>
                                @error('subject')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Servicio de Interés -->
                        <div>
                            <label for="service_interest" class="block text-sm font-medium text-gray-700 mb-2">
                                Servicio de Interés
                            </label>
                            <select name="service_interest" 
                                    id="service_interest"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('service_interest') border-red-500 @enderror">
                                <option value="">Selecciona un servicio (opcional)</option>
                                <option value="caza_perdiz" {{ old('service_interest') == 'caza_perdiz' ? 'selected' : '' }}>Caza de Perdiz</option>
                                <option value="caza_faisan" {{ old('service_interest') == 'caza_faisan' ? 'selected' : '' }}>Caza de Faisán</option>
                                <option value="caza_codorniz" {{ old('service_interest') == 'caza_codorniz' ? 'selected' : '' }}>Caza de Codorniz</option>
                                <option value="caza_paloma" {{ old('service_interest') == 'caza_paloma' ? 'selected' : '' }}>Caza de Paloma</option>
                                <option value="tiradas_finca" {{ old('service_interest') == 'tiradas_finca' ? 'selected' : '' }}>Tiradas en Finca</option>
                                <option value="venta_aves" {{ old('service_interest') == 'venta_aves' ? 'selected' : '' }}>Venta de Aves</option>
                                <option value="otro" {{ old('service_interest') == 'otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('service_interest')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Mensaje -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Mensaje <span class="text-red-500">*</span>
                            </label>
                            <textarea name="message" 
                                      id="message" 
                                      rows="6"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('message') border-red-500 @enderror"
                                      placeholder="Cuéntanos en detalle tu consulta, fechas de interés, número de cazadores, etc."
                                      required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Política de Privacidad -->
                        <div class="flex items-start">
                            <input type="checkbox" 
                                   name="privacy_policy" 
                                   id="privacy_policy"
                                   value="1"
                                   {{ old('privacy_policy') ? 'checked' : '' }}
                                   class="mt-1 mr-3 h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded @error('privacy_policy') border-red-500 @enderror"
                                   required>
                            <label for="privacy_policy" class="text-sm text-gray-700">
                                Acepto la <a href="/politica-privacidad" title="Ir a la política de privacidad" class="text-green-600 hover:text-green-700 underline" target="_blank">política de privacidad</a> y autorizo el tratamiento de mis datos para responder a mi consulta. <span class="text-red-500">*</span>
                            </label>
                        </div>
                        @error('privacy_policy')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror

                        <!-- Botón Submit -->
                        <div class="pt-4">
                            <button type="submit" 
                                    class="w-full bg-green-600 text-white font-medium py-4 px-6 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 transition-all duration-200 flex items-center justify-center">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Enviar Mensaje
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="lg:col-span-1">
                <div class="space-y-8">
                    
                    <!-- Location Info -->
                <div class="order-1 lg:order-2">
                    <div class="bg-green-50 rounded-lg p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 font-oswald">Finca Los Llanos</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-green-600 text-xl mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-2">Dirección Completa</h4>
                                    <p class="text-gray-700 leading-relaxed">
                                        Finca Los Llanos<br>
                                        Camino de las Perdices, s/n<br>
                                        45593 Bargas, Toledo<br>
                                        Castilla-La Mancha, España
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-car text-green-600 text-xl mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-2">Acceso en Vehículo</h4>
                                    <p class="text-gray-700 leading-relaxed">
                                        Acceso directo desde la A-40, salida 13<br>
                                        Parking disponible en la finca<br>
                                        Coordenadas GPS: 40.0000, -4.1333
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-clock text-green-600 text-xl mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-2">Horario de Visitas</h4>
                                    <p class="text-gray-700 leading-relaxed">
                                        Lunes a Domingo: 9:00 - 20:00<br>
                                        <span class="text-sm text-gray-600">*Recomendamos concertar cita previa</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="mt-8 space-y-4">
                            <!-- Botón Cómo llegar -->
                            <a href="https://www.google.com/maps/dir/?api=1&destination=39.976943,-4.063520&destination_place_id=ChIJ12345678901234567890" 
                               title="Cómo llegar a la Finca Los Llanos, desde google maps"
                                target="_blank" 
                               rel="noopener noreferrer"
                               class="w-full bg-blue-600 text-white font-medium py-4 px-6 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-all duration-200 flex items-center justify-center">
                                <i class="fas fa-route mr-2"></i>
                                Cómo Llegar (Google Maps)
                            </a>
                        </div>
                        <!-- Map -->
                        {{-- <div class="order-2 lg:order-1">
                            <div class="relative bg-gray-200 rounded-lg overflow-hidden shadow-lg" style="height: 400px;">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3057.4097733170474!2d-4.0660949234796!3d39.97694708228792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMznCsDU4JzM3LjAiTiA0wrAwMyc0OC43Ilc!5e0!3m2!1ses!2ses!4v1754956409965!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div> --}}
                    </div>
                </div>

                    

                    <!-- Response Time -->
                    <div class="bg-blue-50 rounded-lg p-6 text-center">
                        <i class="fas fa-stopwatch text-blue-600 text-3xl mb-3"></i>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Tiempo de Respuesta</h3>
                        <p class="text-gray-700">Respondemos todas las consultas en menos de <strong>24 horas</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Location Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 font-oswald">Nuestra Ubicación</h2>
                <p class="text-lg text-gray-600">Ven a visitarnos en la Finca Los Llanos, en el corazón de Toledo</p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                
                
                
            </div>
            
            <!-- Distancias y Accesos -->
            <div class="mt-12 bg-gray-50 rounded-lg p-8">
                <h3 class="text-xl font-bold text-gray-900 mb-6 text-center font-oswald">Distancias desde Principales Ciudades</h3>
                <div class="grid md:grid-cols-4 gap-6">
                    <div class="text-center">
                        <i class="fas fa-city text-green-600 text-2xl mb-3"></i>
                        <h4 class="font-semibold text-gray-900">Toledo</h4>
                        <p class="text-gray-600">15 km - 20 min</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-city text-green-600 text-2xl mb-3"></i>
                        <h4 class="font-semibold text-gray-900">Madrid</h4>
                        <p class="text-gray-600">85 km - 1h 15min</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-city text-green-600 text-2xl mb-3"></i>
                        <h4 class="font-semibold text-gray-900">Talavera</h4>
                        <p class="text-gray-600">45 km - 45 min</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-city text-green-600 text-2xl mb-3"></i>
                        <h4 class="font-semibold text-gray-900">Ávila</h4>
                        <p class="text-gray-600">90 km - 1h 30min</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
