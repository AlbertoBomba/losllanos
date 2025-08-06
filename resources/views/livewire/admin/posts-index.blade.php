<div>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Gestión de Posts</h1>
        <a href="{{ route('admin.posts.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Nuevo Post
        </a>
    </div>

    <!-- Tabla de Posts -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Título
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($posts as $post)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            {{ Str::limit($post->title, 50) }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($post->published)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Publicado
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Borrador
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $post->created_at->format('d/m/Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <a href="{{ route('admin.posts.edit', $post) }}" 
                           class="text-blue-600 hover:text-blue-900">Editar</a>
                        
                        <button wire:click="togglePublished({{ $post->id }})" 
                                class="text-yellow-600 hover:text-yellow-900">
                            {{ $post->published ? 'Despublicar' : 'Publicar' }}
                        </button>
                        
                        <button wire:click="deletePost({{ $post->id }})" 
                                wire:confirm="¿Estás seguro de que quieres eliminar este post?"
                                class="text-red-600 hover:text-red-900">Eliminar</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                        No hay posts creados aún.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <!-- Paginación -->
        @if($posts->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</div>
