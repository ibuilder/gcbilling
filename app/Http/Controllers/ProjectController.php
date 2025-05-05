<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'project_number' => 'required|max:255',
            'address' => 'required',
            'owner_name' => 'required|max:255',
            'architect_name' => 'required|max:255',
            'contract_amount' => 'required|numeric',
            'contract_date' => 'required|date',
            'retainage_percentage' => 'required|numeric',
            'gmp' => 'nullable|numeric',
        ]);
        $fillableData = $request->only(['name', 'project_number', 'address', 'owner_name', 'architect_name', 'contract_amount', 'contract_date', 'retainage_percentage']);

        

        Project::create($fillableData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'project_number' => 'required|max:255',
            'address' => 'required',
            'owner_name' => 'required|max:255',
            'architect_name' => 'required|max:255',
            'contract_amount' => 'required|numeric',
            'contract_date' => 'required|date',
            'retainage_percentage' => 'required|numeric',            
            'gmp' => 'nullable|numeric',
        ]);
        $fillableData = $request->only(['name', 'project_number', 'address', 'owner_name', 'architect_name', 'contract_amount', 'contract_date', 'retainage_percentage', 'gmp']);
        $project->update($fillableData);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}