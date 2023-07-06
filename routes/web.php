<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [PageController::class, 'showLogin']);
Route::post('/admin/login', [PageController::class, 'login']);

Route::prefix('admin')->group(function () {
    Route::post('/logout', [PageController::class, 'logout']);

    Route::get('/', [PageController::class, 'showDashboard']);

    // product
    Route::resource('/product', ProductController::class);
    Route::get('/create-product-add/{slug}', [ProductController::class, 'createProductAdd']);
    Route::post('/create-product-add/{slug}', [ProductController::class, 'storeProductAdd']);

    Route::resource('/category', CategoryController::class);

    Route::resource('/brand', BrandController::class);

    Route::resource('/color', ColorController::class);

    Route::resource('/supplier', SupplierController::class);


});
