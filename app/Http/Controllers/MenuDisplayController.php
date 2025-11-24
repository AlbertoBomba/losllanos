<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuDisplayController extends Controller
{
    public function show(Restaurant $restaurant)
    {
        // Verificar que el restaurante esté activo
        if (!$restaurant->is_active) {
            abort(404);
        }

        // Cargar las categorías activas con sus elementos disponibles y menús diarios
        $restaurant->load([
            'menuCategories' => function($query) {
                $query->where('is_active', true)
                      ->orderBy('sort_order');
            },
            'menuCategories.activeMenuItems' => function($query) {
                $query->orderBy('sort_order');
            },
            'activeDailyMenus' => function($query) {
                $query->orderBy('sort_order');
            }
        ]);

        // Filtrar categorías que tengan al menos un elemento disponible
        $categoriesWithItems = $restaurant->menuCategories->filter(function($category) {
            return $category->activeMenuItems->count() > 0;
        });

        return view('menu-display.show', [
            'restaurant' => $restaurant,
            'categories' => $categoriesWithItems,
            'dailyMenus' => $restaurant->activeDailyMenus
        ]);
    }

    public function pdf(Restaurant $restaurant)
    {
        // Verificar que el restaurante esté activo
        if (!$restaurant->is_active) {
            abort(404);
        }

        // Cargar las categorías activas con sus elementos disponibles y menús diarios
        $restaurant->load([
            'menuCategories' => function($query) {
                $query->where('is_active', true)
                      ->orderBy('sort_order');
            },
            'menuCategories.activeMenuItems' => function($query) {
                $query->orderBy('sort_order');
            },
            'activeDailyMenus' => function($query) {
                $query->orderBy('sort_order');
            }
        ]);

        // Filtrar categorías que tengan al menos un elemento disponible
        $categoriesWithItems = $restaurant->menuCategories->filter(function($category) {
            return $category->activeMenuItems->count() > 0;
        });

        return view('menu-display.pdf', [
            'restaurant' => $restaurant,
            'categories' => $categoriesWithItems,
            'dailyMenus' => $restaurant->activeDailyMenus
        ]);
    }
}
