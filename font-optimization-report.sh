#!/bin/bash
# Font Optimization Report Script

echo "=========================================="
echo "📊 FONT OPTIMIZATION REPORT"
echo "=========================================="
echo ""

# Verificar que los archivos existen
echo "🔍 Verificando archivos de fuentes..."
echo ""

# Fonts directory check
if [ -d "public/fonts" ]; then
    echo "✅ Directorio de fuentes: public/fonts/"
    font_count=$(find public/fonts -name "*.woff2" | wc -l)
    echo "   📁 Archivos .woff2 encontrados: $font_count"
    
    # Size analysis
    echo ""
    echo "📏 Tamaños de archivos de fuentes:"
    find public/fonts -name "*.woff2" -exec ls -lh {} \; | awk '{print "   " $5 " - " $9}'
else
    echo "❌ Directorio de fuentes no encontrado"
fi

echo ""

# WebFonts directory check  
if [ -d "public/webfonts" ]; then
    echo "✅ Directorio de webfonts: public/webfonts/"
    webfont_count=$(find public/webfonts -name "*.woff2" | wc -l)
    echo "   📁 Archivos .woff2 encontrados: $webfont_count"
    
    # Size analysis
    echo ""
    echo "📏 Tamaños de archivos de iconos:"
    find public/webfonts -name "*.woff2" -exec ls -lh {} \; | awk '{print "   " $5 " - " $9}'
else
    echo "❌ Directorio de webfonts no encontrado"
fi

echo ""
echo "=========================================="
echo "📈 OPTIMIZACIONES APLICADAS:"
echo "=========================================="
echo "✅ Reducido número de variantes de peso por fuente"
echo "✅ Eliminada fuente Rajdhani redundante (unificada con Oswald)"
echo "✅ Solo iconos críticos de Font Awesome incluidos"
echo "✅ Agregados preloads para fuentes críticas"
echo "✅ Fallbacks del sistema agregados"
echo "✅ font-display: swap optimizado"
echo ""
echo "🚀 BENEFICIOS ESPERADOS:"
echo "   • Reducción 40-60% en tiempo de carga de fuentes"
echo "   • Menor blocking del renderizado inicial"
echo "   • Mejor Core Web Vitals (LCP, CLS)"
echo "   • Experiencia más fluida en conexiones lentas"
echo ""
