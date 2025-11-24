<?php

require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Console\Kernel');
$kernel->bootstrap();

// Verificar menús diarios
$dailyMenus = \App\Models\DailyMenu::all();

echo "=== MENÚS DIARIOS ===\n";
echo "Total: " . $dailyMenus->count() . "\n\n";

foreach ($dailyMenus as $menu) {
    echo "ID: " . $menu->id . "\n";
    echo "Nombre: " . $menu->name . "\n";
    echo "Precio (raw): " . $menu->price . "\n";
    echo "Precio formateado: " . $menu->formatted_price . "\n";
    echo "Activo: " . ($menu->is_active ? 'Sí' : 'No') . "\n";
    echo "---\n";
}