<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analytics - Tiempo Real') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Métricas en tiempo real -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Visitantes Activos</p>
                            <p class="text-2xl font-bold text-gray-900" id="active-visitors">{{ $stats['active_visitors'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-eye text-white"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Páginas Activas</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['current_pages']->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Última actualización</p>
                            <p class="text-sm font-bold text-gray-900" id="last-update">{{ now()->format('H:i:s') }}</p>
                        </div>
                        <button onclick="refreshData()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <!-- Páginas actualmente siendo vistas -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Páginas Activas Ahora</h3>
                        <p class="text-sm text-gray-600">Últimos 5 minutos</p>
                    </div>
                    <div class="p-6" id="current-pages">
                        @forelse($stats['current_pages'] as $page)
                            <div class="flex justify-between items-center py-3 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div>
                                    <p class="font-medium text-sm text-gray-900">{{ $page['title'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $page['url'] }}</p>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse mr-2"></div>
                                    <span class="text-sm font-bold text-green-600">{{ $page['count'] }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <i class="fas fa-users-slash text-4xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500">No hay visitantes activos en este momento</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Actividad reciente -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Actividad Reciente</h3>
                        <p class="text-sm text-gray-600">Últimas visitas</p>
                    </div>
                    <div class="p-6 max-h-96 overflow-y-auto" id="recent-activity">
                        @forelse($stats['recent_visits'] as $visit)
                            <div class="flex items-start py-3 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex-shrink-0 mr-3">
                                    <i class="fas fa-{{ $visit->device_type === 'mobile' ? 'mobile-alt' : ($visit->device_type === 'tablet' ? 'tablet-alt' : 'desktop') }} text-gray-400"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $visit->page_title ?? Str::limit($visit->url, 40) }}
                                    </p>
                                    <div class="text-xs text-gray-500 space-y-1">
                                        <p>{{ $visit->country ?? 'Desconocido' }} • {{ $visit->browser }} • {{ $visit->device_type }}</p>
                                        <p>{{ $visit->visited_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                @if($visit->is_unique_visitor)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Nuevo
                                    </span>
                                @endif
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <i class="fas fa-history text-4xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500">No hay actividad reciente</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>

            <!-- Botón para volver -->
            <div class="mt-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <a href="{{ route('admin.analytics.dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-arrow-left mr-2"></i> Volver al Dashboard
                    </a>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        // Auto-refresh cada 30 segundos
        let autoRefresh = setInterval(refreshData, 30000);

        function refreshData() {
            fetch('{{ route('admin.analytics.realtime') }}')
                .then(response => response.text())
                .then(html => {
                    // Extraer solo el contenido relevante
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    
                    // Actualizar contador de visitantes activos
                    const activeVisitors = doc.querySelector('#active-visitors');
                    if (activeVisitors) {
                        document.querySelector('#active-visitors').textContent = activeVisitors.textContent;
                    }
                    
                    // Actualizar páginas activas
                    const currentPages = doc.querySelector('#current-pages');
                    if (currentPages) {
                        document.querySelector('#current-pages').innerHTML = currentPages.innerHTML;
                    }
                    
                    // Actualizar actividad reciente
                    const recentActivity = doc.querySelector('#recent-activity');
                    if (recentActivity) {
                        document.querySelector('#recent-activity').innerHTML = recentActivity.innerHTML;
                    }
                    
                    // Actualizar timestamp
                    document.querySelector('#last-update').textContent = new Date().toLocaleTimeString();
                })
                .catch(error => {
                    console.error('Error refreshing data:', error);
                    clearInterval(autoRefresh);
                });
        }

        // Pausar auto-refresh cuando la pestaña no está visible
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                clearInterval(autoRefresh);
            } else {
                autoRefresh = setInterval(refreshData, 30000);
            }
        });
    </script>
    @endpush
</x-app-layout>
