<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::latest()->paginate();
        return view('admin.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required"
        ]);
        Supplier::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . uniqid()
        ]);
        return redirect()->back()->with('success', "Supplier created successfully.");
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
        $supplier = Supplier::where('slug', $id)->first();
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => "required"
        ]);
        $supplier = Supplier::where('slug', $id)->first();
        if (!$supplier) {
            return redirect()->back()->with('error',"Supplier not found.");
        }
        Supplier::where('slug', $id)->update([
            'name' => $request->name
        ]);
        return redirect(route('supplier.index'))->with('success',"Supplier updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::where('slug', $id)->first();
        if (!$supplier) {
            return redirect()->back()->with('error',"Supplier not found.");
        }
        $supplier->delete();
        return redirect()->back()->with('error', "Supplier deleted successfully.");
    }
}
