# Sistema de Cartas de Restaurante

## Descripción
Este es un sistema completo para crear y gestionar cartas de restaurantes. Permite tanto la gestión administrativa como la visualización pública de las cartas, sin necesidad de registro o autenticación.

## Características principales

### ✅ Gestión de Restaurantes
- Crear múltiples restaurantes
- Información completa: nombre, descripción, contacto, dirección, etc.
- URLs amigables mediante slugs

### ✅ Gestión de Categorías
- Organizar la carta por categorías (Entrantes, Principales, Postres, etc.)
- Descripción opcional para cada categoría
- Orden personalizable mediante drag & drop

### ✅ Gestión de Elementos del Menú
- Nombre, descripción y precio de cada plato
- Marcado de alérgenos (14 tipos principales)
- Información dietética (vegetariano, vegano, sin gluten, etc.)
- Platos especiales destacados
- Control de disponibilidad

### ✅ Menús Diarios Especiales
- **Estructura específica**: Primeros, Segundos, Postres
- **Precio único** para todo el menú completo
- **Descripción general** del menú
- **Bebidas incluidas** (opcional)
- **Fechas específicas** o siempre disponibles
- **Notas adicionales** (horarios, condiciones, etc.)
- **Visualización destacada** en la carta pública

### ✅ Visualización Pública Atractiva
- **NO INDEXABLE** por buscadores (noindex, nofollow)
- Diseño responsive y elegante
- Navegación suave entre categorías
- Información clara de alérgenos y dietas
- Versión PDF para descargar/imprimir

### ✅ Sin Autenticación
- Tanto la gestión como la visualización son públicas
- No requiere login ni registro
- Acceso directo a todas las funcionalidades

## URLs del Sistema

### Gestión (Panel Administrativo)
```
/menu-management                    → Lista todos los restaurantes
/menu-management/restaurant/create  → Crear nuevo restaurante
/menu-management/restaurant/{slug}  → Gestionar restaurante específico
```

### Visualización Pública
```
/carta/{slug}                       → Ver carta del restaurante
/carta/{slug}/pdf                   → Versión PDF de la carta
```

## Base de Datos

### Tablas creadas:
- `restaurants` - Información de los restaurantes
- `menu_categories` - Categorías de la carta
- `menu_items` - Elementos/platos del menú
- `daily_menus` - **NUEVO**: Menús diarios con estructura específica

### Relaciones:
- Un restaurante tiene muchas categorías y muchos menús diarios
- Una categoría pertenece a un restaurante y tiene muchos elementos
- Un elemento pertenece a una categoría y un restaurante
- Un menú diario pertenece a un restaurante

## Instalación y Configuración

### 1. Ejecutar migraciones
```bash
php artisan migrate
```

### 2. (Opcional) Crear datos de ejemplo
```bash
php artisan db:seed --class=RestaurantMenuSeeder
php artisan db:seed --class=DailyMenuSeeder
```

Esto creará un restaurante de ejemplo llamado "Restaurante Los Llanos" con una carta completa y menús diarios de ejemplo.

## Funcionalidades Destacadas

### 🎨 Diseño Atractivo
- Tipografías elegantes (Playfair Display + Inter)
- Colores y espaciado profesional
- Iconografía SVG integrada
- Efectos de hover y transiciones suaves

### 📱 Responsive Design
- Optimizado para móviles, tablets y desktop
- Navegación adaptiva
- Grids responsivos para los elementos

### 🔍 SEO Controlado
- Meta robots "noindex, nofollow" en todas las páginas
- No aparecerá en resultados de búsqueda
- Acceso solo mediante URL directa

### 🏷️ Sistema de Etiquetado
- **Alérgenos**: 14 tipos principales según normativa
- **Dietas**: Vegetariano, vegano, sin gluten, sin lactosa, etc.
- **Especiales**: Platos destacados de la casa

### 📄 Exportación PDF
- Versión optimizada para impresión
- Formato limpio y profesional
- Auto-apertura del diálogo de impresión

### 🎯 Gestión Intuitiva
- Interfaz limpia y moderna
- Drag & drop para reordenar
- Formularios validados
- Confirmaciones para eliminar

## Ejemplo de Uso

1. **Crear restaurante**: Ir a `/menu-management` y crear nuevo restaurante
2. **Añadir categorías**: Crear secciones como "Entrantes", "Principales", etc.
3. **Añadir platos**: Para cada categoría, añadir elementos con precios y descripciones
4. **Ver resultado**: Visitar `/carta/{slug}` para ver la carta pública
5. **Compartir**: La URL `/carta/{slug}` es la que se comparte con clientes

## Casos de Uso Reales

- **Restaurantes**: Carta principal del establecimiento
- **Eventos**: Menús especiales para bodas, comuniones, etc.
- **Catering**: Diferentes opciones de menú
- **Food Trucks**: Cartas móviles
- **Bares de tapas**: Cartas de tapas y raciones

## Notas Técnicas

- Construido con **Laravel 11**
- Frontend con **Tailwind CSS**
- Base de datos **MySQL**
- Sin dependencias JavaScript complejas (solo Sortable.js para drag & drop)
- Código modular y mantenible

## Futuras Mejoras Posibles

- Subida de imágenes para platos y restaurantes
- Sistema de horarios de apertura más detallado
- Múltiples idiomas
- Códigos QR para acceso rápido
- Integración con redes sociales
- Sistema de reservas básico