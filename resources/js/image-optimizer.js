/**
 * Advanced Image Optimization System for LCP Improvement
 * Handles lazy loading, WebP conversion, responsive images, and performance monitoring
 */

class ImageOptimizer {
    constructor(options = {}) {
        this.options = {
            lazyThreshold: '50px',
            webpSupport: null,
            enablePrefetch: true,
            trackLCP: true,
            compressionQuality: 0.85,
            ...options
        };
        
        this.intersectionObserver = null;
        this.lcpElement = null;
        this.imageCache = new Map();
        this.performanceMetrics = {
            imagesLoaded: 0,
            totalLoadTime: 0,
            lcpTime: null,
            largestImage: null
        };
        
        this.init();
    }

    init() {
        this.detectWebPSupport();
        this.setupIntersectionObserver();
        this.setupLCPTracking();
        this.optimizeExistingImages();
        this.setupPreloading();
        
        console.log('🖼️ Image Optimizer initialized');
    }

    // Detect WebP support
    detectWebPSupport() {
        return new Promise((resolve) => {
            const webp = new Image();
            webp.onload = webp.onerror = () => {
                this.options.webpSupport = webp.height === 2;
                resolve(this.options.webpSupport);
                console.log('🎨 WebP support:', this.options.webpSupport ? 'Yes' : 'No');
            };
            webp.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
        });
    }

    // Setup Intersection Observer for lazy loading
    setupIntersectionObserver() {
        if (!('IntersectionObserver' in window)) {
            // Fallback for older browsers
            this.loadAllImages();
            return;
        }

        this.intersectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.loadImage(entry.target);
                    this.intersectionObserver.unobserve(entry.target);
                }
            });
        }, {
            rootMargin: this.options.lazyThreshold,
            threshold: 0.1
        });
    }

    // Setup LCP tracking
    setupLCPTracking() {
        if (!this.options.trackLCP || !('PerformanceObserver' in window)) return;

        new PerformanceObserver((entryList) => {
            const entries = entryList.getEntries();
            const lastEntry = entries[entries.length - 1];
            
            this.performanceMetrics.lcpTime = Math.round(lastEntry.startTime);
            this.lcpElement = lastEntry.element;
            
            console.log(`📊 LCP: ${this.performanceMetrics.lcpTime}ms`, lastEntry.element);
            
            // If LCP is an image, mark it as critical
            if (lastEntry.element && lastEntry.element.tagName === 'IMG') {
                lastEntry.element.classList.add('lcp-critical');
                this.performanceMetrics.largestImage = {
                    src: lastEntry.element.src,
                    loadTime: this.performanceMetrics.lcpTime,
                    size: lastEntry.size
                };
            }
        }).observe({ type: 'largest-contentful-paint', buffered: true });
    }

    // Optimize existing images in the DOM
    optimizeExistingImages() {
        const images = document.querySelectorAll('img');
        
        images.forEach((img, index) => {
            this.processImage(img, index < 3); // First 3 images are critical
        });
    }

    // Process individual image
    processImage(img, isCritical = false) {
        const originalSrc = img.src || img.dataset.src;
        
        // Set loading attributes
        if (isCritical) {
            img.loading = 'eager';
            img.fetchPriority = 'high';
            img.decoding = 'sync';
            img.classList.add('lcp-critical');
        } else {
            img.loading = 'lazy';
            img.fetchPriority = 'low';
            img.decoding = 'async';
            img.classList.add('lazy-image');
            
            // Add to intersection observer
            if (this.intersectionObserver) {
                this.intersectionObserver.observe(img);
            }
        }

        // Add responsive attributes if not present
        if (!img.sizes && img.classList.contains('responsive-image')) {
            img.sizes = this.generateSizes(img);
        }

        // Setup error handling
        img.onerror = () => this.handleImageError(img);
        
        // Setup load tracking
        img.onload = () => this.handleImageLoad(img);

        return img;
    }

    // Load image with optimization
    loadImage(img) {
        const startTime = performance.now();
        
        return new Promise((resolve, reject) => {
            const optimizedSrc = this.getOptimizedSrc(img);
            
            // Create new image to preload
            const newImg = new Image();
            
            newImg.onload = () => {
                const loadTime = performance.now() - startTime;
                
                // Update original image
                img.src = optimizedSrc;
                img.classList.add('loaded');
                img.classList.remove('lazy-image');
                
                // Track performance
                this.trackImageLoad(img, loadTime);
                
                resolve(img);
            };
            
            newImg.onerror = () => {
                this.handleImageError(img);
                reject(new Error(`Failed to load image: ${optimizedSrc}`));
            };
            
            newImg.src = optimizedSrc;
        });
    }

    // Get optimized image source
    getOptimizedSrc(img) {
        let src = img.dataset.src || img.src;
        
        // Convert to WebP if supported
        if (this.options.webpSupport && !src.includes('.webp')) {
            const webpSrc = src.replace(/\.(jpg|jpeg|png)$/i, '.webp');
            // Check if WebP version exists (you'd implement this check)
            if (this.imageCache.has(webpSrc)) {
                src = webpSrc;
            }
        }
        
        // Add responsive parameters if needed
        src = this.addResponsiveParams(src, img);
        
        return src;
    }

    // Add responsive parameters to image URL
    addResponsiveParams(src, img) {
        if (src.includes('?')) return src; // Already has parameters
        
        const container = img.closest('.image-container') || img.parentElement;
        const containerWidth = container ? container.offsetWidth : window.innerWidth;
        
        // Calculate optimal size
        const dpr = window.devicePixelRatio || 1;
        const optimalWidth = Math.ceil(containerWidth * dpr);
        
        // Add size parameters (would work with image processing service)
        return `${src}?w=${optimalWidth}&q=${Math.floor(this.options.compressionQuality * 100)}`;
    }

    // Generate sizes attribute for responsive images
    generateSizes(img) {
        const breakpoints = [
            '(max-width: 768px) 100vw',
            '(max-width: 1200px) 50vw',
            '800px'
        ];
        
        if (img.classList.contains('hero-banner')) {
            return '100vw';
        }
        
        if (img.classList.contains('gallery-image')) {
            return '(max-width: 768px) 50vw, (max-width: 1200px) 33vw, 300px';
        }
        
        return breakpoints.join(', ');
    }

    // Handle image loading success
    handleImageLoad(img) {
        this.performanceMetrics.imagesLoaded++;
        
        // Add fade-in effect
        img.style.opacity = '0';
        img.style.transition = 'opacity 0.3s ease-in-out';
        
        requestAnimationFrame(() => {
            img.style.opacity = '1';
        });
        
        // Dispatch custom event
        img.dispatchEvent(new CustomEvent('imageOptimized', {
            detail: { src: img.src, loadTime: performance.now() }
        }));
    }

    // Handle image loading error
    handleImageError(img) {
        console.warn('🚨 Image failed to load:', img.src);
        
        img.classList.add('image-error');
        img.alt = 'Error al cargar imagen';
        
        // Try fallback if available
        if (img.dataset.fallback) {
            img.src = img.dataset.fallback;
        }
    }

    // Track image load performance
    trackImageLoad(img, loadTime) {
        this.performanceMetrics.totalLoadTime += loadTime;
        
        console.log(`📸 Image loaded: ${img.src.split('/').pop()} (${Math.round(loadTime)}ms)`);
        
        // Store in cache for future use
        this.imageCache.set(img.src, {
            loadTime,
            timestamp: Date.now(),
            size: img.naturalWidth * img.naturalHeight
        });
    }

    // Setup critical image preloading
    setupPreloading() {
        if (!this.options.enablePrefetch) return;
        
        // Preload critical images
        const criticalImages = document.querySelectorAll('.lcp-critical, .hero-image, .above-fold-image');
        
        criticalImages.forEach(img => {
            if (img.dataset.src || img.src) {
                this.preloadImage(img.dataset.src || img.src);
            }
        });
    }

    // Preload specific image
    preloadImage(src) {
        if (this.imageCache.has(src)) return;
        
        const link = document.createElement('link');
        link.rel = 'preload';
        link.as = 'image';
        link.href = src;
        link.fetchPriority = 'high';
        
        document.head.appendChild(link);
        
        console.log('🚀 Preloading critical image:', src.split('/').pop());
    }

    // Convert large images to WebP format (client-side)
    async convertToWebP(file, quality = 0.85) {
        return new Promise((resolve) => {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            const img = new Image();
            
            img.onload = () => {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);
                
                canvas.toBlob(resolve, 'image/webp', quality);
            };
            
            img.src = URL.createObjectURL(file);
        });
    }

    // Generate responsive image sources
    generateResponsiveImages(originalSrc, sizes = [400, 800, 1200, 1600]) {
        return sizes.map(size => ({
            src: `${originalSrc}?w=${size}&f=webp`,
            width: size,
            media: size <= 768 ? '(max-width: 768px)' : null
        }));
    }

    // Get performance report
    getPerformanceReport() {
        const avgLoadTime = this.performanceMetrics.totalLoadTime / this.performanceMetrics.imagesLoaded;
        
        return {
            ...this.performanceMetrics,
            averageLoadTime: Math.round(avgLoadTime) || 0,
            cacheSize: this.imageCache.size,
            webpSupport: this.options.webpSupport
        };
    }

    // Load all images (fallback for browsers without IntersectionObserver)
    loadAllImages() {
        const images = document.querySelectorAll('img[data-src]');
        images.forEach(img => this.loadImage(img));
    }

    // Cleanup
    destroy() {
        if (this.intersectionObserver) {
            this.intersectionObserver.disconnect();
        }
        
        this.imageCache.clear();
        console.log('🗑️ Image Optimizer destroyed');
    }
}

// Auto-initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    window.imageOptimizer = new ImageOptimizer({
        lazyThreshold: '100px',
        enablePrefetch: true,
        trackLCP: true,
        compressionQuality: 0.8
    });
});

// Export for manual initialization
window.ImageOptimizer = ImageOptimizer;
