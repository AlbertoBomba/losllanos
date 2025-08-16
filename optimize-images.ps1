# Quick Image Optimization Script for LCP Improvement
# Requires ImageMagick: choco install imagemagick

param(
    [string]$ImagePath = "",
    [string]$Quality = "80",
    [switch]$CreateResponsive,
    [switch]$CreateWebP,
    [switch]$OptimizeAll
)

function Write-ColorText {
    param($Text, $Color = "White")
    Write-Host $Text -ForegroundColor $Color
}

function Test-ImageMagick {
    try {
        $null = magick -version
        return $true
    } catch {
        Write-ColorText "❌ ImageMagick not found. Install with: choco install imagemagick" "Red"
        return $false
    }
}

function Get-OptimizedSize {
    param($OriginalSize, $OptimizedSize)
    $savings = [math]::Round((($OriginalSize - $OptimizedSize) / $OriginalSize) * 100, 1)
    return $savings
}

function Optimize-SingleImage {
    param($ImagePath, $Quality = 80)
    
    if (-not (Test-Path $ImagePath)) {
        Write-ColorText "❌ Image not found: $ImagePath" "Red"
        return
    }
    
    $originalSize = (Get-Item $ImagePath).Length
    $fileName = [System.IO.Path]::GetFileNameWithoutExtension($ImagePath)
    $directory = Split-Path $ImagePath
    $extension = [System.IO.Path]::GetExtension($ImagePath)
    
    Write-ColorText "🔄 Processing: $fileName$extension ($([math]::Round($originalSize/1KB,1))KB)" "Yellow"
    
    # Create optimized JPG version
    $optimizedPath = Join-Path $directory "$fileName-optimized$extension"
    try {
        magick "$ImagePath" -quality $Quality -strip "$optimizedPath"
        $optimizedSize = (Get-Item $optimizedPath).Length
        $savings = Get-OptimizedSize $originalSize $optimizedSize
        Write-ColorText "✅ Optimized JPG: $([math]::Round($optimizedSize/1KB,1))KB (${savings}% smaller)" "Green"
    } catch {
        Write-ColorText "❌ Failed to optimize: $_" "Red"
    }
    
    # Create WebP version
    if ($CreateWebP) {
        $webpPath = Join-Path $directory "$fileName.webp"
        try {
            magick "$ImagePath" -quality $Quality "$webpPath"
            $webpSize = (Get-Item $webpPath).Length
            $webpSavings = Get-OptimizedSize $originalSize $webpSize
            Write-ColorText "✅ WebP created: $([math]::Round($webpSize/1KB,1))KB (${webpSavings}% smaller)" "Green"
        } catch {
            Write-ColorText "❌ Failed to create WebP: $_" "Red"
        }
    }
    
    # Create responsive variants
    if ($CreateResponsive) {
        $sizes = @(400, 800, 1200)
        foreach ($size in $sizes) {
            $responsivePath = Join-Path $directory "$fileName-${size}w$extension"
            try {
                magick "$ImagePath" -quality $Quality -resize "${size}x>" "$responsivePath"
                $responsiveSize = (Get-Item $responsivePath).Length
                Write-ColorText "📐 ${size}w variant: $([math]::Round($responsiveSize/1KB,1))KB" "Cyan"
            } catch {
                Write-ColorText "⚠️  Failed to create ${size}w variant" "Yellow"
            }
        }
    }
}

function Optimize-CriticalImages {
    $publicPath = "public\images"
    
    Write-ColorText "🎯 Optimizing critical images for LCP improvement..." "Green"
    Write-ColorText ""
    
    # Critical large images that affect LCP
    $criticalImages = @(
        "galery\19.JPG",
        "general\historia-caza-uno.webp",
        "general\historia-caza-2.webp",
        "general\codornices.webp",
        "general\padre-hijo-cazando-perdices.webp"
    )
    
    $totalSavings = 0
    $processedCount = 0
    
    foreach ($relativePath in $criticalImages) {
        $fullPath = Join-Path $publicPath $relativePath
        if (Test-Path $fullPath) {
            $originalSize = (Get-Item $fullPath).Length
            Optimize-SingleImage -ImagePath $fullPath -Quality $Quality
            $processedCount++
            Write-ColorText ""
        } else {
            Write-ColorText "⚠️  Image not found: $relativePath" "Yellow"
        }
    }
    
    Write-ColorText "📊 Summary:" "Green"
    Write-ColorText "- Images processed: $processedCount" "White"
    Write-ColorText "- Check optimized versions in the same directories" "White"
    Write-ColorText "- Use WebP versions for better compression" "White"
}

function Show-LCPRecommendations {
    Write-ColorText "🎯 LCP Optimization Recommendations:" "Green"
    Write-ColorText ""
    Write-ColorText "1. Critical Images (above-the-fold):" "Yellow"
    Write-ColorText "   - Use loading='eager' fetchpriority='high'" "White"
    Write-ColorText "   - Preload in HTML head" "White"
    Write-ColorText "   - Max 400KB for good LCP" "White"
    Write-ColorText ""
    Write-ColorText "2. Gallery Images:" "Yellow"
    Write-ColorText "   - Use loading='lazy'" "White"
    Write-ColorText "   - Implement intersection observer" "White"
    Write-ColorText "   - Create responsive variants" "White"
    Write-ColorText ""
    Write-ColorText "3. Implementation:" "Yellow"
    Write-ColorText "   <!-- Critical -->" "Gray"
    Write-ColorText "   <img src='image.webp' loading='eager' fetchpriority='high'>" "Gray"
    Write-ColorText "   <!-- Lazy -->" "Gray"
    Write-ColorText "   <img data-src='image.webp' loading='lazy' class='lazy-image'>" "Gray"
}

# Main execution
Write-ColorText "🖼️  Image Optimization for LCP - Los Llanos" "Green"
Write-ColorText "=============================================" "Green"
Write-ColorText ""

if (-not (Test-ImageMagick)) {
    exit 1
}

if ($OptimizeAll) {
    $CreateWebP = $true
    $CreateResponsive = $true
    Optimize-CriticalImages
} elseif ($ImagePath) {
    Optimize-SingleImage -ImagePath $ImagePath -Quality $Quality
} else {
    Write-ColorText "Usage examples:" "Yellow"
    Write-ColorText "  .\optimize-images.ps1 -OptimizeAll" "White"
    Write-ColorText "  .\optimize-images.ps1 -ImagePath 'public\images\galery\19.JPG' -CreateWebP -CreateResponsive" "White"
    Write-ColorText ""
    Show-LCPRecommendations
}

Write-ColorText ""
Write-ColorText "💡 Next steps:" "Yellow"
Write-ColorText "1. Test with: image-lcp-test.html" "White"
Write-ColorText "2. Measure LCP with Chrome DevTools" "White"
Write-ColorText "3. Update templates to use optimized images" "White"
