<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductAddTransaction;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::latest()->paginate();
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $supplier = Supplier::all();
        $color= Color::all();
        $brand= Brand::all();
        return view('admin.product.create', compact('category','supplier','color','brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'total_quantity' => 'required|integer',
            'buy_price' => 'required|integer',
            'sale_price' => 'required|integer',
            'discounted_price' => 'required|integer',
            'category_slug' => 'required|string',
            'supplier_slug' => 'required|string',
            'brand_slug' => 'required|string',
            'color_slug.*' => 'required|string',
            'image' => 'required|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        // image upload
        $image = $request->file('image');
        $image_name =uniqid() . Str::slug($image->getClientOriginalName());
        $image->move(public_path('/images'), $image_name);
        // product store
        $category = Category::where('slug', $request->category_slug)->first();
        if (!$category) {
            return redirect()->back()->with('error', "Category Not Found.");
        }
        $supplier = Supplier::where('slug', $request->supplier_slug)->first();
        if (!$supplier) {
            return redirect()->back()->with('error', "Supplier Not Found.");
        }
        //  dd($request->supplier_slug);
        //  dd($supplier->id);
        $brand = Brand::where('slug', $request->brand_slug)->first();
        if (!$brand) {
            return redirect()->back()->with('error', "Brand Not Found.");
        }

        $colors = [];
        foreach ($request->color_slug as $c) {
            $color = Color::where('slug', $c)->first();
            if (!$color) {
                return redirect()->back()->with('error', "Color Not Found.");
            }
            $colors[] = $color->id;
        }

        $product = Product::create([
            'category_id' => $category->id,
            'supplier_id' => $supplier->id,
            'brand_id' => $brand->id,
            'name' => $request->name,
            'slug' =>  Str::slug($request->name) . uniqid(),
            'description' => $request->description,
            'image' => $image_name,
            'total_quantity' => $request->total_quantity,
            'buy_price' => $request->buy_price,
            'discount_price' => $request->discounted_price,
            'sale_price' => $request->sale_price,
            'view_count' => 0,
            'like_count' => 0,
        ]);

        // add to transaction
        ProductAddTransaction::create([
            'supplier_id' => $supplier->id,
            'product_id' => $product->id,
            'total_quantity' => $request->total_quantity
        ]);
        // store to product_color
        $p = Product::find($product->id);
        $p->color()->sync($colors);

        return redirect()->back()->with('success', "Product created successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
