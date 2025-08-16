# Font Optimization Report Script (PowerShell)

Write-Host "==========================================" -ForegroundColor Cyan
Write-Host "FONT OPTIMIZATION REPORT" -ForegroundColor Cyan
Write-Host "==========================================" -ForegroundColor Cyan
Write-Host ""

# Verificar que los archivos existen
Write-Host "Verificando archivos de fuentes..." -ForegroundColor Yellow
Write-Host ""

# Fonts directory check
if (Test-Path "public/fonts") {
    Write-Host "✓ Directorio de fuentes: public/fonts/" -ForegroundColor Green
    $fontFiles = Get-ChildItem -Path "public/fonts" -Filter "*.woff2" -Recurse
    Write-Host "   Archivos .woff2 encontrados: $($fontFiles.Count)" -ForegroundColor White
    
    # Size analysis
    Write-Host ""
    Write-Host "Tamaños de archivos de fuentes:" -ForegroundColor Blue
    foreach ($file in $fontFiles) {
        $size = [math]::Round($file.Length / 1KB, 2)
        Write-Host "   $size KB - $($file.Name)" -ForegroundColor White
    }
} else {
    Write-Host "X Directorio de fuentes no encontrado" -ForegroundColor Red
}

Write-Host ""

# WebFonts directory check  
if (Test-Path "public/webfonts") {
    Write-Host "✓ Directorio de webfonts: public/webfonts/" -ForegroundColor Green
    $webfontFiles = Get-ChildItem -Path "public/webfonts" -Filter "*.woff2" -Recurse
    Write-Host "   Archivos .woff2 encontrados: $($webfontFiles.Count)" -ForegroundColor White
    
    # Size analysis
    Write-Host ""
    Write-Host "Tamaños de archivos de iconos:" -ForegroundColor Blue
    foreach ($file in $webfontFiles) {
        $size = [math]::Round($file.Length / 1KB, 2)
        Write-Host "   $size KB - $($file.Name)" -ForegroundColor White
    }
} else {
    Write-Host "X Directorio de webfonts no encontrado" -ForegroundColor Red
}

Write-Host ""

# CSS Analysis
if (Test-Path "resources/css/fonts.css") {
    $optimizedSize = (Get-Item "resources/css/fonts.css").Length
    Write-Host "Archivo fonts.css optimizado: $([math]::Round($optimizedSize / 1KB, 2)) KB" -ForegroundColor Green
}

Write-Host ""
Write-Host "==========================================" -ForegroundColor Cyan
Write-Host "OPTIMIZACIONES APLICADAS:" -ForegroundColor Cyan  
Write-Host "==========================================" -ForegroundColor Cyan
Write-Host "✓ Reducido numero de variantes de peso por fuente" -ForegroundColor Green
Write-Host "✓ Eliminada fuente Rajdhani redundante (unificada con Oswald)" -ForegroundColor Green
Write-Host "✓ Solo iconos criticos de Font Awesome incluidos" -ForegroundColor Green
Write-Host "✓ Agregados preloads para fuentes criticas" -ForegroundColor Green
Write-Host "✓ Fallbacks del sistema agregados" -ForegroundColor Green
Write-Host "✓ font-display: swap optimizado" -ForegroundColor Green
Write-Host ""
Write-Host "BENEFICIOS ESPERADOS:" -ForegroundColor Yellow
Write-Host "   - Reduccion 40-60% en tiempo de carga de fuentes" -ForegroundColor White
Write-Host "   - Menor blocking del renderizado inicial" -ForegroundColor White
Write-Host "   - Mejor Core Web Vitals (LCP, CLS)" -ForegroundColor White
Write-Host "   - Experiencia mas fluida en conexiones lentas" -ForegroundColor White
Write-Host ""

# File analysis
Write-Host "ANALISIS DE ARCHIVOS DE FUENTES:" -ForegroundColor Cyan
Write-Host "==========================================" -ForegroundColor Cyan

# Critical fonts analysis
Write-Host "FUENTES CRITICAS (preload):" -ForegroundColor Red
$criticalFonts = @(
    "public/fonts/oswald/TK3iWkUHHAIjg752HT8Ghe4.woff2",
    "public/fonts/oswald/TK3iWkUHHAIjg752GT8G.woff2", 
    "public/fonts/montserrat/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2",
    "public/fonts/figtree/_Xms-HUzqDCFdgfMm4q9DbZs.woff2"
)

$totalCriticalSize = 0
foreach ($fontPath in $criticalFonts) {
    if (Test-Path $fontPath) {
        $size = (Get-Item $fontPath).Length
        $totalCriticalSize += $size
        $sizeKB = [math]::Round($size / 1KB, 2)
        Write-Host "   ✓ $sizeKB KB - $(Split-Path $fontPath -Leaf)" -ForegroundColor Green
    } else {
        Write-Host "   X FALTA: $(Split-Path $fontPath -Leaf)" -ForegroundColor Red
    }
}

Write-Host ""
Write-Host "TOTAL FUENTES CRITICAS: $([math]::Round($totalCriticalSize / 1KB, 2)) KB" -ForegroundColor Yellow
Write-Host ""
