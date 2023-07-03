<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $color = Color::latest()->paginate();
        return view('admin.color.index', compact('color'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required"
        ]);

        Color::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . uniqid()
        ]);
        return redirect()->back()->with('success', "Color created successfully.");
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
        $color = Color::where('slug', $id)->first();
        if(!$color){
        return redirect()->back()->with('error', "Color not found!");
        }
        return view('admin.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
            "name" => "required"
        ]);
        $color = Color::where('slug', $id)->first();
        if(!$color){
        return redirect()->back()->with('error', "Color not found!");
        }
        Color::where('slug', $id)->update([
            'name' => $request->name
        ]);
        return redirect(route('color.index'))->with('success', "Color updated successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::where('slug', $id)->first();
        if(!$color){
        return redirect()->back()->with('error', "Color not found!");
        }
        $color->delete();
        return redirect()->back()->with('success', "Color updated successfully.");

    }
}
