# CONFIGURACIÓN PARA PRODUCCIÓN - LOS LLANOS

## 1. ARCHIVO .env (PRODUCCIÓN)
```env
APP_NAME="Los Llanos"
APP_ENV=production
APP_KEY=base64:TU_APP_KEY_AQUI
APP_DEBUG=false
APP_URL=https://tudominio.com

# Base de datos de producción
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=losllanos_production
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password

# Cache y optimizaciones
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

## 2. VERIFICACIONES PRE-PRODUCCIÓN

### A. Verificar que los sitemaps se generen correctamente
```bash
php artisan sitemap:generate
```

### B. Verificar que los archivos XML existan en public/
- public/sitemap_index.xml
- public/sitemap.xml  
- public/sitemap-pages.xml
- public/sitemap-posts.xml
- public/sitemap-products.xml

### C. Probar accesibilidad desde Internet
Una vez en producción, verificar que estas URLs respondan:
- https://tudominio.com/sitemap_index.xml
- https://tudominio.com/sitemap.xml

## 3. CONFIGURACIONES DEL SERVIDOR WEB

### Apache (.htaccess)
```apache
# Asegurar que los XML se sirvan correctamente
<Files "sitemap*.xml">
    Header set Content-Type "application/xml; charset=utf-8"
</Files>

# Permitir acceso a sitemaps
<Files "sitemap*.xml">
    Allow from all
    Require all granted
</Files>
```

### Nginx
```nginx
location ~* \.(xml)$ {
    add_header Content-Type application/xml;
    expires 1h;
    access_log off;
}

location ~ /sitemap.*\.xml$ {
    root /path/to/your/public;
    add_header Content-Type "application/xml; charset=utf-8";
    try_files $uri =404;
}
```

## 4. COMANDOS DE DESPLIEGUE

```bash
# 1. Subir código a producción
git pull origin main

# 2. Instalar dependencias
composer install --optimize-autoloader --no-dev

# 3. Optimizar aplicación
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 4. Generar sitemaps iniciales
php artisan sitemap:generate

# 5. Verificar permisos
chmod 755 public/
chmod 644 public/sitemap*.xml
```

## 5. PROGRAMAR ACTUALIZACIÓN AUTOMÁTICA

### Opción A: Cron Job (Recomendado)
```bash
# Editar crontab
crontab -e

# Agregar línea para actualizar sitemap diariamente a las 2:00 AM
0 2 * * * cd /path/to/your/project && php artisan sitemap:generate && php artisan sitemap:ping >/dev/null 2>&1
```

### Opción B: Scheduler de Laravel
En app/Console/Kernel.php:
```php
protected function schedule(Schedule $schedule)
{
    // Actualizar sitemap diariamente
    $schedule->command('sitemap:generate')
             ->daily()
             ->at('02:00');
    
    // Notificar a buscadores 5 minutos después
    $schedule->command('sitemap:ping')
             ->daily()
             ->at('02:05');
}
```

## 6. MONITOREO Y LOGS

### Verificar logs de notificaciones
```bash
tail -f storage/logs/laravel.log | grep "Sitemap ping"
```

### URLs de verificación en producción
- https://tudominio.com/seo-diagnostics
- https://tudominio.com/debug-ping
- https://tudominio.com/test-sitemap-access

## 7. VALIDACIÓN POST-DESPLIEGUE

1. ✅ Sitemap accesible: https://tudominio.com/sitemap_index.xml
2. ✅ Admin panel funciona: https://tudominio.com/admin/sitemap
3. ✅ Ping automático funciona (sin errores 404)
4. ✅ Logs muestran notificaciones exitosas

## 8. INTEGRACIÓN CON GOOGLE/BING

### Google Search Console
1. Agregar tu sitio en https://search.google.com/search-console
2. Verificar propiedad del dominio
3. Manualmente enviar sitemap la primera vez
4. A partir de ahí, los pings automáticos notificarán cambios

### Bing Webmaster Tools  
1. Agregar tu sitio en https://www.bing.com/webmasters
2. Verificar propiedad del dominio
3. Manualmente enviar sitemap la primera vez
4. Los pings automáticos funcionarán igual
