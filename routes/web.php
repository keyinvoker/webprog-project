<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Welcome Page Endpoint
Route::get('/', function () {
    return view('welcome');
});

// Home Page Endpoint
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Product Page Endpoint
Route::prefix('/products')->group(function () {
    Route::get('/details', 'App\Http\Controllers\ProductController@getProductDetail')->name('products.detail');
});

// Cart Page Endpoint
Route::prefix('/cart')->group(function () {
    Route::post('/add/{productID}', 'App\Http\Controllers\CartController@addToCart')->name('cart.add')->middleware('auth');
    Route::get('/details', 'App\Http\Controllers\CartController@getCartDetail')->name('cart.detail')->middleware('auth');
    Route::post('/remove/{cartDetailID}', 'App\Http\Controllers\CartController@deleteFromCart')->name('cart.remove')->middleware('auth');
    Route::get('/edit', 'App\Http\Controllers\CartController@getCartDetailEdit')->name('cart.getEdit')->middleware('auth');
    Route::post('/edit/{cartDetailID}', 'App\Http\Controllers\CartController@editCartDetail')->name('cart.edit')->middleware('auth');
    Route::post('/checkout/{cartID}', 'App\Http\Controllers\CartController@checkout')->name('cart.checkout')->middleware('auth');
});

//Transaction Page Endpoint
Route::prefix('/transactions')->group(function () {
    Route::get('', 'App\Http\Controllers\TransactionController@getTransactions')->name('transactions')->middleware('auth');
});

// Admin Page Endpoint
Route::prefix('/admin')->group(function () {
    Route::prefix('/products')->group(function () {
        Route::get('/', 'App\Http\Controllers\AdminProductController@getProducts')->name('admin.products')->middleware('auth');
        Route::get('/edit', 'App\Http\Controllers\AdminProductController@getUpdateProductPage')->name('admin.products.getUpdatePage')->middleware('auth');    
        Route::post('/edit/{productID}', 'App\Http\Controllers\AdminProductController@updateProduct')->name('admin.products.update')->middleware('auth');
        Route::post('/delete/{productID}', 'App\Http\Controllers\AdminProductController@deleteProduct')->name('admin.products.delete')->middleware('auth');
        Route::get('/add', 'App\Http\Controllers\AdminProductController@getAddProductPage')->name('admin.products.getAddProductPage')->middleware('auth');
        Route::post('/add', 'App\Http\Controllers\AdminProductController@addProduct')->name('admin.products.add')->middleware('auth');
    });

    Route::prefix('/categories')->group(function () {
        Route::get('/', 'App\Http\Controllers\AdminCategoryController@getCategories')->name('admin.categories')->middleware('auth');
        Route::get('/update', 'App\Http\Controllers\AdminCategoryController@getUpdateCategoryPage')->name('admin.categories.getUpdatePage')->middleware('auth');
        Route::post('/update/{categoryID}', 'App\Http\Controllers\AdminCategoryController@updateCategory')->name('admin.categories.update')->middleware('auth');
        Route::post('/delete/{categoryID}', 'App\Http\Controllers\AdminCategoryController@deleteCategory')->name('admin.categories.delete')->middleware('auth');
        Route::get('/add', 'App\Http\Controllers\AdminCategoryController@getAddCategoryPage')->name('admin.categories.getAddCategory')->middleware('auth');
        Route::post('/add', 'App\Http\Controllers\AdminCategoryController@addCategory')->name('admin.categories.add')->middleware('auth');
    });
    
});