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
Route::get('/sipping', [App\Http\Controllers\ShippingController::class, 'index']);
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::post('/product', [App\Http\Controllers\ProductController::class, 'store'])->name('product');
