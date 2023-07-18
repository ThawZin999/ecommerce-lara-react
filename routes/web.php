<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\PageController as ControllersPageController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [ControllersPageController::class, 'home']);

Route::get('/admin/login', [PageController::class, 'showLogin']);
Route::post('/admin/login', [PageController::class, 'login']);

Route::group(['prefix'=>'admin', 'middleware'=> ['Admin']], function () {
    Route::post('/logout', [PageController::class, 'logout']);

    Route::get('/', [PageController::class, 'showDashboard']);

    // product
    Route::resource('/product', ProductController::class);
    Route::get('/create-product-add/{slug}', [ProductController::class, 'createProductAdd']);
    Route::get('/create-product-remove/{slug}', [ProductController::class, 'createProductRemove']);
    Route::post('/create-product-add/{slug}', [ProductController::class, 'storeProductAdd']);
    Route::post('/create-product-remove/{slug}', [ProductController::class, 'storeProductRemove']);
    Route::get('/product-add-transaction', [ProductController::class, 'productAddTrasaction']);
    Route::get('/product-remove-transaction', [ProductController::class, 'productRemoveTrasaction']);

    Route::resource('/category', CategoryController::class);

    Route::resource('/brand', BrandController::class);

    Route::resource('/color', ColorController::class);

    Route::resource('/supplier', SupplierController::class);


});
