// Critical JavaScript - loads immediately for FCP
import './bootstrap';

// Performance optimization: Load non-critical modules after page load
const loadNonCriticalModules = () => {
    // Lazy load image optimizer after page load
    import('./image-optimizer')
        .then(module => {
            console.log('🖼️ Image optimizer loaded');
        })
        .catch(err => console.warn('Failed to load image optimizer:', err));
    
    // Load lazy loading if needed
    if (document.querySelector('.lazy-image, [data-src]')) {
        import('./lazy-loading')
            .then(module => {
                console.log('🔄 Lazy loading module loaded');
            })
            .catch(err => console.warn('Lazy loading module not found or failed:', err));
    }

    // Load home page features only on home page
    if (document.body.classList.contains('home-page') || 
        document.querySelector('#reviewsCarousel, #happy-travelers, .star')) {
        import('./home-features')
            .then(module => {
                console.log('🏠 Home features loaded');
            })
            .catch(err => console.warn('Home features module not found or failed:', err));
    }
};

// Load non-critical modules after page load
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        // Small delay to prioritize FCP
        setTimeout(loadNonCriticalModules, 100);
    });
} else {
    // Page already loaded
    setTimeout(loadNonCriticalModules, 0);
}
