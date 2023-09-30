<?php

use App\Http\Controllers\Api\AuthApi;
use App\Http\Controllers\Api\CartApi;
use App\Http\Controllers\Api\HomeApi;
use App\Http\Controllers\Api\ProductApi;
use App\Http\Controllers\Api\ReviewApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeApi::class,'home']);
Route::get('/product/{slug}', [ProductApi::class,'detail']);
Route::post('make-review/{slug}', [ReviewApi::class,'makeReview']);
Route::post('add-to-cart/{slug}', [CartApi::class,'addToCart']);
Route::get('get-cart', [CartApi::class,'getCart']);
Route::post('update-cart-qty', [CartApi::class,'updateQty']);
Route::post('remove-cart', [CartApi::class,'removeCart']);
Route::post('checkout', [CartApi::class,'checkout']);
Route::get('order', [CartApi::class,'order']);

Route::post('changePassword', [AuthApi::class,'changePassword']);
Route::get('showProfile', [AuthApi::class,'showProfile']);
Route::post('changeProfile', [AuthApi::class,'changeProfile']);
