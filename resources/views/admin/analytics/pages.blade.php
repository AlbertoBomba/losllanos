@extends('layouts.admin')

@section('title', ' Análisis de Páginas ✔️')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Análisis de Páginas</h1>
            <p class="mb-0 text-muted">Rendimiento detallado de las páginas de tu sitio web</p>
        </div>
        
        <div class="d-flex gap-2">
            <!-- Período -->
            <div class="btn-group" role="group">
                <a href="{{ route('admin.analytics.pages', ['period' => 'today', 'sort' => $sortBy]) }}" 
                   class="btn {{ $period == 'today' ? 'btn-primary' : 'btn-outline-primary' }}">Hoy</a>
                <a href="{{ route('admin.analytics.pages', ['period' => 'week', 'sort' => $sortBy]) }}" 
                   class="btn {{ $period == 'week' ? 'btn-primary' : 'btn-outline-primary' }}">7 días</a>
                <a href="{{ route('admin.analytics.pages', ['period' => 'month', 'sort' => $sortBy]) }}" 
                   class="btn {{ $period == 'month' ? 'btn-primary' : 'btn-outline-primary' }}">30 días</a>
            </div>

            <!-- Ordenar por -->
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-sort"></i> Ordenar por: 
                    @switch($sortBy)
                        @case('visits') Visitas @break
                        @case('unique_visits') Visitas únicas @break
                        @case('duration') Duración @break
                        @default Visitas
                    @endswitch
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item {{ $sortBy == 'visits' ? 'active' : '' }}" 
                           href="{{ route('admin.analytics.pages', ['period' => $period, 'sort' => 'visits']) }}">
                        <i class="fas fa-eye"></i> Por Visitas Totales
                    </a></li>
                    <li><a class="dropdown-item {{ $sortBy == 'unique_visits' ? 'active' : '' }}" 
                           href="{{ route('admin.analytics.pages', ['period' => $period, 'sort' => 'unique_visits']) }}">
                        <i class="fas fa-users"></i> Por Visitas Únicas
                    </a></li>
                    <li><a class="dropdown-item {{ $sortBy == 'duration' ? 'active' : '' }}" 
                           href="{{ route('admin.analytics.pages', ['period' => $period, 'sort' => 'duration']) }}">
                        <i class="fas fa-clock"></i> Por Duración
                    </a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-file-alt"></i> Rendimiento de Páginas
                        <small class="text-muted">({{ $pages->total() }} páginas total)</small>
                    </h6>
                </div>
                <div class="card-body">
                    @if($pages->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Página</th>
                                        <th>URL</th>
                                        <th>
                                            <i class="fas fa-eye"></i> 
                                            Visitas Totales
                                            @if($sortBy == 'visits') <i class="fas fa-sort-down text-primary"></i> @endif
                                        </th>
                                        <th>
                                            <i class="fas fa-users"></i>
                                            Visitas Únicas
                                            @if($sortBy == 'unique_visits') <i class="fas fa-sort-down text-primary"></i> @endif
                                        </th>
                                        <th>
                                            <i class="fas fa-clock"></i>
                                            Duración Promedio
                                            @if($sortBy == 'duration') <i class="fas fa-sort-down text-primary"></i> @endif
                                        </th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pages as $page)
                                        <tr>
                                            <td>
                                                <div class="font-weight-bold">
                                                    {{ $page->page_title ?: 'Sin título' }}
                                                </div>
                                                @if($page->page_title)
                                                    <small class="text-muted">{{ Str::limit($page->url, 50) }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ $page->url }}" target="_blank" class="text-decoration-none">
                                                    <small>{{ $page->url }}</small>
                                                    <i class="fas fa-external-link-alt fa-xs ms-1"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <span class="badge bg-primary rounded-pill">
                                                    {{ number_format($page->visits) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success rounded-pill">
                                                    {{ number_format($page->unique_visits) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($page->avg_duration)
                                                    <span class="text-muted">
                                                        {{ gmdate('i:s', $page->avg_duration) }}
                                                    </span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ $page->url }}" target="_blank" 
                                                       class="btn btn-sm btn-outline-primary" 
                                                       title="Ver página">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-outline-info" 
                                                            onclick="copyToClipboard('{{ $page->url }}')"
                                                            title="Copiar URL">
                                                        <i class="fas fa-copy"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginación -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div class="text-muted">
                                Mostrando {{ $pages->firstItem() }} a {{ $pages->lastItem() }} 
                                de {{ $pages->total() }} resultados
                            </div>
                            {{ $pages->appends(request()->query())->links() }}
                        </div>
                    @else
                        <div class="text-center py-5 text-muted">
                            <i class="fas fa-file-alt fa-3x mb-3"></i>
                            <h5>No hay datos de páginas</h5>
                            <p>No se encontraron visitas a páginas en el período seleccionado.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen estadístico -->
    @if($pages->count() > 0)
        <div class="row">
            <div class="col-md-3">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total de Páginas
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ number_format($pages->total()) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Visitas Totales
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ number_format($pages->sum('visits')) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-eye fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Visitas Únicas
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ number_format($pages->sum('unique_visits')) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Duración Promedio
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ gmdate('i:s', $pages->avg('avg_duration') ?: 0) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón de regreso -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="text-center">
                    <a href="{{ route('admin.analytics.dashboard') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left"></i> Volver al Dashboard de Analytics
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Mostrar notificación de éxito
        const toast = document.createElement('div');
        toast.className = 'toast align-items-center text-white bg-success border-0';
        toast.style.position = 'fixed';
        toast.style.top = '20px';
        toast.style.right = '20px';
        toast.style.zIndex = '9999';
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check"></i> URL copiada al portapapeles
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" onclick="this.parentElement.parentElement.remove()"></button>
            </div>
        `;
        document.body.appendChild(toast);
        
        // Auto-eliminar después de 3 segundos
        setTimeout(() => {
            if (document.body.contains(toast)) {
                document.body.removeChild(toast);
            }
        }, 3000);
    }).catch(function(err) {
        console.error('Error al copiar: ', err);
    });
}
</script>
@endpush
