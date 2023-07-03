<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest()->paginate('3');
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required"
        ]);

        Category::create([
            "slug" => Str::slug($request->name) . uniqid(),
            "name" => $request->name
        ]);
        return redirect()->back()->with('success',"Category created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.()
     */
    public function edit(string $id)
    {
        $cat = Category::where('slug', $id)->first();
        if (!$cat) {
            return redirect()->back()->with('error',"Category not found.");
        }
        return view('admin.category.edit',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $cat = Category::where('slug', $id)->first();
        if (!$cat) {
            return redirect()->back()->with('error',"Category not found.");
        }
        Category::where('slug', $id)->update([
            "name" => $request->name
        ]);
        return redirect(route('category.index'))->with('success',"Category updated successfully");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Category::where('slug', $id)->first();
        if (!$cat) {
            return redirect()->back()->with('error',"Category not found.");
        }
        $cat->delete();
        return redirect()->back()->with('success',"Category Deleted.");
    }
}
