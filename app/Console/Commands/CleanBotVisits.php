<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PageVisit;

class CleanBotVisits extends Command
{
    protected $signature = 'analytics:clean-bots {--dry-run : Solo mostrar qué se eliminaría sin hacer cambios} {--include-admin : Incluir URLs administrativas en la limpieza}';
    protected $description = 'Elimina registros de visitas de bots, crawlers y opcionalmente URLs administrativas';

    public function handle()
    {
        $this->info('🤖 Limpiando registros de bots y crawlers...');
        $this->newLine();

        // Patrones de bots que queremos eliminar
        $botPatterns = [
            '%facebookexternalhit%',
            '%bot%',
            '%crawler%',
            '%spider%',
            '%scraper%'
        ];

        $query = PageVisit::query();
        $adminQuery = PageVisit::query();
        $tableData = [];

        // Agregar condiciones para bots
        foreach ($botPatterns as $index => $pattern) {
            if ($index === 0) {
                $query->where('user_agent', 'like', $pattern);
            } else {
                $query->orWhere('user_agent', 'like', $pattern);
            }
        }

        // Contar registros de bots por patrón
        foreach ($botPatterns as $pattern) {
            $cleanPattern = trim($pattern, '%');
            $count = PageVisit::where('user_agent', 'like', $pattern)->count();
            $tableData[] = ['Bot: ' . $cleanPattern, $count];
        }

        $botCount = $query->count();

        // Si se incluyen URLs administrativas
        $adminCount = 0;
        if ($this->option('include-admin')) {
            $adminQuery->where('url', 'like', '%/login%')
                      ->orWhere('url', 'like', '%/admin%');
            
            $adminCount = $adminQuery->count();
            
            // Agregar a la tabla de reporte
            $tableData[] = ['URL: /login', PageVisit::where('url', 'like', '%/login%')->count()];
            $tableData[] = ['URL: /admin', PageVisit::where('url', 'like', '%/admin%')->count()];
        }

        $totalCount = $botCount + $adminCount;
        
        
        if ($totalCount === 0) {
            $this->info('✅ No se encontraron registros para eliminar.');
            return 0;
        }

        $this->table(
            ['Tipo/Patrón', 'Registros encontrados'],
            $tableData
        );

        $this->newLine();
        $message = "Se encontraron {$totalCount} registros para eliminar";
        if ($this->option('include-admin')) {
            $message .= " ({$botCount} bots + {$adminCount} URLs admin)";
        } else {
            $message .= " ({$botCount} bots)";
        }
        $this->warn($message . ".");

        if ($this->option('dry-run')) {
            $this->info('🔍 Modo DRY-RUN: No se realizaron cambios.');
            $this->info('Para ejecutar la limpieza real, ejecuta el comando sin --dry-run');
            if (!$this->option('include-admin')) {
                $this->info('💡 Para incluir URLs administrativas, agrega --include-admin');
            }
            return 0;
        }

        if (!$this->confirm("¿Estás seguro de que quieres eliminar estos {$totalCount} registros?")) {
            $this->info('❌ Operación cancelada.');
            return 0;
        }

        // Eliminar registros de bots
        $deletedBots = 0;
        if ($botCount > 0) {
            $deletedBots = $query->delete();
        }

        // Eliminar registros administrativos
        $deletedAdmin = 0;
        if ($this->option('include-admin') && $adminCount > 0) {
            $deletedAdmin = $adminQuery->delete();
        }

        $totalDeleted = $deletedBots + $deletedAdmin;
        
        $this->newLine();
        $this->info("✅ Se eliminaron {$totalDeleted} registros en total.");
        if ($deletedBots > 0) {
            $this->info("   🤖 Bots eliminados: {$deletedBots}");
        }
        if ($deletedAdmin > 0) {
            $this->info("   🔒 URLs admin eliminadas: {$deletedAdmin}");
        }
        $this->info('📊 Registros restantes: ' . PageVisit::count());
        
        return 0;
    }
}
