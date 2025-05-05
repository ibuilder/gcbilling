<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('staffs.index', compact('staffs'));
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