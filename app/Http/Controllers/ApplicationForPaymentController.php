<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForPayment;
use Illuminate\Http\Request;

class ApplicationForPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicationsForPayments = ApplicationForPayment::all();
        return view('applications_for_payment.index', compact('applicationsForPayments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('applications_for_payment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|integer',
            'application_number' => 'required|integer',
            'billing_period_start' => 'required|date',
            'billing_period_end' => 'required|date',
            'total_work_completed' => 'required|numeric',
            'total_materials_stored' => 'required|numeric',
            'retainage_percentage' => 'required|numeric',
            'application_date' => 'required|date',
        ]);

        ApplicationForPayment::create($validatedData);

        return redirect()->route('applications_for_payment.index')->with('success', 'Application for Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ApplicationForPayment $applicationForPayment)
    {
        return view('applications_for_payment.show', compact('applicationForPayment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApplicationForPayment $applicationForPayment)
    {
        return view('applications_for_payment.edit', compact('applicationForPayment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApplicationForPayment $applicationForPayment)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|integer',
            'application_number' => 'required|integer',
            'billing_period_start' => 'required|date',
            'billing_period_end' => 'required|date',
            'total_work_completed' => 'required|numeric',
            'total_materials_stored' => 'required|numeric',
            'retainage_percentage' => 'required|numeric',
            'application_date' => 'required|date',
        ]);

        $applicationForPayment->update($validatedData);

        return redirect()->route('applications_for_payment.index')->with('success', 'Application for Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplicationForPayment $applicationForPayment)
    {
        $applicationForPayment->delete();

        return redirect()->route('applications_for_payment.index')->with('success', 'Application for Payment deleted successfully.');
    }
}