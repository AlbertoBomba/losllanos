 <!-- Header -->
<header class="fixed w-full z-50" >
    <div class="bg-[#f5f1e3] bg-opacity-90 backdrop-blur-none   max-w-full     shadow-none transition-all duration-500 ease-in-out" id="headerContent">
        
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
                            <a href="#" class="text-gray-700 hover:text-[#4b5d3a] transition-all duration-300 flex items-center hover:scale-105" >
                                Productos <i class="fas fa-chevron-down ml-1 text-sm transition-transform group-hover:rotate-180"></i>
                            </a>
                            <!-- Dropdown Menu -->
                            <div class="absolute bg-opacity-90 top-full left-0 mt-2 w-56 bg-[#f5f1e3] shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                <div class="py-2">
                                    <a href="{{ route('productos.aves-de-caza') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-[#4b5d3a] transition font-medium">
                                        <i class="fas fa-feather mr-3"></i>
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
                        <a href="{{ route('reviews.index') }}" class="text-gray-700 hover:text-[#4b5d3a] transition-all duration-300 hover:scale-105">Reseñas</a>
                    </div>
                    <a href="{{ route('contact.index') }}" class="bg-[#8b5e3c] hover:bg-[#4b5d3a] text-white px-6 py-2 rounded-full font-action font-bold tracking-wide transition-all duration-300 hover:scale-105 shadow-md hover:shadow-lg">
                        Contacto
                    </a>
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
            <div class="lg:hidden   border-t border-gray-200 opacity-0 invisible max-h-0 overflow-hidden transition-all duration-300 ease-in-out" 
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
                                <i class="fas fa-feather mr-3"></i>
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
                    <a href="{{ route('reviews.index') }}" class="block text-gray-700 hover:text-[#4b5d3a] font-action font-semibold text-lg py-2 px-2 rounded-lg hover:bg-gray-50 transition">
                        Reseñas
                    </a>
                    
                    <!-- Mobile Contact Button -->
                    <div class="pt-2">
                        <a href="{{ route('contact.index') }}" class="block w-full bg-[#8b5e3c] hover:bg-[#4b5d3a] text-white px-6 py-3 rounded-full font-action font-bold tracking-wide transition-all duration-300 shadow-md hover:shadow-lg text-center">
                            Contacto
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>  
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elementos del menú móvil
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    
    // Elementos del dropdown móvil de productos
    const mobileProductosBtn = document.getElementById('mobileProductosBtn');
    const mobileDropdown = document.getElementById('mobileDropdown');
    const mobileDropdownIcon = document.getElementById('mobileDropdownIcon');
    
    // Variable para controlar el estado del menú
    let isMenuOpen = false;
    let isDropdownOpen = false;
    
    // Función para abrir/cerrar el menú móvil
    function toggleMobileMenu() {
        isMenuOpen = !isMenuOpen;
        
        if (isMenuOpen) {
            // Abrir menú
            mobileMenu.classList.remove('opacity-0', 'invisible', 'max-h-0');
            mobileMenu.classList.add('opacity-100', 'visible', 'max-h-96');
            menuIcon.classList.remove('fa-bars');
            menuIcon.classList.add('fa-times');
            mobileMenuBtn.setAttribute('aria-expanded', 'true');
        } else {
            // Cerrar menú
            mobileMenu.classList.remove('opacity-100', 'visible', 'max-h-96');
            mobileMenu.classList.add('opacity-0', 'invisible', 'max-h-0');
            menuIcon.classList.remove('fa-times');
            menuIcon.classList.add('fa-bars');
            mobileMenuBtn.setAttribute('aria-expanded', 'false');
            
            // Cerrar también el dropdown si está abierto
            if (isDropdownOpen) {
                toggleMobileDropdown();
            }
        }
    }
    
    // Función para abrir/cerrar el dropdown de productos en móvil
    function toggleMobileDropdown() {
        isDropdownOpen = !isDropdownOpen;
        
        if (isDropdownOpen) {
            // Abrir dropdown
            mobileDropdown.classList.remove('opacity-0', 'invisible', 'max-h-0');
            mobileDropdown.classList.add('opacity-100', 'visible', 'max-h-40');
            mobileDropdownIcon.style.transform = 'rotate(180deg)';
        } else {
            // Cerrar dropdown
            mobileDropdown.classList.remove('opacity-100', 'visible', 'max-h-40');
            mobileDropdown.classList.add('opacity-0', 'invisible', 'max-h-0');
            mobileDropdownIcon.style.transform = 'rotate(0deg)';
        }
    }
    
    // Event listeners
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleMobileMenu();
        });
    }
    
    if (mobileProductosBtn) {
        mobileProductosBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleMobileDropdown();
        });
    }
    
    // Cerrar menú al hacer clic fuera de él
    document.addEventListener('click', function(e) {
        if (isMenuOpen && !mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
            toggleMobileMenu();
        }
    });
    
    // Cerrar menú al hacer clic en enlaces internos
    const mobileMenuLinks = mobileMenu.querySelectorAll('a[href^="/"], a[href^="#"]');
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (isMenuOpen) {
                // Pequeño delay para permitir que se inicie la navegación
                setTimeout(() => {
                    toggleMobileMenu();
                }, 100);
            }
        });
    });
    
    // Cerrar menú con la tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isMenuOpen) {
            toggleMobileMenu();
        }
    });
    
    // Manejar redimensionamiento de ventana
    window.addEventListener('resize', function() {
        // Si cambiamos a desktop, cerrar el menú móvil
        if (window.innerWidth >= 1024 && isMenuOpen) {
            toggleMobileMenu();
        }
    });
    
    // Smooth scroll para header con fondo dinámico (opcional)
    let lastScrollTop = 0;
    const headerContent = document.getElementById('headerContent');
    
    if (headerContent) {
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 50) {
                headerContent.classList.add('bg-opacity-95', 'backdrop-blur-md', 'shadow-lg');
                headerContent.classList.remove('bg-opacity-0', 'backdrop-blur-none', 'shadow-none');
            } else {
                headerContent.classList.remove('bg-opacity-95', 'backdrop-blur-md', 'shadow-lg');
                headerContent.classList.add('bg-opacity-0', 'backdrop-blur-none', 'shadow-none');
            }
            
            lastScrollTop = scrollTop;
        });
    }
});
</script>
