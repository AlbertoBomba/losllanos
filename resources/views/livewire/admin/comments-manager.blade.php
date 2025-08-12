<div>
    <!-- Estadísticas -->
    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Total</h3>
            <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Aprobados</h3>
            <p class="text-2xl font-bold text-green-600">{{ $stats['approved'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Pendientes</h3>
            <p class="text-2xl font-bold text-yellow-600">{{ $stats['pending'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Spam</h3>
            <p class="text-2xl font-bold text-red-600">{{ $stats['spam'] }}</p>
        </div>
    </div>

    <!-- Controles de Spam Detection -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
        <h3 class="text-lg font-medium text-blue-900 mb-3">🛡️ Detección de Spam</h3>
        <div class="flex space-x-4">
            <button wire:click="analyzeAllPending" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                Analizar Comentarios Pendientes
            </button>
            <button wire:click="trainSpamDetector" 
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                Entrenar Detector
            </button>
        </div>
        <p class="text-sm text-blue-700 mt-2">
            <strong>Analizar Pendientes:</strong> Revisa todos los comentarios pendientes con el detector de spam.<br>
            <strong>Entrenar Detector:</strong> Mejora la precisión del detector basándose en comentarios ya clasificados.
        </p>
    </div>

    <!-- Filtros -->
    <div class="bg-white rounded-lg shadow mb-6 p-4">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700">Buscar</label>
                <input wire:model.live="search" type="text" id="search" 
                       placeholder="Buscar por contenido, autor..."
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="statusFilter" class="block text-sm font-medium text-gray-700">Estado</label>
                <select wire:model.live="statusFilter" id="statusFilter" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="all">Todos</option>
                    <option value="approved">Aprobados</option>
                    <option value="pending">Pendientes</option>
                    <option value="spam">Spam</option>
                </select>
            </div>
            <div>
                <label for="postFilter" class="block text-sm font-medium text-gray-700">Post</label>
                <input wire:model.live="postFilter" type="text" id="postFilter" 
                       placeholder="Filtrar por post..."
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- Lista de comentarios -->
    <div class="bg-green-100 k rounded-lg shadow overflow-hidden w-full">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Comentario
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Autor
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Post
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Spam Score
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($comments as $comment)
                    <tr class="{{ $comment->parent_id ? 'bg-blue-50' : '' }}">
                        <td class="px-6 py-4">
                            @if($comment->parent_id)
                                <div class="text-xs text-gray-500 mb-1">↳ Respuesta a:</div>
                                <div class="text-xs text-gray-400 italic mb-2 pl-4 border-l-2 border-gray-200">
                                    {{ Str::limit($comment->parent->content, 50) }}
                                </div>
                            @endif
                            <div class="text-sm text-gray-900 max-w-md">
                                {{ Str::limit($comment->content, 100) }}
                            </div>
                            @if($comment->ip_address)
                                <div class="text-xs text-gray-400 mt-1">IP: {{ $comment->ip_address }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center text-white text-sm font-semibold mr-3">
                                    {{ substr($comment->author_name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $comment->author_name }}</div>
                                    <div class="text-sm text-gray-500">{{ $comment->author_email }}</div>
                                    @if($comment->user)
                                        <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded">Registrado</span>
                                    @else
                                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">Invitado</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ Str::limit($comment->post->title, 30) }}</div>
                            <a href="{{ route('blog-de-caza.show', $comment->post->slug) }}" target="_blank"
                               class="text-xs text-blue-600 hover:text-blue-800">Ver post</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($comment->is_spam)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Spam
                                </span>
                            @elseif($comment->is_approved)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Aprobado
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pendiente
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($comment->spam_score > 0)
                                <div class="text-sm">
                                    <span class="font-medium 
                                        @if($comment->spam_score >= 15) text-red-600
                                        @elseif($comment->spam_score >= 10) text-orange-600  
                                        @elseif($comment->spam_score >= 5) text-yellow-600
                                        @else text-green-600 @endif">
                                        {{ $comment->spam_score }}
                                    </span>
                                    @if($comment->spam_reasons && count($comment->spam_reasons) > 0)
                                        <div class="text-xs text-gray-500 mt-1" title="{{ implode(', ', $comment->spam_reasons) }}">
                                            {{ count($comment->spam_reasons) }} razón(es)
                                        </div>
                                    @endif
                                </div>
                            @else
                                <span class="text-xs text-gray-400">No analizado</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $comment->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            @if(!$comment->is_approved && !$comment->is_spam)
                                <button wire:click="approveComment({{ $comment->id }})"
                                        class="text-green-600 hover:text-green-900">
                                    Aprobar
                                </button>
                            @endif
                            
                            @if($comment->is_approved)
                                <button wire:click="rejectComment({{ $comment->id }})"
                                        class="text-yellow-600 hover:text-yellow-900">
                                    Rechazar
                                </button>
                            @endif
                            
                            @if(!$comment->is_spam)
                                <button wire:click="markAsSpam({{ $comment->id }})"
                                        class="text-orange-600 hover:text-orange-900">
                                    Spam
                                </button>
                            @endif
                            
                            <button wire:click="analyzeComment({{ $comment->id }})"
                                    class="text-blue-600 hover:text-blue-900" 
                                    title="Analizar con detector de spam">
                                🔍 Analizar
                            </button>
                            
                            <button wire:click="deleteComment({{ $comment->id }})"
                                    onclick="return confirm('¿Estás seguro?')"
                                    class="text-red-600 hover:text-red-900">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                            No hay comentarios que coincidan con los criterios.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="px-6 py-3 border-t border-gray-200">
            {{ $comments->links() }}
        </div>
    </div>
</div>
