<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('home');
    }

    public function showProfile() {
        return view('profile');
    }

    public function product() {
        $category = Category::withCount('product')->get();
        $brand = Brand::all();
        $color = Color::all();
        $product = Product::latest();

        if ($category_slug = request()->category ) {
            $findCategory = Category::where('slug', $category_slug)->first();
            if (!$findCategory) {
                return redirect('/product')->with('error',"Category Not Found.");
            }
            $product->where('category_id',$findCategory->id);
        }

        if ($brand_slug = request()->brand ) {
            $findBrand = Brand::where('slug', $brand_slug)->first();
            if (!$findBrand) {
                return redirect('/product')->with('error',"Brand Not Found.");
            }
            $product->where('brand_id',$findBrand->id);
        }

        if ($color_slug = request()->color ) {
            $findColor = Color::where('slug', $color_slug)->first();
            if (!$findColor) {
                return redirect('/product')->with('error',"Color Not Found.");
            }

            $product->whereHas('color', function($q) use($findColor){
                $q->where('product_color.color_id',$findColor->id);
            });
        }

        if($search = request()->search){
            $product->where('name','like',"%$search%");
        }

        $product = $product->paginate(12);
        return view('product',compact('category','brand','color','product'));


    }
}
