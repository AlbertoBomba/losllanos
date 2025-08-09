<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Models\Post;

// RUTAS PÚBLICAS
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog-de-caza', [HomeController::class, 'showBlogs'])->name('blog-de-caza');
Route::get('/blog-de-caza/{slug}', [HomeController::class, 'showBlog'])->name('blog-de-caza.show');

Route::get('/productos/aves-de-caza', [HomeController::class, 'showAvesCaza'])->name('productos.aves-de-caza');
Route::get('/producto', [HomeController::class, 'products'])->name('productos');


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
