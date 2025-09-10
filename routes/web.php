<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CategoryController;

Route::resource('categories', CategoryController::class);

// Route::get('/', [StoreController::class, 'products'])->name('products.index');
// Route::get('/products', [StoreController::class, 'products'])->name('products.index');
// Route::get('/products/{id}', [StoreController::class, 'productDetails'])->name('products.show');
// Route::get('/about-us', [StoreController::class, 'aboutUs'])->name('about');
Route::get('/account', [StoreController::class, 'account'])->name('account');
// Route::get('/cart', [StoreController::class, 'cart'])->name('cart');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');       
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); 
Route::post('/products', [ProductController::class, 'store'])->name('products.store');      
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show'); 
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit'); 
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update'); 
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

use App\Http\Controllers\ContactController;

Route::view('/contact', 'shop.contacts')->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');



