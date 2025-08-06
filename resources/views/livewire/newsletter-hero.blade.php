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
                       class="flex-1 px-4 py-3 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-600' }} bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <button type="submit" 
                        wire:loading.attr="disabled"
                        class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 disabled:opacity-50">
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
