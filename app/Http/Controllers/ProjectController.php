<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'project_number' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'owner_name' => 'nullable|string|max:255',
            'architect_name' => 'nullable|string|max:255',
            'contract_amount' => 'required|numeric',
            'contract_date' => 'nullable|date',
            'retainage_percentage' => 'nullable|numeric|min:0|max:100',
            'gmp' => 'nullable|numeric',
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'project_number' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'owner_name' => 'nullable|string|max:255',
            'architect_name' => 'nullable|string|max:255',
            'contract_amount' => 'required|numeric',
            'contract_date' => 'nullable|date',
            'retainage_percentage' => 'nullable|numeric|min:0|max:100',
            'gmp' => 'nullable|numeric',
        ]);

        $project->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}

