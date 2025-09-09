<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;


Route::get('/products', [StoreController::class, 'products'])->name('products.index');
Route::get('/products/{id}', [StoreController::class, 'productDetails'])->name('products.show');
Route::get('/about-us', [StoreController::class, 'aboutUs'])->name('about');
Route::get('/contact', [StoreController::class, 'contact'])->name('contact');
Route::get('/cart', [StoreController::class, 'cart'])->name('cart');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
