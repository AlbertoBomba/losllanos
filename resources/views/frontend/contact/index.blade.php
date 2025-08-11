@extends('layouts.frontend')

@section('title', 'Contacto - Los Llanos')
@section('description', 'Contacta con Los Llanos para consultas sobre nuestros servicios de caza: perdiz, faisán, codorniz, tiradas en finca y venta de aves. Te respondemos rápidamente.')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-green-800 to-green-900 py-20 overflow-hidden">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="absolute inset-0 bg-[url('/images/backgrounds/contact-hero.jpg')] bg-cover bg-center bg-no-repeat opacity-30"></div>
    
    <div class="relative container mx-auto px-6">
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
<section class="py-16 bg-white">
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
                                Acepto la <a href="/politica-privacidad" class="text-green-600 hover:text-green-700 underline" target="_blank">política de privacidad</a> y autorizo el tratamiento de mis datos para responder a mi consulta. <span class="text-red-500">*</span>
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
                    
                    <!-- Contact Info -->
                    <div class="bg-green-50 rounded-lg p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 font-oswald">Información de Contacto</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-green-600 text-lg mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium text-gray-900">Dirección</p>
                                    <p class="text-gray-700">Los Llanos<br>España</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-phone text-green-600 text-lg mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium text-gray-900">Teléfono</p>
                                    <p class="text-gray-700">+34 XXX XXX XXX</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-envelope text-green-600 text-lg mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium text-gray-900">Email</p>
                                    <p class="text-gray-700">info@losllanos.es</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <i class="fas fa-clock text-green-600 text-lg mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium text-gray-900">Horario</p>
                                    <p class="text-gray-700">Lunes a Domingo<br>9:00 - 20:00</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Why Contact Us -->
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 font-oswald">¿Por qué contactarnos?</h3>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Asesoramiento personalizado para tu experiencia de caza</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Disponibilidad y precios actualizados</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Información sobre temporadas de caza</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Organización de eventos grupales</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Consultas sobre venta de aves</span>
                            </li>
                        </ul>
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
@endsection
