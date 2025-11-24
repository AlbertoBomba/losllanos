<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailyMenu extends Model
{
    protected $fillable = [
        'restaurant_id',
        'name',
        'description',
        'price',
        'date',
        'first_courses',
        'second_courses',
        'desserts',
        'drinks',
        'notes',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'date' => 'date',
        'first_courses' => 'array',
        'second_courses' => 'array',
        'desserts' => 'array',
        'drinks' => 'array',
        'is_active' => 'boolean'
    ];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 2, ',', '.') . '€';
    }

    public function getFormattedDateAttribute(): ?string
    {
        return $this->date ? $this->date->format('d/m/Y') : null;
    }

    public function getIsForTodayAttribute(): bool
    {
        return $this->date && $this->date->isToday();
    }

    public function getCoursesCountAttribute(): int
    {
        return count($this->first_courses ?? []) + 
               count($this->second_courses ?? []) + 
               count($this->desserts ?? []);
    }

    // Scope para menús activos
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope para menús de hoy
    public function scopeToday($query)
    {
        return $query->whereDate('date', today());
    }

    // Scope para menús sin fecha específica (siempre disponibles)
    public function scopeAlwaysAvailable($query)
    {
        return $query->whereNull('date');
    }
}
