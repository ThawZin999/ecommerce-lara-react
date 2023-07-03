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

    Route::resource('/product', ProductController::class);

    Route::resource('/category', CategoryController::class);

    Route::resource('/brand', BrandController::class);

    Route::resource('/color', ColorController::class);

    Route::resource('/supplier', SupplierController::class);


});
