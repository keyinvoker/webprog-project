<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/register', [PageController::class, 'register'])->name('register');

Route::get('/detail_product', [ProductController::class, 'detail_product'])->name('detail_product');

Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/edit_cart', [PageController::class, 'edit_cart'])->name('edit_cart');

Route::get('/history', [PageController::class, 'history'])->name('history');

Route::get('/view_product', [ProductController::class, 'view_product'])->name('view_product');
Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');
Route::get('/edit_product', [ProductController::class, 'edit_product'])->name('edit_product');

Route::get('/view_category', [CategoryController::class, 'view_category'])->name('view_category');
Route::get('/add_category', [CategoryController::class, 'add_category'])->name('add_category');
Route::get('/edit_category', [CategoryController::class, 'edit_category'])->name('edit_category');

Route::get('/search/{product}', [PageController::class, 'search'])->name('search');
