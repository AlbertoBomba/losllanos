<div class="space-y-6">
    <!-- Título de la sección -->
    <div class="border-b border-gray-200 pb-4">
        <h3 class="text-lg font-semibold text-gray-900">
            Comentarios ({{ $post->approved_comments_count }})
        </h3>
    </div>

    <!-- Mensajes -->
    @if (session()->has('comment_success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('comment_success') }}
        </div>
    @endif

    @if (session()->has('comment_info'))
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
            {{ session('comment_info') }}
        </div>
    @endif

    @if (session()->has('comment_warning'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
            {{ session('comment_warning') }}
        </div>
    @endif

    @if (session()->has('comment_error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            {{ session('comment_error') }}
        </div>
    @endif

    <!-- Formulario para nuevo comentario -->
    <div class="bg-gray-50 rounded-lg p-6">
        <h4 class="text-md font-medium text-gray-900 mb-4">Agregar comentario</h4>
        
        <form wire:submit.prevent="submitComment" class="space-y-4">
            @if (!Auth::check())
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="author_name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input wire:model="author_name" type="text" id="author_name" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('author_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="author_email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input wire:model="author_email" type="email" id="author_email" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('author_email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            @else
                <div class="text-sm text-gray-600">
                    Comentando como <strong>{{ Auth::user()->name }}</strong>
                </div>
            @endif

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Comentario</label>
                <textarea wire:model="content" id="content" rows="4"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                          placeholder="Escribe tu comentario..."></textarea>
                @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Publicar comentario
                </button>
            </div>
        </form>
    </div>

    <!-- Lista de comentarios -->
    <div class="space-y-6">
        @forelse($comments as $comment)
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <!-- Comentario principal -->
                <div class="flex space-x-4">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center text-white font-semibold">
                            {{ substr($comment->author_name, 0, 1) }}
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center space-x-2">
                            <h4 class="text-sm font-semibold text-gray-900">{{ $comment->author_name }}</h4>
                            <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                            @if($comment->isGuest())
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">Invitado</span>
                            @endif
                        </div>
                        <div class="mt-2 text-gray-700">
                            {{ $comment->content }}
                        </div>
                        <div class="mt-3 flex items-center space-x-4">
                            @auth
                                @if($reply_to === $comment->id)
                                    <button wire:click="cancelReply" 
                                            class="text-sm text-gray-500 hover:text-gray-700">
                                        Cancelar
                                    </button>
                                @else
                                    <button wire:click="replyTo({{ $comment->id }})" 
                                            class="text-sm text-blue-600 hover:text-blue-800">
                                        Responder
                                    </button>
                                @endif
                            @endauth
                        </div>

                        <!-- Formulario de respuesta -->
                        @if($reply_to === $comment->id)
                            <div class="mt-4 bg-gray-50 rounded-lg p-4">
                                <form wire:submit.prevent="submitReply" class="space-y-3">
                                    <textarea wire:model="reply_content" rows="3"
                                              class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                              placeholder="Escribe tu respuesta..."></textarea>
                                    @error('reply_content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                    
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" wire:click="cancelReply"
                                                class="px-3 py-1 text-sm text-gray-600 hover:text-gray-800">
                                            Cancelar
                                        </button>
                                        <button type="submit"
                                                class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">
                                            Responder
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif

                        <!-- Respuestas -->
                        @if($comment->replies->count() > 0)
                            <div class="mt-4 space-y-4">
                                @foreach($comment->replies()->approved()->get() as $reply)
                                    <div class="flex space-x-4 pl-6 border-l-2 border-gray-100">
                                        <div class="flex-shrink-0">
                                            <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center text-white text-sm font-semibold">
                                                {{ substr($reply->author_name, 0, 1) }}
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-2">
                                                <h5 class="text-sm font-semibold text-gray-900">{{ $reply->author_name }}</h5>
                                                <span class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
                                                @if($reply->isGuest())
                                                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">Invitado</span>
                                                @endif
                                            </div>
                                            <div class="mt-1 text-gray-700 text-sm">
                                                {{ $reply->content }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-8 text-gray-500">
                No hay comentarios aún. ¡Sé el primero en comentar!
            </div>
        @endforelse
    </div>
</div>
