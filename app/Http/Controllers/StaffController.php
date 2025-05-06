<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaffController extends Controller
{
     /**
     * Export the staffs.
     */
    public function export(Request $request)
    {
        $staffs = $this->filter($request);

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="staffs.csv"',
        ];

        $callback = function () use ($staffs) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Project ID', 'Name', 'Role', 'Rate']);

            foreach ($staffs as $staff) {
                fputcsv($file, [
                    $staff->project_id,
                    $staff->name,
                    $staff->role,
                    $staff->rate,
                ]);
            }
            fclose($file);
        };

        return new Response($callback, 200, $headers);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $staffs = $this->filter($request);
        $totalRate = $staffs->sum('rate');
        $roleBreakdowns = $staffs->groupBy('role')->map(function ($items) {
            return $items->sum('rate');
        });
        return view('staffs.index', compact('staffs', 'totalRate', 'roleBreakdowns'));
    }

    /**
     * Filter the staffs.
     */
    public function filter(Request $request)
    {
        $query = Staff::query();
        if ($request->has('project_id') && $request->project_id != '') {
            $query->where('project_id', $request->project_id);
        }
        if ($request->has('role') && $request->role != '') {
            $query->where('role', $request->role);
        }
        return $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|integer|exists:projects,id',
            'name' => 'required|max:255',
            'role' => 'required',
            'rate' => 'required|numeric',
        ]);

        Staff::create($validatedData);

        return redirect()->route('staffs.index')->with('success', 'Staff member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        return view('staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
         $validatedData = $request->validate([
            'project_id' => 'required|integer|exists:projects,id',
            'name' => 'required|max:255',
            'role' => 'required',
            'rate' => 'required|numeric',
        ]);

        $staff->update($validatedData);

        return redirect()->route('staffs.index')->with('success', 'Staff member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staffs.index')->with('success', 'Staff member deleted successfully.');
    }
}