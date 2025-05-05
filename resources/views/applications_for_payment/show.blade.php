@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Application for Payment #{{ $applicationForPayment->application_number }}</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Billing Period Start:</strong> {{ $applicationForPayment->billing_period_start }}</p>
                <p><strong>Billing Period End:</strong> {{ $applicationForPayment->billing_period_end }}</p>
                <p><strong>Total Work Completed:</strong> {{ $applicationForPayment->total_work_completed }}</p>
                <p><strong>Total Materials Stored:</strong> {{ $applicationForPayment->total_materials_stored }}</p>
                <p><strong>Retainage Percentage:</strong> {{ $applicationForPayment->retainage_percentage }}%</p>
                <p><strong>Application Date:</strong> {{ $applicationForPayment->application_date }}</p>
            </div>
        </div>

        <a href="{{ route('applications_for_payment.edit', $applicationForPayment->id) }}" class="btn btn-primary mt-3">Edit</a>
    </div>
@endsection