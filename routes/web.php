<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
Route::get('/cart/download', [App\Http\Controllers\CartController::class, 'downloadReceipt'])->name('cart.downloadReceipt');


// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Página de contacto
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Página "acerca de nosotros"
Route::get('/about', function () {
    return view('about');
})->name('about');

// Ruta para el controlador de administración

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::resource('users', UserController::class)->middleware('admin');
    
});

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Rutas para el recibo.
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/download-receipt/{fileName}', [CartController::class, 'downloadReceipt'])->name('cart.downloadReceipt');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// Rutas para el CRUD de usuarios
Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
