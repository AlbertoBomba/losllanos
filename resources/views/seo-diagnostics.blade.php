<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico SEO - Los Llanos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                🔍 Diagnóstico Completo SEO - Los Llanos
            </h1>
            
            <!-- Información del Sistema -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">⚙️ Información del Sistema</h2>
                    <div class="space-y-3">
                        <div>
                            <strong>App URL:</strong> <code class="bg-gray-100 px-2 py-1 rounded">{{ config('app.url') }}</code>
                        </div>
                        <div>
                            <strong>Entorno:</strong> <code class="bg-gray-100 px-2 py-1 rounded">{{ app()->environment() }}</code>
                        </div>
                        <div>
                            <strong>Es Desarrollo:</strong> 
                            <span class="{{ (str_contains(config('app.url'), 'localhost') || str_contains(config('app.url'), '127.0.0.1')) ? 'text-orange-600' : 'text-green-600' }}">
                                {{ (str_contains(config('app.url'), 'localhost') || str_contains(config('app.url'), '127.0.0.1')) ? '🟡 Sí (Local)' : '🟢 No (Producción)' }}
                            </span>
                        </div>
                        <div>
                            <strong>Fecha/Hora:</strong> {{ now()->format('d/m/Y H:i:s T') }}
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">📄 URLs de Sitemap</h2>
                    <div class="space-y-2">
                        <div>
                            <strong>Sitemap Principal:</strong>
                            <a href="{{ config('app.url') }}/sitemap_index.xml" target="_blank" class="text-blue-600 hover:text-blue-800 block break-all">
                                {{ config('app.url') }}/sitemap_index.xml
                            </a>
                        </div>
                        <div>
                            <strong>Sitemap Páginas:</strong>
                            <a href="{{ config('app.url') }}/sitemap-pages.xml" target="_blank" class="text-blue-600 hover:text-blue-800 block break-all">
                                {{ config('app.url') }}/sitemap-pages.xml
                            </a>
                        </div>
                        <div>
                            <strong>Sitemap Posts:</strong>
                            <a href="{{ config('app.url') }}/sitemap-posts.xml" target="_blank" class="text-blue-600 hover:text-blue-800 block break-all">
                                {{ config('app.url') }}/sitemap-posts.xml
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Botones de Prueba -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">🧪 Pruebas Disponibles</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <button onclick="testSitemapAccess()" id="accessBtn" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg">
                        <i class="fas fa-globe mr-2" id="accessIcon"></i>
                        <span id="accessText">Test Accesibilidad</span>
                    </button>
                    
                    <button onclick="testPingServices()" id="pingBtn" 
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg">
                        <i class="fas fa-satellite-dish mr-2" id="pingIcon"></i>
                        <span id="pingText">Test Ping Servicios</span>
                    </button>
                    
                    <a href="{{ route('admin.sitemap.index') }}" 
                       class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-3 px-4 rounded-lg text-center">
                        <i class="fas fa-cog mr-2"></i>
                        Panel Admin
                    </a>
                </div>
            </div>
            
            <!-- Resultados -->
            <div id="results" class="hidden">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">📊 Resultados de Pruebas</h2>
                    <div id="resultsContent"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function testSitemapAccess() {
            runTest('/test-sitemap-access', 'accessBtn', 'accessIcon', 'accessText', 'Probando accesibilidad...');
        }
        
        function testPingServices() {
            runTest('/test-ping-sitemap', 'pingBtn', 'pingIcon', 'pingText', 'Probando ping...');
        }
        
        function runTest(url, btnId, iconId, textId, loadingText) {
            const btn = document.getElementById(btnId);
            const icon = document.getElementById(iconId);
            const text = document.getElementById(textId);
            const results = document.getElementById('results');
            const resultsContent = document.getElementById('resultsContent');
            
            // Cambiar estado del botón
            btn.disabled = true;
            btn.classList.add('opacity-50', 'cursor-not-allowed');
            icon.classList.add('fa-spin');
            text.textContent = loadingText;
            
            // Hacer la petición
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Restaurar botón
                    btn.disabled = false;
                    btn.classList.remove('opacity-50', 'cursor-not-allowed');
                    icon.classList.remove('fa-spin');
                    text.textContent = text.textContent.replace(loadingText, 'Test Completado');
                    
                    // Mostrar resultados
                    displayResults(data, url);
                    results.classList.remove('hidden');
                    
                    // Restaurar texto del botón después de 2 segundos
                    setTimeout(() => {
                        text.textContent = btnId === 'accessBtn' ? 'Test Accesibilidad' : 'Test Ping Servicios';
                    }, 2000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    
                    // Restaurar botón en caso de error
                    btn.disabled = false;
                    btn.classList.remove('opacity-50', 'cursor-not-allowed');
                    icon.classList.remove('fa-spin');
                    text.textContent = 'Error - Reintentar';
                    btn.classList.add('bg-red-500', 'hover:bg-red-700');
                    
                    setTimeout(() => {
                        btn.classList.remove('bg-red-500', 'hover:bg-red-700');
                        btn.classList.add(btnId === 'accessBtn' ? 'bg-blue-500' : 'bg-green-500');
                        btn.classList.add(btnId === 'accessBtn' ? 'hover:bg-blue-700' : 'hover:bg-green-700');
                        text.textContent = btnId === 'accessBtn' ? 'Test Accesibilidad' : 'Test Ping Servicios';
                    }, 3000);
                });
        }
        
        function displayResults(data, testType) {
            let html = `<div class="mb-4"><strong>Test:</strong> ${testType}</div>`;
            
            if (testType === '/test-sitemap-access') {
                // Resultados de accesibilidad
                const status = data.accessible ? '✅ Accesible' : '❌ No Accesible';
                const statusClass = data.accessible ? 'text-green-600' : 'text-red-600';
                
                html += `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 border rounded-lg">
                            <h3 class="font-semibold mb-2">Estado de Accesibilidad</h3>
                            <div class="space-y-2 text-sm">
                                <div><strong>Estado:</strong> <span class="${statusClass}">${status}</span></div>
                                <div><strong>Código HTTP:</strong> ${data.status_code}</div>
                                <div><strong>Es XML:</strong> ${data.is_xml ? '✅ Sí' : '❌ No'}</div>
                                <div><strong>Tamaño:</strong> ${data.content_length} bytes</div>
                            </div>
                        </div>
                        <div class="p-4 border rounded-lg">
                            <h3 class="font-semibold mb-2">Vista Previa del Contenido</h3>
                            <pre class="text-xs bg-gray-100 p-2 rounded overflow-auto max-h-32">${data.content_preview || 'Sin contenido'}</pre>
                        </div>
                    </div>
                `;
                
                if (data.error) {
                    html += `
                        <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <h3 class="font-semibold text-red-800">Error</h3>
                            <div class="text-sm text-red-600">${data.error}</div>
                        </div>
                    `;
                }
                
            } else if (testType === '/test-ping-sitemap') {
                // Resultados de ping
                html += '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
                
                if (data.ping_results) {
                    ['google', 'bing'].forEach(engine => {
                        if (data.ping_results[engine]) {
                            const result = data.ping_results[engine];
                            const bgClass = result.success ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200';
                            const icon = result.success ? 'fa-check-circle text-green-500' : 'fa-times-circle text-red-500';
                            const devIcon = result.development_mode ? '<i class="fas fa-cog text-yellow-500 ml-1"></i>' : '';
                            
                            html += `
                                <div class="p-4 border rounded-lg ${bgClass}">
                                    <div class="flex items-center mb-2">
                                        <i class="fab fa-${engine === 'google' ? 'google' : 'microsoft'} text-2xl mr-2"></i>
                                        <h3 class="font-semibold">${engine.toUpperCase()} ${devIcon}</h3>
                                    </div>
                                    <div class="space-y-1 text-sm">
                                        <div class="flex items-center">
                                            <i class="fas ${icon} mr-2"></i>
                                            <span>${result.message}</span>
                                        </div>
                                        <div><strong>Código:</strong> ${result.status_code}</div>
                                        <div><strong>Sitemap OK:</strong> ${result.sitemap_accessible ? '✅' : '❌'}</div>
                                    </div>
                                </div>
                            `;
                        }
                    });
                }
                
                html += '</div>';
                
                if (data.development_mode) {
                    html += `
                        <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <div class="flex items-center text-yellow-800">
                                <i class="fas fa-info-circle mr-2"></i>
                                <strong>Modo Desarrollo/Simulación Activo</strong>
                            </div>
                            <div class="text-sm text-yellow-700 mt-2">
                                Las notificaciones mostradas son simuladas. Para pings reales se requiere:
                                <ul class="list-disc ml-5 mt-1">
                                    <li>Dominio público (no localhost)</li>
                                    <li>Sitemap accesible desde Internet</li>
                                    <li>Certificado SSL válido</li>
                                </ul>
                            </div>
                        </div>
                    `;
                }
            }
            
            html += `<div class="mt-4 text-xs text-gray-500">Timestamp: ${data.timestamp}</div>`;
            
            document.getElementById('resultsContent').innerHTML = html;
        }
    </script>
</body>
</html>
