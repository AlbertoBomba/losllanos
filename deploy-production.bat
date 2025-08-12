@echo off
REM SCRIPT DE DESPLIEGUE PARA PRODUCCIÓN - LOS LLANOS (Windows)

echo 🚀 INICIANDO DESPLIEGUE DE PRODUCCIÓN - LOS LLANOS
echo ==================================================

REM 1. Verificar preparación
echo 📋 Verificando preparación para producción...
php artisan production:check
if errorlevel 1 (
    echo ❌ Hay problemas que resolver antes del despliegue
    echo 💡 Ejecuta 'php artisan production:check' para ver detalles
    pause
    exit /b 1
)

REM 2. Optimizar aplicación
echo ⚡ Optimizando aplicación...
php artisan config:cache
php artisan route:cache
php artisan view:cache

REM 3. Generar sitemaps
echo 🗺️ Generando sitemaps...
php artisan sitemap:generate

REM 4. Verificar archivos generados
echo 🔍 Verificando archivos de sitemap...
for %%f in (sitemap_index.xml sitemap.xml sitemap-pages.xml sitemap-posts.xml sitemap-products.xml) do (
    if exist "public\%%f" (
        echo ✅ %%f - OK
    ) else (
        echo ❌ %%f - FALTA
    )
)

REM 5. Verificación final
echo 🔎 Verificación final...
php artisan production:check --quiet

if errorlevel 1 (
    echo ❌ Hay algunos problemas que resolver
    pause
    exit /b 1
)

echo.
echo 🎉 ¡DESPLIEGUE COMPLETADO EXITOSAMENTE!
echo ==================================================
echo ✅ Aplicación optimizada
echo ✅ Sitemaps generados
echo ✅ Sistema de notificación automática listo
echo.
echo 📋 PRÓXIMOS PASOS:
echo 1. Verificar APP_URL en .env apunte a tu dominio
echo 2. Configurar tarea programada para actualización automática
echo 3. Verificar que los sitemaps sean accesibles desde Internet
echo 4. Agregar el sitio a Google Search Console y Bing Webmaster
echo.

REM Leer APP_URL del archivo .env
for /f "tokens=2 delims==" %%i in ('findstr "APP_URL" .env 2^>nul') do set APP_URL=%%i

echo 🔗 URLs importantes:
echo    • Sitemap: %APP_URL%/sitemap_index.xml
echo    • Admin: %APP_URL%/admin/sitemap  
echo    • Diagnóstico: %APP_URL%/seo-diagnostics
echo.

pause
