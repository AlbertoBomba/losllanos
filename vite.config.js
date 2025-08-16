import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        // Advanced minification and optimization
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
                pure_funcs: ['console.log', 'console.info', 'console.debug', 'console.warn'],
                passes: 2,
            },
            mangle: {
                safari10: true,
                properties: {
                    regex: /^_/
                }
            },
            format: {
                comments: false,
            },
        },
        // Chunk splitting for better caching
        rollupOptions: {
            output: {
                manualChunks: {
                    // Separate vendor libraries
                    vendor: ['axios'],
                    // Image optimization as separate chunk
                    images: ['./resources/js/image-optimizer.js'],
                },
                // Optimize chunk naming for caching
                chunkFileNames: 'assets/js/[name]-[hash].js',
                entryFileNames: 'assets/js/[name]-[hash].js',
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name.endsWith('.css')) {
                        return 'assets/css/[name]-[hash][extname]';
                    }
                    return 'assets/[name]-[hash][extname]';
                },
            },
        },
        // Enable source maps only in dev
        sourcemap: process.env.NODE_ENV === 'development',
        // Optimize for production
        target: 'es2018',
        cssCodeSplit: true,
        // Performance budgets
        chunkSizeWarningLimit: 500,
    },
    // Optimize development server
    server: {
        hmr: {
            overlay: false,
        },
    },
    // CSS optimization
    css: {
        devSourcemap: true,
    },
});
