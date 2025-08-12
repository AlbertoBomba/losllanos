<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Ping Sitemap - Los Llanos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                🔍 Test de Notificación de Sitemap SEO
            </h1>
            
            <!-- Información del sitemap -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">📊 Información del Sitemap</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <strong>URL del Sitemap:</strong>
                        <a href="{{ config('app.url') }}/sitemap_index.xml" target="_blank" class="text-blue-600 hover:text-blue-800 break-all">
                            {{ config('app.url') }}/sitemap_index.xml
                        </a>
                    </div>
                    <div>
                        <strong>Fecha actual:</strong> {{ now()->format('d/m/Y H:i:s') }}
                    </div>
                </div>
                
                @if(str_contains(config('app.url'), 'localhost') || str_contains(config('app.url'), '127.0.0.1'))
                <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle text-yellow-600 mr-2"></i>
                        <strong class="text-yellow-800">Modo Desarrollo Detectado</strong>
                    </div>
                    <div class="text-sm text-yellow-700 mt-2">
                        Las notificaciones reales a Google/Bing requieren un dominio público accesible desde Internet.
                        En desarrollo local, se mostrarán respuestas simuladas exitosas.
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Botón de prueba -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">🚀 Ejecutar Prueba</h2>
                <button onclick="testPing()" id="testBtn" 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg w-full md:w-auto">
                    <i class="fas fa-rocket mr-2" id="testIcon"></i>
                    <span id="testText">Probar Notificación de Sitemap</span>
                </button>
            </div>
            
            <!-- Resultados -->
            <div id="results" class="hidden">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">📝 Resultados</h2>
                    <div id="resultsContent"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function testPing() {
            const testBtn = document.getElementById('testBtn');
            const testIcon = document.getElementById('testIcon');
            const testText = document.getElementById('testText');
            const results = document.getElementById('results');
            const resultsContent = document.getElementById('resultsContent');
            
            // Cambiar estado del botón
            testBtn.disabled = true;
            testBtn.classList.add('opacity-50', 'cursor-not-allowed');
            testIcon.classList.add('fa-spin');
            testText.textContent = 'Enviando notificaciones...';
            
            // Ocultar resultados anteriores
            results.classList.add('hidden');
            
            // Hacer la petición
            fetch('/test-ping-sitemap')
                .then(response => response.json())
                .then(data => {
                    // Restaurar botón
                    testBtn.disabled = false;
                    testBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    testIcon.classList.remove('fa-spin');
                    testText.textContent = 'Probar Notificación de Sitemap';
                    
                    // Mostrar resultados
                    displayResults(data);
                    results.classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    
                    // Restaurar botón
                    testBtn.disabled = false;
                    testBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    testIcon.classList.remove('fa-spin');
                    testText.textContent = 'Error - Reintentar';
                    testBtn.classList.remove('bg-blue-500', 'hover:bg-blue-700');
                    testBtn.classList.add('bg-red-500', 'hover:bg-red-700');
                    
                    setTimeout(() => {
                        testBtn.classList.remove('bg-red-500', 'hover:bg-red-700');
                        testBtn.classList.add('bg-blue-500', 'hover:bg-blue-700');
                        testText.textContent = 'Probar Notificación de Sitemap';
                    }, 3000);
                });
        }
        
        function displayResults(data) {
            let html = `
                <div class="mb-4">
                    <strong>Sitemap URL:</strong> 
                    <a href="${data.sitemap_url}" target="_blank" class="text-blue-600 hover:text-blue-800 break-all">${data.sitemap_url}</a>
                </div>
                <div class="mb-4">
                    <strong>Timestamp:</strong> ${data.timestamp}
                </div>
            `;
            
            // Mostrar modo desarrollo si aplica
            if (data.development_mode) {
                html += `
                    <div class="mb-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <div class="flex items-center text-yellow-800">
                            <i class="fas fa-info-circle mr-2"></i>
                            <strong>Modo Desarrollo - Respuestas Simuladas</strong>
                        </div>
                        <div class="text-sm text-yellow-700 mt-1">
                            Para notificaciones reales, se requiere un dominio público accesible desde Internet.
                        </div>
                    </div>
                `;
            }
            
            if (data.ping_results) {
                html += '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
                
                // Google Results
                if (data.ping_results.google) {
                    const google = data.ping_results.google;
                    const googleClass = google.success ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200';
                    const googleIcon = google.success ? 'fa-check-circle text-green-500' : 'fa-times-circle text-red-500';
                    
                    // Mostrar icono especial para modo desarrollo
                    const devIcon = google.development_mode ? '<i class="fas fa-cog text-yellow-500 mr-1"></i>' : '';
                    
                    html += `
                        <div class="p-4 rounded-lg border ${googleClass}">
                            <div class="flex items-center mb-2">
                                <i class="fab fa-google text-2xl text-blue-600 mr-3"></i>
                                <div>
                                    <h3 class="font-semibold">Google Search Console ${devIcon}</h3>
                                    <div class="flex items-center">
                                        <i class="fas ${googleIcon} mr-2"></i>
                                        <span class="text-sm">${google.message}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs text-gray-600">
                                <div>Código de respuesta: ${google.status_code}</div>
                                <div class="break-all">URL: ${google.ping_url}</div>
                            </div>
                        </div>
                    `;
                }
                
                // Bing Results
                if (data.ping_results.bing) {
                    const bing = data.ping_results.bing;
                    const bingClass = bing.success ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200';
                    const bingIcon = bing.success ? 'fa-check-circle text-green-500' : 'fa-times-circle text-red-500';
                    
                    // Mostrar icono especial para modo desarrollo
                    const devIcon = bing.development_mode ? '<i class="fas fa-cog text-yellow-500 mr-1"></i>' : '';
                    
                    html += `
                        <div class="p-4 rounded-lg border ${bingClass}">
                            <div class="flex items-center mb-2">
                                <i class="fab fa-microsoft text-2xl text-blue-500 mr-3"></i>
                                <div>
                                    <h3 class="font-semibold">Bing Webmaster Tools ${devIcon}</h3>
                                    <div class="flex items-center">
                                        <i class="fas ${bingIcon} mr-2"></i>
                                        <span class="text-sm">${bing.message}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs text-gray-600">
                                <div>Código de respuesta: ${bing.status_code}</div>
                                <div class="break-all">URL: ${bing.ping_url}</div>
                            </div>
                        </div>
                    `;
                }
                
                html += '</div>';
            }
            
            if (data.ping_results && data.ping_results.error) {
                html += `
                    <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <h3 class="font-semibold text-red-800 mb-2">❌ Error</h3>
                        <div class="text-sm text-red-600">
                            <div>Mensaje: ${data.ping_results.error.message}</div>
                            <div>Archivo: ${data.ping_results.error.file}</div>
                            <div>Línea: ${data.ping_results.error.line}</div>
                        </div>
                    </div>
                `;
            }
            
            document.getElementById('resultsContent').innerHTML = html;
        }
    </script>
</body>
</html>
