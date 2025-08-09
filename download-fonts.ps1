# Script PowerShell para descargar fuentes de Google Fonts
# Configuracion de User-Agent para obtener fuentes WOFF2
$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"

# Funcion para descargar y procesar una familia de fuentes
function Download-GoogleFont {
    param(
        [string]$FontFamily,
        [string]$Weights,
        [string]$OutputDir
    )
    
    Write-Host "Descargando $FontFamily..." -ForegroundColor Green
    
    # Crear directorio si no existe
    if (!(Test-Path $OutputDir)) {
        New-Item -ItemType Directory -Path $OutputDir -Force
    }
    
    # Obtener CSS con fuentes WOFF2
    $cssUrl = "https://fonts.googleapis.com/css2?family=${FontFamily}:wght@${Weights}&display=swap"
    $cssContent = Invoke-WebRequest -Uri $cssUrl -Headers @{"User-Agent" = $userAgent} -UseBasicParsing
    
    # Buscar URLs de fuentes WOFF2
    $fontUrls = [regex]::Matches($cssContent.Content, "url\((https://fonts\.gstatic\.com[^)]+\.woff2)\)")
    
    foreach ($match in $fontUrls) {
        $fontUrl = $match.Groups[1].Value
        $fileName = Split-Path $fontUrl -Leaf
        $outputPath = Join-Path $OutputDir $fileName
        
        Write-Host "  Descargando: $fileName" -ForegroundColor Yellow
        try {
            Invoke-WebRequest -Uri $fontUrl -OutFile $outputPath -UseBasicParsing
            Write-Host "  OK Descargado: $fileName" -ForegroundColor Green
        } catch {
            Write-Host "  Error descargando $fileName : $_" -ForegroundColor Red
        }
    }
}

# Descargar todas las fuentes
Write-Host "=== Descargando Google Fonts localmente ===" -ForegroundColor Cyan

Download-GoogleFont -FontFamily "Montserrat" -Weights "300;400;500;600;700;800;900" -OutputDir "public/fonts/montserrat"
Download-GoogleFont -FontFamily "Oswald" -Weights "300;400;500;600;700" -OutputDir "public/fonts/oswald"  
Download-GoogleFont -FontFamily "Rajdhani" -Weights "300;400;500;600;700" -OutputDir "public/fonts/rajdhani"
Download-GoogleFont -FontFamily "Figtree" -Weights "400;500;600" -OutputDir "public/fonts/figtree"

Write-Host "=== Descarga completada ===" -ForegroundColor Cyan
