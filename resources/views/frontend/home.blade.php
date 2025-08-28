@extends('layouts.frontend')

@section('title', '[ Caza en españa ] Los llanos Toledo ✔️')
@section('description', '⭐ Bienvenido a Los Llanos. Un lugar donde el cazador encuentra su particular 
parque temático. Un lugar para prácticar la caza en españa')

@section('content')

    <style>
        /* Filter animations */
        .service-card {
            transition: all 0.4s ease-in-out;
        }
        
        .service-card.hidden {
            opacity: 0;
            transform: translateY(-10px) scale(0.95);
            display: none !important;
        }
        
        .service-card.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
            display: block !important;
        }
    </style>

<!-- Hero Section with improved accessibility -->
    <section  class="relative min-h-screen flex items-center justify-center overflow-hidden bg-[#f5f1e3]">
        <!-- Video Background -->
        <video autoplay muted loop class="absolute inset-0 w-full h-full z-0" style="object-fit: cover; object-position: center; transform: scale(1.5);">
            <source src="{{asset('media/tirada-los-llanos.mp4')}}" type="video/mp4">
            <!-- Fallback image if video doesn't load -->
            <img src="{{asset('images/general/cazador-codorniz.webp')}}" alt="Imagen de cazador con codorniz" class="w-full h-full object-cover">
        </video>
        
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-70 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 text-center text-white px-6 max-w-4xl mx-auto pt-20">
            <h1 class="text-5xl md:text-7xl font-display font-bold mb-6 leading-tight tracking-wide uppercase">
                Caza en España
            </h1>
            <p class="text-xl md:text-2xl mb-12 text-gray-200 max-w-3xl mx-auto leading-relaxed font-medium">
                <em class="font-display text-2xl md:text-3xl">Caza en España desde el corazón de Toledo</em><br><br>
                Organizamos cacerías de perdiz, faisán, codorniz y paloma en entornos naturales únicos. Vive la auténtica caza en España con tradición, calidad y pasión por el campo.
            </p>
            
            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                <a href="{{ route('productos.sueltas') }}" title="Ir a la sección de aves de caza" class="bg-[#8b5e3c] hover:bg-[#4b5d3a] text-white px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                    Sueltas o cacerías
                </a>
                 <a href="{{ route('productos.aves-de-caza') }}" title="Ir a la sección de tiradas en finca" class="border-2 border-white text-white hover:bg-white hover:text-gray-900 px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                    Venta de aves de caza
                </a>
            </div>
            
            <!-- Bottom Section with Avatars and Stats -->
            <div class="flex flex-col md:flex-row justify-between items-center max-w-5xl mx-auto">
                <!-- Left: Avatars and Guides -->
                <div class="flex items-center space-x-4 mb-8 md:mb-0">
                    <div class="flex -space-x-3">
                        <img src="{{asset('images/follows/folow_1.jpg')}}" 
                             class="w-12 h-12 rounded-full border-3 border-white" alt="Autores reseña general 1">
                        <img src="{{asset('images/follows/folow_2.jpg')}}" 
                             class="w-12 h-12 rounded-full border-3 border-white" alt="Autores reseña general 2">
                        <img src="{{asset('images/follows/folow_3.jpg')}}" 
                             class="w-12 h-12 rounded-full border-3 border-white" alt="Autores reseña general 3">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full border-3 border-white flex items-center justify-center">
                            <span class="text-white text-sm font-semibold">16+</span>
                        </div>
                    </div>
                    <div class="text-left">
                        <div class="text-white font-semibold">Comparte tu experiencia</div>
                        <div class="text-white font-semibold">¡Estamos aquí para ayudarte!</div>
                    </div>
                </div>
                
                <!-- Right: Experience Stats -->
                <div class="text-right">
                    <div class="text-white font-semibold">+ de 30 años en el sector</div>
                    <div class="text-white font-semibold">Club de tiro los llanos</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Productos Section -->
    <section class="py-20 bg-[#f5f1e3] relative overflow-hidden">
        <!-- Background Images with Animation -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-image-1 opacity-70 transition-opacity duration-1000 ease-in-out" 
                 style="background-image: url('{{asset('images/general/perdiz-volando.webp')}}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
            <div class="absolute inset-0 bg-image-2 opacity-0 transition-opacity duration-1000 ease-in-out" 
                 style="background-image: url('{{asset('images/general/codornices.webp')}}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
            <!-- Overlay to maintain readability -->
            <div class="absolute inset-0 bg-[#f5f1e3] bg-opacity-85"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-dark mb-4 uppercase tracking-wide font-display">¿Qué ofrecemos en el sector de la caza?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-sans leading-relaxed">
                   Ofrecemos una experiencia única de <strong><a href="https://es.wikipedia.org/wiki/Caza" title="Define caza desde la wikipedia" target="_blank" class="cursor:pointer"> caza </a></strong> en un entorno rústico incomparable. 
                   Disfruta de una jornada completa con merienda, comida durante la suelta y la mejor organización. También realizamos venta directa de perdices, faisanes, codornices y palomas.
                </p>
            </div>
            <!-- Filter Buttons -->
            <div class="flex justify-center mb-12">
                <div class="bg-white rounded-full p-2 shadow-lg" role="tablist" aria-label="Filtros de productos">
                    <button class="filter-btn px-6 py-2 bg-[#4b5d3a] text-white rounded-l-full font-action font-semibold tracking-wide transition-all duration-300" 
                            data-filter="sueltas" 
                            role="tab" 
                            aria-selected="true" 
                            aria-controls="servicesGrid"
                            type="button">Sueltas</button>
                    <button class="filter-btn px-6 py-2 text-gray-600 hover:text-[#4b5d3a] rounded-r-full transition-all duration-300 font-action font-medium" 
                            data-filter="aves" 
                            role="tab" 
                            aria-selected="false" 
                            aria-controls="servicesGrid"
                            type="button">Aves</button>
                </div>
            </div>

            <!-- Tours Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="servicesGrid">
                <!-- Service Card 1 -->
                <div class="service-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition" data-category="aves" data-type="perdiz">
                    <img src="{{asset('images/general/perdiz-volando.webp')}}" 
                         alt="Perdiz volando por los campos de castilla" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm font-sans font-medium">Consultar disponibilidad</span>
                            <div class="text-right">
                                <div class="text-2xl font-display font-bold text-accent">Precio</div>
                                <div class="text-gray-600 text-sm font-sans">a consultar</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-display font-bold text-dark mb-2 uppercase tracking-wide">Perdices</h3>
                        <div class="flex items-center text-gray-600 mb-4 font-sans">
                            <span>Temporada: 25 - 26</span>
                        </div>
                        <div class="flex w-full items-end justify-end">
                            <a href="{{route('productos.aves-de-caza.perdices')}}" title="Ir a la ficha producto para comprar perdices" class="w-full text-center p-3 bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-2 rounded-lg font-action font-semibold tracking-wide uppercase transition hover:scale-105">
                                Consultar
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service Card 2 -->
                <div class="service-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition" data-category="aves" data-type="codorniz">
                    <img src="{{asset('images/general/codorniz-volando.webp')}}"  
                         alt="codorniz volando por los campos de castilla" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm font-sans font-medium">Consultar disponibilidad</span>
                            <div class="text-right">
                                <div class="text-2xl font-display font-bold text-accent">precio</div>
                                <div class="text-gray-600 text-sm font-sans">a consultar</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-display font-bold text-dark mb-2 uppercase tracking-wide">Codornices</h3>
                        <div class="flex items-center text-gray-600 mb-4 font-sans">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>Temporada: 25 - 26</span>
                        </div>
                        <div class="flex w-full items-end justify-end">
                            <a href="{{route('productos.aves-de-caza.codornices')}}" title="Ir a la ficha de producto para comprar codornices" class="w-full text-center p-3 bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-2 rounded-lg font-action font-semibold tracking-wide uppercase transition hover:scale-105">
                                Consultar
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service Card 3 -->
                <div class="service-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition" data-category="aves" data-type="paloma">
                   <img src="{{asset('images/general/paloma-volando.webp')}}"  
                         alt="Paloma volando por los campos de castilla" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm font-sans font-medium">Consultar disponibilidad</span>
                            <div class="text-right">
                                <div class="text-2xl font-display font-bold text-accent">Precio</div>
                                <div class="text-gray-600 text-sm font-sans">a consultar</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-display font-bold text-dark mb-2 uppercase tracking-wide">Palomas</h3>
                        <div class="flex items-center text-gray-600 mb-4 font-sans">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>Temporada: 25 - 26</span>
                        </div>
                        <div class="flex w-full items-end justify-end">
                            <a href="{{route('productos.aves-de-caza.palomas')}}" title="Ir a la ficha de producto para comprar palomas" class="w-full text-center p-3 bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-2 rounded-lg font-action font-semibold tracking-wide uppercase transition hover:scale-105">
                                Consultar
                            </a>
                        </div>
                    </div>
                </div>

                {{-- <div class="service-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition" data-category="sueltas" data-type="perdiz">
                    <img src="{{asset('images/general/cazador-perdiz-2.webp')}}"   
                         alt="cazador contra perdiz sobre el fondo campos de castilla" 
                         class="w-full h-48 object-cover object-top">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm font-sans font-medium">Aún no disponemos de calendario</span>
                            <div class="text-right">
                                
                            </div>
                        </div>
                        <h3 class="text-xl font-display font-bold text-dark mb-2 uppercase tracking-wide">Próximamente</h3>
                        <div class="flex items-center text-gray-600 mb-4 font-sans">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>Temporada: Oct - Mar</span>
                        </div>
                        <div class="flex w-full items-end justify-end">
                            <a href="{{route('productos.sueltas')}}" title="Ir a la ficha de sueltas y cacerías" class="w-full text-center p-3 bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-2 rounded-lg font-action font-semibold tracking-wide uppercase transition hover:scale-105">
                                Consultar fecha y precio
                            </a>
                        </div>
                    </div>
                </div> --}}

                <!-- Service suelta de perdices. -->
                <div class="service-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition" data-category="sueltas" data-type="perdiz">
                    <img src="{{asset('images/general/cazador-perdiz-2.webp')}}"   
                         alt="cazador contra perdiz sobre el fondo campos de castilla" 
                         class="w-full h-48 object-cover object-top">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm font-sans font-medium">Máx 23 puestos</span>
                            <div class="text-right">
                                <div class="text-2xl font-display font-bold text-accent">Precio</div>
                                <div class="text-gray-600 text-sm font-sans">a consultar</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-display font-bold text-dark mb-2 uppercase tracking-wide">Tirada de Perdices</h3>
                        <div class="flex items-center text-gray-600 mb-4 font-sans">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>Temporada: Oct - Mar</span>
                        </div>
                        <div class="flex w-full items-end justify-end">
                            <a href="{{route('productos.Sueltas.suelta-de-perdices')}}" title="Ir a la ficha de sueltas y cacerías de perdices" class="w-full text-center p-3 bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-2 rounded-lg font-action font-semibold tracking-wide uppercase transition hover:scale-105">
                                Consultar fecha y precio
                            </a>
                        </div>
                    </div>
                </div>

                

                <!-- Service suelta faisanes -->
                <div class="service-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition" data-category="sueltas" data-type="finca">
                   <img src="{{asset('images/general/cazador-faisan.webp')}}"   
                         alt="cazador contra paloma sobre un fondo de campos de castilla" class="w-full h-48 object-cover object-top">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-sans font-medium">Máx 23 puestos</span>
                            <div class="text-right">
                                <div class="text-2xl font-display font-bold text-[#f59e0b]">Precio</div>
                                <div class="text-gray-600 text-sm font-sans">a consultar</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-display font-bold text-dark mb-2 uppercase tracking-wide">Faisanes</h3>
                        <div class="flex items-center text-gray-600 mb-4 font-sans">
                            <i class="far fa-calendar-alt mr-2 text-[#f59e0b]"></i>
                            <span>Temporada: Oct - Mar</span>
                        </div>
                        <div class="flex w-full items-end justify-end">
                            <a href="{{route('productos.Sueltas.suelta-de-faisanes')}}" title="Ir a la ficha de sueltas y cacerías de faisanes" class="w-full text-center p-3 bg-[#f59e0b] hover:bg-[#d97706] text-white py-2 rounded-lg font-action font-semibold tracking-wide uppercase transition hover:scale-105">
                                Consultar fecha y precio
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Service Card 7 -->
                {{-- <div class="service-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition" data-category="sueltas" data-type="premium">
                    <img src="{{asset('images/general/cazador-codorniz.webp')}}"   
                         alt="cazador contra codorniz" class="w-full h-48 object-cover object-top">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm font-sans font-medium">Suelta en parcelas</span>
                            <div class="text-right">
                                <div class="text-2xl font-display font-bold text-accent">Precio</div>
                                <div class="text-gray-600 text-sm font-sans">a consultar</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-display font-bold text-dark mb-2 uppercase tracking-wide">Codornices</h3>
                        <div class="flex items-center text-gray-600 mb-4 font-sans">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>Temporada: Todo el año</span>
                        </div>
                        <button class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-2 rounded-lg font-action font-semibold tracking-wide uppercase transition hover:scale-105">
                            Consultar fecha y precio
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Journey Solutions Section -->
    <section class="relative min-h-screen w-full overflow-hidden flex items-center justify-center bg-[#f5f1e3]">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/padre-hijo-cazando-perdices.webp')}}" 
                 alt="Padre e hijo conservando la tradición de la caza de perdices" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
        
        <!-- Content -->
        <div class="relative z-20 container mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto">
                <p class="text-2xl md:text-3xl lg:text-4xl text-white font-display leading-loose md:leading-loose lg:leading-loose font-medium italic tracking-wide">
                    "Nuestra obligación es mantener viva la tradición, porque toda afición auténtica nace de ella. Y por eso, luchamos cada día por conservar y defender nuestra forma de vivir la caza."
                </p>
            </div>
        </div>
    </section>

    <!-- Section About Us -->
    <section id="quienes-somos" class="py-20 bg-[#f5f1e3]">
        <div class="container mx-auto px-6">
            
            <div class="mb-12">
                <div class="grid lg:grid-cols-2 gap-0 rounded-3xl shadow-lg overflow-hidden">
                    <!-- Image -->
                    <div class="relative h-96 lg:h-[500px]">
                        <img src="{{asset('images/general/historia-caza-uno.webp')}}" 
                             alt="Historia de los llanos desde el origen" 
                             class="w-full h-full object-cover rounded-l-3xl">
                    </div>
                    
                    <!-- Content -->
                    <div  class="flex items-center p-8 lg:p-12">
                        <div>
                            <!-- Title -->
                            <h3 class="text-3xl lg:text-4xl font-display font-bold text-gray-900 mb-4 leading-tight">
                                Los comienzos...
                            </h3>
                            
                            <!-- Description -->
                            <p class="text-gray-600 text-lg leading-relaxed font-sans">
                                Hijo de guarda, Emilio Bomba comenzó su andadura en el mundo de la caza en el año 1992. 
                                Su infancia y juventud transcurrieron entre fincas, donde desarrolló desde muy pequeño 
                                un profundo vínculo con el campo y la actividad cinegética. La caza formaba parte de su 
                                ADN, una herencia natural que lo llevó a iniciar, con esfuerzo e ilusión, un pequeño 
                                negocio de sueltas en la finca donde su padre trabajaba.<br>
                                Con el paso de los años, aquellas primeras sueltas fueron creciendo hasta convertirse en 
                                referentes en la zona, situándolo como uno de los pioneros en este tipo de actividad. Lo que 
                                comenzó como una afición familiar se transformó, gracias al trabajo constante y a la especialización,
                                en un proyecto consolidado y profesional que hoy sigue defendiendo la tradición y la pasión 
                                por la caza.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Second Card - 24% Discount -->
            <div>
                <div class="flex flex-col lg:flex-row rounded-3xl shadow-lg overflow-hidden">
                    <!-- Content -->
                    <div class="flex items-center justify-center p-8 lg:p-12 order-2 lg:order-1 lg:w-1/2">
                        <div>
                            <!-- Title -->
                            <h3 class="text-3xl lg:text-4xl font-display font-bold text-gray-900 mb-4 leading-tight">
                                Un referente en la organización de sueltas y experiencias de caza en España
                            </h3>
                            
                            <!-- Description -->
                            <p class="text-gray-600 text-lg leading-relaxed font-sans">
                                En la actualidad, nos hemos consolidado como un auténtico referente en el sector 
                                cinegético, tanto por la organización de nuestras propias sueltas como por la 
                                planificación de jornadas para terceros. Cada temporada, entre los meses de octubre y 
                                marzo, llevamos a cabo más de 47 sueltas, ofreciendo una experiencia única en el 
                                centro de España.<br>

                                El trato cercano y profesional que ofrecemos es uno de nuestros mayores valores. 
                                Quienes confían en nosotros pueden dar fe de la calidad y el cuidado con el que 
                                preparamos cada jornada de caza. Nos adaptamos a todo tipo de cazadores, gracias a 
                                la variedad de especies que ofrecemos: perdiz, faisán, codorniz y paloma.<br>

                                Cada suelta culmina con una agradable reunión en nuestro restaurante, donde nuestros 
                                clientes pueden disfrutar de nuestro tradicional cocido, preparado con esmero y sabor 
                                a campo.<br>

                                Trabajamos cada día con un único objetivo: que el cliente viva una experiencia 
                                inolvidable, y que solo tenga que preocuparse de lo más importante… disfrutar.

                            </p>
                        </div>
                    </div>
                    
                    <!-- Image -->
                    <div class="relative order-1 lg:order-2 lg:w-1/2 min-h-[600px] lg:min-h-[700px]">
                        <img src="{{asset('images/general/historia-caza-2.webp')}}" 
                             alt="Historia de los llanos desde el origen 2" 
                             class="w-full h-full object-cover rounded-r-3xl block">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Gallery Section -->
    <section class="py-20 overflow-hidden w-full relative">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{asset('images/general/finca.webp')}}"
                 alt="Finca Los Llanos vista de restaurante" 
                 class="w-full h-full object-cover">
        </div>
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-80 z-10"></div>
        <!-- Title and Description with container -->
        <div class="container mx-auto px-6 mb-16 relative z-20">
            <div class="text-center">
                <h2 class="text-4xl font-display font-bold text-white mb-4 uppercase tracking-wide">Más de 30 años de recuerdos</h2>
                <p class="text-xl text-gray-200 max-w-3xl mx-auto font-sans leading-relaxed">
                    Cada año ha sido una aventura, cada recuerdo, un tesoro.
                    <br> 
                    Gracias por acompañarnos en este viaje inolvidable.
                </p>
            </div>
        </div>

        <!-- Full Width Infinite Carousel -->
        <div class="w-full relative z-20">
            <div class="carousel-container">
                <div class="carousel-track flex gap-6" id="carouselTrack">
                    <!-- Row 1 - Moving right to left -->
                    <div class="carousel-row flex gap-6 animate-scroll-left">
                            <img src="{{asset('images/galery/11.JPG')}}"
                                 alt="Imagen galeria 1" class="rounded-2xl shadow-lg w-80 h-56 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/12.JPG')}}"
                                 alt="Imagen galeria 2" class="rounded-2xl shadow-lg w-60 h-80 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/G36.JPG')}}"
                                 alt="Imagen galeria 3" class="rounded-2xl shadow-lg w-96 h-56 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/G33.JPG')}}"
                                 alt="Imagen galeria 4" class="rounded-2xl shadow-lg w-60 h-72 object-cover flex-shrink-0">
                             <img src="{{asset('images/galery/G30.jpg')}}" 
                                 alt="Imagen galeria 5" class="rounded-2xl shadow-lg w-88 h-48 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/25.JPG')}}" 
                                 alt="Imagen galeria 6" class="rounded-2xl shadow-lg w-72 h-80 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/7.JPG')}}" 
                                 alt="Imagen galeria 7" class="rounded-2xl shadow-lg w-80 h-56 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/G63.jpg')}}" 
                                 alt="Imagen galeria 8" class="rounded-2xl shadow-lg w-60 h-88 object-cover flex-shrink-0">
                            <!-- Duplicate images for infinite effect -->
                            <img src="{{asset('images/galery/8.jpg')}}" 
                                 alt="Imagen galeria 9" class="rounded-2xl shadow-lg w-80 h-56 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/29.JPG')}}" 
                                 alt="Imagen galeria 10" class="rounded-2xl shadow-lg w-60 h-80 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/26.JPG')}}" 
                                 alt="Imagen galeria 11" class="rounded-2xl shadow-lg w-96 h-56 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/27.JPG')}}" 
                                 alt="Imagen galeria 12" class="rounded-2xl shadow-lg w-60 h-72 object-cover flex-shrink-0">
                        </div>
                    </div>
                </div>
                
                <!-- Second row moving in opposite direction -->
                <div class="carousel-container mt-6">
                    <div class="carousel-track flex gap-6">
                        <div class="carousel-row flex gap-6 animate-scroll-right">
                            <img src="{{asset('images/galery/G63.jpg')}}"
                                 alt="Imagen galeria 13" class="rounded-2xl shadow-lg w-72 h-52 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/G64.jpg')}}"
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-60 h-76 object-cover flex-shrink-0">
                           <img src="{{asset('images/galery/G65.jpg')}}" 
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-88 h-52 object-cover flex-shrink-0">
                             <img src="{{asset('images/galery/G66.jpg')}}"  
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-64 h-80 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/G67.jpg')}}"  
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-76 h-48 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/G68.jpg')}}" 
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-68 h-64 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/G69.jpg')}}"  
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-84 h-52 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/G62.JPG')}}" 
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-60 h-76 object-cover flex-shrink-0">
                            <!-- Duplicate images for infinite effect -->
                            <img src="{{asset('images/galery/G61.JPG')}}" 
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-72 h-52 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/G60.JPG')}}"  
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-60 h-76 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/G59.JPG')}}"  
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-88 h-52 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/G58.JPG')}}"  
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-64 h-80 object-cover flex-shrink-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CSS Animations -->
        <style>
            .carousel-container {
                overflow: hidden;
                width: 100%;
            }
            
            .carousel-row {
                width: fit-content;
            }
            
            @keyframes scroll-left {
                0% {
                    transform: translateX(0);
                }
                100% {
                    transform: translateX(-50%);
                }
            }
            
            @keyframes scroll-right {
                0% {
                    transform: translateX(-50%);
                }
                100% {
                    transform: translateX(0);
                }
            }
            
            .animate-scroll-left {
                animation: scroll-left 30s linear infinite;
            }
            
            .animate-scroll-right {
                animation: scroll-right 25s linear infinite;
            }
            
            .carousel-row:hover {
                animation-play-state: paused;
            }
            
            /* Hover effect for images */
            .carousel-row img {
                transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
                filter: brightness(0.7) contrast(1.1);
            }
            
            .carousel-row img:hover {
                transform: scale(1.1);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
                z-index: 10;
                position: relative;
                filter: brightness(0.8) contrast(1.2);
            }
            
            /* Custom width classes */
            .w-88 { width: 22rem; }
            .w-76 { width: 19rem; }
            .w-68 { width: 17rem; }
            .w-84 { width: 21rem; }
            .h-88 { height: 22rem; }
            .h-76 { height: 19rem; }
            .h-52 { height: 13rem; }
        </style>
    </section>


    <!-- Blog Section -->
    <section class="py-20 bg-[#f5f1e3]">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-4xl font-display font-bold text-dark mb-6 uppercase tracking-wide">Noticias y Consejos de Caza</h2>
                        <p class="text-xl text-gray-600 mb-8 font-sans leading-relaxed">
                            Blog de caza con artículos sobre las últimas tendencias, consejos de expertos y 
                            noticias del mundo de la caza. Nuestros expertos comparten sus conocimientos 
                            y experiencias para ayudarte a mejorar tus habilidades y disfrutar al máximo de 
                            tu pasión por la caza.  
                        </p>
                    </div>
                        <!-- Blog Posts -->
                        @if($latestPosts->count() > 0)
                            @foreach($latestPosts as $post)
                                <div class="space-y-6">
                                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                                       
                                        <div class="flex items-center text-gray-500 text-sm mb-2 font-sans">
                                            <i class="far fa-calendar-alt mr-2"></i>
                                             {{ $post->created_at->format('d M Y') }}
                                        </div>
                                        <h3 class="text-lg font-display font-bold text-dark mb-2 uppercase tracking-wide"> {{ $post->title }}</h3>
                                        <p class="text-gray-600 mb-4 font-sans leading-relaxed">
                                             {{ Str::limit($post->content, 120) }}
                                        </p>
                                        {{-- faltaría poner el link al post --}}
                                        <a href="{{ route('blog-de-caza.show', $post->slug) }}" title="Ir a noticia {{ $post->title }}" class="text-[#4b5d3a] hover:text-[#3a4a2c] font-action font-semibold tracking-wide uppercase">Leer Más →</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    
            </div>
            <div class="text-center mt-12">
                 <a href="{{route('blog-de-caza') }}" title="Ir a la sección de blogs" 
                    class="w-full bg-[#8b5e3c] hover:bg-[#4b5d3a] text-white px-6 py-3 rounded-full font-action font-bold tracking-wide transition-all duration-300 shadow-md hover:shadow-lg">
                    Ver todas las noticias del blog
                </a>
            </div>
        </div>
    </section>
    <!-- Reviews Section -->
    @livewire('reviews-section')
    
    <!-- CTA Flotante usando componente -->
    <x-floating-cta 
        text="Temp. 25/26"
        year="Perdides y Faisanes"
        url="{{route('productos.sueltas')}}"
        position="bottom-right"
        icon="fas fa-bullseye"
        newLabel="Tiradas en finca!"
        tooltip="Reserva tu tirada para 2025" />

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white w-12 h-12 rounded-full shadow-lg opacity-0 invisible transition-all duration-300">
        <i class="fas fa-chevron-up"></i>
    </button>

     <script>
        // Dropdown menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const dropdown = document.querySelector('.group');
            const dropdownMenu = dropdown.querySelector('div[class*="absolute"]');
            let timeoutId;

            // Show dropdown on hover
            dropdown.addEventListener('mouseenter', function() {
                clearTimeout(timeoutId);
                dropdownMenu.classList.remove('opacity-0', 'invisible');
                dropdownMenu.classList.add('opacity-100', 'visible');
            });

            // Hide dropdown with delay
            dropdown.addEventListener('mouseleave', function() {
                timeoutId = setTimeout(() => {
                    dropdownMenu.classList.remove('opacity-100', 'visible');
                    dropdownMenu.classList.add('opacity-0', 'invisible');
                }, 150);
            });

            // Keep dropdown open when hovering over menu items
            dropdownMenu.addEventListener('mouseenter', function() {
                clearTimeout(timeoutId);
            });

            dropdownMenu.addEventListener('mouseleave', function() {
                timeoutId = setTimeout(() => {
                    dropdownMenu.classList.remove('opacity-100', 'visible');
                    dropdownMenu.classList.add('opacity-0', 'invisible');
                }, 150);
            });
        });

        // Counter Animation
        function animateCounter(elementId, targetValue, suffix = '') {
            const element = document.getElementById(elementId);
            let currentValue = 0;
            const increment = targetValue / 100;
            const timer = setInterval(() => {
                currentValue += increment;
                if (currentValue >= targetValue) {
                    currentValue = targetValue;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(currentValue) + suffix;
            }, 20);
        }

        // Intersection Observer for counter animation
        const statsSection = document.querySelector('#happy-travelers');
        if (statsSection) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter('happy-travelers', 800);
                        animateCounter('years-experience', 30);
                        animateCounter('positive-reviews', 96);
                        observer.unobserve(entry.target);
                    }
                });
            });
            observer.observe(statsSection.closest('section'));
        }

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


        // Reviews Carousel Functionality
        class ReviewsCarousel {
            constructor() {
                this.currentSlide = 0;
                this.totalReviews = 10;
                this.reviewsPerSlide = 3;
                this.totalSlides = this.totalReviews - this.reviewsPerSlide + 1; // 8 slides (0-7)
                this.autoPlayInterval = null;
                this.autoPlayDelay = 4000; // 4 seconds
                this.isHovered = false;
                
                this.carouselWrapper = document.getElementById('carouselWrapper');
                this.prevBtn = document.getElementById('prevReview');
                this.nextBtn = document.getElementById('nextReview');
                this.indicators = document.querySelectorAll('.indicator');
                this.reviewCards = document.querySelectorAll('.review-card');
                
                this.init();
            }
            
            init() {
                // Set up event listeners
                this.prevBtn.addEventListener('click', () => this.goToPrevSlide());
                this.nextBtn.addEventListener('click', () => this.goToNextSlide());
                
                // Indicator click events
                this.indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', () => this.goToSlide(index));
                });
                
                // Hover events to pause/resume autoplay
                const carouselContainer = document.getElementById('reviewsCarousel');
                carouselContainer.addEventListener('mouseenter', () => {
                    this.isHovered = true;
                    this.stopAutoPlay();
                });
                
                carouselContainer.addEventListener('mouseleave', () => {
                    this.isHovered = false;
                    this.startAutoPlay();
                });
                
                // Initialize carousel
                this.updateCarousel();
                this.startAutoPlay();
            }
            
            updateCarousel() {
                // Hide all review cards first
                this.reviewCards.forEach(card => {
                    card.style.display = 'none';
                });
                
                // Show only 3 cards starting from current slide
                for (let i = 0; i < this.reviewsPerSlide; i++) {
                    const cardIndex = this.currentSlide + i;
                    if (cardIndex < this.totalReviews) {
                        this.reviewCards[cardIndex].style.display = 'block';
                    }
                }
                
                // Update indicators
                this.indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === this.currentSlide);
                });
                
                // Update button states
                this.prevBtn.style.opacity = this.currentSlide === 0 ? '0.5' : '1';
                this.nextBtn.style.opacity = this.currentSlide >= this.totalSlides - 1 ? '0.5' : '1';
            }
            
            goToSlide(slideIndex) {
                if (slideIndex >= 0 && slideIndex < this.totalSlides) {
                    this.currentSlide = slideIndex;
                    this.updateCarousel();
                    this.resetAutoPlay();
                }
            }
            
            goToNextSlide() {
                if (this.currentSlide < this.totalSlides - 1) {
                    this.currentSlide++;
                } else {
                    this.currentSlide = 0; // Loop back to beginning
                }
                this.updateCarousel();
                this.resetAutoPlay();
            }
            
            goToPrevSlide() {
                if (this.currentSlide > 0) {
                    this.currentSlide--;
                } else {
                    this.currentSlide = this.totalSlides - 1; // Loop to end
                }
                this.updateCarousel();
                this.resetAutoPlay();
            }
            
            startAutoPlay() {
                if (!this.isHovered) {
                    this.autoPlayInterval = setInterval(() => {
                        this.goToNextSlide();
                    }, this.autoPlayDelay);
                }
            }
            
            stopAutoPlay() {
                if (this.autoPlayInterval) {
                    clearInterval(this.autoPlayInterval);
                    this.autoPlayInterval = null;
                }
            }
            
            resetAutoPlay() {
                this.stopAutoPlay();
                if (!this.isHovered) {
                    this.startAutoPlay();
                }
            }
        }

        // Star Rating System for Review Form
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Reviews Carousel
            const reviewsCarousel = new ReviewsCarousel();
            
            // CAPTCHA System
            let captchaAnswer = 0;
            
            function generateCaptcha() {
                const num1 = Math.floor(Math.random() * 10) + 1;
                const num2 = Math.floor(Math.random() * 10) + 1;
                const operations = ['+', '-', '*'];
                const operation = operations[Math.floor(Math.random() * operations.length)];
                
                let question, answer;
                
                switch(operation) {
                    case '+':
                        question = `${num1} + ${num2} = ?`;
                        answer = num1 + num2;
                        break;
                    case '-':
                        // Ensure result is not negative
                        const larger = Math.max(num1, num2);
                        const smaller = Math.min(num1, num2);
                        question = `${larger} - ${smaller} = ?`;
                        answer = larger - smaller;
                        break;
                    case '*':
                        // Use smaller numbers for multiplication
                        const mult1 = Math.floor(Math.random() * 5) + 1;
                        const mult2 = Math.floor(Math.random() * 5) + 1;
                        question = `${mult1} × ${mult2} = ?`;
                        answer = mult1 * mult2;
                        break;
                }
                
                document.getElementById('captchaQuestion').textContent = question;
                captchaAnswer = answer;
                document.getElementById('captchaInput').value = '';
            }
            
            // Initialize CAPTCHA
            generateCaptcha();
            
            // Refresh CAPTCHA button
            document.getElementById('refreshCaptcha').addEventListener('click', generateCaptcha);
            
            // Modal functionality
            const viewAllReviewsBtn = document.getElementById('viewAllReviews');
            const reviewsModal = document.getElementById('reviewsModal');
            const closeModalBtn = document.getElementById('closeModal');
            const closeModalFooterBtn = document.getElementById('closeModalBtn');
            
            // Show modal
            if (viewAllReviewsBtn) {
                viewAllReviewsBtn.addEventListener('click', function() {
                    reviewsModal.classList.remove('hidden');
                    reviewsModal.classList.add('flex');
                    document.body.style.overflow = 'hidden'; // Prevent background scrolling
                });
            }
            
            // Hide modal functions
            function hideModal() {
                reviewsModal.classList.add('hidden');
                reviewsModal.classList.remove('flex');
                document.body.style.overflow = 'auto'; // Restore scrolling
            }
            
            if (closeModalBtn) closeModalBtn.addEventListener('click', hideModal);
            if (closeModalFooterBtn) closeModalFooterBtn.addEventListener('click', hideModal);
            
            // Close modal when clicking outside
            if (reviewsModal) {
                reviewsModal.addEventListener('click', function(e) {
                    if (e.target === reviewsModal) {
                        hideModal();
                    }
                });
            }
            
            // Close modal with escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && reviewsModal && !reviewsModal.classList.contains('hidden')) {
                    hideModal();
                }
            });
            
            // Star rating functionality
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('reviewRating');
            const ratingText = document.getElementById('ratingText');
            
            const ratingLabels = {
                1: 'Muy malo',
                2: 'Malo', 
                3: 'Regular',
                4: 'Bueno',
                5: 'Excelente'
            };

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = parseInt(this.getAttribute('data-rating'));
                    ratingInput.value = rating;
                    ratingText.textContent = ratingLabels[rating];
                    
                    // Update star display
                    stars.forEach((s, index) => {
                        if (index < rating) {
                            s.classList.remove('text-gray-300');
                            s.classList.add('text-yellow-400');
                        } else {
                            s.classList.remove('text-yellow-400');
                            s.classList.add('text-gray-300');
                        }
                    });
                });
            });

            // Review form submission
            const reviewForm = document.getElementById('reviewForm');
            if (reviewForm) {
                reviewForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const rating = formData.get('reviewRating');
                    const captchaInput = parseInt(document.getElementById('captchaInput').value);
                    
                    // Validate rating
                    if (rating === '0') {
                        alert('Por favor, selecciona una calificación.');
                        return;
                    }
                    
                    // Validate CAPTCHA
                    if (isNaN(captchaInput) || captchaInput !== captchaAnswer) {
                        alert('Por favor, resuelve correctamente la operación matemática para verificar que no eres un robot.');
                        // Generate new CAPTCHA after failed attempt
                        generateCaptcha();
                        return;
                    }
                    
                    // Show loading state
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Enviando...';
                    submitBtn.disabled = true;
                    
                    // Simulate form submission with delay
                    setTimeout(() => {
                        alert('¡Gracias por tu reseña! La revisaremos antes de publicarla.');
                        
                        // Reset form
                        this.reset();
                        ratingInput.value = '0';
                        ratingText.textContent = 'Selecciona una calificación';
                        
                        // Reset stars
                        stars.forEach(star => {
                            star.classList.remove('text-yellow-400');
                            star.classList.add('text-gray-300');
                        });
                        
                        // Generate new CAPTCHA
                        generateCaptcha();
                        
                        // Reset submit button
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }, 2000);
                });
            }
        });
       
        // Filter functionality for services
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const serviceCards = document.querySelectorAll('.service-card');
            const servicesGrid = document.getElementById('servicesGrid');

            // Function to filter cards
            function filterCards(filter) {
                let delay = 0;
                
                // First, fade out all cards
                serviceCards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.transition = 'all 0.4s ease-in-out';
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(-10px) scale(0.95)';
                    }, delay);
                    delay += 50; // Stagger the fade out animations
                });
                
                // After all cards fade out, show the filtered ones
                setTimeout(() => {
                    let showDelay = 0;
                    
                    serviceCards.forEach((card, index) => {
                        const category = card.getAttribute('data-category');
                        
                        if (category === filter) {
                            // Show card with staggered animation
                            setTimeout(() => {
                                card.style.display = 'block';
                                card.style.transition = 'all 0.6s ease-out';
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0) scale(1)';
                            }, showDelay);
                            showDelay += 100; // Stagger the fade in animations
                        } else {
                            // Hide card completely
                            card.style.display = 'none';
                        }
                    });
                    
                    // Add a subtle bounce effect to the grid
                    servicesGrid.style.transition = 'transform 0.3s ease-out';
                    servicesGrid.style.transform = 'scale(0.98)';
                    
                    setTimeout(() => {
                        servicesGrid.style.transform = 'scale(1)';
                    }, 100);
                    
                }, delay + 100); // Wait for all fade out animations to complete
            }

            // Initialize with "sueltas" filter by default
            filterCards('sueltas');

            // Add click event to each filter button
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');
                    
                    // Update active button style
                    filterButtons.forEach(btn => {
                        btn.classList.remove('bg-[#4b5d3a]', 'text-white');
                        btn.classList.add('text-gray-600', 'hover:text-[#4b5d3a]');
                    });
                    
                    this.classList.remove('text-gray-600', 'hover:text-[#4b5d3a]');
                    this.classList.add('bg-[#4b5d3a]', 'text-white');
                    
                    // Filter cards
                    filterCards(filter);
                });
            });
        });

        // Background image animation for productos section
        document.addEventListener('DOMContentLoaded', function() {
            const bgImage1 = document.querySelector('.bg-image-1');
            const bgImage2 = document.querySelector('.bg-image-2');
            let currentImage = 1;
            
            // Function to switch background images
            function switchBackgroundImages() {
                if (currentImage === 1) {
                    // Fade out image 1, fade in image 2
                    bgImage1.style.opacity = '0';
                    bgImage2.style.opacity = '0.7';
                    currentImage = 2;
                } else {
                    // Fade out image 2, fade in image 1
                    bgImage2.style.opacity = '0';
                    bgImage1.style.opacity = '0.7';
                    currentImage = 1;
                }
            }
            
            // Switch images every 5 seconds
            setInterval(switchBackgroundImages, 5000);
        });

        // Review Rating System
        document.addEventListener('DOMContentLoaded', function() {
            // View More/Less Reviews functionality
            const viewMoreBtn = document.getElementById('viewMoreBtn');
            const viewLessBtn = document.getElementById('viewLessBtn');
            const extraReviews = document.querySelectorAll('.extra-review');

            if (viewMoreBtn && viewLessBtn) {
                viewMoreBtn.addEventListener('click', function() {
                    // Show extra reviews with animation
                    extraReviews.forEach((review, index) => {
                        setTimeout(() => {
                            review.classList.remove('hidden');
                            review.style.opacity = '0';
                            review.style.transform = 'translateY(20px)';
                            
                            // Trigger animation
                            setTimeout(() => {
                                review.style.transition = 'all 0.5s ease-out';
                                review.style.opacity = '1';
                                review.style.transform = 'translateY(0)';
                            }, 10);
                        }, index * 100);
                    });
                    
                    // Switch buttons
                    viewMoreBtn.classList.add('hidden');
                    viewLessBtn.classList.remove('hidden');
                });

                viewLessBtn.addEventListener('click', function() {
                    // Hide extra reviews with animation
                    extraReviews.forEach((review, index) => {
                        setTimeout(() => {
                            review.style.transition = 'all 0.3s ease-in';
                            review.style.opacity = '0';
                            review.style.transform = 'translateY(-20px)';
                            
                            setTimeout(() => {
                                review.classList.add('hidden');
                                review.style.transition = '';
                                review.style.opacity = '';
                                review.style.transform = '';
                            }, 300);
                        }, index * 50);
                    });
                    
                    // Switch buttons
                    viewLessBtn.classList.add('hidden');
                    viewMoreBtn.classList.remove('hidden');
                    
                    // Scroll back to reviews section
                    document.querySelector('#reviewsContainer').scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'start' 
                    });
                });
            }

            // Rating stars functionality
            const stars = document.querySelectorAll('.rating-stars .star');
            const ratingInput = document.getElementById('reviewRating');
            const ratingText = document.getElementById('ratingText');
            let currentRating = 0;

            // Rating texts
            const ratingTexts = {
                0: 'Selecciona una calificación',
                1: 'Muy malo',
                2: 'Malo',
                3: 'Regular',
                4: 'Bueno',
                5: 'Excelente'
            };

            // Handle star hover
            stars.forEach((star, index) => {
                star.addEventListener('mouseenter', function() {
                    highlightStars(index + 1);
                });

                star.addEventListener('mouseleave', function() {
                    highlightStars(currentRating);
                });

                star.addEventListener('click', function() {
                    currentRating = index + 1;
                    ratingInput.value = currentRating;
                    ratingText.textContent = ratingTexts[currentRating];
                    highlightStars(currentRating);
                });
            });

            function highlightStars(rating) {
                stars.forEach((star, index) => {
                    if (index < rating) {
                        star.classList.remove('text-gray-300');
                        star.classList.add('text-yellow-400');
                    } else {
                        star.classList.remove('text-yellow-400');
                        star.classList.add('text-gray-300');
                    }
                });
            }

            // Handle form submission
            const reviewForm = document.getElementById('reviewForm');
            if (reviewForm) {
                reviewForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = {
                        name: document.getElementById('reviewName').value,
                        profession: document.getElementById('reviewProfession').value,
                        rating: currentRating,
                        text: document.getElementById('reviewText').value
                    };

                    // Validate rating
                    if (currentRating === 0) {
                        alert('Por favor, selecciona una calificación');
                        return;
                    }

                    // Simulate form submission
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalText = submitBtn.textContent;
                    
                    submitBtn.textContent = 'Enviando...';
                    submitBtn.disabled = true;

                    // Simulate API call
                    setTimeout(() => {
                        alert('¡Gracias por compartir tu experiencia! Tu comentario será revisado y publicado pronto.');
                        
                        // Reset form
                        reviewForm.reset();
                        currentRating = 0;
                        ratingInput.value = 0;
                        ratingText.textContent = ratingTexts[0];
                        highlightStars(0);
                        
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                    }, 2000);
                });
            }
        });

       
    </script>
@endsection
