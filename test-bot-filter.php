<?php

require_once 'vendor/autoload.php';
require_once 'bootstrap/app.php';

use App\Http\Middleware\TrackPageVisits;
use Illuminate\Http\Request;

class BotFilterTester
{
    private $middleware;
    
    public function __construct()
    {
        $this->middleware = new TrackPageVisits();
    }
    
    public function testBotFilter()
    {
        $testUserAgents = [
            'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', // Debe ser filtrado
            'Mozilla/5.0 (compatible; facebookexternalhit/1.1; +http://www.facebook.com/externalhit_uatext.php)', // Debe ser filtrado
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36', // NO debe ser filtrado (usuario normal)
            'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', // Debe ser filtrado
            'Mozilla/5.0 (iPhone; CPU iPhone OS 14_7_1 like Mac OS X) AppleWebKit/605.1.15', // NO debe ser filtrado
            'WhatsApp/2.2147.10 A', // Debe ser filtrado
            'TelegramBot (like TwitterBot)', // Debe ser filtrado
            'curl/7.68.0', // Debe ser filtrado
            'PostmanRuntime/7.28.4' // NO debe ser filtrado (podría ser desarrollo)
        ];
        
        echo "Probando filtro de bots:\n";
        echo "======================\n\n";
        
        foreach ($testUserAgents as $index => $userAgent) {
            $isBot = $this->isBotOrCrawler($userAgent);
            $status = $isBot ? '❌ FILTRADO (Bot)' : '✅ PERMITIDO (Usuario)';
            echo sprintf("%d. %s\n   User Agent: %s\n\n", $index + 1, $status, $userAgent);
        }
    }
    
    // Copiamos el método del middleware para probarlo
    private function isBotOrCrawler($userAgent)
    {
        $botPatterns = [
            'facebookexternalhit/1.1',
            'facebookexternalhit',
            'bot',
            'crawler',
            'spider',
            'scraper',
            'crawl',
            'googlebot',
            'bingbot',
            'slurp',
            'duckduckbot',
            'baiduspider',
            'yandexbot',
            'facebookbot',
            'twitterbot',
            'linkedinbot',
            'whatsapp',
            'telegram',
            'discordbot',
            'applebot',
            'amazonbot',
            'pingdom',
            'uptimerobot',
            'headlesschrome',
            'phantomjs',
            'selenium',
            'wget',
            'curl',
            'http_request'
        ];

        $userAgentLower = strtolower($userAgent);
        
        foreach ($botPatterns as $pattern) {
            if (strpos($userAgentLower, strtolower($pattern)) !== false) {
                return true;
            }
        }

        return false;
    }
}

$tester = new BotFilterTester();
$tester->testBotFilter();

echo "\nPara verificar en la base de datos real:\n";
echo "1. Registros totales: " . \App\Models\PageVisit::count() . "\n";
echo "2. Registros con 'facebookexternalhit': " . \App\Models\PageVisit::where('user_agent', 'like', '%facebookexternalhit%')->count() . "\n";
echo "3. Registros con 'bot' en user_agent: " . \App\Models\PageVisit::where('user_agent', 'like', '%bot%')->count() . "\n";
