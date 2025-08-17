<?php

namespace App\Helpers;

use App\Models\Newsletter;
use Illuminate\Support\Facades\Request;

class NewsletterHelper
{
    /**
     * Verificar si un usuario ya está suscrito basado en diferentes métodos
     */
    public static function isUserSubscribed(): bool
    {
        // Método 1: Verificar por IP (para usuarios no registrados)
        $userIp = Request::ip();
        $subscribedByIp = Newsletter::where('ip_address', $userIp)
            ->where('is_active', true)
            ->exists();

        if ($subscribedByIp) {
            return true;
        }

        // Método 2: Verificar por cookie (si existe)
        if (request()->hasCookie('newsletter_subscribed')) {
            return request()->cookie('newsletter_subscribed') === 'true';
        }

        // Método 3: Verificar por user agent + IP (método más específico)
        $userAgent = Request::header('User-Agent');
        $fingerprint = self::generateFingerprint($userIp, $userAgent);
        
        $subscribedByFingerprint = Newsletter::where('browser_fingerprint', $fingerprint)
            ->where('is_active', true)
            ->exists();

        return $subscribedByFingerprint;
    }

    /**
     * Generar un fingerprint único del usuario
     */
    public static function generateFingerprint(string $ip, string $userAgent): string
    {
        return hash('sha256', $ip . '|' . $userAgent);
    }

    /**
     * Marcar usuario como suscrito
     */
    public static function markUserAsSubscribed(string $email): void
    {
        $userIp = Request::ip();
        $userAgent = Request::header('User-Agent');
        $fingerprint = self::generateFingerprint($userIp, $userAgent);

        // Actualizar el registro existente o crear uno nuevo
        Newsletter::updateOrCreate(
            ['email' => $email],
            [
                'ip_address' => $userIp,
                'browser_fingerprint' => $fingerprint,
                'subscribed_at' => now(),
                'is_active' => true
            ]
        );

        // También establecer cookie
        cookie()->queue('newsletter_subscribed', 'true', 60 * 24 * 30); // 30 días
    }

    /**
     * Obtener el estado de suscripción para JavaScript
     */
    public static function getSubscriptionStatusForJS(): array
    {
        return [
            'isSubscribed' => self::isUserSubscribed(),
            'checkMethods' => [
                'localStorage' => true,
                'cookie' => true,
                'backend' => true
            ]
        ];
    }
}
