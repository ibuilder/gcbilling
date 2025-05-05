<?php

namespace App\Http\Controllers;

use App\Models\ChangeOrder;
use Illuminate\Http\Request;

class ChangeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $changeOrders = ChangeOrder::all();
        return view('change_orders.index', compact('changeOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('change_orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|integer|exists:projects,id',
            'co_number' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'date_approved' => 'required|date',
        ]);

        ChangeOrder::create($validatedData);

        return redirect()->route('change_orders.index')->with('success', 'Change Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ChangeOrder $changeOrder)
    {
        return view('change_orders.show', compact('changeOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChangeOrder $changeOrder)
    {
        return view('change_orders.edit', compact('changeOrder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChangeOrder $changeOrder)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|integer|exists:projects,id',
            'co_number' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'date_approved' => 'required|date',
        ]);

        $changeOrder->update($validatedData);

        return redirect()->route('change_orders.index')->with('success', 'Change Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChangeOrder $changeOrder)
    {
        $changeOrder->delete();

        return redirect()->route('change_orders.index')->with('success', 'Change Order deleted successfully.');
    }
}