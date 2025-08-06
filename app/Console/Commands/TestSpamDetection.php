<?php

namespace App\Console\Commands;

use App\Services\SpamDetectionService;
use Illuminate\Console\Command;

class TestSpamDetection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spam:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the spam detection service with sample comments';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $spamService = app(SpamDetectionService::class);

        $this->info('🛡️ Testing Spam Detection Service');
        $this->info('====================================');

        // Test cases
        $testCases = [
            [
                'content' => 'Este es un comentario normal sobre el artículo. Me parece muy interesante.',
                'email' => 'usuario@gmail.com',
                'name' => 'Juan Pérez',
                'description' => 'Comentario legítimo'
            ],
            [
                'content' => 'Click here to buy now! FREE MONEY! Visit www.spam-site.com for amazing offers!!!',
                'email' => 'spammer@tempmail.org',
                'name' => 'SpamBot123',
                'description' => 'Comentario obvio de spam'
            ],
            [
                'content' => 'Viagra cialis cheap pills pharmacy medication click here buy now!',
                'email' => 'suspicious@10minutemail.com',
                'name' => 'A1B2C3',
                'description' => 'Spam de medicamentos'
            ],
            [
                'content' => 'Hola, me gustó el artículo. Saludos.',
                'email' => 'normal@hotmail.com',
                'name' => 'María García',
                'description' => 'Comentario corto pero legítimo'
            ],
            [
                'content' => 'AAAAAAA BBBBBB CCCCCCC 12345678901234567890 !!!!!!!!!',
                'email' => 'test123456789@example.com',
                'name' => 'TESTUSER',
                'description' => 'Comentario con patrones sospechosos'
            ]
        ];

        foreach ($testCases as $index => $testCase) {
            $this->newLine();
            $this->info("Test Case " . ($index + 1) . ": " . $testCase['description']);
            $this->line("Content: " . substr($testCase['content'], 0, 50) . '...');
            $this->line("Email: " . $testCase['email']);
            $this->line("Name: " . $testCase['name']);

            $analysis = $spamService->isSpam(
                $testCase['content'],
                $testCase['email'],
                $testCase['name'],
                '192.168.1.100' // IP de prueba
            );

            $this->line("Score: " . $analysis['score']);
            $this->line("Confidence: " . $analysis['confidence'] . '%');
            $this->line("Is Spam: " . ($analysis['is_spam'] ? 'YES' : 'NO'));
            $this->line("Action: " . strtoupper($analysis['action']));
            
            if (!empty($analysis['reasons'])) {
                $this->line("Reasons:");
                foreach ($analysis['reasons'] as $reason) {
                    $this->line("  - " . $reason);
                }
            }

            // Color coding based on result
            if ($analysis['is_spam']) {
                $this->error("⚠️  DETECTED AS SPAM");
            } elseif ($analysis['action'] === 'review') {
                $this->warn("⚠️  REQUIRES REVIEW");
            } else {
                $this->info("✅ APPROVED");
            }
            
            $this->line(str_repeat('-', 50));
        }

        $this->newLine();
        $this->info('🎉 Spam detection test completed!');
        
        return 0;
    }
}
