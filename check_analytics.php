<?php

use App\Models\PageVisit;

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

// Inicializar Laravel
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Consultar visitas
$totalVisits = PageVisit::count();
$todayVisits = PageVisit::today()->count();

echo "=== ESTADO DEL SISTEMA DE ANALYTICS ===\n";
echo "Total de visitas: {$totalVisits}\n";
echo "Visitas hoy: {$todayVisits}\n";
echo "\n";

if ($totalVisits > 0) {
    echo "Últimas 5 visitas:\n";
    $recentVisits = PageVisit::latest('visited_at')
        ->take(5)
        ->get(['url', 'page_title', 'device_type', 'browser', 'visited_at']);
    
    foreach ($recentVisits as $visit) {
        echo "- {$visit->visited_at->format('H:i:s')} | {$visit->page_title} | {$visit->device_type} | {$visit->browser}\n";
    }
} else {
    echo "No hay visitas registradas aún.\n";
    echo "Intenta navegar por algunas páginas del sitio para generar datos.\n";
}

echo "\n=== FIN REPORTE ===\n";
