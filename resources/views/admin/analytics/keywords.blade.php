<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analytics - Posicionamiento Keywords') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Filtros de período -->
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('admin.analytics.keywords', ['period' => 'today']) }}" 
                           class="px-4 py-2 rounded {{ $period === 'today' ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                            Hoy
                        </a>
                        <a href="{{ route('admin.analytics.keywords', ['period' => 'yesterday']) }}" 
                           class="px-4 py-2 rounded {{ $period === 'yesterday' ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                            Ayer
                        </a>
                        <a href="{{ route('admin.analytics.keywords', ['period' => 'week_ago']) }}" 
                           class="px-4 py-2 rounded {{ $period === 'week_ago' ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                            Hace una Semana
                        </a>
                    </div>
                </div>
            </div>

            <!-- Estadísticas Resumen -->
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Resumen de Posicionamiento</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-list text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Total Keywords</p>
                            <p class="text-xl font-bold text-blue-600">{{ number_format($stats['summary_stats']['total_keywords']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-search text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Posicionadas</p>
                            <p class="text-xl font-bold text-green-600">{{ number_format($stats['summary_stats']['ranked_keywords']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-trophy text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Top 3</p>
                            <p class="text-xl font-bold text-yellow-600">{{ number_format($stats['summary_stats']['top_3_keywords']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-medal text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Top 10</p>
                            <p class="text-xl font-bold text-orange-600">{{ number_format($stats['summary_stats']['top_10_keywords']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-chart-line text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Pos. Media</p>
                            <p class="text-xl font-bold text-purple-600">{{ $stats['summary_stats']['avg_position'] }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-mouse-pointer text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Clics</p>
                            <p class="text-xl font-bold text-red-600">{{ number_format($stats['summary_stats']['total_clicks']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-eye text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Impresiones</p>
                            <p class="text-xl font-bold text-indigo-600">{{ number_format($stats['summary_stats']['total_impressions']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-percentage text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">CTR Medio</p>
                            <p class="text-xl font-bold text-pink-600">{{ $stats['summary_stats']['avg_ctr'] }}%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grid de Análisis -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                
                <!-- Mejores Posiciones -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">🏆 Top 20 - Mejores Posiciones</h3>
                    </div>
                    <div class="p-6 max-h-96 overflow-y-auto">
                        @forelse($stats['best_rankings'] as $ranking)
                            <div class="flex justify-between items-center py-3 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $ranking->keyword }}
                                    </p>
                                    <p class="text-xs text-gray-500 truncate">
                                        {{ $ranking->page_title }}
                                    </p>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $ranking->position <= 3 ? 'bg-green-100 text-green-800' : ($ranking->position <= 10 ? 'bg-yellow-100 text-yellow-800' : 'bg-orange-100 text-orange-800') }}">
                                        #{{ $ranking->position }}
                                    </span>
                                    @if($ranking->clicks)
                                        <span class="text-xs text-blue-600 font-medium">{{ number_format($ranking->clicks) }} clics</span>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-8">No hay datos de posicionamiento</p>
                        @endforelse
                    </div>
                </div>

                <!-- Resumen por Página -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">📄 Resumen por Página</h3>
                    </div>
                    <div class="p-6 max-h-96 overflow-y-auto">
                        @forelse($stats['page_summaries'] as $page)
                            <div class="mb-4 p-4 bg-gray-50 rounded-lg">
                                <p class="font-medium text-sm text-gray-900 truncate">{{ $page->page_title }}</p>
                                <p class="text-xs text-gray-500 mb-2 truncate">{{ $page->url }}</p>
                                <div class="flex justify-between text-xs">
                                    <span class="text-gray-600">{{ $page->total_keywords }} keywords</span>
                                    <span class="text-green-600 font-medium">Pos. Media: {{ round($page->avg_position, 1) }}</span>
                                </div>
                                <div class="flex justify-between text-xs mt-1">
                                    <span class="text-blue-600">Top 3: {{ $page->top_3_keywords }}</span>
                                    <span class="text-yellow-600">Top 10: {{ $page->top_10_keywords }}</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-8">No hay datos por páginas</p>
                        @endforelse
                    </div>
                </div>

                <!-- Keywords que Mejoraron -->
                @if($stats['improved_keywords']->count() > 0)
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">📈 Keywords que Mejoraron (7 días)</h3>
                    </div>
                    <div class="p-6 max-h-96 overflow-y-auto">
                        @foreach($stats['improved_keywords'] as $keyword)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $keyword->keyword }}</p>
                                    <p class="text-xs text-gray-500">{{ $keyword->page_title }}</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-xs text-gray-500">{{ $keyword->previous_position }} →</span>
                                    <span class="text-sm font-bold text-green-600">{{ $keyword->current_position }}</span>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-green-100 text-green-800">
                                        ↑{{ $keyword->improvement }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Keywords que Empeoraron -->
                @if($stats['declined_keywords']->count() > 0)
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">📉 Keywords que Empeoraron (7 días)</h3>
                    </div>
                    <div class="p-6 max-h-96 overflow-y-auto">
                        @foreach($stats['declined_keywords'] as $keyword)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $keyword->keyword }}</p>
                                    <p class="text-xs text-gray-500">{{ $keyword->page_title }}</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-xs text-gray-500">{{ $keyword->previous_position }} →</span>
                                    <span class="text-sm font-bold text-red-600">{{ $keyword->current_position }}</span>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-red-100 text-red-800">
                                        ↓{{ $keyword->decline }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Top Keywords por Tráfico -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">🚀 Top Keywords por Clics</h3>
                    </div>
                    <div class="p-6 max-h-96 overflow-y-auto">
                        @forelse($stats['top_traffic_keywords'] as $keyword)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $keyword->keyword }}</p>
                                    <p class="text-xs text-gray-500">Posición #{{ $keyword->position }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-bold text-blue-600">{{ number_format($keyword->clicks) }} clics</p>
                                    <p class="text-xs text-gray-500">{{ $keyword->click_through_rate }}% CTR</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-8">No hay datos de clics</p>
                        @endforelse
                    </div>
                </div>

                <!-- Top Keywords por Impresiones -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">👀 Top Keywords por Impresiones</h3>
                    </div>
                    <div class="p-6 max-h-96 overflow-y-auto">
                        @forelse($stats['top_impression_keywords'] as $keyword)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $keyword->keyword }}</p>
                                    <p class="text-xs text-gray-500">Posición #{{ $keyword->position }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-bold text-indigo-600">{{ number_format($keyword->impressions) }}</p>
                                    <p class="text-xs text-gray-500">{{ number_format($keyword->clicks) }} clics</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-8">No hay datos de impresiones</p>
                        @endforelse
                    </div>
                </div>

            </div>

            <!-- Botón para volver -->
            <div class="mt-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('admin.analytics.dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-arrow-left mr-2"></i> Volver al Dashboard
                        </a>
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i>
                            Los datos se actualizan diariamente
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
