<div>
    <!-- Estadísticas -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Total</h3>
            <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Aprobadas</h3>
            <p class="text-2xl font-bold text-green-600">{{ $stats['approved'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Pendientes</h3>
            <p class="text-2xl font-bold text-yellow-600">{{ $stats['pending'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Destacadas</h3>
            <p class="text-2xl font-bold text-blue-600">{{ $stats['featured'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Valoración Media</h3>
            <div class="flex items-center">
                <p class="text-2xl font-bold text-yellow-600">{{ $stats['average_rating'] }}</p>
                <span class="text-yellow-400 ml-2">★</span>
            </div>
        </div>
    </div>

    <!-- Distribución de estrellas -->
    <div class="bg-white rounded-lg shadow mb-6 p-4">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Distribución de Valoraciones</h3>
        <div class="grid grid-cols-5 gap-4 text-center">
            <div>
                <div class="text-yellow-400 text-xl">★★★★★</div>
                <div class="text-sm text-gray-500">{{ $stats['total_5_stars'] }}</div>
            </div>
            <div>
                <div class="text-yellow-400 text-xl">★★★★☆</div>
                <div class="text-sm text-gray-500">{{ $stats['total_4_stars'] }}</div>
            </div>
            <div>
                <div class="text-yellow-400 text-xl">★★★☆☆</div>
                <div class="text-sm text-gray-500">{{ $stats['total_3_stars'] }}</div>
            </div>
            <div>
                <div class="text-yellow-400 text-xl">★★☆☆☆</div>
                <div class="text-sm text-gray-500">{{ $stats['total_2_stars'] }}</div>
            </div>
            <div>
                <div class="text-yellow-400 text-xl">★☆☆☆☆</div>
                <div class="text-sm text-gray-500">{{ $stats['total_1_star'] }}</div>
            </div>
        </div>
    </div>

    <!-- Acciones rápidas -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
        <h3 class="text-lg font-medium text-blue-900 mb-3">⚡ Acciones Rápidas</h3>
        <div class="flex space-x-4">
            <button wire:click="approveAllPending" 
                    onclick="return confirm('¿Aprobar todas las reseñas pendientes?')"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                Aprobar Todas las Pendientes
            </button>
        </div>
    </div>

    <!-- Filtros -->
    <div class="bg-white rounded-lg shadow mb-6 p-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700">Buscar</label>
                <input wire:model.live="search" type="text" id="search" 
                       placeholder="Nombre, contenido, ubicación..."
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="statusFilter" class="block text-sm font-medium text-gray-700">Estado</label>
                <select wire:model.live="statusFilter" id="statusFilter" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="all">Todas</option>
                    <option value="approved">Aprobadas</option>
                    <option value="pending">Pendientes</option>
                    <option value="featured">Destacadas</option>
                </select>
            </div>
            <div>
                <label for="ratingFilter" class="block text-sm font-medium text-gray-700">Valoración</label>
                <select wire:model.live="ratingFilter" id="ratingFilter" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="all">Todas</option>
                    <option value="5">5 estrellas</option>
                    <option value="4">4 estrellas</option>
                    <option value="3">3 estrellas</option>
                    <option value="2">2 estrellas</option>
                    <option value="1">1 estrella</option>
                </select>
            </div>
            <div>
                <label for="serviceFilter" class="block text-sm font-medium text-gray-700">Servicio</label>
                <input wire:model.live="serviceFilter" type="text" id="serviceFilter" 
                       placeholder="Tipo de servicio..."
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- Lista de reseñas -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Reseña
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cliente
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Valoración
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
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
                @forelse($reviews as $review)
                    <tr class="{{ $review->is_featured ? 'bg-blue-50' : '' }}">
                        <td class="px-6 py-4">
                            <div class="max-w-md">
                                <div class="font-medium text-gray-900">
                                    {{ $review->title }}
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    {{ Str::limit($review->content, 150) }}
                                </div>
                                @if($review->service_type)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mt-2">
                                        {{ $review->service_type }}
                                    </span>
                                @endif
                                @if($review->spam_score > 0)
                                    <div class="text-xs text-gray-500 mt-1">
                                        Spam Score: <span class="font-medium">{{ $review->spam_score }}</span>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $review->reviewer_name }}
                            </div>
                            @if($review->reviewer_location)
                                <div class="text-sm text-gray-500">
                                    📍 {{ $review->reviewer_location }}
                                </div>
                            @endif
                            @if($review->reviewer_email)
                                <div class="text-xs text-gray-400 mt-1">
                                    {{ $review->reviewer_email }}
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="text-lg">
                                    {!! $review->stars_html !!}
                                </div>
                                <span class="ml-2 text-sm text-gray-600">
                                    ({{ $review->rating }}/5)
                                </span>
                            </div>
                            <div class="text-xs text-gray-500 mt-1">
                                {{ $review->rating_text }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="space-y-1">
                                @if($review->is_approved)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Aprobada
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pendiente
                                    </span>
                                @endif
                                
                                @if($review->is_featured)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Destacada
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $review->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-y-1">
                            <div class="flex flex-col space-y-1">
                                @if(!$review->is_approved)
                                    <button wire:click="approveReview({{ $review->id }})"
                                            class="text-green-600 hover:text-green-900 text-xs">
                                        ✓ Aprobar
                                    </button>
                                @else
                                    <button wire:click="rejectReview({{ $review->id }})"
                                            class="text-yellow-600 hover:text-yellow-900 text-xs">
                                        ⏸ Rechazar
                                    </button>
                                @endif
                                
                                @if(!$review->is_featured)
                                    <button wire:click="featureReview({{ $review->id }})"
                                            class="text-blue-600 hover:text-blue-900 text-xs">
                                        ⭐ Destacar
                                    </button>
                                @else
                                    <button wire:click="unfeatureReview({{ $review->id }})"
                                            class="text-gray-600 hover:text-gray-900 text-xs">
                                        ⭐ Quitar dest.
                                    </button>
                                @endif
                                
                                <button wire:click="analyzeReview({{ $review->id }})"
                                        class="text-purple-600 hover:text-purple-900 text-xs">
                                    🔍 Analizar
                                </button>
                                
                                <button wire:click="deleteReview({{ $review->id }})"
                                        onclick="return confirm('¿Estás seguro?')"
                                        class="text-red-600 hover:text-red-900 text-xs">
                                    🗑 Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            No hay reseñas que coincidan con los criterios.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="px-6 py-3 border-t border-gray-200">
            {{ $reviews->links() }}
        </div>
    </div>
</div>
