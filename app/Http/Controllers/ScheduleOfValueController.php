<?php

namespace App\Http\Controllers;

use App\Models\ScheduleOfValue;
use Illuminate\Http\Request;

class ScheduleOfValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scheduleOfValues = ScheduleOfValue::all();
        return view('schedule_of_values.index', compact('scheduleOfValues'));
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
            'project_id' => 'required|exists:projects,id',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'sort_order' => 'required|integer',
        ]);

        ScheduleOfValue::create($validatedData);

        return redirect()->route('schedule-of-values.index')->with('success', 'Schedule of Value created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ScheduleOfValue $scheduleOfValue)
    {
        return view('schedule_of_values.show', compact('scheduleOfValue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScheduleOfValue $scheduleOfValue)
    {
        return view('schedule_of_values.edit', compact('scheduleOfValue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScheduleOfValue $scheduleOfValue)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'sort_order' => 'required|integer',
        ]);

        $scheduleOfValue->update($validatedData);

        return redirect()->route('schedule-of-values.index')->with('success', 'Schedule of Value updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScheduleOfValue $scheduleOfValue)
    {
        $scheduleOfValue->delete();

        return redirect()->route('schedule-of-values.index')->with('success', 'Schedule of Value deleted successfully.');
    }
}