#!/bin/bash

echo ""
echo "===================================================="
echo "      DESPLIEGUE COMPLETO PARA PRODUCCION"  
echo "      Dominio: clubdetiro-losllanos.es"
echo "===================================================="
echo ""

echo "[1/8] Optimizando Laravel para produccion..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
echo "✅ Optimizaciones aplicadas"

echo ""
echo "[2/8] Generando sitemaps..."
php artisan sitemap:generate
echo "✅ Sitemaps generados"

echo ""
echo "[3/8] Verificando preparacion para produccion..."
php artisan production:check
echo ""

echo "[4/8] Configurando permisos..."
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chown -R www-data:www-data storage/ bootstrap/cache/ 2>/dev/null || echo "⚠️  Ejecutar chown manualmente si es necesario"
echo "✅ Permisos configurados"

echo ""
echo "[5/8] Probando notificaciones reales..."
php artisan sitemap:ping
echo ""

echo "[6/8] Verificando archivos de sitemap generados..."
ls -la public/*.xml 2>/dev/null || echo "No se encontraron archivos XML"
echo ""

echo "[7/8] Configurando tarea automatica (crontab)..."
echo "Ejecutar: crontab -e"
echo "Agregar esta linea:"
echo "# Actualizar sitemaps cada dia a las 2:00 AM"
echo "0 2 * * * cd $(pwd) && php artisan sitemap:generate-and-notify"
echo ""

echo "[8/8] URLs importantes para verificar:"
echo "  🌐 Sitemap Index: https://clubdetiro-losllanos.es/sitemap_index.xml"
echo "  📄 Sitemap Posts: https://clubdetiro-losllanos.es/sitemap_posts.xml"
echo "  📄 Sitemap Pages: https://clubdetiro-losllanos.es/sitemap_pages.xml"
echo "  📄 Sitemap Categories: https://clubdetiro-losllanos.es/sitemap_categories.xml"
echo "  📄 Sitemap Tags: https://clubdetiro-losllanos.es/sitemap_tags.xml"
echo "  📄 Sitemap Images: https://clubdetiro-losllanos.es/sitemap_images.xml"
echo ""

echo "===================================================="
echo "              DESPLIEGUE COMPLETADO"
echo "===================================================="
echo ""
echo "🎯 COMANDOS DE VERIFICACION EN PRODUCCION:"
echo "   php artisan production:check"
echo "   php artisan sitemap:generate"
echo "   php artisan sitemap:ping"
echo ""
echo "🔧 CONFIGURAR CRONTAB:"
echo "   crontab -e"
echo "   # Agregar: 0 2 * * * cd $(pwd) && php artisan sitemap:generate-and-notify"
echo ""
echo "📋 Lista final para verificar en el servidor:"
echo "   ✓ SSL certificado instalado y funcionando"
echo "   ✓ URLs de sitemap accesibles desde navegador"
echo "   ✓ Notificaciones funcionando: php artisan sitemap:ping"
echo "   ✓ Cron job configurado para actualizaciones automaticas"
echo ""
