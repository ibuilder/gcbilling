<?php

namespace App\Http\Controllers;

use App\Helpers\GCBillHelper;
use App\Models\ApplicationForPaymentLineItem;
use App\Models\Project;
use App\Models\ChangeOrder;
use App\Models\ScheduleOfValue;
use App\Models\Payapp;
use Illuminate\Http\Request;

class PayappController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        
        $payapp = Payapp::create($validatedData);
        
        //Get the project.
        $project = Project::find($payapp->project_id);
        
        // Get the Schedule of Values for this project
        $scheduleOfValues = ScheduleOfValue::where('project_id', $payapp->project_id)->get();
        
        // Get the G702 data
        $g702Data = GCBillHelper::calculateG702($payapp, $scheduleOfValues, $project);
        
        // Get the G703 data
        $g703Data = GCBillHelper::generateG703($scheduleOfValues, $payapp);
        
        foreach($g703Data as $data){
            ApplicationForPaymentLineItem::create([
                'application_for_payment_id' => $payapp->id,
                'schedule_of_value_id' => $data['line_item_id'],
                'previous_work_completed' => $data['previous_work_completed'],
                'previous_stored' => $data['previous_stored'],
                'current_work_completed' => $data['current_work_completed'],
                'current_stored' => $data['current_stored'],
            ]);
        }
        return redirect()->route('payapps.show', $payapp);
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
         
         //Get the project.
        $project = Project::find($payapp->project_id);
        
        // Get the Schedule of Values for this project
        $scheduleOfValues = ScheduleOfValue::where('project_id', $payapp->project_id)->get();
        
        // Get the G702 data
        $g702Data = GCBillHelper::calculateG702($payapp, $scheduleOfValues, $project);
        
        // Get the G703 data
        $g703Data = GCBillHelper::generateG703($scheduleOfValues, $payapp);
        
        foreach($g703Data as $data){
            ApplicationForPaymentLineItem::where('application_for_payment_id', $payapp->id)->where('schedule_of_value_id', $data['line_item_id'])->update([
                'previous_work_completed' => $data['previous_work_completed'],
                'previous_stored' => $data['previous_stored'],
                'current_work_completed' => $data['current_work_completed'],
                'current_stored' => $data['current_stored'],
            ]);
        }
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
    
    /**
     * Exports the specified resource to a PDF.
     */
    public function exportPdf(Payapp $payapp)
    {
         //Get the project.
        $project = Project::find($payapp->project_id);
        
        // Get the Schedule of Values for this project
        $scheduleOfValues = ScheduleOfValue::where('project_id', $payapp->project_id)->get();
        
        // Get the G702 data
        $g702Data = GCBillHelper::calculateG702($payapp, $scheduleOfValues, $project);
        
        // Get the G703 data
        $g703Data = GCBillHelper::generateG703($scheduleOfValues, $payapp);
        $changeOrders = ChangeOrder::where('project_id', $project->id)->get();
        
        return GCBillHelper::generatePdf('payapps.show', compact('payapp', 'project', 'g702Data', 'g703Data', 'changeOrders'), 'payapp.pdf');
    }
    
     /**
     * Exports the specified resource to excel.
     */
    public function exportExcel(Payapp $payapp)
    {
         // Get the G703 data
        $g703Data = ApplicationForPaymentLineItem::where('application_for_payment_id', $payapp->id)->get()->toArray();
        $filename = 'payapp' . $payapp->id . '.xlsx';
        return GCBillHelper::generateExcel($g703Data, $filename);
    }


}