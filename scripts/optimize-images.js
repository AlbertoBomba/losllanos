#!/usr/bin/env node

/**
 * Image Optimization Script for Laravel Project
 * Converts images to WebP format and creates responsive variants
 * 
 * Usage: node scripts/optimize-images.js
 */

const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

class ImageOptimizationScript {
    constructor() {
        this.publicDir = path.join(__dirname, '..', 'public');
        this.imagesDir = path.join(this.publicDir, 'images');
        this.stats = {
            processed: 0,
            converted: 0,
            skipped: 0,
            saved: 0
        };
    }

    // Check if ImageMagick or Sharp is available
    checkDependencies() {
        try {
            execSync('magick -version', { stdio: 'ignore' });
            console.log('✅ ImageMagick detected');
            return 'imagemagick';
        } catch {
            try {
                execSync('cwebp -version', { stdio: 'ignore' });
                console.log('✅ cwebp (libwebp) detected');
                return 'cwebp';
            } catch {
                console.error('❌ No image optimization tools found. Install ImageMagick or libwebp');
                console.log('Windows: choco install imagemagick or download from https://imagemagick.org/');
                console.log('macOS: brew install imagemagick');
                console.log('Ubuntu: sudo apt install imagemagick libwebp-dev');
                return null;
            }
        }
    }

    // Get all image files
    getAllImages() {
        const images = [];
        const extensions = ['.jpg', '.jpeg', '.png'];
        
        const scanDirectory = (dir) => {
            const items = fs.readdirSync(dir);
            
            items.forEach(item => {
                const fullPath = path.join(dir, item);
                const stat = fs.statSync(fullPath);
                
                if (stat.isDirectory()) {
                    scanDirectory(fullPath);
                } else if (extensions.includes(path.extname(item).toLowerCase())) {
                    images.push(fullPath);
                }
            });
        };
        
        scanDirectory(this.imagesDir);
        return images;
    }

    // Get file size in KB
    getFileSize(filePath) {
        return Math.round(fs.statSync(filePath).size / 1024);
    }

    // Convert image to WebP using ImageMagick
    convertWithImageMagick(inputPath, outputPath, quality = 85) {
        const command = `magick "${inputPath}" -quality ${quality} "${outputPath}"`;
        execSync(command, { stdio: 'ignore' });
    }

    // Convert image to WebP using cwebp
    convertWithCWebP(inputPath, outputPath, quality = 85) {
        const command = `cwebp -q ${quality} "${inputPath}" -o "${outputPath}"`;
        execSync(command, { stdio: 'ignore' });
    }

    // Create responsive variants
    createResponsiveVariants(inputPath, tool) {
        const dir = path.dirname(inputPath);
        const ext = path.extname(inputPath);
        const basename = path.basename(inputPath, ext);
        
        const sizes = [400, 800, 1200, 1600];
        const variants = [];
        
        sizes.forEach(width => {
            const outputPath = path.join(dir, `${basename}-${width}w${ext}`);
            
            if (!fs.existsSync(outputPath)) {
                try {
                    if (tool === 'imagemagick') {
                        const command = `magick "${inputPath}" -resize ${width}x -quality 85 "${outputPath}"`;
                        execSync(command, { stdio: 'ignore' });
                    }
                    variants.push(outputPath);
                } catch (error) {
                    console.warn(`⚠️  Failed to create ${width}w variant for ${basename}`);
                }
            }
        });
        
        return variants;
    }

    // Process single image
    processImage(imagePath, tool) {
        const relativePath = path.relative(this.publicDir, imagePath);
        const originalSize = this.getFileSize(imagePath);
        
        // Skip if too small (< 50KB)
        if (originalSize < 50) {
            console.log(`⏭️  Skipping small image: ${relativePath} (${originalSize}KB)`);
            this.stats.skipped++;
            return;
        }
        
        console.log(`🔄 Processing: ${relativePath} (${originalSize}KB)`);
        
        // Create WebP version
        const webpPath = imagePath.replace(/\.(jpg|jpeg|png)$/i, '.webp');
        
        if (!fs.existsSync(webpPath)) {
            try {
                if (tool === 'imagemagick') {
                    this.convertWithImageMagick(imagePath, webpPath, 85);
                } else if (tool === 'cwebp') {
                    this.convertWithCWebP(imagePath, webpPath, 85);
                }
                
                const webpSize = this.getFileSize(webpPath);
                const savings = ((originalSize - webpSize) / originalSize * 100).toFixed(1);
                
                console.log(`✅ Created WebP: ${path.basename(webpPath)} (${webpSize}KB, ${savings}% smaller)`);
                this.stats.converted++;
                this.stats.saved += (originalSize - webpSize);
                
            } catch (error) {
                console.error(`❌ Failed to convert ${relativePath}:`, error.message);
            }
        }
        
        // Create responsive variants for large images (> 200KB)
        if (originalSize > 200) {
            const variants = this.createResponsiveVariants(imagePath, tool);
            if (variants.length > 0) {
                console.log(`📐 Created ${variants.length} responsive variants`);
            }
        }
        
        this.stats.processed++;
    }

    // Generate optimization report
    generateReport() {
        const report = `
# Image Optimization Report

## Summary
- **Images processed:** ${this.stats.processed}
- **WebP conversions:** ${this.stats.converted}
- **Images skipped:** ${this.stats.skipped}
- **Total space saved:** ${Math.round(this.stats.saved)}KB

## Recommendations

### Critical Images (for LCP optimization)
1. Identify your largest contentful paint image
2. Use \`loading="eager"\` and \`fetchpriority="high"\`
3. Preload critical images in HTML head

### Implementation
\`\`\`blade
{{-- Critical hero image --}}
@include('components.optimized-image', [
    'src' => '/images/hero.jpg',
    'alt' => 'Hero image',
    'critical' => true,
    'class' => 'hero-banner lcp-critical'
])

{{-- Regular gallery image --}}
@include('components.optimized-image', [
    'src' => '/images/gallery/photo.jpg',
    'alt' => 'Gallery photo',
    'class' => 'gallery-image',
    'sizes' => '(max-width: 768px) 50vw, 300px'
])
\`\`\`

### Next Steps
1. Set up automated image processing on upload
2. Implement responsive images for gallery
3. Add WebP detection and fallbacks
4. Monitor Core Web Vitals improvements

Generated: ${new Date().toLocaleString()}
`;
        
        fs.writeFileSync('IMAGE_OPTIMIZATION_REPORT.md', report);
        console.log('\n📊 Report saved to IMAGE_OPTIMIZATION_REPORT.md');
    }

    // Run optimization
    async run() {
        console.log('🖼️  Starting image optimization...\n');
        
        const tool = this.checkDependencies();
        if (!tool) {
            process.exit(1);
        }
        
        const images = this.getAllImages();
        console.log(`Found ${images.length} images to process\n`);
        
        if (images.length === 0) {
            console.log('No images found in public/images directory');
            return;
        }
        
        // Process each image
        images.forEach(imagePath => {
            this.processImage(imagePath, tool);
        });
        
        // Generate report
        this.generateReport();
        
        console.log('\n🎉 Image optimization complete!');
        console.log(`📊 Processed: ${this.stats.processed}, Converted: ${this.stats.converted}, Saved: ${Math.round(this.stats.saved)}KB`);
        
        if (this.stats.saved > 0) {
            console.log(`💰 Estimated bandwidth savings: ${((this.stats.saved / 1024) * 100).toFixed(1)}MB per 100 page views`);
        }
    }
}

// Run if called directly
if (require.main === module) {
    const optimizer = new ImageOptimizationScript();
    optimizer.run().catch(console.error);
}

module.exports = ImageOptimizationScript;
