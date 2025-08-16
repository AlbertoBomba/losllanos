{{--
    Optimized Image Component for LCP Improvement
    Usage: @include('components.optimized-image', [
        'src' => '/images/example.jpg',
        'alt' => 'Description',
        'class' => 'hero-image',
        'critical' => true,
        'sizes' => '(max-width: 768px) 100vw, 50vw'
    ])
--}}

@php
    // Default values
    $src = $src ?? '';
    $alt = $alt ?? '';
    $class = $class ?? 'responsive-image';
    $critical = $critical ?? false;
    $sizes = $sizes ?? null;
    $loading = $critical ? 'eager' : 'lazy';
    $fetchpriority = $critical ? 'high' : 'auto';
    $decoding = $critical ? 'sync' : 'async';
    
    // Generate responsive sources
    $webpSrc = str_replace(['.jpg', '.jpeg', '.png'], '.webp', $src);
    $fallbackSrc = $src;
    
    // Add critical classes
    $classes = collect([$class]);
    if ($critical) {
        $classes->push('lcp-critical');
    } else {
        $classes->push('lazy-image');
    }
    
    // Generate srcset for responsive images
    $srcset = null;
    if ($sizes) {
        $baseName = pathinfo($src, PATHINFO_FILENAME);
        $extension = pathinfo($src, PATHINFO_EXTENSION);
        $directory = dirname($src);
        
        $srcset = collect([400, 800, 1200, 1600])
            ->map(fn($width) => "$directory/$baseName-{$width}w.$extension {$width}w")
            ->implode(', ');
    }
@endphp

<div class="image-container {{ $critical ? 'critical' : 'lazy' }}">
    <picture class="modern-image">
        {{-- WebP source for modern browsers --}}
        @if(file_exists(public_path($webpSrc)))
            <source 
                srcset="{{ asset($webpSrc) }}" 
                type="image/webp"
                @if($sizes) sizes="{{ $sizes }}" @endif
            >
        @endif
        
        {{-- Fallback for older browsers --}}
        <img 
            src="{{ $critical ? asset($src) : '' }}"
            @if(!$critical) data-src="{{ asset($src) }}" @endif
            @if($srcset) srcset="{{ $srcset }}" @endif
            @if($sizes) sizes="{{ $sizes }}" @endif
            alt="{{ $alt }}"
            class="{{ $classes->implode(' ') }}"
            loading="{{ $loading }}"
            fetchpriority="{{ $fetchpriority }}"
            decoding="{{ $decoding }}"
            @if(!$critical) data-fallback="{{ asset('images/placeholder.jpg') }}" @endif
        >
    </picture>
    
    {{-- Loading indicator for non-critical images --}}
    @if(!$critical)
        <div class="loading-indicator" aria-hidden="true"></div>
    @endif
</div>

{{-- Preload critical images --}}
@if($critical)
    @push('head')
        <link rel="preload" as="image" href="{{ asset($src) }}" fetchpriority="high">
        @if(file_exists(public_path($webpSrc)))
            <link rel="preload" as="image" href="{{ asset($webpSrc) }}" type="image/webp" fetchpriority="high">
        @endif
    @endpush
@endif
