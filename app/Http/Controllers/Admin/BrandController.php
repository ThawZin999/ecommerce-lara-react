<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::latest()->paginate();
        return view('admin.brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brand = $request->validate([
            'name' => "required"
        ]);

        Brand::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . uniqid()
        ]);
        return redirect()->back()->with('success', "Brand name created successfully");

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
        $brand = Brand::where('slug', $id)->first();
        if(!$brand){
            return redirect()->with('error',"Brand Name not found.");
        };
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = $request->validate([
            'name' => "required"
        ]);
        $brand = Brand::where('slug', $id)->first();
        if(!$brand){
            return redirect()->with('error',"Brand Name not found.");
        };
        Brand::where('slug', $id)->update([
            'name' => $request->name
        ]);
        return redirect(route('brand.index'))->with('success', "Brand name updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::where('slug', $id)->first();
        if(!$brand){
            return redirect()->with('error',"Brand Name not found.");
        };
        $brand->delete();
        return redirect()->back()->with('success', "Brand Deleted");
    }
}
