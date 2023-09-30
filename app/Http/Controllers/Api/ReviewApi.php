<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ReviewApi extends Controller
{
    function makeReview(Request $request, $slug) {
        $product = Product::where('slug', $slug)->first();
        if(!$product){
            return response()->json([
                'message' => false,
                'data' => "slug_not_found"
    ]);
        }

        $comment = ProductReview::create([
            'user_id' => $request->user_id,
            'review' => $request->comment,
            'rating' => $request->rating,
            'product_id' => $product->id,
        ]);
        $review = ProductReview::where('id', $comment->id)->with('user')->first();

        return response()->json([
            'message' => true,
            'data' => $review
]);
    }
}
