<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <span class="text-xl font-bold text-gray-800">Los Llanos</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.dashboard') ? 'border-indigo-400 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Dashboard
                    </a>
                    
                    <a href="{{ route('admin.posts.index') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.posts.*') ? 'border-indigo-400 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Posts
                    </a>
                    
                    <a href="{{ route('admin.comments.index') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.comments.*') ? 'border-indigo-400 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Comentarios
                    </a>
                    
                    <a href="{{ route('admin.reviews.index') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.reviews.*') ? 'border-indigo-400 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Reseñas
                    </a>
                    
                    <a href="{{ route('admin.newsletters.index') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.newsletters.*') ? 'border-indigo-400 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Newsletter
                    </a>
                    
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Ver Sitio
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Settings Dropdown -->
                <div class="ms-3 relative" x-data="{ open: false }">
                    <div>
                        <button @click="open = ! open" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <div class="flex items-center text-sm font-medium text-gray-500">
                                <div>{{ Auth::user()->name }}</div>
                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </div>

                    <div x-show="open" @click="open = false" class="fixed inset-0 z-40" style="display: none;"></div>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0" style="display: none;">
                        <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                Perfil
                            </a>
                            
                            <button wire:click="logout" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                Cerrar Sesión
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="block ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.dashboard') ? 'border-indigo-400 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium transition duration-150 ease-in-out">
                Dashboard
            </a>
            
            <a href="{{ route('admin.posts.index') }}" class="block ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.posts.*') ? 'border-indigo-400 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium transition duration-150 ease-in-out">
                Posts
            </a>
            
            <a href="{{ route('admin.comments.index') }}" class="block ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.comments.*') ? 'border-indigo-400 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium transition duration-150 ease-in-out">
                Comentarios
            </a>
            
            <a href="{{ route('admin.reviews.index') }}" class="block ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.reviews.*') ? 'border-indigo-400 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium transition duration-150 ease-in-out">
                Reseñas
            </a>
            
            <a href="{{ route('admin.newsletters.index') }}" class="block ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.newsletters.*') ? 'border-indigo-400 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium transition duration-150 ease-in-out">
                Newsletter
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('dashboard') }}" class="block ps-3 pe-4 py-2 text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Perfil
                </a>
                
                <button wire:click="logout" class="block w-full text-left ps-3 pe-4 py-2 text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Cerrar Sesión
                </button>
            </div>
        </div>
    </div>
</nav>
