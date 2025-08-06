<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-medium text-gray-900">
                        ¡Bienvenido al Panel de Administración!
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        Desde aquí puedes gestionar el contenido de tu sitio web Los Llanos.
                    </p>
                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    <div>
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                                <a href="{{ route('admin.posts.index') }}" class="text-blue-600 hover:text-blue-800">Gestión de Posts</a>
                            </h2>
                        </div>

                        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                            Crea, edita y gestiona las publicaciones del blog. Puedes escribir artículos, añadir imágenes y publicarlos cuando estén listos.
                        </p>

                        <p class="mt-4">
                            <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center font-semibold text-blue-600 hover:text-blue-800">
                                Ver Posts
                                <svg viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-blue-600">
                                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </p>
                    </div>

                    <div>
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                                <a href="{{ route('admin.newsletters.index') }}" class="text-blue-600 hover:text-blue-800">Newsletter</a>
                            </h2>
                        </div>

                        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                            Gestiona los suscriptores de tu newsletter. Ve quién se ha suscrito y exporta la lista de contactos.
                        </p>

                        <p class="mt-4">
                            <a href="{{ route('admin.newsletters.index') }}" class="inline-flex items-center font-semibold text-blue-600 hover:text-blue-800">
                                Ver Suscriptores
                                <svg viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-blue-600">
                                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
