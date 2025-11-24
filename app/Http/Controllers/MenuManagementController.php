<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\DailyMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuManagementController extends Controller
{
    // Dashboard principal de gestión
    public function index()
    {
        $restaurants = Restaurant::with(['menuCategories.menuItems'])->get();
        return view('menu-management.index', compact('restaurants'));
    }

    // Gestión de restaurantes
    public function createRestaurant()
    {
        return view('menu-management.create-restaurant');
    }

    public function storeRestaurant(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'website' => 'nullable|url|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = true;

        $restaurant = Restaurant::create($validated);

        return redirect()->route('menu-management.restaurant', $restaurant)
                        ->with('success', 'Restaurante creado correctamente');
    }

    public function showRestaurant(Restaurant $restaurant)
    {
        $restaurant->load([
            'menuCategories.menuItems' => function($query) {
                $query->orderBy('sort_order');
            },
            'dailyMenus' => function($query) {
                $query->orderBy('sort_order');
            }
        ]);
        
        return view('menu-management.restaurant', compact('restaurant'));
    }

    // Gestión de categorías
    public function createCategory(Restaurant $restaurant)
    {
        return view('menu-management.create-category', compact('restaurant'));
    }

    public function storeCategory(Request $request, Restaurant $restaurant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $validated['restaurant_id'] = $restaurant->id;
        $validated['sort_order'] = $restaurant->menuCategories()->max('sort_order') + 1;

        MenuCategory::create($validated);

        return redirect()->route('menu-management.restaurant', $restaurant)
                        ->with('success', 'Categoría creada correctamente');
    }

    // Gestión de elementos del menú
    public function createItem(Restaurant $restaurant, MenuCategory $category)
    {
        return view('menu-management.create-item', compact('restaurant', 'category'));
    }

    public function storeItem(Request $request, Restaurant $restaurant, MenuCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'allergens' => 'nullable|array',
            'dietary_info' => 'nullable|array',
            'is_special' => 'boolean'
        ]);

        $validated['restaurant_id'] = $restaurant->id;
        $validated['menu_category_id'] = $category->id;
        $validated['sort_order'] = $category->menuItems()->max('sort_order') + 1;
        $validated['is_available'] = true;

        MenuItem::create($validated);

        return redirect()->route('menu-management.restaurant', $restaurant)
                        ->with('success', 'Elemento del menú creado correctamente');
    }

    public function editItem(Restaurant $restaurant, MenuItem $item)
    {
        return view('menu-management.edit-item', compact('restaurant', 'item'));
    }

    public function updateItem(Request $request, Restaurant $restaurant, MenuItem $item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'allergens' => 'nullable|array',
            'allergens.*' => 'string|in:gluten,crustaceos,huevos,pescado,cacahuetes,soja,lacteos,frutos_secos,apio,mostaza,sesamo,sulfitos,altramuces,moluscos',
            'dietary_info' => 'nullable|array',
            'dietary_info.*' => 'string|in:vegetariano,vegano,sin_gluten,sin_lactosa,picante,casero',
            'is_special' => 'boolean',
            'is_available' => 'boolean'
        ]);

        // Limpiar arrays vacíos
        $validated['allergens'] = array_filter($validated['allergens'] ?? []);
        $validated['dietary_info'] = array_filter($validated['dietary_info'] ?? []);

        $item->update($validated);

        return redirect()->route('menu-management.restaurant', $restaurant)
                        ->with('success', 'Elemento del menú actualizado correctamente');
    }

    // Actualizar orden
    public function updateOrder(Request $request)
    {
        $items = $request->input('items', []);
        
        foreach ($items as $index => $item) {
            if (isset($item['type']) && isset($item['id'])) {
                if ($item['type'] === 'category') {
                    MenuCategory::where('id', $item['id'])->update(['sort_order' => $index]);
                } elseif ($item['type'] === 'item') {
                    MenuItem::where('id', $item['id'])->update(['sort_order' => $index]);
                }
            }
        }

        return response()->json(['success' => true]);
    }

    // Eliminar elementos
    public function deleteCategory(MenuCategory $category)
    {
        $category->delete();
        return back()->with('success', 'Categoría eliminada correctamente');
    }

    public function deleteItem(MenuItem $item)
    {
        $item->delete();
        return back()->with('success', 'Elemento eliminado correctamente');
    }

    // Gestión de menús diarios
    public function createDailyMenu(Restaurant $restaurant)
    {
        return view('menu-management.create-daily-menu', compact('restaurant'));
    }

    public function storeDailyMenu(Request $request, Restaurant $restaurant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'date' => 'nullable|date',
            'first_courses' => 'required|array|min:1',
            'first_courses.*' => 'required|string|max:255',
            'second_courses' => 'required|array|min:1',
            'second_courses.*' => 'required|string|max:255',
            'desserts' => 'required|array|min:1',
            'desserts.*' => 'required|string|max:255',
            'drinks' => 'nullable|array',
            'drinks.*' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500',
        ]);

        // Filtrar arrays vacíos
        $validated['first_courses'] = array_filter($validated['first_courses']);
        $validated['second_courses'] = array_filter($validated['second_courses']);
        $validated['desserts'] = array_filter($validated['desserts']);
        $validated['drinks'] = array_filter($validated['drinks'] ?? []);

        $validated['restaurant_id'] = $restaurant->id;
        $validated['sort_order'] = $restaurant->dailyMenus()->max('sort_order') + 1;
        $validated['is_active'] = true;

        DailyMenu::create($validated);

        return redirect()->route('menu-management.restaurant', $restaurant)
                        ->with('success', 'Menú diario creado correctamente');
    }

    public function editDailyMenu(Restaurant $restaurant, DailyMenu $dailyMenu)
    {
        return view('menu-management.edit-daily-menu', compact('restaurant', 'dailyMenu'));
    }

    public function updateDailyMenu(Request $request, Restaurant $restaurant, DailyMenu $dailyMenu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'date' => 'nullable|date',
            'first_courses' => 'required|array|min:1',
            'first_courses.*' => 'required|string|max:255',
            'second_courses' => 'required|array|min:1',
            'second_courses.*' => 'required|string|max:255',
            'desserts' => 'required|array|min:1',
            'desserts.*' => 'required|string|max:255',
            'drinks' => 'nullable|array',
            'drinks.*' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ]);

        // Filtrar arrays vacíos
        $validated['first_courses'] = array_filter($validated['first_courses']);
        $validated['second_courses'] = array_filter($validated['second_courses']);
        $validated['desserts'] = array_filter($validated['desserts']);
        $validated['drinks'] = array_filter($validated['drinks'] ?? []);

        $dailyMenu->update($validated);

        return redirect()->route('menu-management.restaurant', $restaurant)
                        ->with('success', 'Menú diario actualizado correctamente');
    }

    public function deleteDailyMenu(DailyMenu $dailyMenu)
    {
        $dailyMenu->delete();
        return back()->with('success', 'Menú diario eliminado correctamente');
    }
}
