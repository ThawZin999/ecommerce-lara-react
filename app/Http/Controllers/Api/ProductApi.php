<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApi extends Controller
{
    function detail($slug) {
        $product = Product::where('slug', $slug)
        ->with('review.user', 'brand', 'color', 'category')
        ->first();

        if(!$product){
            return response()->json([
                'message'=>true,
                'data'=>$product,
            ]);
        }

        return response()->json([
            'message'=>true,
            'data'=>$product,
        ]);
    }
}
