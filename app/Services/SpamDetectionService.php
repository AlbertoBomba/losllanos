<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SpamDetectionService
{
    // Base spam keywords
    private $baseSpamKeywords = [
        // Enlaces y promociones
        'click here', 'visit now', 'buy now', 'limited time', 'act now',
        'free money', 'make money', 'earn cash', 'get rich', 'work from home',
        
        // Medicamentos y productos sospechosos
        'viagra', 'cialis', 'pharmacy', 'pills', 'medication',
        'weight loss', 'diet pills', 'supplements',
        
        // Enlaces sospechosos
        'http://', 'https://', 'www.', '.com', '.net', '.org',
        'bit.ly', 'tinyurl', 'goo.gl',
        
        // Texto común de spam
        'congratulations', 'winner', 'prize', 'lottery', 'casino',
        'investment', 'loan', 'credit', 'debt', 'mortgage',
        
        // Palabras en múltiples idiomas
        'gratis', 'oferta', 'descuento', 'promoción', 'dinero',
    ];

    // Get all spam keywords (base + custom from config)
    private function getSpamKeywords(): array
    {
        $customKeywords = config('spam_detection.custom_keywords', []);
        return array_merge($this->baseSpamKeywords, $customKeywords);
    }

    // Patrones de spam
    private $spamPatterns = [
        '/\b\d{1,3}[\-\.\s]?\d{1,3}[\-\.\s]?\d{1,3}[\-\.\s]?\d{1,3}\b/', // IPs
        '/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b/', // Emails múltiples
        '/https?:\/\/[^\s]+/', // URLs múltiples
        '/\$\d+/', // Precios/dinero
        '/\b\d{4}[\-\s]?\d{4}[\-\s]?\d{4}[\-\s]?\d{4}\b/', // Números de tarjeta
        '/\b\d{10,}\b/', // Números largos (teléfonos)
        '/(.)\1{4,}/', // Caracteres repetidos (aaaaa)
        '/[A-Z]{5,}/', // Texto en mayúsculas excesivo
    ];

    /**
     * Analizar si un comentario es spam
     */
    public function isSpam(string $content, string $authorEmail = null, string $authorName = null, string $ipAddress = null): array
    {
        $spamScore = 0;
        $reasons = [];

        // 1. Verificar palabras clave de spam
        $keywordScore = $this->checkSpamKeywords($content);
        $spamScore += $keywordScore;
        if ($keywordScore > 0) {
            $reasons[] = "Contiene palabras clave de spam (puntos: {$keywordScore})";
        }

        // 2. Verificar patrones sospechosos
        $patternScore = $this->checkSpamPatterns($content);
        $spamScore += $patternScore;
        if ($patternScore > 0) {
            $reasons[] = "Contiene patrones sospechosos (puntos: {$patternScore})";
        }

        // 3. Verificar longitud y calidad del texto
        $qualityScore = $this->checkTextQuality($content);
        $spamScore += $qualityScore;
        if ($qualityScore > 0) {
            $reasons[] = "Calidad de texto sospechosa (puntos: {$qualityScore})";
        }

        // 4. Verificar email sospechoso
        if ($authorEmail) {
            $emailScore = $this->checkSuspiciousEmail($authorEmail);
            $spamScore += $emailScore;
            if ($emailScore > 0) {
                $reasons[] = "Email sospechoso (puntos: {$emailScore})";
            }
        }

        // 5. Verificar nombre sospechoso
        if ($authorName) {
            $nameScore = $this->checkSuspiciousName($authorName);
            $spamScore += $nameScore;
            if ($nameScore > 0) {
                $reasons[] = "Nombre sospechoso (puntos: {$nameScore})";
            }
        }

        // 6. Verificar IP en lista negra
        if ($ipAddress) {
            $ipScore = $this->checkBlacklistedIP($ipAddress);
            $spamScore += $ipScore;
            if ($ipScore > 0) {
                $reasons[] = "IP en lista negra (puntos: {$ipScore})";
            }
        }

        // 7. Verificar frecuencia de comentarios
        if ($ipAddress) {
            $frequencyScore = $this->checkCommentFrequency($ipAddress);
            $spamScore += $frequencyScore;
            if ($frequencyScore > 0) {
                $reasons[] = "Frecuencia alta de comentarios (puntos: {$frequencyScore})";
            }
        }

        // Determinar si es spam (umbral: 10 puntos)
        $isSpam = $spamScore >= 10;
        $confidence = min(100, ($spamScore / 20) * 100); // Confianza hasta 100%

        return [
            'is_spam' => $isSpam,
            'score' => $spamScore,
            'confidence' => round($confidence, 2),
            'reasons' => $reasons,
            'action' => $this->getRecommendedAction($spamScore)
        ];
    }

    /**
     * Verificar palabras clave de spam
     */
    private function checkSpamKeywords(string $content): int
    {
        $content = strtolower($content);
        $score = 0;
        $spamKeywords = $this->getSpamKeywords();

        foreach ($spamKeywords as $keyword) {
            if (strpos($content, strtolower($keyword)) !== false) {
                $score += 2; // 2 puntos por palabra clave
            }
        }

        return min(10, $score); // Máximo 10 puntos por keywords
    }

    /**
     * Verificar patrones sospechosos
     */
    private function checkSpamPatterns(string $content): int
    {
        $score = 0;

        foreach ($this->spamPatterns as $pattern) {
            if (preg_match($pattern, $content)) {
                $score += 3; // 3 puntos por patrón
            }
        }

        // Verificar múltiples enlaces
        $linkCount = preg_match_all('/https?:\/\/[^\s]+/', $content);
        if ($linkCount > 2) {
            $score += 5; // 5 puntos por múltiples enlaces
        }

        return min(15, $score); // Máximo 15 puntos por patrones
    }

    /**
     * Verificar calidad del texto
     */
    private function checkTextQuality(string $content): int
    {
        $score = 0;

        // Texto muy corto
        if (strlen($content) < 10) {
            $score += 3;
        }

        // Texto muy largo (probablemente spam)
        if (strlen($content) > 1000) {
            $score += 4;
        }

        // Muchos números
        $numberCount = preg_match_all('/\d/', $content);
        $numberRatio = $numberCount / strlen($content);
        if ($numberRatio > 0.3) {
            $score += 3;
        }

        // Muchas mayúsculas
        $upperCount = preg_match_all('/[A-Z]/', $content);
        $upperRatio = $upperCount / strlen($content);
        if ($upperRatio > 0.3) {
            $score += 2;
        }

        // Muchos signos de puntuación
        $punctCount = preg_match_all('/[!@#$%^&*()_+={}\[\]|\\:";\'<>?,.]/', $content);
        $punctRatio = $punctCount / strlen($content);
        if ($punctRatio > 0.2) {
            $score += 2;
        }

        return min(8, $score); // Máximo 8 puntos por calidad
    }

    /**
     * Verificar email sospechoso
     */
    private function checkSuspiciousEmail(string $email): int
    {
        $score = 0;
        $domain = substr(strrchr($email, "@"), 1);

        // Verificar dominios sospechosos desde config
        $suspiciousDomains = config('spam_detection.suspicious_domains', []);
        if (in_array($domain, $suspiciousDomains)) {
            $score += 8;
        }

        // Verificar dominios de confianza (menor score)
        $trustedDomains = config('spam_detection.trusted_domains', []);
        if (in_array($domain, $trustedDomains)) {
            $score -= 2; // Reducir score para dominios confiables
        }

        // Email con muchos números
        $numberCount = preg_match_all('/\d/', $email);
        if ($numberCount > 5) {
            $score += 3;
        }

        // Email muy largo
        if (strlen($email) > 50) {
            $score += 2;
        }

        return max(0, min(10, $score)); // Entre 0 y 10 puntos
    }

    /**
     * Verificar nombre sospechoso
     */
    private function checkSuspiciousName(string $name): int
    {
        $score = 0;

        // Nombre con números
        if (preg_match('/\d/', $name)) {
            $score += 3;
        }

        // Nombre muy corto
        if (strlen($name) < 3) {
            $score += 2;
        }

        // Nombre muy largo
        if (strlen($name) > 30) {
            $score += 2;
        }

        // Solo mayúsculas
        if ($name === strtoupper($name) && strlen($name) > 3) {
            $score += 2;
        }

        // Caracteres especiales en nombre
        if (preg_match('/[^a-zA-ZÀ-ÿ\s]/', $name)) {
            $score += 3;
        }

        return min(8, $score);
    }

    /**
     * Verificar IP en lista negra (simulado)
     */
    private function checkBlacklistedIP(string $ipAddress): int
    {
        // En producción, aquí consultarías APIs como:
        // - AbuseIPDB
        // - StopForumSpam
        // - Project Honey Pot

        // IPs locales obviamente no son spam
        if (in_array($ipAddress, ['127.0.0.1', '::1', '192.168.', '10.0.', '172.16.'])) {
            return 0;
        }

        // Simulación: verificar si la IP está en caché como problemática
        $cacheKey = "blacklisted_ip_{$ipAddress}";
        if (Cache::has($cacheKey)) {
            return 15; // IP conocida como problemática
        }

        return 0;
    }

    /**
     * Verificar frecuencia de comentarios
     */
    private function checkCommentFrequency(string $ipAddress): int
    {
        $maxCommentsPerDay = config('spam_detection.max_comments_per_ip_per_day', 20);
        
        // Si está desactivado el límite
        if ($maxCommentsPerDay <= 0) {
            return 0;
        }

        // Contar comentarios de esta IP en las últimas 24 horas
        $recentComments = Comment::where('ip_address', $ipAddress)
            ->where('created_at', '>=', now()->subDay())
            ->count();

        if ($recentComments > $maxCommentsPerDay) {
            return 15; // Puntuación alta por exceso de comentarios
        } elseif ($recentComments > ($maxCommentsPerDay / 2)) {
            return 8; // Puntuación media por comentarios frecuentes
        } elseif ($recentComments > ($maxCommentsPerDay / 4)) {
            return 3; // Puntuación baja por actividad moderada
        }

        return 0;
    }

    /**
     * Obtener acción recomendada basada en el score
     */
    private function getRecommendedAction(int $score): string
    {
        $thresholds = config('spam_detection.thresholds', [
            'block' => 20,
            'spam' => 10,
            'review' => 5,
            'approve' => 0
        ]);

        if ($score >= $thresholds['block']) {
            return 'block'; // Bloquear automáticamente
        } elseif ($score >= $thresholds['spam']) {
            return 'spam'; // Marcar como spam
        } elseif ($score >= $thresholds['review']) {
            return 'review'; // Requerir revisión manual
        }

        return 'approve'; // Aprobar automáticamente
    }

    /**
     * Marcar IP como problemática
     */
    public function markIPAsSpam(string $ipAddress): void
    {
        $cacheKey = "blacklisted_ip_{$ipAddress}";
        Cache::put($cacheKey, true, now()->addDays(30));
    }

    /**
     * Entrenar el detector con comentarios marcados manualmente
     */
    public function trainFromExistingComments(): array
    {
        $spamComments = Comment::where('is_spam', true)->get();
        $legitimateComments = Comment::where('is_approved', true)->where('is_spam', false)->get();

        $results = [
            'spam_analyzed' => $spamComments->count(),
            'legitimate_analyzed' => $legitimateComments->count(),
            'new_keywords_found' => [],
            'patterns_updated' => false
        ];

        // Analizar comentarios spam para encontrar nuevos patrones
        foreach ($spamComments as $comment) {
            $analysis = $this->isSpam($comment->content, $comment->author_email, $comment->author_name, $comment->ip_address);
            
            // Si el comentario spam actual no fue detectado, analizar por qué
            if (!$analysis['is_spam']) {
                // Aquí podrías implementar lógica para aprender nuevos patrones
                $this->analyzeUndetectedSpam($comment);
            }
        }

        return $results;
    }

    /**
     * Analizar spam no detectado para mejorar el sistema
     */
    private function analyzeUndetectedSpam(Comment $comment): void
    {
        // Implementar lógica de machine learning básica
        // Por ahora, simplemente logear para análisis manual
        Log::info('Spam no detectado:', [
            'content' => $comment->content,
            'email' => $comment->author_email,
            'ip' => $comment->ip_address
        ]);
    }
}
