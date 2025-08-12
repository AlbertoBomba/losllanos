<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Producción - Los Llanos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                🚀 Verificación de Preparación para Producción
            </h1>
            
            <!-- Estado Actual -->
            <div class="mb-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">📊 Estado Actual del Sistema</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 border rounded-lg">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-server text-blue-500 mr-2"></i>
                                <strong>Entorno:</strong>
                            </div>
                            <div class="text-sm">
                                <div>App Env: <code class="bg-gray-100 px-2 py-1 rounded">{{ app()->environment() }}</code></div>
                                <div>App URL: <code class="bg-gray-100 px-2 py-1 rounded">{{ config('app.url') }}</code></div>
                            </div>
                        </div>
                        
                        <div class="p-4 border rounded-lg">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-map text-green-500 mr-2"></i>
                                <strong>Sitemap:</strong>
                            </div>
                            <div class="text-sm">
                                @php
                                    $sitemapExists = file_exists(public_path('sitemap_index.xml'));
                                    $isDev = str_contains(config('app.url'), 'localhost');
                                @endphp
                                <div>Estado: <span class="{{ $sitemapExists ? 'text-green-600' : 'text-red-600' }}">{{ $sitemapExists ? '✅ Generado' : '❌ No encontrado' }}</span></div>
                                <div>Modo: <span class="{{ $isDev ? 'text-yellow-600' : 'text-green-600' }}">{{ $isDev ? '🔧 Desarrollo' : '🚀 Producción' }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Lista de Verificaciones -->
            <div class="mb-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">✅ Lista de Verificación para Producción</h2>
                    
                    <div class="space-y-4">
                        <!-- Configuración de Entorno -->
                        <div class="flex items-center p-3 border rounded-lg">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center mr-3 {{ app()->environment('production') ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                <i class="fas {{ app()->environment('production') ? 'fa-check' : 'fa-exclamation' }} text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium">Configuración de Entorno</div>
                                <div class="text-sm text-gray-600">APP_ENV debe ser 'production'</div>
                            </div>
                            <div class="text-sm">
                                <code>{{ app()->environment() }}</code>
                            </div>
                        </div>
                        
                        <!-- URL de Aplicación -->
                        <div class="flex items-center p-3 border rounded-lg">
                            @php $isLocalhost = str_contains(config('app.url'), 'localhost'); @endphp
                            <div class="w-6 h-6 rounded-full flex items-center justify-center mr-3 {{ !$isLocalhost ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                <i class="fas {{ !$isLocalhost ? 'fa-check' : 'fa-exclamation' }} text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium">URL de Producción</div>
                                <div class="text-sm text-gray-600">APP_URL debe ser tu dominio real</div>
                            </div>
                            <div class="text-sm break-all">
                                {{ config('app.url') }}
                            </div>
                        </div>
                        
                        <!-- Archivos de Sitemap -->
                        <div class="flex items-center p-3 border rounded-lg">
                            @php $sitemapExists = file_exists(public_path('sitemap_index.xml')); @endphp
                            <div class="w-6 h-6 rounded-full flex items-center justify-center mr-3 {{ $sitemapExists ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                <i class="fas {{ $sitemapExists ? 'fa-check' : 'fa-times' }} text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium">Archivos de Sitemap</div>
                                <div class="text-sm text-gray-600">Sitemaps XML deben existir en public/</div>
                            </div>
                            <div class="text-sm">
                                {{ $sitemapExists ? 'Generados' : 'Faltantes' }}
                            </div>
                        </div>
                        
                        <!-- SSL/HTTPS -->
                        <div class="flex items-center p-3 border rounded-lg">
                            @php $hasHttps = str_starts_with(config('app.url'), 'https://'); @endphp
                            <div class="w-6 h-6 rounded-full flex items-center justify-center mr-3 {{ $hasHttps ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                <i class="fas {{ $hasHttps ? 'fa-check' : 'fa-exclamation' }} text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium">Certificado SSL</div>
                                <div class="text-sm text-gray-600">URL debe usar HTTPS</div>
                            </div>
                            <div class="text-sm">
                                {{ $hasHttps ? 'HTTPS ✓' : 'HTTP (necesita SSL)' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Acciones -->
            <div class="mb-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">🛠️ Acciones de Preparación</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <button onclick="generateSitemaps()" id="generateBtn" 
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg">
                            <i class="fas fa-map-marked-alt mr-2" id="generateIcon"></i>
                            <span id="generateText">Generar Sitemaps</span>
                        </button>
                        
                        <button onclick="testPingSystem()" id="testBtn" 
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg">
                            <i class="fas fa-satellite-dish mr-2" id="testIcon"></i>
                            <span id="testText">Probar Sistema Ping</span>
                        </button>
                        
                        <a href="{{ config('app.url') }}/sitemap_index.xml" target="_blank" 
                           class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-3 px-4 rounded-lg text-center">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            Ver Sitemap
                        </a>
                        
                        <a href="{{ route('admin.sitemap.index') }}" 
                           class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-3 px-4 rounded-lg text-center">
                            <i class="fas fa-cog mr-2"></i>
                            Panel Admin
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Instrucciones para Producción -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-blue-800 mb-3">📋 Pasos para Activar en Producción</h3>
                <ol class="list-decimal list-inside space-y-2 text-blue-700">
                    <li>Cambiar <code>APP_URL=https://tudominio.com</code> en .env</li>
                    <li>Cambiar <code>APP_ENV=production</code> en .env</li>
                    <li>Ejecutar el script de despliegue: <code>deploy-production.bat</code></li>
                    <li>Verificar que los sitemaps sean accesibles desde Internet</li>
                    <li>Agregar el sitio a Google Search Console y Bing Webmaster</li>
                    <li>Configurar actualización automática (cron job)</li>
                </ol>
            </div>
        </div>
    </div>

    <script>
        function generateSitemaps() {
            runAction('/admin/sitemap/update', 'generateBtn', 'generateIcon', 'generateText', 'Generando...', 'POST');
        }
        
        function testPingSystem() {
            runAction('/test-ping-sitemap', 'testBtn', 'testIcon', 'testText', 'Probando...', 'GET');
        }
        
        function runAction(url, btnId, iconId, textId, loadingText, method) {
            const btn = document.getElementById(btnId);
            const icon = document.getElementById(iconId);
            const text = document.getElementById(textId);
            
            // Estado de carga
            btn.disabled = true;
            btn.classList.add('opacity-50');
            icon.classList.add('fa-spin');
            text.textContent = loadingText;
            
            // Configurar petición
            const options = {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                }
            };
            
            if (method === 'POST') {
                options.headers['X-CSRF-TOKEN'] = '{{ csrf_token() }}';
            }
            
            fetch(url, options)
                .then(response => response.json())
                .then(data => {
                    // Restaurar botón
                    btn.disabled = false;
                    btn.classList.remove('opacity-50');
                    icon.classList.remove('fa-spin');
                    
                    if (data.success || data.ping_results) {
                        icon.classList.remove('fa-map-marked-alt', 'fa-satellite-dish');
                        icon.classList.add('fa-check');
                        text.textContent = '¡Completado!';
                        
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    } else {
                        text.textContent = 'Error - Reintentar';
                        btn.classList.add('bg-red-500');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    btn.disabled = false;
                    btn.classList.remove('opacity-50');
                    icon.classList.remove('fa-spin');
                    text.textContent = 'Error - Reintentar';
                    btn.classList.add('bg-red-500');
                });
        }
    </script>
</body>
</html>
