<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TestPingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\ContactController;
use App\Models\Post;

// RUTAS PÚBLICAS
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog-de-caza', [HomeController::class, 'showBlogs'])->name('blog-de-caza');
Route::get('/blog-de-caza/{slug}', [HomeController::class, 'showBlog'])->name('blog-de-caza.show');

Route::get('/productos', [HomeController::class, 'products'])->name('productos');
Route::get('/productos/aves-de-caza', [HomeController::class, 'showAvesCaza'])->name('productos.aves-de-caza');
Route::get('/productos/sueltas', [HomeController::class, 'showTiradas'])->name('productos.sueltas');
Route::get('/productos/aves-de-caza/perdices', [HomeController::class, 'perdices'])->name('productos.aves-de-caza.perdices');
Route::get('/productos/aves-de-caza/faisanes', [HomeController::class, 'faisanes'])->name('productos.aves-de-caza.faisanes');
Route::get('/productos/aves-de-caza/codornices', [HomeController::class, 'codornices'])->name('productos.aves-de-caza.codornices');
Route::get('/productos/aves-de-caza/palomas', [HomeController::class, 'palomas'])->name('productos.aves-de-caza.palomas');

// PÁGINAS INSTITUCIONALES
Route::view('/quienes-somos', 'frontend.quienes-somos')->name('quienes-somos');

// RESEÑAS
Route::get('/reseñas', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reseñas/escribir', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reseñas', [ReviewController::class, 'store'])->name('reviews.store');

// CONTACTO
Route::get('/contacto', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

// PÁGINAS LEGALES
Route::view('/politica-privacidad', 'frontend.politica-privacidad')->name('politica-privacidad');
Route::view('/terminos-condiciones', 'frontend.terminos-condiciones')->name('terminos-condiciones');

// REDIRECCIONES DE LA WEB ANTIGUA
// Estas rutas redirigen URLs antiguas a las nuevas ubicaciones
Route::redirect('/producto', '/productos', 301);
Route::redirect('/product', '/productos', 301);
Route::redirect('/products', '/productos', 301);
Route::redirect('/catalogo', '/productos', 301);
Route::redirect('/aves', '/productos/aves-de-caza', 301);
Route::redirect('/perdiz', '/productos/aves-de-caza/perdices', 301);
Route::redirect('/perdices', '/productos/aves-de-caza/perdices', 301);
Route::redirect('/faisan', '/productos/aves-de-caza/faisanes', 301);
Route::redirect('/faisanes', '/productos/aves-de-caza/faisanes', 301);
Route::redirect('/codorniz', '/productos/aves-de-caza/codornices', 301);
Route::redirect('/codornices', '/productos/aves-de-caza/codornices', 301);
Route::redirect('/paloma', '/productos/aves-de-caza/palomas', 301);
Route::redirect('/palomas', '/productos/aves-de-caza/palomas', 301);
Route::redirect('/tiradas', '/productos/sueltas', 301);
Route::redirect('/sueltas', '/productos/sueltas', 301);
Route::redirect('/blog', '/blog-de-caza', 301);
Route::redirect('/noticias', '/blog-de-caza', 301);

// RUTAS DE SITEMAP Y SEO
Route::get('/sitemap.xml', [SitemapController::class, 'generate'])->name('sitemap');
Route::get('/sitemap_index.xml', function() {
    return response(file_get_contents(public_path('sitemap_index.xml')))
           ->header('Content-Type', 'application/xml');
})->name('sitemap.index');

Route::get('/sitemap-pages.xml', function() {
    return response(file_get_contents(public_path('sitemap-pages.xml')))
           ->header('Content-Type', 'application/xml');
})->name('sitemap.pages');

Route::get('/sitemap-posts.xml', function() {
    return response(file_get_contents(public_path('sitemap-posts.xml')))
           ->header('Content-Type', 'application/xml');
})->name('sitemap.posts');

Route::get('/sitemap-products.xml', function() {
    return response(file_get_contents(public_path('sitemap-products.xml')))
           ->header('Content-Type', 'application/xml');
})->name('sitemap.products');

Route::get('/robots.txt', [SitemapController::class, 'robotsTxt'])->name('robots.txt');

// RUTAS DE NEWSLETTER (públicas)
Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::post('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'processUnsubscribe'])->name('newsletter.unsubscribe.process');
Route::get('/newsletter/resubscribe/{token}', [NewsletterController::class, 'resubscribe'])->name('newsletter.resubscribe');

// RUTAS ADMINISTRATIVAS (requieren autenticación)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard principal
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Gestión de Posts con Livewire
    Route::get('/posts', function () {
        return view('admin.posts.index');
    })->name('posts.index');
    
    Route::get('/posts/create', function () {
        return view('admin.posts.create');
    })->name('posts.create');
    
    Route::get('/posts/{post}/edit', function (Post $post) {
        return view('admin.posts.edit', ['post' => $post]);
    })->name('posts.edit');
    
    // Gestión de Newsletter con Livewire
    Route::get('/newsletters', function () {
        return view('admin.newsletters.index');
    })->name('newsletters.index');
    
    // Gestión de Comentarios
    Route::get('/comments', function () {
        return view('admin.comments');
    })->name('comments.index');
    
    // Gestión de Reseñas
    Route::get('/reviews', function () {
        return view('admin.reviews');
    })->name('reviews.index');
    
    // Analytics Dashboard
    Route::prefix('analytics')->group(function () {
        Route::get('/dashboard', [AnalyticsController::class, 'dashboard'])->name('analytics.dashboard');
        Route::get('/realtime', [AnalyticsController::class, 'realTime'])->name('analytics.realtime');
        Route::get('/pages', [AnalyticsController::class, 'pages'])->name('analytics.pages');
        Route::get('/visitors', [AnalyticsController::class, 'visitors'])->name('analytics.visitors');
        Route::get('/traffic', [AnalyticsController::class, 'traffic'])->name('analytics.traffic');
        Route::get('/keywords', [AnalyticsController::class, 'keywords'])->name('analytics.keywords');
        Route::get('/keywords/history/{keyword}', [AnalyticsController::class, 'keywordHistory'])->name('analytics.keywords.history');
        Route::get('/export', [AnalyticsController::class, 'export'])->name('analytics.export');
    });
    
    // Gestión de Sitemap
    Route::prefix('sitemap')->group(function () {
        Route::get('/', [SitemapController::class, 'index'])->name('sitemap.index');
        Route::get('/generate', [SitemapController::class, 'generateSitemap'])->name('sitemap.generate');
        Route::get('/download', [SitemapController::class, 'downloadSitemap'])->name('sitemap.download');
        Route::get('/preview', [SitemapController::class, 'previewSitemap'])->name('sitemap.preview');
        Route::get('/json', [SitemapController::class, 'jsonSitemap'])->name('sitemap.json');
        Route::post('/update', [SitemapController::class, 'updateSitemap'])->name('sitemap.update');
    });
});

// Dashboard estándar de Jetstream
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// RUTAS DE TESTING PARA SITEMAP PING
Route::get('/test-ping-sitemap', [TestPingController::class, 'testPing'])->name('test.ping.sitemap');
Route::get('/test-ping-view', [TestPingController::class, 'testView'])->name('test.ping.view');
