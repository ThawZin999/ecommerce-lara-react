<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OutcomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageControlle;
use App\Http\Controllers\PageController as ControllersPageController;
use App\Http\Controllers\ProductController as ControllersProductController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

// Auth
Route::middleware('RedirectIfAuth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin']);
    Route::post('/login', [AuthController::class, 'postLogin']);

    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'postRegister']);
});

Route::middleware('RedirectIfNotAuth')->group(function () {
    Route::get('/profile', [ControllersPageController::class, 'showProfile']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/', [ControllersPageController::class, 'home']);
Route::get('/product', [ControllersPageController::class, 'product']);
Route::get('/product/{slug}', [ControllersProductController::class, 'detail']);

Route::get('/locale/{locale}', [LanguageControlle::class, 'changeLanguage'])->name('change.language');



// Admin
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

    Route::get('/order', [OrderController::class, 'all']);
    Route::get('/change-order', [OrderController::class, 'changeOrderStatus']);

    Route::resource('/category', CategoryController::class);

    Route::resource('/brand', BrandController::class);

    Route::resource('/color', ColorController::class);

    Route::resource('/supplier', SupplierController::class);

    Route::resource('/income', IncomeController::class);
    Route::resource('/outcome', OutcomeController::class);


});
