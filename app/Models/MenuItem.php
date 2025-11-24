<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuItem extends Model
{
    protected $fillable = [
        'restaurant_id',
        'menu_category_id',
        'name',
        'description',
        'price',
        'image',
        'allergens',
        'dietary_info',
        'is_special',
        'is_available',
        'sort_order'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'allergens' => 'array',
        'dietary_info' => 'array',
        'is_special' => 'boolean',
        'is_available' => 'boolean'
    ];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function menuCategory(): BelongsTo
    {
        return $this->belongsTo(MenuCategory::class);
    }

    public function getFormattedPriceAttribute(): string
    {
        return $this->price ? number_format($this->price, 2, ',', '.') . '€' : 'Consultar';
    }
}
