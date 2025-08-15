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

            <!-- Análisis de Sesiones por Páginas Visitadas -->
            @if(isset($stats['session_analysis']))
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-6">🔍 Análisis de Comportamiento de Sesiones</h3>
                    
                    <!-- Resumen de sesiones por páginas -->
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-red-600">{{ $stats['session_analysis']['stats']['1_page']['count'] }}</div>
                                <div class="text-sm text-red-500">1 Página (Bounce)</div>
                                <div class="text-xs text-red-400">{{ $stats['session_analysis']['stats']['1_page']['percentage'] }}%</div>
                            </div>
                        </div>
                        
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">{{ $stats['session_analysis']['stats']['2_pages']['count'] }}</div>
                                <div class="text-sm text-blue-500">2 Páginas</div>
                                <div class="text-xs text-blue-400">{{ $stats['session_analysis']['stats']['2_pages']['percentage'] }}%</div>
                            </div>
                        </div>
                        
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600">{{ $stats['session_analysis']['stats']['3_pages']['count'] }}</div>
                                <div class="text-sm text-green-500">3 Páginas</div>
                                <div class="text-xs text-green-400">{{ $stats['session_analysis']['stats']['3_pages']['percentage'] }}%</div>
                            </div>
                        </div>
                        
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-yellow-600">{{ $stats['session_analysis']['stats']['4_pages']['count'] }}</div>
                                <div class="text-sm text-yellow-500">4 Páginas</div>
                                <div class="text-xs text-yellow-400">{{ $stats['session_analysis']['stats']['4_pages']['percentage'] }}%</div>
                            </div>
                        </div>
                        
                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-purple-600">{{ $stats['session_analysis']['stats']['5_plus_pages']['count'] }}</div>
                                <div class="text-sm text-purple-500">5+ Páginas</div>
                                <div class="text-xs text-purple-400">{{ $stats['session_analysis']['stats']['5_plus_pages']['percentage'] }}%</div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla detallada de sesiones -->
                    <div class="mt-6">
                        <h4 class="text-md font-medium text-gray-900 mb-4">📊 Detalle de Sesiones Recientes</h4>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Session ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Páginas</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Primera Página</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Última Página</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duración</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($stats['session_analysis']['recent_sessions'] as $session)
                                    @php
                                        $duration = \Carbon\Carbon::parse($session->last_visit)->diffInSeconds(\Carbon\Carbon::parse($session->first_visit));
                                        $pageType = '';
                                        $badgeClass = '';
                                        
                                        if ($session->page_count == 1) {
                                            $pageType = 'Bounce';
                                            $badgeClass = 'bg-red-100 text-red-800';
                                        } elseif ($session->page_count == 2) {
                                            $pageType = '2 Páginas';
                                            $badgeClass = 'bg-blue-100 text-blue-800';
                                        } elseif ($session->page_count == 3) {
                                            $pageType = '3 Páginas';
                                            $badgeClass = 'bg-green-100 text-green-800';
                                        } elseif ($session->page_count == 4) {
                                            $pageType = '4 Páginas';
                                            $badgeClass = 'bg-yellow-100 text-yellow-800';
                                        } else {
                                            $pageType = '5+ Páginas';
                                            $badgeClass = 'bg-purple-100 text-purple-800';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-900">
                                            {{ substr($session->session_id, 0, 8) }}...
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                {{ $session->page_count }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 max-w-xs truncate" title="{{ $session->first_page }}">
                                            {{ $session->first_page }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 max-w-xs truncate" title="{{ $session->last_page }}">
                                            {{ $session->last_page }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            @if($duration > 0)
                                                {{ gmdate('H:i:s', $duration) }}
                                            @else
                                                < 1s
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $badgeClass }}">
                                                {{ $pageType }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        @if($stats['session_analysis']['recent_sessions']->count() == 0)
                        <div class="text-center py-4">
                            <p class="text-sm text-gray-500">No hay sesiones para mostrar en este período.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <!-- Gráfico de visitas -->
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Visitas por Día</h3>
                    <div class="chart-container" style="height: 200px; max-height: 200px;">
                        <canvas id="visitsChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Gráficos de análisis temporal -->
            <div class="analytics-grid mb-6">
                
                <!-- Gráfico Diario -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">📊 Últimos 7 Días</h3>
                        <span class="text-sm text-gray-500">Visitas diarias</span>
                    </div>
                    <div class="chart-container" style="height: 300px; max-height: 300px;">
                        <canvas id="dailyChart"></canvas>
                    </div>
                </div>

                <!-- Gráfico Semanal -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">📈 Últimas 8 Semanas</h3>
                        <span class="text-sm text-gray-500">Visitas semanales</span>
                    </div>
                    <div class="chart-container" style="height: 300px; max-height: 300px;">
                        <canvas id="weeklyChart"></canvas>
                    </div>
                </div>

                <!-- Gráfico Mensual -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">📅 Últimos 12 Meses</h3>
                        <span class="text-sm text-gray-500">Visitas mensuales</span>
                    </div>
                    <div class="chart-container" style="height: 300px; max-height: 300px;">
                        <canvas id="monthlyChart"></canvas>
                    </div>
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

    @push('styles')
    <style>
        /* Estilos para controlar el tamaño de los gráficos */
        .chart-container {
            position: relative;
            max-width: 100%;
            overflow: hidden;
        }
        
        .chart-container canvas {
            max-width: 100% !important;
            max-height: 400px !important;
        }
        
        /* Prevenir overflow en pantallas pequeñas */
        @media (max-width: 768px) {
            .chart-container canvas {
                max-height: 250px !important;
            }
        }
        
        /* Grid responsive para los gráficos */
        .analytics-grid {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: 1fr;
        }
        
        @media (min-width: 1024px) {
            .analytics-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (min-width: 1280px) {
            .analytics-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Verificar que Chart.js esté disponible
            if (typeof Chart === 'undefined') {
                console.error('Chart.js no está cargado');
                return;
            }

            // Configuración global para evitar problemas de canvas
            Chart.defaults.responsive = true;
            Chart.defaults.maintainAspectRatio = true;
            Chart.defaults.aspectRatio = 2;
            Chart.defaults.devicePixelRatio = Math.min(window.devicePixelRatio || 1, 2);

            // Configuración común para todos los gráficos
            const commonOptions = {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 2,
                devicePixelRatio: Math.min(window.devicePixelRatio || 1, 2),
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            padding: 15,
                            fontSize: 11
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            maxTicksLimit: 8
                        },
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        ticks: {
                            maxTicksLimit: 8
                        },
                        grid: {
                            drawBorder: false
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            };

            // Colores para los gráficos
            const colors = {
                primary: 'rgba(59, 130, 246, 0.8)',
                primaryLight: 'rgba(59, 130, 246, 0.1)',
                secondary: 'rgba(16, 185, 129, 0.8)',
                secondaryLight: 'rgba(16, 185, 129, 0.1)',
                accent: 'rgba(245, 158, 11, 0.8)',
                accentLight: 'rgba(245, 158, 11, 0.1)'
            };

            // Función helper para crear gráficos de forma segura
            function createChartSafely(canvasId, config) {
                try {
                    const ctx = document.getElementById(canvasId);
                    if (!ctx) {
                        console.warn(`Canvas ${canvasId} no encontrado`);
                        return null;
                    }
                    
                    // Asegurar tamaño máximo del canvas
                    const container = ctx.parentElement;
                    if (container) {
                        const maxWidth = Math.min(container.offsetWidth || 800, 1200);
                        const maxHeight = Math.min(container.offsetHeight || 400, 600);
                        
                        ctx.style.maxWidth = maxWidth + 'px';
                        ctx.style.maxHeight = maxHeight + 'px';
                    }
                    
                    return new Chart(ctx, config);
                } catch (error) {
                    console.error(`Error creando gráfico ${canvasId}:`, error);
                    return null;
                }
            }

            // 1. Gráfico principal de visitas
            const chartData = @json($stats['visits_chart'] ?? []);
            if (chartData && chartData.length > 0) {
                createChartSafely('visitsChart', {
                    type: 'line',
                    data: {
                        labels: chartData.map(item => item.date || ''),
                        datasets: [{
                            label: 'Visitas',
                            data: chartData.map(item => item.visits || 0),
                            borderColor: colors.primary,
                            backgroundColor: colors.primaryLight,
                            fill: true,
                            tension: 0.3,
                            pointRadius: 3,
                            pointHoverRadius: 5
                        }]
                    },
                    options: {
                        ...commonOptions,
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            }

            // 2. Gráfico Diario (últimos 7 días)
            const dailyData = @json($stats['daily_visits_chart'] ?? []);
            if (dailyData && dailyData.length > 0) {
                createChartSafely('dailyChart', {
                    type: 'bar',
                    data: {
                        labels: dailyData.map(item => item.date || ''),
                        datasets: [
                            {
                                label: 'Total Visitas',
                                data: dailyData.map(item => item.visits || 0),
                                backgroundColor: colors.primary,
                                borderColor: colors.primary,
                                borderWidth: 1
                            },
                            {
                                label: 'Visitantes Únicos',
                                data: dailyData.map(item => item.unique_visits || 0),
                                backgroundColor: colors.secondary,
                                borderColor: colors.secondary,
                                borderWidth: 1
                            }
                        ]
                    },
                    options: commonOptions
                });
            }

            // 3. Gráfico Semanal (últimas 8 semanas)
            const weeklyData = @json($stats['weekly_visits_chart'] ?? []);
            if (weeklyData && weeklyData.length > 0) {
                createChartSafely('weeklyChart', {
                    type: 'line',
                    data: {
                        labels: weeklyData.map(item => item.date || ''),
                        datasets: [
                            {
                                label: 'Total Visitas',
                                data: weeklyData.map(item => item.visits || 0),
                                borderColor: colors.accent,
                                backgroundColor: colors.accentLight,
                                fill: true,
                                tension: 0.4,
                                pointRadius: 3,
                                pointHoverRadius: 5
                            },
                            {
                                label: 'Visitantes Únicos',
                                data: weeklyData.map(item => item.unique_visits || 0),
                                borderColor: colors.secondary,
                                backgroundColor: colors.secondaryLight,
                                fill: false,
                                tension: 0.4,
                                pointRadius: 3,
                                pointHoverRadius: 5
                            }
                        ]
                    },
                    options: {
                        ...commonOptions,
                        plugins: {
                            ...commonOptions.plugins,
                            tooltip: {
                                callbacks: {
                                    afterLabel: function(context) {
                                        const dataIndex = context.dataIndex;
                                        if (weeklyData[dataIndex] && weeklyData[dataIndex].period) {
                                            return 'Período: ' + weeklyData[dataIndex].period;
                                        }
                                        return '';
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // 4. Gráfico Mensual (últimos 12 meses)
            const monthlyData = @json($stats['monthly_visits_chart'] ?? []);
            if (monthlyData && monthlyData.length > 0) {
                createChartSafely('monthlyChart', {
                    type: 'bar',
                    data: {
                        labels: monthlyData.map(item => item.date || ''),
                        datasets: [
                            {
                                label: 'Total Visitas',
                                data: monthlyData.map(item => item.visits || 0),
                                backgroundColor: colors.primary,
                                borderColor: colors.primary,
                                borderWidth: 1
                            },
                            {
                                label: 'Visitantes Únicos',
                                data: monthlyData.map(item => item.unique_visits || 0),
                                backgroundColor: colors.secondary,
                                borderColor: colors.secondary,
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        ...commonOptions,
                        scales: {
                            ...commonOptions.scales,
                            x: {
                                ...commonOptions.scales.x,
                                ticks: {
                                    maxRotation: 45,
                                    minRotation: 0,
                                    maxTicksLimit: 6
                                }
                            }
                        }
                    }
                });
            }

            console.log('📊 Gráficos de analytics cargados correctamente');
        });
    </script>
    @endpush
</x-app-layout>
