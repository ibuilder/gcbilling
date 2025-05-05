@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pay Application Details</h1>

    <div>
        <p><strong>Project ID:</strong> {{ $payapp->project_id }}</p>
        <p><strong>Application Number:</strong> {{ $payapp->application_number }}</p>
        <p><strong>Billing Period Start:</strong> {{ $payapp->billing_period_start }}</p>
        <p><strong>Billing Period End:</strong> {{ $payapp->billing_period_end }}</p>
        <p><strong>Total Work Completed:</strong> {{ $payapp->total_work_completed }}</p>
        <p><strong>Total Materials Stored:</strong> {{ $payapp->total_materials_stored }}</p>
        <p><strong>Retainage Percentage:</strong> {{ $payapp->retainage_percentage }}</p>
        <p><strong>Application Date:</strong> {{ $payapp->application_date }}</p>
    </div>
</div>
@endsection