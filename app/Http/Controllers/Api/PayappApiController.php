<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PayappApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view payapps', ['only' => ['index', 'show']]);
        $this->middleware('can:create payapps', ['only' => ['store']]);
        $this->middleware('can:update payapps', ['only' => ['update']]);
        $this->middleware('can:delete payapps', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payapps = Payapp::all();
        return response()->json($payapps);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Add validation rules for Payapp
            // Example: 'project_id' => 'required|exists:projects,id',
            // 'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $payapp = Payapp::create($request->all());
        return response()->json($payapp, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payapp $payapp)
    {
        return response()->json($payapp);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payapp $payapp)
    {
        $validator = Validator::make($request->all(), [
            // Add validation rules for Payapp update
            // Example: 'amount' => 'numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $payapp->update($request->all());
        return response()->json($payapp);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payapp $payapp)
    {
        $payapp->delete();
        return response()->json(null, 204);
    }
}