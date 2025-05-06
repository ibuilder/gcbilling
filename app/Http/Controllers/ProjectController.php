<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * Export the projects.
     */
    public function export(Request $request)
    {
        $projects = $this->filter($request);

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="projects.csv"',
        ];

        $callback = function () use ($projects) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Name', 'Project Number', 'Address', 'Owner Name', 'Architect Name', 'Contract Amount', 'Contract Date', 'Retainage Percentage', 'GMP']);

            foreach ($projects as $project) {
                fputcsv($file, [
                    $project->name,
                    $project->project_number,
                    $project->address,
                    $project->owner_name,
                    $project->architect_name,
                    $project->contract_amount,
                    $project->contract_date,
                    $project->retainage_percentage,
                    $project->gmp,
                ]);
            }
            fclose($file);
        };

        return new Response($callback, 200, $headers);
    }

    public function index(Request $request)
    {
        $projects = $this->filter($request);
        $totalContractAmount = $projects->sum('contract_amount');
        return view('projects.index', compact('projects', 'totalContractAmount'));
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
        $fillableData = $request->only(['name', 'project_number', 'address', 'owner_name', 'architect_name', 'contract_amount', 'contract_date', 'retainage_percentage', 'gmp']);
        
        Project::create($fillableData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Filter the projects.
     */
    public function filter(Request $request)
    {
        $query = Project::query();
        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->has('project_number') && $request->project_number != '') {$query->where('project_number', $request->project_number);}
        return $query->get();
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