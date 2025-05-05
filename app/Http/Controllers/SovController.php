<?php

namespace App\Http\Controllers;

use App\Models\Sov;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SovController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $sovs = Sov::all();

        return view('schedule_of_values.index', compact('sovs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        return view('schedule_of_values.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $validatedData = $request->validate([
            'project_id' => 'required',
            'description' => 'required|max:255',
            'amount' => 'required|numeric|min:0',
            'sort_order' => 'required|integer|min:0'
        ]);

        Sov::create($request->only(['project_id', 'description', 'amount', 'sort_order']));

        return redirect()->route('sovs.index')->with('success', 'SOV created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sov $sov)
    {        
        return view('schedule_of_values.show', compact('sov'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sov $sov)
    {        
        return view('schedule_of_values.edit', compact('sov'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sov $sov)
    {        
        $validatedData = $request->validate([
            'project_id' => 'required',
            'description' => 'required|max:255',
            'amount' => 'required|numeric|min:0',
            'sort_order' => 'required|integer|min:0'
        ]);

        $sov->update($request->only(['project_id', 'description', 'amount', 'sort_order']));

        return redirect()->route('sovs.index')->with('success', 'SOV updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sov $sov)
    {        
        $sov->delete();

        return redirect()->route('sovs.index')->with('success', 'SOV deleted successfully.');
    }
}