@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Application for Payment</h1>

        <form action="{{ route('applications_for_payment.update', $applicationForPayment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="application_number">Application Number</label>
                <input type="text" class="form-control" id="application_number" name="application_number" value="{{ $applicationForPayment->application_number }}" required>
            </div>

            <div class="form-group">
                <label for="billing_period_start">Billing Period Start</label>
                <input type="date" class="form-control" id="billing_period_start" name="billing_period_start" value="{{ $applicationForPayment->billing_period_start }}" required>
            </div>

            <div class="form-group">
                <label for="billing_period_end">Billing Period End</label>
                <input type="date" class="form-control" id="billing_period_end" name="billing_period_end" value="{{ $applicationForPayment->billing_period_end }}" required>
            </div>

            <div class="form-group">
                <label for="total_work_completed">Total Work Completed</label>
                <input type="number" class="form-control" id="total_work_completed" name="total_work_completed" value="{{ $applicationForPayment->total_work_completed }}" required>
            </div>

            <div class="form-group">
                <label for="total_materials_stored">Total Materials Stored</label>
                <input type="number" class="form-control" id="total_materials_stored" name="total_materials_stored" value="{{ $applicationForPayment->total_materials_stored }}" required>
            </div>

            <div class="form-group">
                <label for="retainage_percentage">Retainage Percentage</label>
                <input type="number" class="form-control" id="retainage_percentage" name="retainage_percentage" value="{{ $applicationForPayment->retainage_percentage }}" required>
            </div>

            <div class="form-group">
                <label for="application_date">Application Date</label>
                <input type="date" class="form-control" id="application_date" name="application_date" value="{{ $applicationForPayment->application_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection