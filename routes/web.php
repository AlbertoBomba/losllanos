<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
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
Route::redirect('/contacto', '/', 301);
Route::redirect('/contact', '/', 301);


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
});

// Dashboard estándar de Jetstream
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
