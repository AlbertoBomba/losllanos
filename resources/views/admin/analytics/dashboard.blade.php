<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analytics Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Filtros de fecha -->
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('admin.analytics.dashboard', ['range' => 'today']) }}" 
                           class="px-4 py-2 rounded {{ $dateRange === 'today' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                            Hoy
                        </a>
                        <a href="{{ route('admin.analytics.dashboard', ['range' => 'yesterday']) }}" 
                           class="px-4 py-2 rounded {{ $dateRange === 'yesterday' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                            Ayer
                        </a>
                        <a href="{{ route('admin.analytics.dashboard', ['range' => 'week']) }}" 
                           class="px-4 py-2 rounded {{ $dateRange === 'week' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                            Esta Semana
                        </a>
                        <a href="{{ route('admin.analytics.dashboard', ['range' => 'month']) }}" 
                           class="px-4 py-2 rounded {{ $dateRange === 'month' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                            Este Mes
                        </a>
                        <a href="{{ route('admin.analytics.dashboard', ['range' => 'last_month']) }}" 
                           class="px-4 py-2 rounded {{ $dateRange === 'last_month' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                            Mes Pasado
                        </a>
                    </div>
                </div>
            </div>

            <!-- Métricas principales -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-eye text-white"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Total Visitas</p>
                            <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['total_visits']) }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-users text-white"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Visitantes Únicos</p>
                            <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['unique_visitors']) }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-chart-line text-white"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Tasa de Rebote</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['bounce_rate'] }}%</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Duración Media</p>
                            <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['avg_session_duration']) }}s</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráfico de visitas -->
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Visitas por Día</h3>
                    <canvas id="visitsChart" width="400" height="100"></canvas>
                </div>
            </div>

            <!-- Tablas de datos -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <!-- Páginas más visitadas -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Páginas Más Visitadas</h3>
                    </div>
                    <div class="p-6">
                        @forelse($stats['most_visited_pages'] as $page)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div>
                                    <p class="font-medium text-sm text-gray-900">{{ $page->page_title ?? $page->url }}</p>
                                    <p class="text-xs text-gray-500">{{ $page->url }}</p>
                                </div>
                                <span class="text-sm font-bold text-blue-600">{{ number_format($page->visits) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500">No hay datos disponibles</p>
                        @endforelse
                    </div>
                </div>

                <!-- Dispositivos -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Dispositivos</h3>
                    </div>
                    <div class="p-6">
                        @forelse($stats['device_stats'] as $device)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex items-center">
                                    <i class="fas fa-{{ $device->device_type === 'mobile' ? 'mobile-alt' : ($device->device_type === 'tablet' ? 'tablet-alt' : 'desktop') }} text-gray-400 mr-2"></i>
                                    <span class="capitalize">{{ $device->device_type }}</span>
                                </div>
                                <span class="text-sm font-bold text-blue-600">{{ number_format($device->count) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500">No hay datos disponibles</p>
                        @endforelse
                    </div>
                </div>

                <!-- Navegadores -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Navegadores</h3>
                    </div>
                    <div class="p-6">
                        @forelse($stats['browser_stats'] as $browser)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <span>{{ $browser->browser }}</span>
                                <span class="text-sm font-bold text-blue-600">{{ number_format($browser->count) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500">No hay datos disponibles</p>
                        @endforelse
                    </div>
                </div>

                <!-- Fuentes de Tráfico -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-900">Fuentes de Tráfico</h3>
                        <a href="{{ route('admin.analytics.traffic') }}" 
                           class="text-sm text-orange-600 hover:text-orange-800 font-medium">
                            Ver análisis completo <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="p-6">
                        @forelse($stats['traffic_sources'] as $source)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex items-center">
                                    @if($source->traffic_source === 'organic')
                                        <i class="fas fa-search text-green-500 mr-2"></i>
                                    @elseif($source->traffic_source === 'direct')
                                        <i class="fas fa-link text-blue-500 mr-2"></i>
                                    @elseif(in_array($source->traffic_source, ['facebook', 'twitter', 'instagram', 'linkedin']))
                                        <i class="fab fa-{{ $source->traffic_source }} text-purple-500 mr-2"></i>
                                    @else
                                        <i class="fas fa-external-link-alt text-gray-500 mr-2"></i>
                                    @endif
                                    <span class="capitalize">
                                        @if($source->traffic_source === 'organic')
                                            Búsquedas (Organic)
                                        @elseif($source->traffic_source === 'direct')
                                            Tráfico Directo
                                        @elseif($source->traffic_source === 'internal')
                                            Navegación Interna
                                        @else
                                            {{ $source->traffic_source }}
                                        @endif
                                    </span>
                                </div>
                                <span class="text-sm font-bold text-blue-600">{{ number_format($source->count) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500">No hay datos disponibles</p>
                        @endforelse
                    </div>
                </div>

                <!-- Motores de Búsqueda -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Motores de Búsqueda</h3>
                    </div>
                    <div class="p-6">
                        @forelse($stats['search_engines'] as $engine)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex items-center">
                                    @if($engine->search_engine === 'google')
                                        <i class="fab fa-google text-blue-500 mr-2"></i>
                                    @elseif($engine->search_engine === 'bing')
                                        <i class="fab fa-microsoft text-orange-500 mr-2"></i>
                                    @elseif($engine->search_engine === 'yahoo')
                                        <i class="fab fa-yahoo text-purple-500 mr-2"></i>
                                    @else
                                        <i class="fas fa-search text-gray-500 mr-2"></i>
                                    @endif
                                    <span class="capitalize">{{ $engine->search_engine }}</span>
                                </div>
                                <span class="text-sm font-bold text-blue-600">{{ number_format($engine->count) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500">No hay búsquedas registradas</p>
                        @endforelse
                    </div>
                </div>

                <!-- Palabras Clave -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Palabras Clave Principales</h3>
                    </div>
                    <div class="p-6">
                        @forelse($stats['top_keywords'] as $keyword)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <span class="font-medium text-sm text-gray-900">{{ $keyword->search_keywords }}</span>
                                <span class="text-sm font-bold text-green-600">{{ number_format($keyword->count) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500">No hay palabras clave disponibles</p>
                        @endforelse
                    </div>
                </div>
                
                <!-- Top Keywords SEO -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-900">🏆 Top Keywords SEO</h3>
                        <a href="{{ route('admin.analytics.keywords') }}" 
                           class="text-sm text-yellow-600 hover:text-yellow-800 font-medium">
                            Ver todas <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="p-6">
                        @php
                            $topKeywords = App\Models\KeywordRanking::where('check_date', today())
                                ->whereNotNull('position')
                                ->where('position', '<=', 10)
                                ->orderBy('position', 'asc')
                                ->limit(5)
                                ->get();
                        @endphp
                        @forelse($topKeywords as $keyword)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex-1 min-w-0">
                                    <span class="text-sm font-medium text-gray-900 truncate block">{{ $keyword->keyword }}</span>
                                    <span class="text-xs text-gray-500">{{ $keyword->page_title }}</span>
                                </div>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $keyword->position <= 3 ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    #{{ $keyword->position }}
                                </span>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <i class="fas fa-search text-gray-300 text-4xl mb-4"></i>
                                <p class="text-gray-500">No hay datos de keywords aún</p>
                                <a href="{{ route('admin.analytics.keywords') }}" class="text-yellow-600 hover:text-yellow-800 text-sm font-medium">
                                    Configurar seguimiento SEO
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Países -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Países</h3>
                    </div>
                    <div class="p-6">
                        @forelse($stats['country_stats'] as $country)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <span>{{ $country->country ?? 'Desconocido' }}</span>
                                <span class="text-sm font-bold text-blue-600">{{ number_format($country->count) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500">No hay datos disponibles</p>
                        @endforelse
                    </div>
                </div>

            </div>

            <!-- Botones de acción -->
            <div class="mt-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('admin.analytics.realtime') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-broadcast-tower mr-2"></i> Tiempo Real
                        </a>
                        <a href="{{ route('admin.analytics.pages') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-file-alt mr-2"></i> Páginas
                        </a>
                        <a href="{{ route('admin.analytics.visitors') }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-users mr-2"></i> Visitantes
                        </a>
                        <a href="{{ route('admin.analytics.traffic') }}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-chart-pie mr-2"></i> Fuentes de Tráfico
                        </a>
                        <a href="{{ route('admin.analytics.keywords') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-search mr-2"></i> Keywords SEO
                        </a>
                        <a href="{{ route('admin.analytics.export', ['format' => 'csv', 'period' => $dateRange]) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-download mr-2"></i> Exportar CSV
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Gráfico de visitas
        const ctx = document.getElementById('visitsChart').getContext('2d');
        const chartData = @json($stats['visits_chart']);
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData.map(item => item.date),
                datasets: [{
                    label: 'Visitas',
                    data: chartData.map(item => item.visits),
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
    @endpush
</x-app-layout>
