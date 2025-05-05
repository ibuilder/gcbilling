<?php

namespace App\Http\Controllers;

use App\Models\GeneralCondition;
use Illuminate\Http\Request;

class GeneralConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generalConditions = GeneralCondition::all();
        return view('general_conditions.index', compact('generalConditions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('general_conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required',
            'staff_id' => 'required',
            'type' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'hours_worked' => 'nullable|numeric',
        ]);

        GeneralCondition::create($validatedData);
        return redirect()->route('general_conditions.index')->with('success', 'General Condition created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneralCondition $generalCondition)
    {
        return view('general_conditions.show', compact('generalCondition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralCondition $generalCondition)
    {
        return view('general_conditions.edit', compact('generalCondition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GeneralCondition $generalCondition)
    {
        $validatedData = $request->validate([
            'project_id' => 'required',
            'staff_id' => 'required',
            'type' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'hours_worked' => 'nullable|numeric',
        ]);

        $generalCondition->update($validatedData);\n        
        return redirect()->route('general_conditions.index')->with('success', 'General Condition updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneralCondition $generalCondition)
    {
        $generalCondition->delete();

        return redirect()->route('general_conditions.index')->with('success', 'General Condition deleted successfully.');
    }
}