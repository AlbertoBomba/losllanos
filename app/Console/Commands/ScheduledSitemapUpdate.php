<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class ScheduledSitemapUpdate extends Command
{
    protected $signature = 'sitemap:update-scheduled';
    protected $description = 'Update sitemaps automatically (for scheduled tasks)';

    public function handle()
    {
        $this->info('🔄 Starting scheduled sitemap update...');
        
        try {
            // Generate sitemaps
            Artisan::call('sitemap:generate', ['--force' => true]);
            
            $this->info('✅ Sitemaps updated successfully');
            
            // Log the update
            Log::info('Sitemaps updated successfully via scheduled task');
            
            return Command::SUCCESS;
            
        } catch (\Exception $e) {
            $this->error('❌ Failed to update sitemaps: ' . $e->getMessage());
            
            // Log the error
            Log::error('Sitemap update failed: ' . $e->getMessage());
            
            return Command::FAILURE;
        }
    }
}
