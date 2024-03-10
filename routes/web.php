<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleDetailController;
use App\Http\Controllers\SaleController;
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

// Rutas para productos

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
//Route::get('/product_create', [ProductController::class, 'create'])->name('products.create');
Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Rutas para detalles de venta
Route::get('/sale-details', [SaleDetailController::class, 'index'])->name('sale_details.index');
Route::get('/sale-details/{id}', [SaleDetailController::class, 'show'])->name('sale_details.show');

// Rutas para ventas
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('/sales/{id}', [SaleController::class, 'show'])->name('sales.show');
