<?php

?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Application for Payment</h1>

        <form action="{{ route('applications-for-payment.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="application_number">Application Number</label>
                <input type="text" class="form-control" id="application_number" name="application_number" required>
            </div>

            <div class="form-group">
                <label for="billing_period_start">Billing Period Start</label>
                <input type="date" class="form-control" id="billing_period_start" name="billing_period_start" required>
            </div>

            <div class="form-group">
                <label for="billing_period_end">Billing Period End</label>
                <input type="date" class="form-control" id="billing_period_end" name="billing_period_end" required>
            </div>

            <div class="form-group">
                <label for="total_work_completed">Total Work Completed</label>
                <input type="number" class="form-control" id="total_work_completed" name="total_work_completed" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="total_materials_stored">Total Materials Stored</label>
                <input type="number" class="form-control" id="total_materials_stored" name="total_materials_stored" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="retainage_percentage">Retainage Percentage</label>
                <input type="number" class="form-control" id="retainage_percentage" name="retainage_percentage" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="application_date">Application Date</label>
                <input type="date" class="form-control" id="application_date" name="application_date" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection