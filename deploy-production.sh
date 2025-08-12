#!/bin/bash

# SCRIPT DE DESPLIEGUE PARA PRODUCCIÓN - LOS LLANOS
# Este script prepara la aplicación para producción

echo "🚀 INICIANDO DESPLIEGUE DE PRODUCCIÓN - LOS LLANOS"
echo "=================================================="

# 1. Verificar requisitos
echo "📋 Verificando preparación para producción..."
php artisan production:check
if [ $? -ne 0 ]; then
    echo "❌ Hay problemas que resolver antes del despliegue"
    echo "💡 Ejecuta 'php artisan production:check' para ver detalles"
    exit 1
fi

# 2. Optimizar aplicación
echo "⚡ Optimizando aplicación..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 3. Generar sitemaps
echo "🗺️ Generando sitemaps..."
php artisan sitemap:generate

# 4. Verificar archivos generados
echo "🔍 Verificando archivos de sitemap..."
for file in sitemap_index.xml sitemap.xml sitemap-pages.xml sitemap-posts.xml sitemap-products.xml; do
    if [ -f "public/$file" ]; then
        echo "✅ $file - OK"
        # Establecer permisos correctos
        chmod 644 "public/$file"
    else
        echo "❌ $file - FALTA"
    fi
done

# 5. Configurar permisos
echo "🔐 Configurando permisos..."
chmod -R 755 public/
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/

# 6. Crear cron job para actualizaciones automáticas
echo "⏰ Configurando actualización automática de sitemap..."
cat > sitemap-cron.txt << EOF
# Actualizar sitemap diariamente a las 2:00 AM
0 2 * * * cd $(pwd) && php artisan sitemap:generate >/dev/null 2>&1

# Notificar a buscadores a las 2:05 AM
5 2 * * * cd $(pwd) && php artisan sitemap:ping >/dev/null 2>&1
EOF

echo "📝 Archivo de cron creado: sitemap-cron.txt"
echo "💡 Para instalarlo: crontab sitemap-cron.txt"

# 7. Verificación final
echo "🔎 Verificación final..."
php artisan production:check --quiet

if [ $? -eq 0 ]; then
    echo ""
    echo "🎉 ¡DESPLIEGUE COMPLETADO EXITOSAMENTE!"
    echo "=================================================="
    echo "✅ Aplicación optimizada"
    echo "✅ Sitemaps generados"
    echo "✅ Permisos configurados"
    echo "✅ Sistema de notificación automática listo"
    echo ""
    echo "📋 PRÓXIMOS PASOS:"
    echo "1. Verificar APP_URL en .env apunte a tu dominio"
    echo "2. Instalar el cron job: crontab sitemap-cron.txt"
    echo "3. Verificar que los sitemaps sean accesibles desde Internet"
    echo "4. Agregar el sitio a Google Search Console y Bing Webmaster"
    echo ""
    echo "🔗 URLs importantes:"
    echo "   • Sitemap: $(grep APP_URL .env | cut -d '=' -f2)/sitemap_index.xml"
    echo "   • Admin: $(grep APP_URL .env | cut -d '=' -f2)/admin/sitemap"
    echo "   • Diagnóstico: $(grep APP_URL .env | cut -d '=' -f2)/seo-diagnostics"
else
    echo "❌ Hay algunos problemas que resolver"
    exit 1
fi
