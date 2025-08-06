<div>
    <h2>Test Reviews Component</h2>
    
    @if(isset($error))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Error:</strong> {{ $error }}
        </div>
    @else
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-sm font-medium text-gray-500">Total</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] ?? 0 }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-sm font-medium text-gray-500">Aprobadas</h3>
                <p class="text-2xl font-bold text-green-600">{{ $stats['approved'] ?? 0 }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-sm font-medium text-gray-500">Pendientes</h3>
                <p class="text-2xl font-bold text-yellow-600">{{ $stats['pending'] ?? 0 }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-sm font-medium text-gray-500">Destacadas</h3>
                <p class="text-2xl font-bold text-blue-600">{{ $stats['featured'] ?? 0 }}</p>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <h3 class="text-lg font-medium p-4 border-b">Reviews</h3>
            @foreach($reviews as $review)
                <div class="p-4 border-b">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-medium">{{ $review->title }}</h4>
                            <p class="text-sm text-gray-600">por {{ $review->reviewer_name }}</p>
                            <p class="text-sm text-gray-500">{{ Str::limit($review->content, 100) }}</p>
                        </div>
                        <div class="text-right">
                            <div class="text-yellow-400">{{ $review->stars_html }}</div>
                            <div class="text-sm text-gray-500">{{ $review->created_at->format('d/m/Y') }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
