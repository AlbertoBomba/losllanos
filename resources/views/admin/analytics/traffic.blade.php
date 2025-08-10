<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analytics - Fuentes de Tráfico') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Filtros de fecha -->
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('admin.analytics.traffic', ['period' => 'today']) }}" 
                           class="px-4 py-2 rounded {{ $period === 'today' ? 'bg-orange-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                            Hoy
                        </a>
                        <a href="{{ route('admin.analytics.traffic', ['period' => 'yesterday']) }}" 
                           class="px-4 py-2 rounded {{ $period === 'yesterday' ? 'bg-orange-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                            Ayer
                        </a>
                        <a href="{{ route('admin.analytics.traffic', ['period' => 'week']) }}" 
                           class="px-4 py-2 rounded {{ $period === 'week' ? 'bg-orange-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                            Esta Semana
                        </a>
                        <a href="{{ route('admin.analytics.traffic', ['period' => 'month']) }}" 
                           class="px-4 py-2 rounded {{ $period === 'month' ? 'bg-orange-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                            Este Mes
                        </a>
                    </div>
                </div>
            </div>

            <!-- Resumen de Fuentes de Tráfico -->
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Resumen de Fuentes de Tráfico</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-search text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Búsquedas</p>
                            <p class="text-xl font-bold text-green-600">{{ number_format($stats['traffic_summary']['organic']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-link text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Directo</p>
                            <p class="text-xl font-bold text-blue-600">{{ number_format($stats['traffic_summary']['direct']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-share-alt text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Redes Sociales</p>
                            <p class="text-xl font-bold text-purple-600">{{ number_format($stats['traffic_summary']['social']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-external-link-alt text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Referencias</p>
                            <p class="text-xl font-bold text-orange-600">{{ number_format($stats['traffic_summary']['referral']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-bullhorn text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Campañas UTM</p>
                            <p class="text-xl font-bold text-pink-600">{{ number_format($stats['traffic_summary']['utm']) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-gray-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-home text-white"></i>
                            </div>
                            <p class="text-sm text-gray-600">Interno</p>
                            <p class="text-xl font-bold text-gray-600">{{ number_format($stats['traffic_summary']['internal']) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grid de Análisis Detallado -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                
                <!-- Motores de Búsqueda -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Motores de Búsqueda</h3>
                    </div>
                    <div class="p-6 max-h-96 overflow-y-auto">
                        @forelse($stats['search_engines'] as $engine)
                            <div class="flex justify-between items-center py-3 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex items-center">
                                    @if($engine->search_engine === 'google')
                                        <i class="fab fa-google text-blue-500 mr-3 text-lg"></i>
                                    @elseif($engine->search_engine === 'bing')
                                        <i class="fab fa-microsoft text-orange-500 mr-3 text-lg"></i>
                                    @elseif($engine->search_engine === 'yahoo')
                                        <i class="fab fa-yahoo text-purple-500 mr-3 text-lg"></i>
                                    @elseif($engine->search_engine === 'duckduckgo')
                                        <i class="fas fa-search text-orange-600 mr-3 text-lg"></i>
                                    @else
                                        <i class="fas fa-search text-gray-500 mr-3 text-lg"></i>
                                    @endif
                                    <span class="capitalize font-medium">{{ $engine->search_engine }}</span>
                                </div>
                                <span class="text-sm font-bold text-green-600">{{ number_format($engine->visits) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-8">No hay datos de motores de búsqueda</p>
                        @endforelse
                    </div>
                </div>

                <!-- Palabras Clave Top -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Palabras Clave Principales</h3>
                    </div>
                    <div class="p-6 max-h-96 overflow-y-auto">
                        @forelse($stats['top_keywords'] as $keyword)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <span class="font-medium text-sm text-gray-900">{{ $keyword->search_keywords }}</span>
                                <span class="text-sm font-bold text-blue-600">{{ number_format($keyword->visits) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-8">
                                <i class="fas fa-key text-4xl text-gray-300 mb-4"></i><br>
                                No hay palabras clave disponibles
                            </p>
                        @endforelse
                    </div>
                </div>

                <!-- Redes Sociales -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Redes Sociales</h3>
                    </div>
                    <div class="p-6">
                        @forelse($stats['social_networks'] as $network)
                            <div class="flex justify-between items-center py-3 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex items-center">
                                    @if($network->traffic_source === 'facebook')
                                        <i class="fab fa-facebook text-blue-600 mr-3 text-lg"></i>
                                    @elseif($network->traffic_source === 'twitter')
                                        <i class="fab fa-twitter text-blue-400 mr-3 text-lg"></i>
                                    @elseif($network->traffic_source === 'instagram')
                                        <i class="fab fa-instagram text-pink-500 mr-3 text-lg"></i>
                                    @elseif($network->traffic_source === 'linkedin')
                                        <i class="fab fa-linkedin text-blue-700 mr-3 text-lg"></i>
                                    @elseif($network->traffic_source === 'youtube')
                                        <i class="fab fa-youtube text-red-600 mr-3 text-lg"></i>
                                    @elseif($network->traffic_source === 'whatsapp')
                                        <i class="fab fa-whatsapp text-green-500 mr-3 text-lg"></i>
                                    @else
                                        <i class="fas fa-share-alt text-purple-500 mr-3 text-lg"></i>
                                    @endif
                                    <span class="capitalize font-medium">{{ $network->traffic_source }}</span>
                                </div>
                                <span class="text-sm font-bold text-purple-600">{{ number_format($network->visits) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-8">No hay tráfico de redes sociales</p>
                        @endforelse
                    </div>
                </div>

                <!-- Dominios de Referencia -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Referencias Externas</h3>
                    </div>
                    <div class="p-6 max-h-96 overflow-y-auto">
                        @forelse($stats['referral_domains'] as $domain)
                            <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <span class="font-medium text-sm text-gray-900">{{ $domain->traffic_source }}</span>
                                <span class="text-sm font-bold text-orange-600">{{ number_format($domain->visits) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-8">No hay referencias externas</p>
                        @endforelse
                    </div>
                </div>

            </div>

            <!-- Campañas UTM -->
            @if($stats['utm_campaigns']->count() > 0)
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Campañas UTM</h3>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Campaña</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fuente</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Medio</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Visitas</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($stats['utm_campaigns'] as $campaign)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $campaign->utm_campaign }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $campaign->utm_source }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $campaign->utm_medium }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-pink-600">
                                            {{ number_format($campaign->visits) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif

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
</x-app-layout>
