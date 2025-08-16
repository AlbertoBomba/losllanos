/**
 * Home Page Interactive Features - Optimized & Minified
 * Handles carousel, ratings, modals, and animations
 * Loads after critical resources for better FCP
 */

class HomePageController {
    constructor() {
        this.isInitialized = false;
        this.components = {
            dropdown: null,
            carousel: null,
            modal: null,
            rating: null,
            captcha: null
        };
        
        this.init();
    }

    init() {
        if (this.isInitialized) return;
        
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.initializeComponents());
        } else {
            this.initializeComponents();
        }
    }

    initializeComponents() {
        try {
            this.initDropdown();
            this.initCounterAnimations();
            this.initScrollToTop();
            this.initReviewsCarousel();
            this.initModal();
            this.initStarRating();
            this.initCaptcha();
            this.initServiceFilters();
            this.initBackgroundAnimation();
            this.initReviewSystem();
            
            this.isInitialized = true;
            console.log('🏠 Home page components initialized');
        } catch (error) {
            console.warn('Error initializing home components:', error);
        }
    }

    // Dropdown menu with optimized event handling
    initDropdown() {
        const dropdown = document.querySelector('.group');
        if (!dropdown) return;

        const menu = dropdown.querySelector('div[class*="absolute"]');
        let timeoutId;

        const showMenu = () => {
            clearTimeout(timeoutId);
            menu?.classList.remove('opacity-0', 'invisible');
            menu?.classList.add('opacity-100', 'visible');
        };

        const hideMenu = () => {
            timeoutId = setTimeout(() => {
                menu?.classList.remove('opacity-100', 'visible');
                menu?.classList.add('opacity-0', 'invisible');
            }, 150);
        };

        dropdown.addEventListener('mouseenter', showMenu, { passive: true });
        dropdown.addEventListener('mouseleave', hideMenu, { passive: true });
        menu?.addEventListener('mouseenter', () => clearTimeout(timeoutId), { passive: true });
        menu?.addEventListener('mouseleave', hideMenu, { passive: true });

        this.components.dropdown = { dropdown, menu };
    }

    // Optimized counter animations
    initCounterAnimations() {
        const statsSection = document.querySelector('#happy-travelers');
        if (!statsSection) return;

        const animateCounter = (elementId, target, suffix = '') => {
            const element = document.getElementById(elementId);
            if (!element) return;

            let current = 0;
            const increment = target / 50; // Reduced iterations for performance
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current) + suffix;
            }, 30);
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter('happy-travelers', 800);
                    animateCounter('years-experience', 30);
                    animateCounter('positive-reviews', 96, '%');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        observer.observe(statsSection.closest('section'));
    }

    // Scroll to top with throttling
    initScrollToTop() {
        const btn = document.getElementById('scrollToTop');
        if (!btn) return;

        let ticking = false;
        const updateScrollBtn = () => {
            const isVisible = window.pageYOffset > 300;
            btn.classList.toggle('opacity-0', !isVisible);
            btn.classList.toggle('invisible', !isVisible);
            btn.classList.toggle('opacity-100', isVisible);
            btn.classList.toggle('visible', isVisible);
            ticking = false;
        };

        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(updateScrollBtn);
                ticking = true;
            }
        }, { passive: true });

        btn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Service filter functionality
    initServiceFilters() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const serviceCards = document.querySelectorAll('.service-card');
        const servicesGrid = document.getElementById('servicesGrid');

        if (!filterButtons.length || !serviceCards.length || !servicesGrid) return;

        // Function to filter cards
        const filterCards = (filter) => {
            let delay = 0;
            
            // First, fade out all cards
            serviceCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.transition = 'all 0.4s ease-in-out';
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(-10px) scale(0.95)';
                }, delay);
                delay += 50; // Stagger the fade out animations
            });
            
            // After all cards fade out, show the filtered ones
            setTimeout(() => {
                let showDelay = 0;
                
                serviceCards.forEach((card, index) => {
                    const category = card.getAttribute('data-category');
                    
                    if (category === filter) {
                        // Show card with staggered animation
                        setTimeout(() => {
                            card.style.display = 'block';
                            card.style.transition = 'all 0.6s ease-out';
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0) scale(1)';
                        }, showDelay);
                        showDelay += 100; // Stagger the fade in animations
                    } else {
                        // Hide card completely
                        card.style.display = 'none';
                    }
                });
                
                // Add a subtle bounce effect to the grid
                servicesGrid.style.transition = 'transform 0.3s ease-out';
                servicesGrid.style.transform = 'scale(0.98)';
                
                setTimeout(() => {
                    servicesGrid.style.transform = 'scale(1)';
                }, 100);
                
            }, delay + 100); // Wait for all fade out animations to complete
        };

        // Initialize with "sueltas" filter by default
        filterCards('sueltas');

        // Add click event to each filter button
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const filter = button.getAttribute('data-filter');
                
                // Update active button style
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-[#4b5d3a]', 'text-white');
                    btn.classList.add('text-gray-600', 'hover:text-[#4b5d3a]');
                });
                
                button.classList.remove('text-gray-600', 'hover:text-[#4b5d3a]');
                button.classList.add('bg-[#4b5d3a]', 'text-white');
                
                // Filter cards
                filterCards(filter);
            });
        });
    }

    // Background image animation for productos section
    initBackgroundAnimation() {
        const bgImage1 = document.querySelector('.bg-image-1');
        const bgImage2 = document.querySelector('.bg-image-2');
        
        if (!bgImage1 || !bgImage2) return;
        
        let currentImage = 1;
        
        // Function to switch background images
        const switchBackgroundImages = () => {
            if (currentImage === 1) {
                // Fade out image 1, fade in image 2
                bgImage1.style.opacity = '0';
                bgImage2.style.opacity = '0.7';
                currentImage = 2;
            } else {
                // Fade out image 2, fade in image 1
                bgImage2.style.opacity = '0';
                bgImage1.style.opacity = '0.7';
                currentImage = 1;
            }
        };
        
        // Switch images every 5 seconds
        setInterval(switchBackgroundImages, 5000);
    }

    // Review Rating System (additional features)
    initReviewSystem() {
        this.initViewMoreReviews();
        this.initReviewFormRating();
    }

    initViewMoreReviews() {
        const viewMoreBtn = document.getElementById('viewMoreBtn');
        const viewLessBtn = document.getElementById('viewLessBtn');
        const extraReviews = document.querySelectorAll('.extra-review');

        if (!viewMoreBtn || !viewLessBtn) return;

        viewMoreBtn.addEventListener('click', () => {
            // Show extra reviews with animation
            extraReviews.forEach((review, index) => {
                setTimeout(() => {
                    review.classList.remove('hidden');
                    review.style.opacity = '0';
                    review.style.transform = 'translateY(20px)';
                    
                    // Trigger animation
                    setTimeout(() => {
                        review.style.transition = 'all 0.5s ease-out';
                        review.style.opacity = '1';
                        review.style.transform = 'translateY(0)';
                    }, 10);
                }, index * 100);
            });
            
            // Switch buttons
            viewMoreBtn.classList.add('hidden');
            viewLessBtn.classList.remove('hidden');
        });

        viewLessBtn.addEventListener('click', () => {
            // Hide extra reviews with animation
            extraReviews.forEach((review, index) => {
                setTimeout(() => {
                    review.style.transition = 'all 0.3s ease-in';
                    review.style.opacity = '0';
                    review.style.transform = 'translateY(-20px)';
                    
                    setTimeout(() => {
                        review.classList.add('hidden');
                        review.style.transition = '';
                        review.style.opacity = '';
                        review.style.transform = '';
                    }, 300);
                }, index * 50);
            });
            
            // Switch buttons
            viewLessBtn.classList.add('hidden');
            viewMoreBtn.classList.remove('hidden');
            
            // Scroll back to reviews section
            const reviewsContainer = document.querySelector('#reviewsContainer');
            if (reviewsContainer) {
                reviewsContainer.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'start' 
                });
            }
        });
    }

    initReviewFormRating() {
        const stars = document.querySelectorAll('.rating-stars .star');
        const ratingInput = document.getElementById('reviewRating');
        const ratingText = document.getElementById('ratingText');
        
        if (!stars.length || !ratingInput || !ratingText) return;
        
        let currentRating = 0;

        // Rating texts
        const ratingTexts = {
            0: 'Selecciona una calificación',
            1: 'Muy malo',
            2: 'Malo',
            3: 'Regular',
            4: 'Bueno',
            5: 'Excelente'
        };

        const highlightStars = (rating) => {
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.remove('text-gray-300');
                    star.classList.add('text-yellow-400');
                } else {
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-gray-300');
                }
            });
        };

        // Handle star hover and click
        stars.forEach((star, index) => {
            star.addEventListener('mouseenter', () => {
                highlightStars(index + 1);
            });

            star.addEventListener('mouseleave', () => {
                highlightStars(currentRating);
            });

            star.addEventListener('click', () => {
                currentRating = index + 1;
                ratingInput.value = currentRating;
                ratingText.textContent = ratingTexts[currentRating];
                highlightStars(currentRating);
            });
        });

        // Store references for form reset
        this.ratingStars = { stars, ratingInput, ratingText, currentRating: () => currentRating, setRating: (rating) => { currentRating = rating; }, ratingTexts, highlightStars };
    }

    // Optimized carousel class
    initReviewsCarousel() {
        const wrapper = document.getElementById('carouselWrapper');
        if (!wrapper) return;

        this.components.carousel = new class {
            constructor() {
                this.currentSlide = 0;
                this.totalReviews = 10;
                this.reviewsPerSlide = 3;
                this.totalSlides = this.totalReviews - this.reviewsPerSlide + 1;
                this.autoPlayDelay = 4000;
                this.isHovered = false;
                this.autoPlayInterval = null;

                this.elements = {
                    wrapper: wrapper,
                    prevBtn: document.getElementById('prevReview'),
                    nextBtn: document.getElementById('nextReview'),
                    indicators: document.querySelectorAll('.indicator'),
                    cards: document.querySelectorAll('.review-card'),
                    container: document.getElementById('reviewsCarousel')
                };

                this.init();
            }

            init() {
                this.bindEvents();
                this.updateCarousel();
                this.startAutoPlay();
            }

            bindEvents() {
                this.elements.prevBtn?.addEventListener('click', () => this.goToPrevSlide());
                this.elements.nextBtn?.addEventListener('click', () => this.goToNextSlide());
                
                this.elements.indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', () => this.goToSlide(index));
                });

                if (this.elements.container) {
                    this.elements.container.addEventListener('mouseenter', () => {
                        this.isHovered = true;
                        this.stopAutoPlay();
                    }, { passive: true });

                    this.elements.container.addEventListener('mouseleave', () => {
                        this.isHovered = false;
                        this.startAutoPlay();
                    }, { passive: true });
                }
            }

            updateCarousel() {
                // Batch DOM updates
                this.elements.cards.forEach((card, index) => {
                    const shouldShow = index >= this.currentSlide && index < this.currentSlide + this.reviewsPerSlide;
                    card.style.display = shouldShow ? 'block' : 'none';
                });

                this.elements.indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === this.currentSlide);
                });

                // Update button states
                if (this.elements.prevBtn) {
                    this.elements.prevBtn.style.opacity = this.currentSlide === 0 ? '0.5' : '1';
                }
                if (this.elements.nextBtn) {
                    this.elements.nextBtn.style.opacity = this.currentSlide >= this.totalSlides - 1 ? '0.5' : '1';
                }
            }

            goToSlide(slideIndex) {
                if (slideIndex >= 0 && slideIndex < this.totalSlides) {
                    this.currentSlide = slideIndex;
                    this.updateCarousel();
                    this.resetAutoPlay();
                }
            }

            goToNextSlide() {
                this.currentSlide = this.currentSlide < this.totalSlides - 1 ? this.currentSlide + 1 : 0;
                this.updateCarousel();
                this.resetAutoPlay();
            }

            goToPrevSlide() {
                this.currentSlide = this.currentSlide > 0 ? this.currentSlide - 1 : this.totalSlides - 1;
                this.updateCarousel();
                this.resetAutoPlay();
            }

            startAutoPlay() {
                if (!this.isHovered && !this.autoPlayInterval) {
                    this.autoPlayInterval = setInterval(() => this.goToNextSlide(), this.autoPlayDelay);
                }
            }

            stopAutoPlay() {
                if (this.autoPlayInterval) {
                    clearInterval(this.autoPlayInterval);
                    this.autoPlayInterval = null;
                }
            }

            resetAutoPlay() {
                this.stopAutoPlay();
                if (!this.isHovered) {
                    this.startAutoPlay();
                }
            }
        };
    }

    // Modal functionality
    initModal() {
        const modal = document.getElementById('reviewsModal');
        if (!modal) return;

        const elements = {
            modal,
            openBtn: document.getElementById('viewAllReviews'),
            closeBtn: document.getElementById('closeModal'),
            closeFooterBtn: document.getElementById('closeModalBtn')
        };

        const hideModal = () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        };

        const showModal = () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        };

        elements.openBtn?.addEventListener('click', showModal);
        elements.closeBtn?.addEventListener('click', hideModal);
        elements.closeFooterBtn?.addEventListener('click', hideModal);
        
        modal.addEventListener('click', (e) => {
            if (e.target === modal) hideModal();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                hideModal();
            }
        });

        this.components.modal = { hideModal, showModal, elements };
    }

    // Star rating system
    initStarRating() {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('reviewRating');
        const ratingText = document.getElementById('ratingText');

        if (!stars.length || !ratingInput) return;

        const labels = ['', 'Muy malo', 'Malo', 'Regular', 'Bueno', 'Excelente'];

        stars.forEach(star => {
            star.addEventListener('click', (e) => {
                const rating = parseInt(star.getAttribute('data-rating'));
                ratingInput.value = rating;
                if (ratingText) ratingText.textContent = labels[rating];

                stars.forEach((s, index) => {
                    s.classList.toggle('text-yellow-400', index < rating);
                    s.classList.toggle('text-gray-300', index >= rating);
                });
            });
        });

        this.components.rating = { stars, ratingInput, ratingText };
    }

    // CAPTCHA system
    initCaptcha() {
        let captchaAnswer = 0;

        const generateCaptcha = () => {
            const num1 = Math.floor(Math.random() * 10) + 1;
            const num2 = Math.floor(Math.random() * 10) + 1;
            const operations = ['+', '-', '×'];
            const op = operations[Math.floor(Math.random() * operations.length)];

            let question, answer;
            
            switch(op) {
                case '+':
                    question = `${num1} + ${num2} = ?`;
                    answer = num1 + num2;
                    break;
                case '-':
                    const [larger, smaller] = [Math.max(num1, num2), Math.min(num1, num2)];
                    question = `${larger} - ${smaller} = ?`;
                    answer = larger - smaller;
                    break;
                case '×':
                    const mult1 = Math.floor(Math.random() * 5) + 1;
                    const mult2 = Math.floor(Math.random() * 5) + 1;
                    question = `${mult1} × ${mult2} = ?`;
                    answer = mult1 * mult2;
                    break;
            }

            const questionEl = document.getElementById('captchaQuestion');
            const inputEl = document.getElementById('captchaInput');
            
            if (questionEl) questionEl.textContent = question;
            if (inputEl) inputEl.value = '';
            
            captchaAnswer = answer;
        };

        // Initialize
        generateCaptcha();

        const refreshBtn = document.getElementById('refreshCaptcha');
        refreshBtn?.addEventListener('click', generateCaptcha);

        // Form submission
        const form = document.getElementById('reviewForm');
        form?.addEventListener('submit', (e) => {
            e.preventDefault();

            const formData = new FormData(form);
            const rating = formData.get('reviewRating');
            const captchaInput = parseInt(document.getElementById('captchaInput')?.value);

            if (rating === '0') {
                alert('Por favor, selecciona una calificación.');
                return;
            }

            if (isNaN(captchaInput) || captchaInput !== captchaAnswer) {
                alert('Por favor, resuelve correctamente la operación matemática.');
                generateCaptcha();
                return;
            }

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Enviando...';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('¡Gracias por tu reseña! La revisaremos antes de publicarla.');
                form.reset();
                if (this.components.rating?.ratingInput) {
                    this.components.rating.ratingInput.value = '0';
                }
                if (this.components.rating?.ratingText) {
                    this.components.rating.ratingText.textContent = 'Selecciona una calificación';
                }
                
                // Reset stars
                this.components.rating?.stars.forEach(star => {
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-gray-300');
                });

                generateCaptcha();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });

        this.components.captcha = { generateCaptcha, answer: () => captchaAnswer };
    }
}

// Initialize when DOM is ready or immediately if already loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        new HomePageController();
    });
} else {
    new HomePageController();
}

// Export for potential external use
export default HomePageController;
