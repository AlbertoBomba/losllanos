<div>
    <div class="bg-white p-6 rounded-lg shadow">
        <form wire:submit="save">
            <div class="grid grid-cols-1 gap-6">
                <!-- Título -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Título
                    </label>
                    <input type="text" 
                           wire:model="title" 
                           id="title"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Ingresa el título del post">
                    @error('title') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Extracto -->
                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">
                        Extracto (Opcional)
                    </label>
                    <textarea wire:model="excerpt" 
                              id="excerpt"
                              rows="3"
                              class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                              placeholder="Breve descripción del post"></textarea>
                    @error('excerpt') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Contenido -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Contenido
                    </label>
                    <textarea wire:model="content" 
                              id="content"
                              rows="10"
                              class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                              placeholder="Escribe el contenido del post aquí..."></textarea>
                    @error('content') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Imagen destacada -->
                @if($existing_image)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Imagen actual
                        </label>
                        <div class="relative">
                            <img src="{{ asset('storage/' . $existing_image) }}" 
                                 alt="Imagen actual" 
                                 class="w-32 h-32 object-cover rounded">
                            <button type="button" 
                                    wire:click="removeImage"
                                    class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">
                                ×
                            </button>
                        </div>
                    </div>
                @endif

                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ $existing_image ? 'Cambiar imagen destacada' : 'Imagen destacada' }}
                    </label>
                    <input type="file" 
                           wire:model="featured_image" 
                           id="featured_image"
                           accept="image/*"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('featured_image') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                    
                    @if($featured_image)
                        <div class="mt-2">
                            <img src="{{ $featured_image->temporaryUrl() }}" 
                                 alt="Vista previa" 
                                 class="w-32 h-32 object-cover rounded">
                        </div>
                    @endif
                </div>

                <!-- Estado de publicación -->
                <div class="flex items-center">
                    <input type="checkbox" 
                           wire:model="published" 
                           id="published"
                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <label for="published" class="ml-2 block text-sm text-gray-700">
                        Publicar inmediatamente
                    </label>
                </div>
            </div>

            <!-- Botones -->
            <div class="mt-6 flex items-center justify-between">
                <a href="{{ route('admin.posts.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                    Cancelar
                </a>
                
                <div class="space-x-2">
                    <button type="button" 
                            wire:click="saveAsDraft"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                        Guardar Borrador
                    </button>
                    
                    <button type="submit" 
                            wire:loading.attr="disabled"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded disabled:opacity-50">
                        <span wire:loading.remove>
                            {{ $post->exists ? 'Actualizar' : 'Crear' }} Post
                        </span>
                        <span wire:loading>
                            Guardando...
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
