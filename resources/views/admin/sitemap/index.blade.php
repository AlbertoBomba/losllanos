<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Sitemap') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Notificaciones -->
            <div id="notification" class="mb-6 hidden">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                    <strong class="font-bold">¡Éxito!</strong>
                    <span class="block sm:inline" id="notificationText">Sitemap actualizado correctamente.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="hideNotification()">
                        <i class="fas fa-times cursor-pointer"></i>
                    </span>
                </div>
            </div>
            
            <!-- Estadísticas del Sitemap -->
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">📊 Estadísticas del Sitemap</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-file-code text-white text-xl"></i>
                            </div>
                            <p class="text-sm text-gray-600">Páginas Estáticas</p>
                            <p class="text-2xl font-bold text-blue-600">{{ number_format($stats['static_pages']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-blog text-white text-xl"></i>
                            </div>
                            <p class="text-sm text-gray-600">Posts del Blog</p>
                            <p class="text-2xl font-bold text-green-600">{{ number_format($stats['blog_posts']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-link text-white text-xl"></i>
                            </div>
                            <p class="text-sm text-gray-600">URLs Total</p>
                            <p class="text-2xl font-bold text-purple-600">{{ number_format($stats['total_urls']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-clock text-white text-xl"></i>
                            </div>
                            <p class="text-sm text-gray-600">Última Actualización</p>
                            <p class="text-sm font-bold text-orange-600">{{ $stats['last_updated'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acciones del Sitemap -->
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">🛠️ Acciones del Sitemap</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                        <!-- Actualizar Sitemap -->
                        <button onclick="updateSitemap()" 
                                id="updateBtn"
                                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-lg text-center transition duration-200">
                            <i class="fas fa-sync-alt mb-2 text-lg block" id="updateIcon"></i>
                            <span id="updateText">Actualizar Sitemap</span>
                        </button>

                        <!-- Vista Previa -->
                        <a href="{{ route('admin.sitemap.generate', ['format' => 'xml']) }}" 
                           target="_blank"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg text-center transition duration-200">
                            <i class="fas fa-eye mb-2 text-lg block"></i>
                            Ver Sitemap XML
                        </a>

                        <!-- Descargar XML -->
                        <a href="{{ route('admin.sitemap.download') }}" 
                           class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg text-center transition duration-200">
                            <i class="fas fa-download mb-2 text-lg block"></i>
                            Descargar XML
                        </a>

                        <!-- Ver JSON -->
                        <button onclick="showJSON()" 
                                class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-3 px-4 rounded-lg text-center transition duration-200">
                            <i class="fas fa-code mb-2 text-lg block"></i>
                            Ver como JSON
                        </button>

                        <!-- Robots.txt -->
                        <a href="{{ route('robots.txt') }}" 
                           target="_blank"
                           class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-3 px-4 rounded-lg text-center transition duration-200">
                            <i class="fas fa-robot mb-2 text-lg block"></i>
                            Ver Robots.txt
                        </a>
                    </div>
                </div>
            </div>

            <!-- Información de URLs Incluidas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                
                <!-- Páginas Estáticas -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">📄 Páginas Estáticas</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium">Página Principal</span>
                                <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Prioridad 1.0</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium">Sección Productos</span>
                                <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Prioridad 0.9</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium">Páginas de Aves (4)</span>
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">Prioridad 0.8</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium">Tiradas en Finca</span>
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">Prioridad 0.8</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium">Blog Principal</span>
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">Prioridad 0.8</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium">Páginas Legales (4)</span>
                                <span class="text-xs bg-gray-100 text-gray-800 px-2 py-1 rounded-full">Prioridad 0.3-0.6</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Posts del Blog -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">📝 Posts del Blog (Dinámico)</h3>
                    </div>
                    <div class="p-6">
                        @php
                            $recentPosts = App\Models\Post::where('published', true)
                                ->orderBy('created_at', 'desc')
                                ->limit(6)
                                ->get();
                        @endphp
                        
                        @if($recentPosts->count() > 0)
                            <div class="space-y-3 max-h-60 overflow-y-auto">
                                @foreach($recentPosts as $post)
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">{{ $post->title }}</p>
                                            <p class="text-xs text-gray-500">/blog-de-caza/{{ $post->slug }}</p>
                                        </div>
                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full ml-2">
                                            {{ $post->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                @endforeach
                                
                                @if($stats['blog_posts'] > 6)
                                    <div class="text-center pt-3 border-t">
                                        <span class="text-xs text-gray-500">
                                            ... y {{ $stats['blog_posts'] - 6 }} posts más
                                        </span>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="text-center py-8">
                                <i class="fas fa-blog text-gray-300 text-4xl mb-4"></i>
                                <p class="text-gray-500">No hay posts publicados</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Información SEO -->
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">🔍 Información SEO</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h4 class="font-medium text-blue-900 mb-2">¿Qué es un Sitemap?</h4>
                            <p class="text-sm text-blue-800">
                                Un sitemap es un archivo que enumera todas las páginas de tu sitio web, 
                                ayudando a los motores de búsqueda a encontrar e indexar tu contenido más eficientemente.
                            </p>
                        </div>
                        
                        <div class="bg-green-50 p-4 rounded-lg">
                            <h4 class="font-medium text-green-900 mb-2">¿Cómo usar este sitemap?</h4>
                            <ul class="text-sm text-green-800 space-y-1">
                                <li>• Descarga el archivo XML</li>
                                <li>• Súbelo a Google Search Console</li>
                                <li>• Colócalo en la raíz de tu sitio web</li>
                                <li>• Actualízalo cuando añadas contenido</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4 p-4 bg-yellow-50 rounded-lg">
                        <h4 class="font-medium text-yellow-900 mb-2">📋 URL Recomendadas para el Sitemap</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="font-medium text-yellow-800">Colocar en tu servidor:</p>
                                <code class="text-xs bg-yellow-100 px-2 py-1 rounded">{{ url('/sitemap.xml') }}</code>
                            </div>
                            <div>
                                <p class="font-medium text-yellow-800">Robots.txt generado:</p>
                                <code class="text-xs bg-yellow-100 px-2 py-1 rounded">{{ url('/robots.txt') }}</code>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón para volver -->
            <div class="mt-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-arrow-left mr-2"></i> Volver al Dashboard
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal para JSON -->
    <div id="jsonModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Sitemap en formato JSON</h3>
                    <button onclick="hideJSON()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <pre id="jsonContent" class="bg-gray-100 p-4 rounded-lg text-xs overflow-auto max-h-96"></pre>
                <div class="flex justify-end mt-4">
                    <button onclick="hideJSON()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showJSON() {
            fetch('{{ route("admin.sitemap.generate", ["format" => "json"]) }}')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('jsonContent').textContent = JSON.stringify(data, null, 2);
                    document.getElementById('jsonModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al cargar los datos JSON');
                });
        }

        function hideJSON() {
            document.getElementById('jsonModal').classList.add('hidden');
        }

        function updateSitemap() {
            const updateBtn = document.getElementById('updateBtn');
            const updateIcon = document.getElementById('updateIcon');
            const updateText = document.getElementById('updateText');
            
            // Cambiar estado del botón a cargando
            updateBtn.disabled = true;
            updateBtn.classList.remove('bg-indigo-500', 'hover:bg-indigo-700');
            updateBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
            updateIcon.classList.add('fa-spin');
            updateText.textContent = 'Actualizando...';
            
            // Realizar petición para regenerar sitemap
            fetch('{{ route("admin.sitemap.update") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Error en la respuesta del servidor');
                    }
                })
                .then(data => {
                    // Éxito - actualizar estadísticas y UI
                    updateIcon.classList.remove('fa-spin', 'fa-sync-alt');
                    updateIcon.classList.add('fa-check');
                    updateText.textContent = '¡Actualizado!';
                    
                    // Actualizar las estadísticas en la página
                    if (data.stats) {
                        const staticPagesEl = document.querySelector('.text-blue-600');
                        const blogPostsEl = document.querySelector('.text-green-600');
                        const totalUrlsEl = document.querySelector('.text-purple-600');
                        const lastUpdatedEl = document.querySelector('.text-orange-600');
                        
                        if (staticPagesEl) staticPagesEl.textContent = data.stats.static_pages.toLocaleString();
                        if (blogPostsEl) blogPostsEl.textContent = data.stats.blog_posts.toLocaleString();
                        if (totalUrlsEl) totalUrlsEl.textContent = data.stats.total_urls.toLocaleString();
                        if (lastUpdatedEl) lastUpdatedEl.textContent = data.stats.last_updated;
                    }
                    
                    // Mostrar notificación de éxito
                    showNotification('¡Sitemap actualizado correctamente! Se han procesado ' + data.stats.total_urls + ' URLs.');
                    
                    // Restaurar botón después de 2 segundos
                    setTimeout(() => {
                        updateBtn.disabled = false;
                        updateBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                        updateBtn.classList.add('bg-indigo-500', 'hover:bg-indigo-700');
                        updateIcon.classList.remove('fa-check');
                        updateIcon.classList.add('fa-sync-alt');
                        updateText.textContent = 'Actualizar Sitemap';
                    }, 2000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    
                    // Restaurar botón en caso de error
                    updateBtn.disabled = false;
                    updateBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                    updateBtn.classList.add('bg-red-500', 'hover:bg-red-700');
                    updateIcon.classList.remove('fa-spin', 'fa-sync-alt');
                    updateIcon.classList.add('fa-exclamation-triangle');
                    updateText.textContent = 'Error al actualizar';
                    
                    setTimeout(() => {
                        updateBtn.disabled = false;
                        updateBtn.classList.remove('bg-red-500', 'hover:bg-red-700');
                        updateBtn.classList.add('bg-indigo-500', 'hover:bg-indigo-700');
                        updateIcon.classList.remove('fa-exclamation-triangle');
                        updateIcon.classList.add('fa-sync-alt');
                        updateText.textContent = 'Actualizar Sitemap';
                    }, 3000);
                });
        }

        // Cerrar modal al hacer clic fuera
        document.getElementById('jsonModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideJSON();
            }
        });

        function showNotification(message) {
            document.getElementById('notificationText').textContent = message;
            document.getElementById('notification').classList.remove('hidden');
            
            // Auto-ocultar después de 5 segundos
            setTimeout(() => {
                hideNotification();
            }, 5000);
        }

        function hideNotification() {
            document.getElementById('notification').classList.add('hidden');
        }
    </script>
</x-app-layout>
