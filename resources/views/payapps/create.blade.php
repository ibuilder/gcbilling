@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Pay Application</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form method="POST" action="{{ route('payapps.store') }}">
    @csrf

    <div>
        <label for="project_id">Project ID</label>
        <input type="text" name="project_id" id="project_id" required>
    </div>

    <div>
        <label for="application_number">Application Number</label>
        <input type="text" name="application_number" id="application_number" required>
    </div>

    <div>
        <label for="billing_period_start">Billing Period Start</label>
        <input type="date" name="billing_period_start" id="billing_period_start" required>
    </div>

    <div>
        <label for="billing_period_end">Billing Period End</label>
        <input type="date" name="billing_period_end" id="billing_period_end" required>
    </div>

    <div>
        <label for="total_work_completed">Total Work Completed</label>
        <input type="number" name="total_work_completed" id="total_work_completed" step="0.01" required>
    </div>

    <div>
        <label for="total_materials_stored">Total Materials Stored</label>
        <input type="number" name="total_materials_stored" id="total_materials_stored" step="0.01" required>
    </div>

    <div>
        <label for="retainage_percentage">Retainage Percentage</label>
        <input type="number" name="retainage_percentage" id="retainage_percentage" step="0.01" required>
    </div>

    <div>
        <label for="application_date">Application Date</label>
        <input type="date" name="application_date" id="application_date" required>
    </div>

    <button type="submit">Create Payapp</button>
</form>
</div>
@endsection