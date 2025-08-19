<!-- Cookie Consent Banner -->
<div id="cookie-banner" 
     class="fixed bottom-0 left-0 right-0 bg-white border-t-2 border-[#8b5e3c] shadow-2xl z-50 transform translate-y-full transition-transform duration-500 ease-in-out"
     style="display: none;">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            
            <!-- Cookie Icon & Message -->
            <div class="flex items-start gap-3 flex-1">
                <!-- Cookie Icon -->
                <div class="flex-shrink-0 mt-1">
                    <svg class="w-6 h-6 text-[#8b5e3c]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2C5.58 2 2 5.58 2 10s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm0 14c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6z"/>
                        <circle cx="7" cy="8" r="1"/>
                        <circle cx="13" cy="8" r="1"/>
                        <circle cx="9" cy="12" r="1"/>
                        <circle cx="11" cy="10" r="1"/>
                    </svg>
                </div>
                
                <!-- Message -->
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900 mb-1">
                        🍪 Este sitio web utiliza cookies
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Utilizamos cookies para mejorar tu experiencia de navegación, analizar el tráfico del sitio y personalizar el contenido. 
                        Al hacer clic en <strong>"Aceptar todas"</strong>, consientes el uso de todas las cookies. 
                        También puedes gestionar tus preferencias en 
                        <a href="/politica-privacidad" class="text-[#8b5e3c] hover:text-[#4b5d3a] underline font-medium">
                            nuestra política de privacidad
                        </a>.
                    </p>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 w-full sm:w-auto">
                <!-- Settings Button -->
                <button id="cookie-settings-btn" 
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    ⚙️ Configurar
                </button>
                
                <!-- Accept Button -->
                <button id="accept-cookies-btn" 
                        class="px-6 py-2 text-sm font-bold text-white bg-[#8b5e3c] hover:bg-[#4b5d3a] rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-[#8b5e3c] focus:ring-offset-2 transform hover:scale-105 shadow-lg">
                    ✅ Aceptar todas
                </button>
            </div>
            
        </div>
    </div>
</div>

<!-- Cookie Settings Modal -->
<div id="cookie-settings-modal" 
     class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
     style="display: none;">
    
    <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        
        <!-- Modal Header -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900">
                🍪 Configuración de Cookies
            </h2>
            <button id="close-modal-btn" 
                    class="text-gray-400 hover:text-gray-600 text-2xl focus:outline-none">
                ×
            </button>
        </div>
        
        <!-- Modal Content -->
        <div class="p-6 space-y-6">
            
            <!-- Essential Cookies -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">
                        🔒 Cookies Esenciales
                    </h3>
                    <span class="px-3 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                        Siempre activas
                    </span>
                </div>
                <p class="text-sm text-gray-600">
                    Estas cookies son necesarias para el funcionamiento básico del sitio web y no se pueden desactivar. 
                    Incluyen funciones como navegación, acceso a áreas seguras y funcionalidades básicas.
                </p>
            </div>
            
            <!-- Analytics Cookies -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">
                        📊 Cookies de Análisis
                    </h3>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="analytics-cookies" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#8b5e3c]/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#8b5e3c]"></div>
                    </label>
                </div>
                <p class="text-sm text-gray-600">
                    Nos ayudan a entender cómo los visitantes interactúan con nuestro sitio web recopilando información de forma anónima. 
                    Utilizamos Google Analytics para mejorar la experiencia del usuario.
                </p>
            </div>
            
            <!-- Marketing Cookies -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">
                        🎯 Cookies de Marketing
                    </h3>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="marketing-cookies" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#8b5e3c]/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#8b5e3c]"></div>
                    </label>
                </div>
                <p class="text-sm text-gray-600">
                    Se utilizan para rastrear a los visitantes en los sitios web con la intención de mostrar anuncios relevantes y atractivos 
                    para el usuario individual.
                </p>
            </div>
            
            <!-- Functional Cookies -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">
                        ⚙️ Cookies Funcionales
                    </h3>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="functional-cookies" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#8b5e3c]/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#8b5e3c]"></div>
                    </label>
                </div>
                <p class="text-sm text-gray-600">
                    Permiten que el sitio web proporcione funciones mejoradas y personalización, como recordar tus preferencias de idioma 
                    y configuraciones de usuario.
                </p>
            </div>
            
        </div>
        
        <!-- Modal Footer -->
        <div class="flex flex-col sm:flex-row gap-3 p-6 border-t border-gray-200">
            <button id="reject-all-btn" 
                    class="flex-1 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                🚫 Rechazar todas
            </button>
            <button id="save-preferences-btn" 
                    class="flex-1 px-6 py-2 text-sm font-bold text-white bg-[#8b5e3c] hover:bg-[#4b5d3a] rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-[#8b5e3c] focus:ring-offset-2 shadow-lg">
                💾 Guardar preferencias
            </button>
        </div>
        
    </div>
</div>

<script>
// Cookie Management System
class CookieManager {
    constructor() {
        this.cookieName = 'losllanos_cookie_consent';
        this.cookieExpireDays = 365;
        this.init();
    }
    
    init() {
        // Check if user has already made a choice
        if (!this.hasConsent()) {
            this.showBanner();
        }
        
        this.bindEvents();
        this.loadGoogleAnalytics();
    }
    
    bindEvents() {
        // Accept all cookies
        document.getElementById('accept-cookies-btn')?.addEventListener('click', () => {
            this.acceptAllCookies();
        });
        
        // Show settings modal
        document.getElementById('cookie-settings-btn')?.addEventListener('click', () => {
            this.showSettingsModal();
        });
        
        // Close modal
        document.getElementById('close-modal-btn')?.addEventListener('click', () => {
            this.hideSettingsModal();
        });
        
        // Reject all cookies
        document.getElementById('reject-all-btn')?.addEventListener('click', () => {
            this.rejectAllCookies();
        });
        
        // Save preferences
        document.getElementById('save-preferences-btn')?.addEventListener('click', () => {
            this.savePreferences();
        });
        
        // Close modal when clicking outside
        document.getElementById('cookie-settings-modal')?.addEventListener('click', (e) => {
            if (e.target.id === 'cookie-settings-modal') {
                this.hideSettingsModal();
            }
        });
    }
    
    showBanner() {
        const banner = document.getElementById('cookie-banner');
        if (banner) {
            banner.style.display = 'block';
            setTimeout(() => {
                banner.classList.remove('translate-y-full');
            }, 100);
        }
    }
    
    hideBanner() {
        const banner = document.getElementById('cookie-banner');
        if (banner) {
            banner.classList.add('translate-y-full');
            setTimeout(() => {
                banner.style.display = 'none';
            }, 500);
        }
    }
    
    showSettingsModal() {
        const modal = document.getElementById('cookie-settings-modal');
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            
            // Load current preferences
            this.loadCurrentPreferences();
        }
    }
    
    hideSettingsModal() {
        const modal = document.getElementById('cookie-settings-modal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }
    
    loadCurrentPreferences() {
        const preferences = this.getPreferences();
        
        document.getElementById('analytics-cookies').checked = preferences.analytics;
        document.getElementById('marketing-cookies').checked = preferences.marketing;
        document.getElementById('functional-cookies').checked = preferences.functional;
    }
    
    acceptAllCookies() {
        const preferences = {
            essential: true,
            analytics: true,
            marketing: true,
            functional: true,
            timestamp: new Date().toISOString()
        };
        
        this.saveConsentPreferences(preferences);
        this.hideBanner();
        this.hideSettingsModal();
        this.loadGoogleAnalytics();
        
        console.log('✅ Todas las cookies aceptadas');
    }
    
    rejectAllCookies() {
        const preferences = {
            essential: true, // Always required
            analytics: false,
            marketing: false,
            functional: false,
            timestamp: new Date().toISOString()
        };
        
        this.saveConsentPreferences(preferences);
        this.hideBanner();
        this.hideSettingsModal();
        
        console.log('🚫 Cookies no esenciales rechazadas');
    }
    
    savePreferences() {
        const preferences = {
            essential: true, // Always required
            analytics: document.getElementById('analytics-cookies').checked,
            marketing: document.getElementById('marketing-cookies').checked,
            functional: document.getElementById('functional-cookies').checked,
            timestamp: new Date().toISOString()
        };
        
        this.saveConsentPreferences(preferences);
        this.hideBanner();
        this.hideSettingsModal();
        
        if (preferences.analytics) {
            this.loadGoogleAnalytics();
        }
        
        console.log('💾 Preferencias guardadas:', preferences);
    }
    
    saveConsentPreferences(preferences) {
        const cookieValue = JSON.stringify(preferences);
        const expireDate = new Date();
        expireDate.setTime(expireDate.getTime() + (this.cookieExpireDays * 24 * 60 * 60 * 1000));
        
        document.cookie = `${this.cookieName}=${cookieValue}; expires=${expireDate.toUTCString()}; path=/; SameSite=Lax`;
    }
    
    hasConsent() {
        return this.getCookie(this.cookieName) !== null;
    }
    
    getPreferences() {
        const cookieValue = this.getCookie(this.cookieName);
        if (cookieValue) {
            try {
                return JSON.parse(cookieValue);
            } catch (e) {
                console.error('Error parsing cookie preferences:', e);
                return this.getDefaultPreferences();
            }
        }
        return this.getDefaultPreferences();
    }
    
    getDefaultPreferences() {
        return {
            essential: true,
            analytics: false,
            marketing: false,
            functional: false
        };
    }
    
    getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
    
    loadGoogleAnalytics() {
        const preferences = this.getPreferences();
        
        if (preferences.analytics && !window.gtag) {
            // Load Google Analytics
            const script = document.createElement('script');
            script.async = true;
            script.src = 'https://www.googletagmanager.com/gtag/js?id=G-Z16ZCQ3398';
            document.head.appendChild(script);
            
            script.onload = () => {
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                window.gtag = gtag;
                gtag('js', new Date());
                gtag('config', 'G-Z16ZCQ3398', {
                    anonymize_ip: true,
                    cookie_flags: 'SameSite=Lax;Secure'
                });
                
                console.log('📊 Google Analytics cargado con consentimiento');
            };
        }
    }
    
    // Public method to check if specific cookie type is allowed
    isAllowed(type) {
        const preferences = this.getPreferences();
        return preferences[type] || false;
    }
    
    // Public method to revoke consent (for privacy policy page)
    revokeConsent() {
        document.cookie = `${this.cookieName}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
        location.reload();
    }
}

// Initialize cookie manager when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.cookieManager = new CookieManager();
});
</script>
