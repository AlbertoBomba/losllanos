@extends('layouts.frontend')

@section('title', 'test home- Los llanos')
@section('description', 'Bienvenido a Los Llanos. Un lugar condonde el cazados en cuentra su particular 
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
                <a href="{{ route('productos.aves-de-caza') }}" title="Ir a la sección de aves de caza" class="bg-[#8b5e3c] hover:bg-[#4b5d3a] text-white px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                    Sueltas o cacerías
                </a>
                 <a href="{{ route('productos.sueltas') }}" title="Ir a la sección de tiradas en finca" class="border-2 border-white text-white hover:bg-white hover:text-gray-900 px-8 py-4 rounded-full font-action font-bold text-lg tracking-wide uppercase transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                    Venta de aves de caza
                </a>
            </div>
            
            <!-- Bottom Section with Avatars and Stats -->
            <div class="flex flex-col md:flex-row justify-between items-center max-w-5xl mx-auto">
                <!-- Left: Avatars and Guides -->
                <div class="flex items-center space-x-4 mb-8 md:mb-0">
                    <div class="flex -space-x-3">
                        <img src="{{asset('images/follows/folow_1.jpg')}}" 
                             class="w-18 h-12 rounded-full border-3 border-white" alt="Autores reseña general 1">
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

                <div class="service-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition" data-category="sueltas" data-type="perdiz">
                    <img src="{{asset('images/general/cazador-perdiz-2.webp')}}"   
                         alt="cazador contra perdiz sobre el fondo campos de castilla" 
                         class="w-full h-48 object-cover object-top">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm font-sans font-medium">Aún no disponemos de calendario</span>
                            <div class="text-right">
                                {{-- <div class="text-2xl font-display font-bold text-accent">Precio</div>
                                <div class="text-gray-600 text-sm font-sans">a consultar</div> --}}
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
                </div>

                <!-- Service Card 4 -->
                {{-- <div class="service-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition" data-category="sueltas" data-type="perdiz">
                    <img src="{{asset('images/general/cazador-perdiz-2.webp')}}"   
                         alt="cazador contra perdiz sobre el fondo campos de castilla" 
                         class="w-full h-48 object-cover object-top">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm font-sans font-medium">Máx 20 puestos</span>
                            <div class="text-right">
                                <div class="text-2xl font-display font-bold text-accent">Precio</div>
                                <div class="text-gray-600 text-sm font-sans">a consultar</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-display font-bold text-dark mb-2 uppercase tracking-wide">Perdices</h3>
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

                

                <!-- Service Card 5 -->
                {{-- <div class="service-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition" data-category="sueltas" data-type="finca">
                   <img src="{{asset('images/general/cazador-faisan.webp')}}"   
                         alt="cazador contra paloma sobre un fondo de campos de castilla" class="w-full h-48 object-cover object-top">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm font-sans font-medium">Máx 20 puestos</span>
                            <div class="text-right">
                                <div class="text-2xl font-display font-bold text-accent">Precio</div>
                                <div class="text-gray-600 text-sm font-sans">a consultar</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-display font-bold text-dark mb-2 uppercase tracking-wide">Faisanes</h3>
                        <div class="flex items-center text-gray-600 mb-4 font-sans">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>Temporada: Oct - Mar</span>
                        </div>
                        <button class="w-full bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white py-2 rounded-lg font-action font-semibold tracking-wide uppercase transition hover:scale-105">
                            Consultar fecha y precio
                        </button>
                    </div>
                </div> --}}
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
                            {{-- <img src="{{asset('images/galery/29.JPG')}}" 
                                 alt="Imagen galeria 10" class="rounded-2xl shadow-lg w-60 h-80 object-cover flex-shrink-0"> --}}
                            <img src="{{asset('images/galery/26.JPG')}}" 
                                 alt="Imagen galeria 11" class="rounded-2xl shadow-lg w-96 h-56 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/27.JPG')}}" 
                                 alt="Imagen galeria 12" class="rounded-2xl shadow-lg w-60 h-72 object-cover flex-shrink-0">
                        </div>
                    </div>
                </div>

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
                         
                            <img src="{{asset('images/galery/G61.JPG')}}" 
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-72 h-52 object-cover flex-shrink-0">
                            <img src="{{asset('images/galery/G60.JPG')}}"  
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-60 h-76 object-cover flex-shrink-0">
                            {{-- <img src="{{asset('images/galery/G59.JPG')}}"  
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-88 h-52 object-cover flex-shrink-0"> --}}
                            {{-- <img src="{{asset('images/galery/G58.JPG')}}"  
                                 alt="Experiencia de caza" class="rounded-2xl shadow-lg w-64 h-80 object-cover flex-shrink-0"> --}}
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
    
    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 bg-[#4b5d3a] hover:bg-[#3a4a2c] text-white w-12 h-12 rounded-full shadow-lg opacity-0 invisible transition-all duration-300">
        <i class="fas fa-chevron-up"></i>
    </button>

    {{-- JavaScript moved to external optimized files for better FCP --}}
    {{-- All interactive features now load asynchronously after critical resources --}}
    
    {{-- Add home page identifier for conditional loading --}}
    <script>
        // Minimal inline JS for critical functionality only
        document.body.classList.add('home-page');
        
        // Critical performance hint
        if ('loading' in HTMLImageElement.prototype) {
            document.documentElement.classList.add('native-lazy-loading');
        }
    </script>
@endsection
