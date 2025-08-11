@extends('layouts.admin')

@section('title', 'Análisis de Visitantes')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Análisis de Visitantes</h1>
            <p class="mb-0 text-muted">Información detallada sobre los visitantes de tu sitio web</p>
        </div>
        
        <div class="btn-group" role="group">
            <a href="{{ route('admin.analytics.visitors', ['period' => 'today']) }}" 
               class="btn {{ $period == 'today' ? 'btn-primary' : 'btn-outline-primary' }}">Hoy</a>
            <a href="{{ route('admin.analytics.visitors', ['period' => 'week']) }}" 
               class="btn {{ $period == 'week' ? 'btn-primary' : 'btn-outline-primary' }}">7 días</a>
            <a href="{{ route('admin.analytics.visitors', ['period' => 'month']) }}" 
               class="btn {{ $period == 'month' ? 'btn-primary' : 'btn-outline-primary' }}">30 días</a>
        </div>
    </div>

    <div class="row">
        <!-- Visitantes Nuevos vs Recurrentes -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-users"></i> Visitantes Nuevos vs Recurrentes
                    </h6>
                </div>
                <div class="card-body">
                    @if(isset($stats['new_vs_returning']) && is_array($stats['new_vs_returning']) && count($stats['new_vs_returning']) > 0)
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="border-right border-gray-300 py-3">
                                    <div class="text-lg font-weight-bold text-gray-800">
                                        {{ number_format($stats['new_vs_returning']['new']) }}
                                    </div>
                                    <div class="text-uppercase text-primary font-weight-bold text-xs">
                                        Nuevos
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="py-3">
                                    <div class="text-lg font-weight-bold text-gray-800">
                                        {{ number_format($stats['new_vs_returning']['returning']) }}
                                    </div>
                                    <div class="text-uppercase text-success font-weight-bold text-xs">
                                        Recurrentes
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-muted">
                                Total: {{ number_format($stats['new_vs_returning']['total']) }} visitantes
                            </small>
                        </div>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="fas fa-chart-pie fa-3x mb-3"></i>
                            <p>No hay datos de visitantes para mostrar</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Dispositivos -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-mobile-alt"></i> Dispositivos
                    </h6>
                </div>
                <div class="card-body">
                    @if(isset($stats['device_breakdown']) && $stats['device_breakdown']->count() > 0)
                        @php
                            $total = $stats['device_breakdown']->sum('count');
                            $colors = ['desktop' => 'primary', 'mobile' => 'success', 'tablet' => 'warning'];
                        @endphp
                        @foreach($stats['device_breakdown'] as $device)
                            @php
                                $percentage = $total > 0 ? ($device->count / $total) * 100 : 0;
                                $colorClass = $colors[$device->device_type] ?? 'secondary';
                            @endphp
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <span class="small font-weight-bold">
                                        <i class="fas fa-{{ $device->device_type == 'desktop' ? 'desktop' : ($device->device_type == 'mobile' ? 'mobile-alt' : 'tablet-alt') }}"></i>
                                        {{ ucfirst($device->device_type) }}
                                    </span>
                                    <span class="small font-weight-bold">{{ number_format($device->count) }} ({{ number_format($percentage, 1) }}%)</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-{{ $colorClass }}" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="fas fa-mobile-alt fa-3x mb-3"></i>
                            <p>No hay datos de dispositivos para mostrar</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Navegadores -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-globe"></i> Navegadores
                    </h6>
                </div>
                <div class="card-body">
                    @if(isset($stats['browser_breakdown']) && $stats['browser_breakdown']->count() > 0)
                        @php $totalBrowsers = $stats['browser_breakdown']->sum('count'); @endphp
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Navegador</th>
                                        <th>Visitas</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stats['browser_breakdown'] as $browser)
                                        @php $percentage = $totalBrowsers > 0 ? ($browser->count / $totalBrowsers) * 100 : 0; @endphp
                                        <tr>
                                            <td>
                                                <i class="fab fa-{{ strtolower($browser->browser) == 'chrome' ? 'chrome' : (strtolower($browser->browser) == 'firefox' ? 'firefox-browser' : (strtolower($browser->browser) == 'safari' ? 'safari' : 'internet-explorer')) }}"></i>
                                                {{ $browser->browser ?: 'Desconocido' }}
                                            </td>
                                            <td>{{ number_format($browser->count) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">{{ number_format($percentage, 1) }}%</span>
                                                    <div class="progress flex-grow-1" style="height: 4px; width: 60px;">
                                                        <div class="progress-bar bg-info" style="width: {{ $percentage }}%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="fas fa-globe fa-3x mb-3"></i>
                            <p>No hay datos de navegadores para mostrar</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Ubicaciones -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-map-marker-alt"></i> Ubicaciones (Top 15)
                    </h6>
                </div>
                <div class="card-body">
                    @if(isset($stats['location_breakdown']) && $stats['location_breakdown']->count() > 0)
                        @php $totalLocations = $stats['location_breakdown']->sum('count'); @endphp
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>País</th>
                                        <th>Visitas</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stats['location_breakdown'] as $location)
                                        @php $percentage = $totalLocations > 0 ? ($location->count / $totalLocations) * 100 : 0; @endphp
                                        <tr>
                                            <td>
                                                <i class="fas fa-flag"></i>
                                                {{ $location->country ?: 'Desconocido' }}
                                            </td>
                                            <td>{{ number_format($location->count) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">{{ number_format($percentage, 1) }}%</span>
                                                    <div class="progress flex-grow-1" style="height: 4px; width: 60px;">
                                                        <div class="progress-bar bg-success" style="width: {{ $percentage }}%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="fas fa-map-marker-alt fa-3x mb-3"></i>
                            <p>No hay datos de ubicaciones para mostrar</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Botón de regreso al dashboard -->
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <a href="{{ route('admin.analytics.dashboard') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Volver al Dashboard de Analytics
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-refresh cada 30 segundos si es vista en tiempo real
    @if($period === 'today')
        setInterval(function() {
            location.reload();
        }, 30000);
    @endif
});
</script>
@endpush
