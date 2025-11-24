<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'description',
        'phone',
        'email',
        'address',
        'website',
        'opening_hours',
        'logo',
        'cover_image',
        'social_media',
        'slug',
        'is_active'
    ];

    protected $casts = [
        'opening_hours' => 'array',
        'social_media' => 'array',
        'is_active' => 'boolean'
    ];

    public function menuCategories(): HasMany
    {
        return $this->hasMany(MenuCategory::class)->orderBy('sort_order');
    }

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class)->orderBy('sort_order');
    }

    public function dailyMenus(): HasMany
    {
        return $this->hasMany(DailyMenu::class)->orderBy('sort_order');
    }

    public function activeDailyMenus(): HasMany
    {
        return $this->hasMany(DailyMenu::class)
                    ->where('is_active', true)
                    ->orderBy('sort_order');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
