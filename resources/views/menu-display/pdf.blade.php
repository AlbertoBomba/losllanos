<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Carta PDF - {{ $restaurant->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }
        .restaurant-name {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        .restaurant-info {
            color: #666;
            margin-bottom: 10px;
        }
        .category {
            margin-bottom: 40px;
            page-break-inside: avoid;
        }
        .category-title {
            font-size: 1.8em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .category-description {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
            font-style: italic;
        }
        .menu-item {
            margin-bottom: 20px;
            border-bottom: 1px dotted #ddd;
            padding-bottom: 15px;
        }
        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
        }
        .item-name {
            font-size: 1.2em;
            font-weight: bold;
            flex: 1;
            padding-right: 10px;
        }
        .item-special {
            color: #f39c12;
        }
        .item-price {
            font-size: 1.1em;
            font-weight: bold;
            color: #2c3e50;
            white-space: nowrap;
        }
        .item-description {
            color: #666;
            margin-bottom: 10px;
        }
        .item-info {
            font-size: 0.9em;
        }
        .dietary-info {
            display: inline-block;
            background: #e8f5e8;
            color: #2e7d32;
            padding: 2px 6px;
            border-radius: 3px;
            margin-right: 5px;
            margin-bottom: 3px;
        }
        .allergens {
            color: #d32f2f;
            font-size: 0.85em;
            margin-top: 5px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #666;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        @media print {
            body { 
                margin: 0;
                padding: 15px;
                font-size: 12px;
            }
            .category {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <!-- Header del restaurante -->
    <div class="header">
        <h1 class="restaurant-name">{{ $restaurant->name }}</h1>
        @if($restaurant->description)
            <p class="restaurant-info">{{ $restaurant->description }}</p>
        @endif
        @if($restaurant->phone)
            <p class="restaurant-info">Teléfono: {{ $restaurant->phone }}</p>
        @endif
        @if($restaurant->address)
            <p class="restaurant-info">{{ $restaurant->address }}</p>
        @endif
    </div>

    <!-- Contenido de la carta -->
    
    <!-- Menús Diarios -->
    @if($dailyMenus->isNotEmpty())
        @foreach($dailyMenus as $dailyMenu)
            <div class="category">
                <h2 class="category-title">{{ $dailyMenu->name }} - {{ $dailyMenu->formatted_price }}</h2>
                @if($dailyMenu->description)
                    <p class="category-description">{{ $dailyMenu->description }}</p>
                @endif
                @if($dailyMenu->date)
                    <p style="text-align: center; color: #666; font-size: 0.9em; margin-bottom: 20px;">
                        <strong>Fecha:</strong> {{ $dailyMenu->formatted_date }}
                    </p>
                @endif

                <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 1.2em; color: #2c3e50; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px;">
                        Primeros Platos
                    </h3>
                    @foreach($dailyMenu->first_courses as $course)
                        <p style="margin: 5px 0 5px 20px;">• {{ $course }}</p>
                    @endforeach
                </div>

                <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 1.2em; color: #2c3e50; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px;">
                        Segundos Platos
                    </h3>
                    @foreach($dailyMenu->second_courses as $course)
                        <p style="margin: 5px 0 5px 20px;">• {{ $course }}</p>
                    @endforeach
                </div>

                <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 1.2em; color: #2c3e50; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px;">
                        Postres
                    </h3>
                    @foreach($dailyMenu->desserts as $dessert)
                        <p style="margin: 5px 0 5px 20px;">• {{ $dessert }}</p>
                    @endforeach
                </div>

                @if($dailyMenu->drinks && count($dailyMenu->drinks) > 0)
                    <div style="margin-bottom: 20px;">
                        <h3 style="font-size: 1.2em; color: #2c3e50; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px;">
                            Bebidas Incluidas
                        </h3>
                        @foreach($dailyMenu->drinks as $drink)
                            <p style="margin: 5px 0 5px 20px;">• {{ $drink }}</p>
                        @endforeach
                    </div>
                @endif

                @if($dailyMenu->notes)
                    <div style="background: #f8f9fa; border: 1px solid #e9ecef; padding: 10px; border-radius: 5px; margin-top: 15px;">
                        <strong>Nota:</strong> {{ $dailyMenu->notes }}
                    </div>
                @endif
            </div>
        @endforeach
    @endif

    @if($categories->isEmpty() && $dailyMenus->isEmpty())
        <div style="text-align: center; margin-top: 50px;">
            <h3>Carta en construcción</h3>
            <p>La carta de este restaurante se está preparando.</p>
        </div>
    @elseif($categories->isNotEmpty())
        @foreach($categories as $category)
            <div class="category">
                <h2 class="category-title">{{ $category->name }}</h2>
                @if($category->description)
                    <p class="category-description">{{ $category->description }}</p>
                @endif

                @foreach($category->activeMenuItems as $item)
                    <div class="menu-item">
                        <div class="item-header">
                            <div class="item-name">
                                {{ $item->name }}
                                @if($item->is_special)
                                    <span class="item-special">★</span>
                                @endif
                            </div>
                            <div class="item-price">
                                @if($item->price)
                                    {{ $item->formatted_price }}
                                @else
                                    <em>Consultar</em>
                                @endif
                            </div>
                        </div>

                        @if($item->description)
                            <p class="item-description">{{ $item->description }}</p>
                        @endif

                        <div class="item-info">
                            @if($item->dietary_info && count($item->dietary_info) > 0)
                                <div style="margin-bottom: 5px;">
                                    @foreach($item->dietary_info as $info)
                                        @php
                                        $dietaryLabels = [
                                            'vegetariano' => 'Vegetariano',
                                            'vegano' => 'Vegano',
                                            'sin_gluten' => 'Sin gluten',
                                            'sin_lactosa' => 'Sin lactosa',
                                            'picante' => 'Picante',
                                            'casero' => 'Casero'
                                        ];
                                        @endphp
                                        <span class="dietary-info">{{ $dietaryLabels[$info] ?? $info }}</span>
                                    @endforeach
                                </div>
                            @endif

                            @if($item->allergens && count($item->allergens) > 0)
                                <div class="allergens">
                                    <strong>Alérgenos:</strong>
                                    @foreach($item->allergens as $allergen)
                                        @php
                                        $allergenLabels = [
                                            'gluten' => 'Gluten',
                                            'crustaceos' => 'Crustáceos',
                                            'huevos' => 'Huevos',
                                            'pescado' => 'Pescado',
                                            'cacahuetes' => 'Cacahuetes',
                                            'soja' => 'Soja',
                                            'lacteos' => 'Lácteos',
                                            'frutos_secos' => 'Frutos secos',
                                            'apio' => 'Apio',
                                            'mostaza' => 'Mostaza',
                                            'sesamo' => 'Sésamo',
                                            'sulfitos' => 'Sulfitos',
                                            'altramuces' => 'Altramuces',
                                            'moluscos' => 'Moluscos'
                                        ];
                                        @endphp
                                        {{ $allergenLabels[$allergen] ?? $allergen }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif

    <!-- Footer -->
    <div class="footer">
        @if($restaurant->website || $restaurant->email)
            <div>
                @if($restaurant->website)
                    <p>{{ $restaurant->website }}</p>
                @endif
                @if($restaurant->email)
                    <p>{{ $restaurant->email }}</p>
                @endif
            </div>
        @endif
        <p><small>Generado el {{ date('d/m/Y H:i') }}</small></p>
    </div>

    <script>
        // Auto-abrir diálogo de impresión
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>