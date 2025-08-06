<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'subscribed_at',
        'is_active',
        'unsubscribed_at',
        'unsubscribe_token',
        'unsubscribe_reason'
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Scope para suscriptores recientes
     */
    public function scopeRecent($query, $days = 7)
    {
        return $query->where('subscribed_at', '>=', now()->subDays($days));
    }

    /**
     * Scope para suscriptores activos
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope para suscriptores inactivos
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    /**
     * Generar token de baja único
     */
    public function generateUnsubscribeToken()
    {
        do {
            $token = bin2hex(random_bytes(32));
        } while (self::where('unsubscribe_token', $token)->exists());

        $this->unsubscribe_token = $token;
        return $token;
    }

    /**
     * Darse de baja con motivo opcional
     */
    public function unsubscribe($reason = null)
    {
        $this->update([
            'is_active' => false,
            'unsubscribed_at' => now(),
            'unsubscribe_reason' => $reason
        ]);
    }

    /**
     * Reactivar suscripción
     */
    public function resubscribe()
    {
        $this->update([
            'is_active' => true,
            'unsubscribed_at' => null,
            'unsubscribe_token' => null,
            'unsubscribe_reason' => null
        ]);
    }

    /**
     * Verificar si está activo
     */
    public function isActive()
    {
        return $this->is_active;
    }
}
