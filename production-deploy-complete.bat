@echo off
echo.
echo ====================================================
echo      DESPLIEGUE COMPLETO PARA PRODUCCION
echo      Dominio: clubdetiro-losllanos.es  
echo ====================================================
echo.

echo [1/8] Optimizando Laravel para produccion...
php artisan config:cache
php artisan route:cache  
php artisan view:cache
php artisan event:cache
echo ✅ Optimizaciones aplicadas

echo.
echo [2/8] Generando sitemaps...
php artisan sitemap:generate
echo ✅ Sitemaps generados

echo.
echo [3/8] Verificando preparacion para produccion...
php artisan production:check
echo.

echo [4/8] Configurando permisos (Linux/Unix)...
echo Ejecutar manualmente en el servidor:
echo   chmod -R 755 storage/
echo   chmod -R 755 bootstrap/cache/
echo   chown -R www-data:www-data storage/ bootstrap/cache/
echo.

echo [5/8] Probando notificaciones reales...
php artisan sitemap:ping
echo.

echo [6/8] Verificando archivos de sitemap generados...
dir /B public\*.xml
echo.

echo [7/8] Configurando tarea automatica (crontab)...
echo Agregar esta linea al crontab del servidor:
echo   # Actualizar sitemaps cada dia a las 2:00 AM
echo   0 2 * * * cd /ruta/a/tu/proyecto ^&^& php artisan sitemap:generate-and-notify
echo.

echo [8/8] URLs importantes para verificar:
echo   🌐 Sitemap Index: https://clubdetiro-losllanos.es/sitemap_index.xml
echo   📄 Sitemap Posts: https://clubdetiro-losllanos.es/sitemap_posts.xml  
echo   📄 Sitemap Pages: https://clubdetiro-losllanos.es/sitemap_pages.xml
echo   📄 Sitemap Categories: https://clubdetiro-losllanos.es/sitemap_categories.xml
echo   📄 Sitemap Tags: https://clubdetiro-losllanos.es/sitemap_tags.xml
echo   📄 Sitemap Images: https://clubdetiro-losllanos.es/sitemap_images.xml
echo.

echo ====================================================
echo              DESPLIEGUE COMPLETADO
echo ====================================================
echo.
echo 🎯 PROXIMOS PASOS EN EL SERVIDOR DE PRODUCCION:
echo    1. Subir todos los archivos al servidor
echo    2. Ejecutar: composer install --optimize-autoloader --no-dev
echo    3. Configurar el archivo .env con datos de produccion  
echo    4. Ejecutar: php artisan migrate --force
echo    5. Configurar SSL certificate en el servidor web
echo    6. Configurar crontab para actualizaciones automaticas
echo    7. Verificar que las URLs de sitemap sean accesibles
echo    8. Probar las notificaciones: php artisan sitemap:ping
echo.
echo 🔧 COMANDOS DE VERIFICACION EN PRODUCCION:
echo    php artisan production:check
echo    php artisan sitemap:generate  
echo    php artisan sitemap:ping
echo.
pause
