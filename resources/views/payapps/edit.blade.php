@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pay Application</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('payapps.update', $payapp->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="project_id">Project ID</label>
                <input type="number" class="form-control" id="project_id" name="project_id" value="{{ old('project_id', $payapp->project_id) }}" required>
            </div>

            <div class="form-group">
                <label for="application_number">Application Number</label>
                <input type="text" class="form-control" id="application_number" name="application_number" value="{{ old('application_number', $payapp->application_number) }}" required>
            </div>

            <div class="form-group">
                <label for="billing_period_start">Billing Period Start</label>
                <input type="date" class="form-control" id="billing_period_start" name="billing_period_start" value="{{ old('billing_period_start', $payapp->billing_period_start) }}" required>
            </div>

            <div class="form-group">
                <label for="billing_period_end">Billing Period End</label>
                <input type="date" class="form-control" id="billing_period_end" name="billing_period_end" value="{{ old('billing_period_end', $payapp->billing_period_end) }}" required>
            </div>

            <div class="form-group">
                <label for="total_work_completed">Total Work Completed</label>
                <input type="number" class="form-control" id="total_work_completed" name="total_work_completed" value="{{ old('total_work_completed', $payapp->total_work_completed) }}" step="0.01">
            </div><div class="form-group">
                <label for="total_materials_stored">Total Materials Stored</label>
                <input type="number" class="form-control" id="total_materials_stored" name="total_materials_stored" value="{{ old('total_materials_stored', $payapp->total_materials_stored) }}" step="0.01">
            </div><div class="form-group">
                <label for="retainage_percentage">Retainage Percentage</label>
                <input type="number" class="form-control" id="retainage_percentage" name="retainage_percentage" value="{{ old('retainage_percentage', $payapp->retainage_percentage) }}" step="0.01">
            </div><div class="form-group">
                <label for="application_date">Application Date</label>
                <input type="date" class="form-control" id="application_date" name="application_date" value="{{ old('application_date', $payapp->application_date) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection