<?php

namespace App\Http\Controllers;

use App\Models\Payapp;
use Illuminate\Http\Request;

class PayappController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payapps = Payapp::all();

        return view('payapps.index', compact('payapps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payapps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'project_id' => 'required|integer',
            'application_number' => 'required|string',
            'billing_period_start' => 'required|date',
            'billing_period_end' => 'required|date',
            'total_work_completed' => 'required|numeric',
            'total_materials_stored' => 'required|numeric',
            'retainage_percentage' => 'required|numeric',
            'application_date' => 'required|date',
        ]);

         Payapp::create($validatedData);

         return redirect()->route('payapps.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payapp $payapp)
    {
        return view('payapps.show', compact('payapp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payapp $payapp)
    {
        return view('payapps.edit', compact('payapp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payapp $payapp)
    {
         $validatedData = $request->validate([
            'project_id' => 'required|integer',
            'application_number' => 'required|string',
            'billing_period_start' => 'required|date',
            'billing_period_end' => 'required|date',
            'total_work_completed' => 'required|numeric',
            'total_materials_stored' => 'required|numeric',
            'retainage_percentage' => 'required|numeric',
            'application_date' => 'required|date',
         ]);

         $payapp->update($validatedData);
         return redirect()->route('payapps.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payapp $payapp)
    {
        $payapp->delete();

        return redirect()->route('payapps.index');
    }
}