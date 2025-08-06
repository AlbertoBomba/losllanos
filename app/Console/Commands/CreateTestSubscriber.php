<?php

namespace App\Console\Commands;

use App\Models\Newsletter;
use Illuminate\Console\Command;

class CreateTestSubscriber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:create-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create test newsletter subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $emails = [
            'test1@example.com',
            'test2@example.com',
            'test3@example.com'
        ];

        foreach($emails as $email) {
            $newsletter = Newsletter::create([
                'email' => $email,
                'subscribed_at' => now()->subDays(rand(1, 30)),
                'is_active' => true
            ]);
            
            $newsletter->generateUnsubscribeToken();
            $newsletter->save();
            
            $this->info("Creado suscriptor: {$email}");
        }
        
        // Crear uno inactivo
        $inactive = Newsletter::create([
            'email' => 'inactive@example.com',
            'subscribed_at' => now()->subDays(10),
            'is_active' => false,
            'unsubscribed_at' => now()->subDays(5),
            'unsubscribe_reason' => 'Ya no me interesa'
        ]);
        
        $inactive->generateUnsubscribeToken();
        $inactive->save();
        
        $this->info("Creado suscriptor inactivo: inactive@example.com");
        $this->info("¡Suscriptores de prueba creados!");
    }
}
