/**
 * Critical JavaScript for FCP Optimization
 * This script loads immediately to improve First Contentful Paint
 * Only includes essential functionality needed for initial render
 */

// Critical CSS loading optimization
(function() {
    'use strict';
    
    // Preload critical resources if not already loaded
    const preloadCriticalResources = () => {
        // Check if critical fonts are loading
        if (document.fonts && document.fonts.check) {
            const criticalFonts = ['Oswald', 'Montserrat'];
            criticalFonts.forEach(font => {
                if (!document.fonts.check(`16px ${font}`)) {
                    console.log(`⏳ Loading critical font: ${font}`);
                }
            });
        }
    };
    
    // Critical image loading hints
    const optimizeCriticalImages = () => {
        // Find hero/LCP images and optimize their loading
        const heroImages = document.querySelectorAll('.hero-image, .lcp-critical, [fetchpriority="high"]');
        heroImages.forEach(img => {
            if (img.loading !== 'eager') {
                img.loading = 'eager';
            }
            if (img.decoding !== 'sync') {
                img.decoding = 'sync';
            }
        });
    };
    
    // Minimize layout shifts
    const preventLayoutShifts = () => {
        // Add aspect ratio to images without explicit dimensions
        const images = document.querySelectorAll('img:not([width]):not([height]):not([style*="aspect-ratio"])');
        images.forEach(img => {
            if (img.classList.contains('hero-image')) {
                img.style.aspectRatio = '21/9';
            } else if (img.classList.contains('gallery-image')) {
                img.style.aspectRatio = '4/3';
            } else {
                img.style.aspectRatio = '16/9';
            }
        });
    };
    
    // Critical performance optimizations
    const initCriticalOptimizations = () => {
        preloadCriticalResources();
        optimizeCriticalImages();
        preventLayoutShifts();
        
        // Mark critical JS as loaded
        document.documentElement.classList.add('critical-js-loaded');
    };
    
    // Execute immediately for FCP
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCriticalOptimizations);
    } else {
        initCriticalOptimizations();
    }
    
})();

// Minimal feature detection for progressive enhancement
window.supports = {
    webp: false,
    avif: false,
    lazyLoading: 'loading' in HTMLImageElement.prototype,
    intersectionObserver: 'IntersectionObserver' in window,
    serviceWorker: 'serviceWorker' in navigator
};

// WebP detection (minimal, fast)
(function detectWebP() {
    const webp = new Image();
    webp.onload = webp.onerror = function() {
        window.supports.webp = webp.height === 2;
        document.documentElement.classList.toggle('webp', window.supports.webp);
    };
    webp.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
})();
