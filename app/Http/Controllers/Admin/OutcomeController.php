<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outcome;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outcome = Outcome::latest()->paginate();
        $todayOutcome = Outcome::whereDay('created_at',date('d'))->sum('amount');
         return view('admin.outcome.index', compact('outcome','todayOutcome'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.outcome.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Outcome::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'description' => $request->description
        ]);
        return redirect()->back()->with('success',"Outcome Created Successfully");
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
