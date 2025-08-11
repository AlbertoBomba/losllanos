@props([
    'title' => '',
    'url' => '',
    'description' => '',
    'size' => 'sm', // sm, md, lg
    'showLabels' => false
])

@php
    $url = $url ?: request()->fullUrl();
    $title = $title ?: (isset($post) ? $post->title : 'Los Llanos');
    $description = $description ?: (isset($post) ? Str::limit(strip_tags($post->content), 100) : '');
    
    $sizeClasses = [
        'sm' => 'w-8 h-8 text-sm',
        'md' => 'w-10 h-10 text-base',
        'lg' => 'w-12 h-12 text-lg'
    ];
    
    $iconSize = $sizeClasses[$size] ?? $sizeClasses['sm'];
@endphp

<div class="flex items-center space-x-3" {{ $attributes }}>
    @if($showLabels)
        <span class="text-gray-700 font-semibold">Compartir:</span>
    @endif
    
    <!-- Facebook -->
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}&quote={{ urlencode($title) }}" 
       target="_blank" 
       rel="noopener noreferrer"
       class="{{ $iconSize }} bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition duration-200 hover:scale-110"
       title="Compartir en Facebook">
        <i class="fab fa-facebook-f"></i>
    </a>
    
    <!-- WhatsApp -->
    <a href="https://wa.me/?text={{ urlencode($title . ' - ' . $url) }}" 
       target="_blank" 
       rel="noopener noreferrer"
       class="{{ $iconSize }} bg-green-500 hover:bg-green-600 text-white rounded-full flex items-center justify-center transition duration-200 hover:scale-110"
       title="Compartir en WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    
    <!-- Twitter/X -->
    <a href="https://twitter.com/intent/tweet?text={{ urlencode($title) }}&url={{ urlencode($url) }}{{ $description ? '&hashtags=caza,losllanos' : '' }}" 
       target="_blank" 
       rel="noopener noreferrer"
       class="{{ $iconSize }} bg-blue-400 hover:bg-blue-500 text-white rounded-full flex items-center justify-center transition duration-200 hover:scale-110"
       title="Compartir en Twitter">
        <i class="fab fa-twitter"></i>
    </a>
    
    <!-- LinkedIn -->
    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($url) }}" 
       target="_blank" 
       rel="noopener noreferrer"
       class="{{ $iconSize }} bg-blue-700 hover:bg-blue-800 text-white rounded-full flex items-center justify-center transition duration-200 hover:scale-110"
       title="Compartir en LinkedIn">
        <i class="fab fa-linkedin-in"></i>
    </a>
    
    <!-- Telegram -->
    <a href="https://t.me/share/url?url={{ urlencode($url) }}&text={{ urlencode($title) }}" 
       target="_blank" 
       rel="noopener noreferrer"
       class="{{ $iconSize }} bg-blue-500 hover:bg-blue-600 text-white rounded-full flex items-center justify-center transition duration-200 hover:scale-110"
       title="Compartir en Telegram">
        <i class="fab fa-telegram-plane"></i>
    </a>
    
    <!-- Copiar enlace -->
    <button onclick="copyToClipboard{{ Str::random(4) }}('{{ $url }}')" 
            class="{{ $iconSize }} bg-gray-600 hover:bg-gray-700 text-white rounded-full flex items-center justify-center transition duration-200 hover:scale-110"
            title="Copiar enlace">
        <i class="fas fa-link"></i>
    </button>
</div>

<script>
    function copyToClipboard{{ Str::random(4) }}(url) {
        if (navigator.clipboard) {
            navigator.clipboard.writeText(url).then(function() {
                showNotification('Enlace copiado al portapapeles', 'success');
            }).catch(function() {
                fallbackCopyTextToClipboard(url);
            });
        } else {
            fallbackCopyTextToClipboard(url);
        }
    }
    
    function fallbackCopyTextToClipboard(text) {
        const textArea = document.createElement('textarea');
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        
        try {
            const successful = document.execCommand('copy');
            showNotification(successful ? 'Enlace copiado al portapapeles' : 'No se pudo copiar el enlace', successful ? 'success' : 'error');
        } catch (err) {
            showNotification('No se pudo copiar el enlace', 'error');
        }
        
        document.body.removeChild(textArea);
    }
    
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
        const icon = type === 'success' ? 'fa-check' : 'fa-exclamation-triangle';
        
        notification.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300 transform translate-x-full`;
        notification.innerHTML = `<i class="fas ${icon} mr-2"></i>${message}`;
        
        document.body.appendChild(notification);
        
        // Animar entrada
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        // Animar salida y remover
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                if (document.body.contains(notification)) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }
</script>
