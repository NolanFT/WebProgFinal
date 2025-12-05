<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

// Home
Route::get('/', [CategoryController::class, 'home'])->name('home');
Route::redirect('/home', '/')->name('home.redirect');

// Product detail page
Route::get('/products/{id}', [CategoryController::class, 'productDetail'])
    ->name('products.show');
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

// Admin
// Admin dashboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

// PRODUCT CRUD (admin-only)
Route::post('/admin/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
Route::get('/admin/products/{product}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
Route::put('/admin/products/{product}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
Route::delete('/admin/products/{product}', [AdminController::class, 'destroyProduct'])->name('admin.products.destroy');

// CATEGORY CRUD (admin-only)
Route::post('/admin/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
Route::get('/admin/categories/{category}/edit', [AdminController::class, 'editCategory'])->name('admin.categories.edit');
Route::put('/admin/categories/{category}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
Route::delete('/admin/categories/{category}', [AdminController::class, 'destroyCategory'])->name('admin.categories.destroy');