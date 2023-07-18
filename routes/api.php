<?php

use App\Http\Controllers\Api\HomeApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeApi::class,'home']);
