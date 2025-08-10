 <!-- Header -->
<header class="fixed w-full top-0 z-50 px-4 lg:px-10" id="header">
    <div class="bg-[#f5f1e3] bg-opacity- backdrop-blur-none rounded-full mx-auto mt-4 max-w-full mx-2 lg:mx-8 px-4 lg:px-6 py-1 shadow-none transition-all duration-500 ease-in-out" id="headerContent">
        <nav class="px-2 lg:px-8 py-1">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/logo/logo.png') }}" class="h-16 lg:h-20 object-cover" alt="Club de tiro los llanos">
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-8 text-2xl">
                    <div class="flex items-center space-x-6 font-action font-semibold">
                       <a href="{{route('blog-de-caza') }}" title="Ir a la sección de blogs"class="text-gray-700 hover:text-[#4b5d3a] transition-all duration-300 hover:scale-105">Blogs</a>
                        <div class="relative group">
                            <a href="#" class="text-gray-700 hover:text-[#4b5d3a] transition-all duration-300 flex items-center hover:scale-105" id="productos-menu">
                                Productos <i class="fas fa-chevron-down ml-1 text-sm transition-transform group-hover:rotate-180"></i>
                            </a>
                            <!-- Dropdown Menu -->
                            <div class="absolute top-full left-0 mt-2 w-56 bg-[#f5f1e3] rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                <div class="py-2">
                                    <a href="{{ route('productos.aves-de-caza') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-[#4b5d3a] transition font-medium">
                                        <i class="fas fa-dove mr-3"></i>
                                        Aves de caza
                                    </a>
                                    <a href="{{ route('productos.sueltas') }}" title="Ir a la sección de tiradas en finca" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-[#4b5d3a] transition font-medium">
                                        <i class="fas fa-crosshairs mr-3"></i>
                                        Tiradas
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="text-gray-700 hover:text-[#4b5d3a] transition-all duration-300 hover:scale-105">¿Quiénes somos?</a>
                        <a href="#" class="text-gray-700 hover:text-[#4b5d3a] transition-all duration-300 hover:scale-105">"Reseñas"</a>
                    </div>
                    <button class="bg-[#8b5e3c] hover:bg-[#4b5d3a] text-white px-6 py-2 rounded-full font-action font-bold tracking-wide transition-all duration-300 hover:scale-105 shadow-md hover:shadow-lg">
                        Contacto
                    </button>
                </div>
                
                <!-- Mobile Menu Button -->
                <button class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors" 
                        id="mobileMenuBtn"
                        aria-label="Abrir menú de navegación"
                        aria-expanded="false"
                        aria-controls="mobileMenu"
                        type="button">
                    <i class="fas fa-bars text-gray-700 text-xl" id="menuIcon" aria-hidden="true"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div class="lg:hidden mt-4 pb-4 border-t border-gray-200 opacity-0 invisible max-h-0 overflow-hidden transition-all duration-300 ease-in-out" 
                 id="mobileMenu" 
                 role="navigation" 
                 aria-label="Menú móvil de navegación">
                <div class="pt-4 space-y-3">
                    <a href="{{route('blog-de-caza') }}" title="Ir a la sección de blogs" class="block text-gray-700 hover:text-[#4b5d3a] font-action font-semibold text-lg py-2 px-2 rounded-lg hover:bg-gray-50 transition">
                      Blogs  
                    </a>
                    <!-- Mobile Dropdown -->
                    <div class="block">
                        <button class="w-full text-left text-gray-700 hover:text-[#4b5d3a] font-action font-semibold text-lg py-2 px-2 rounded-lg hover:bg-gray-50 transition flex items-center justify-between" id="mobileProductosBtn">
                            Productos
                            <i class="fas fa-chevron-down text-sm transition-transform" id="mobileDropdownIcon"></i>
                        </button>
                        <div class="ml-4 mt-2  space-y-2 opacity-0 invisible max-h-0 overflow-hidden transition-all duration-300  backdrop-blur-sm rounded-lg p-2" id="mobileDropdown">
                            <a href="{{ route('productos.aves-de-caza') }}" class="block text-gray-700 hover:text-[#4b5d3a] py-2 px-2 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-dove mr-3"></i>
                                <p class="text-gray-700 ">>Aves de caza</p>
                            </a>
                            <a href="{{ route('productos.sueltas') }}" title="Ir a la sección de tiradas en finca" class="block text-gray-700 hover:text-[#4b5d3a] py-2 px-2 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-crosshairs mr-3"></i>
                                Tiradas
                            </a>
                        </div>
                    </div>
                    <a href="#" class="block text-gray-700 hover:text-[#4b5d3a] font-action font-semibold text-lg py-2 px-2 rounded-lg hover:bg-gray-50 transition">
                        ¿Quiénes somos?
                    </a>
                     <a href="#" class="block text-white hover:text-[#4b5d3a] font-action font-semibold text-lg py-2 px-2 rounded-lg hover:bg-gray-50 transition">
                        Reseñas
                    </a>
                    
                    <!-- Mobile Contact Button -->
                    <div class="pt-2">
                        <button class="w-full bg-[#8b5e3c] hover:bg-[#4b5d3a] text-white px-6 py-3 rounded-full font-action font-bold tracking-wide transition-all duration-300 shadow-md hover:shadow-lg">
                            Contacto
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>

        
</header>

<script>
// =======================
// HEADER NAVIGATION JAVASCRIPT
// =======================

document.addEventListener('DOMContentLoaded', function() {
    // Dropdown menu functionality
    const dropdown = document.querySelector('.group');
    if (dropdown) {
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
    }

    // Header background change based on hero section position
    const header = document.getElementById('header');
    const headerContent = document.getElementById('headerContent');
    
    // Obtener elementos específicos del menú
    const mobileMenuIcon = document.getElementById('menuIcon');
    const dropdownIcon = document.getElementById('mobileDropdownIcon');
    
    if (header && headerContent) {
        function updateHeaderStyle() {
            // Verificar si existe la sección hero_section en el documento
            const heroSection = document.getElementById('hero_section');
            
            // Si no existe la sección hero, no aplicar ningún efecto
            if (!heroSection) {
                // console.log('Hero section not found - no header effects applied');
                return; // Salir de la función sin aplicar efectos
            }
            
            const scrollY = window.pageYOffset;
            const headerHeight = header.offsetHeight;
            const heroRect = heroSection.getBoundingClientRect();
            const heroBottom = heroRect.bottom;
            
            // Si el header está sobre la sección hero (heroBottom > headerHeight), usar estilo transparente
            const isOverHero = heroBottom > headerHeight;
            
            if (isOverHero) {
                // Header transparente con texto blanco (sobre hero)
                headerContent.style.backgroundColor = 'rgba(245, 241, 227, 0)';
                headerContent.style.backdropFilter = 'blur(0px)';
                headerContent.style.boxShadow = 'none';
                
                // Aplicar color blanco a todos los elementos
                const desktopLinks = document.querySelectorAll('#header nav .flex.items-center.space-x-6 a');
                desktopLinks.forEach(link => {
                    link.style.color = 'white';
                });
                
                // Aplicar color blanco a elementos del menú móvil
                const mobileLinks = document.querySelectorAll('#mobileMenu a');
                mobileLinks.forEach(link => {
                    link.style.color = 'white';
                });
                
                const mobileProductosBtn = document.getElementById('mobileProductosBtn');
                if (mobileProductosBtn) {
                    mobileProductosBtn.style.color = 'white';
                }
                
                if (mobileMenuIcon) {
                    mobileMenuIcon.style.color = 'white';
                }
                
                if (dropdownIcon) {
                    dropdownIcon.style.color = 'white';
                }
            } else {
                // Header con fondo y texto negro (fuera del hero)
                headerContent.style.backgroundColor = 'rgba(245, 241, 227, 0.95)';
                headerContent.style.backdropFilter = 'blur(8px)';
                headerContent.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
                
                // Aplicar color negro a todos los elementos
                const desktopLinks = document.querySelectorAll('#header nav .flex.items-center.space-x-6 a');
                desktopLinks.forEach(link => {
                    link.style.color = 'black'; // Texto negro
                });
                
                // Aplicar color negro a elementos del menú móvil
                const mobileLinks = document.querySelectorAll('#mobileMenu a');
                mobileLinks.forEach(link => {
                    link.style.color = 'black';
                });
                
                const mobileProductosBtn = document.getElementById('mobileProductosBtn');
                if (mobileProductosBtn) {
                    mobileProductosBtn.style.color = 'black';
                }
                
                if (mobileMenuIcon) {
                    mobileMenuIcon.style.color = 'black';
                }
                
                if (dropdownIcon) {
                    dropdownIcon.style.color = 'black';
                }
            }
        }
        
        // Ejecutar al cargar la página
        updateHeaderStyle();
        
        // Ejecutar en scroll
        window.addEventListener('scroll', updateHeaderStyle);
        
        // Ejecutar en resize por si cambia el tamaño de la pantalla
        window.addEventListener('resize', updateHeaderStyle);
    }

    // Mobile menu functionality (compatibilidad con estructura anterior)
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    const mobileProductosBtn = document.getElementById('mobileProductosBtn');
    const mobileDropdown = document.getElementById('mobileDropdown');
    const mobileDropdownIcon = document.getElementById('mobileDropdownIcon');
    
    let isMenuOpen = false;

    // Mobile menu toggle function (para compatibilidad con estructura anterior)
    if (mobileMenuBtn && mobileMenu && menuIcon) {
        mobileMenuBtn.addEventListener('click', function() {
            isMenuOpen = !isMenuOpen;
            
            if (isMenuOpen) {
                mobileMenu.classList.remove('opacity-0', 'invisible', 'max-h-0');
                mobileMenu.classList.add('opacity-100', 'visible', 'max-h-96');
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-times');
                mobileMenuBtn.setAttribute('aria-expanded', 'true');
                mobileMenuBtn.setAttribute('aria-label', 'Cerrar menú de navegación');
            } else {
                mobileMenu.classList.remove('opacity-100', 'visible', 'max-h-96');
                mobileMenu.classList.add('opacity-0', 'invisible', 'max-h-0');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
                mobileMenuBtn.setAttribute('aria-expanded', 'false');
                mobileMenuBtn.setAttribute('aria-label', 'Abrir menú de navegación');
            }
        });
    }

    // Mobile dropdown toggle function (para compatibilidad con estructura anterior)
    if (mobileProductosBtn && mobileDropdown && mobileDropdownIcon) {
        mobileProductosBtn.addEventListener('click', function() {
            const isDropdownOpen = mobileDropdown.classList.contains('max-h-48');
            
            if (isDropdownOpen) {
                mobileDropdown.classList.remove('opacity-100', 'visible', 'max-h-48');
                mobileDropdown.classList.add('opacity-0', 'invisible', 'max-h-0');
                mobileDropdownIcon.classList.remove('rotate-180');
            } else {
                mobileDropdown.classList.remove('opacity-0', 'invisible', 'max-h-0');
                mobileDropdown.classList.add('opacity-100', 'visible', 'max-h-48');
                mobileDropdownIcon.classList.add('rotate-180');
            }
        });
    }
});

// Función para el dropdown móvil (usada por Livewire)
function toggleMobileDropdown() {
    const dropdown = document.getElementById('mobileDropdown');
    const icon = document.getElementById('mobileDropdownIcon');
    
    if (dropdown && icon) {
        if (dropdown.classList.contains('max-h-0')) {
            dropdown.classList.remove('max-h-0');
            dropdown.classList.add('max-h-48');
            icon.classList.add('rotate-180');
        } else {
            dropdown.classList.remove('max-h-48');
            dropdown.classList.add('max-h-0');
            icon.classList.remove('rotate-180');
        }
    }
}

// Smooth scroll para enlaces de anclaje
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                
                // Cerrar menú móvil después de hacer clic en un enlace (Livewire)
                if (window.Livewire) {
                    try {
                        const navigationComponent = window.Livewire.find(document.querySelector('[wire\\:id]')?.getAttribute('wire:id'));
                        if (navigationComponent) {
                            navigationComponent.set('showMobileMenu', false);
                        }
                    } catch (e) {
                        // console.log('Livewire not available for mobile menu toggle');
                    }
                }
            }
        });
    });
});
</script>