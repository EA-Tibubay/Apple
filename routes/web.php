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
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


// Rutas para detalles de venta
Route::get('/sale-details', [SaleDetailController::class, 'index'])->name('sale_details.index');
Route::get('/sale-details/{id}', [SaleDetailController::class, 'show'])->name('sale_details.show');
Route::get('/sale-details/create', [SaleDetailController::class, 'create'])->name('sale_details.create');
Route::post('/sale-details', [SaleDetailController::class, 'store'])->name('sale_details.store');
Route::get('/sale-details/{id}/edit', [SaleDetailController::class, 'edit'])->name('sale_details.edit');
Route::put('/sale-details/{id}', [SaleDetailController::class, 'update'])->name('sale_details.update');
Route::delete('/sale-details/{id}', [SaleDetailController::class, 'destroy'])->name('sale_details.destroy');



// Rutas para ventas
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('/sales/{id}', [SaleController::class, 'show'])->name('sales.show');
//Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::get('/sales/{id}/edit', [SaleController::class, 'edit'])->name('sales.edit');
Route::put('/sales/{id}', [SaleController::class, 'update'])->name('sales.update');
Route::delete('/sales/{id}', [SaleController::class, 'destroy'])->name('sales.destroy');
Route::get('/salesCreate', [SaleController::class, 'create'])->name('sales.create');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
Route::get('/salesdownload-pdf', [SaleController::class, 'downloadPDF'])->name('sales.downloadPDF');
