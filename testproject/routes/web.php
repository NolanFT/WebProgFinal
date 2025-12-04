<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

// Home
Route::get('/', [CategoryController::class, 'home'])->name('home');
Route::redirect('/home', '/')->name('home.redirect');

// // Products page
Route::view('/products', 'products')->name('products');
// Route::get('/products', [ProductController::class, 'index'])->name('products');

// // Products by category
// Route::get('/products/category/{id}', [CategoryController::class, 'show'])
//     ->name('products.category');

// // Single product details
// Route::get('/products/item/{id}', [ProductController::class, 'show'])
//     ->name('products.show');

// Cart page
Route::view('/cart', 'cart')->name('cart');

// Account page
Route::view('/account', 'account')->name('account');