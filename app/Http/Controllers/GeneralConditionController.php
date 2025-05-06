php
<?php

namespace App\Http\Controllers;

use App\Models\GeneralCondition;
use App\Models\Project;
use Illuminate\Http\Request;

class GeneralConditionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $generalConditions = $this->filter($request);
        $projectIds = Project::pluck('id')->unique();
        $types = GeneralCondition::pluck('type')->unique();

        return view('general_conditions.index', compact('generalConditions', 'projectIds', 'types'));
    }
    
     /**
     * Filter the general conditions.
     */
    public function filter(Request $request)
    {
        $query = GeneralCondition::query();

        if ($request->has('project_id') && $request->project_id != '') {
            $query->where('project_id', $request->project_id);
        }

        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }

        return $query->get();
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
            'project_id' => 'required|integer|exists:projects,id',
            'staff_id' => 'required|integer|exists:staffs,id',
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
            'project_id' => 'required|integer|exists:projects,id',
            'staff_id' => 'required|integer|exists:staffs,id',
            'type' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'hours_worked' => 'nullable|numeric',
        ]);

        $generalCondition->update($validatedData);
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