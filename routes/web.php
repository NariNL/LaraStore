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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
Route::post('/product', [App\Http\Controllers\ProductController::class, 'store']);
Route::delete('/product/{product}', [\App\Http\Controllers\ProductController::class, 'destroy']);
Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::post('/product/update', [App\Http\Controllers\ProductController::class, 'update']);
Route::get('/product/detail/{id}', [App\Http\Controllers\ProductController::class, 'detail']);

Route::get('/products/visitor', [App\Http\Controllers\ProductController::class, 'indexVisitor']);
Route::get('/product/visitor/detail/{id}', [App\Http\Controllers\ProductController::class, 'detailVisitor']);

//カート
Route::get('/product/cart_items', [App\Http\Controllers\ProductCartController::class, 'indexCart']);
Route::delete('/product/cart_items/remove', [App\Http\Controllers\ProductCartController::class, 'removeCart']);
Route::post('/product/cart', [App\Http\Controllers\ProductCartController::class, 'addCart']);



Route::get('/sipping', [App\Http\Controllers\SippingController::class, 'index']);
Route::get('/sipping/store', [App\Http\Controllers\SippingController::class, 'store']);
Route::get('/sipping/edit/{id}', [App\Http\Controllers\SippingController::class, 'edit']);
Route::post('/create', [App\Http\Controllers\SippingController::class, 'create']);
Route::post('/update', [App\Http\Controllers\SippingController::class, 'update']);
Route::get('/destroy/{id}', [App\Http\Controllers\SippingController::class, 'destroy']);
Route::get('/stock', [App\Http\Controllers\StockController::class, 'index']);
Route::get('/stock/edit/{id}', [App\Http\Controllers\StockController::class, 'editstock']);
Route::post('/stock/add/', [App\Http\Controllers\StockController::class, 'addstock']);
