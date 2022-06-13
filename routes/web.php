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



Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::post('/product', [App\Http\Controllers\ProductController::class, 'store'])->name('product');
Route::delete('/product/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('/product/{product}');
Route::get('/sipping', [App\Http\Controllers\SippingController::class, 'index']);
Route::get('/sipping/store', [App\Http\Controllers\SippingController::class, 'store']);
Route::get('/sipping/edit/{id}', [App\Http\Controllers\SippingController::class, 'edit']);
Route::post('/create', [App\Http\Controllers\SippingController::class, 'create']);
Route::post('/update', [App\Http\Controllers\SippingController::class, 'update']);
Route::get('/destroy/{id}', [App\Http\Controllers\SippingController::class, 'destroy']);

