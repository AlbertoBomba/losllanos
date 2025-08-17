<div class="max-w-md mx-auto">
    @if($isSubscribed)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ $message }}
        </div>
    @else
        <form wire:submit="subscribe">
            <div class="flex flex-col sm:flex-row gap-4">
                <input type="email" 
                       wire:model="email" 
                       placeholder="Ingresa tu email" 
                       required
                       class="flex-1 px-4 text-black py-3 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-600' }}  placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <button type="submit" 
                        wire:loading.attr="disabled"
                        class="px-8 py-3  text-white font-semibold rounded-lg  focus:outline-none focus:ring-2 transition duration-300 disabled:opacity-50 bg-[#8b5e3c] hover:bg-[#4b5d3a]">
                    <span wire:loading.remove>Suscribirse</span>
                    <span wire:loading>Suscribiendo...</span>
                </button>
            </div>
            
            @error('email')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </form>
    @endif
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('newsletter-subscribed', () => {
            // Función para marcar suscripción usando múltiples métodos
            function markSubscription() {
                const currentDate = new Date().toISOString();
                
                // Método 1: localStorage (persistente)
                try {
                    localStorage.setItem('newsletter_subscribed', 'true');
                    localStorage.setItem('newsletter_subscribed_date', currentDate);
                } catch(e) {
                    console.log('localStorage no disponible:', e);
                }
                
                // Método 2: Cookie (persistente, funciona si localStorage falla)
                function setCookie(name, value, days) {
                    const expires = new Date();
                    expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
                    document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/;SameSite=Lax`;
                }
                
                setCookie('newsletter_subscribed', 'true', 30);
                setCookie('newsletter_subscribed_date', currentDate, 30);
                
                // Método 3: sessionStorage (para esta sesión)
                try {
                    sessionStorage.setItem('newsletter_subscribed_session', 'true');
                } catch(e) {
                    console.log('sessionStorage no disponible:', e);
                }
            }
            
            markSubscription();
            
            // Cerrar cualquier modal abierto relacionado con newsletters
            const calendarModal = document.getElementById('calendarioModal');
            if (calendarModal && !calendarModal.classList.contains('hidden')) {
                calendarModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });
    });
</script>
