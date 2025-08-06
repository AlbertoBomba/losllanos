<div>
    <!-- Estadísticas -->
    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Total</h3>
            <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Activos</h3>
            <p class="text-2xl font-bold text-green-600">{{ $stats['active'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Inactivos</h3>
            <p class="text-2xl font-bold text-red-600">{{ $stats['inactive'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-sm font-medium text-gray-500">Últimos 30 días</h3>
            <p class="text-2xl font-bold text-blue-600">{{ $stats['recent'] }}</p>
        </div>
    </div>

    <!-- Filtros y búsqueda -->
    <div class="bg-white rounded-lg shadow mb-6 p-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700">Buscar por email</label>
                <input wire:model.live="search" type="text" id="search" 
                       placeholder="Buscar suscriptores..."
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="statusFilter" class="block text-sm font-medium text-gray-700">Estado</label>
                <select wire:model.live="statusFilter" id="statusFilter" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="all">Todos</option>
                    <option value="active">Activos</option>
                    <option value="inactive">Inactivos</option>
                </select>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- Tabla de Suscriptores -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Suscrito
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Baja
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Motivo de baja
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($subscribers as $subscriber)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $subscriber->email }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $subscriber->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $subscriber->is_active ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $subscriber->subscribed_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $subscriber->unsubscribed_at ? $subscriber->unsubscribed_at->format('d/m/Y H:i') : '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                            {{ $subscriber->unsubscribe_reason ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            <button wire:click="toggleStatus({{ $subscriber->id }})"
                                    class="text-indigo-600 hover:text-indigo-900">
                                {{ $subscriber->is_active ? 'Desactivar' : 'Reactivar' }}
                            </button>
                            
                            @if($subscriber->unsubscribe_token)
                                <a href="{{ route('newsletter.unsubscribe', $subscriber->unsubscribe_token) }}" 
                                   target="_blank"
                                   class="text-blue-600 hover:text-blue-900">
                                    Ver enlace baja
                                </a>
                            @endif
                            
                            <button wire:click="deleteSubscriber({{ $subscriber->id }})"
                                    onclick="return confirm('¿Estás seguro?')"
                                    class="text-red-600 hover:text-red-900">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            No hay suscriptores que coincidan con los criterios.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="px-6 py-3 border-t border-gray-200">
            {{ $subscribers->links() }}
        </div>
    </div>
</div>
