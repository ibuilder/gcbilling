@extends('layouts.app')

@section('content')
<div class="container">
<table>
    <a href="{{ route('payapps.create') }}" class="btn btn-primary mb-3">Create Pay App</a>

    <thead>
        <tr>
            <th>Project ID</th>
            <th>Application Number</th>
            <th>Billing Period Start</th>
            <th>Billing Period End</th>
            <th>Total Work Completed</th>
            <th>Total Materials Stored</th>
            <th>Retainage Percentage</th>
            <th>Application Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($payapps as $payapp)
        <tr>
            <td>{{ $payapp->project_id }}</td>
            <td>{{ $payapp->application_number }}</td>
            <td>{{ $payapp->billing_period_start }}</td>
            <td>{{ $payapp->billing_period_end }}</td>
            <td>{{ $payapp->total_work_completed }}</td>
            <td>{{ $payapp->total_materials_stored }}</td>
            <td>{{ $payapp->retainage_percentage }}</td>
            <td>{{ $payapp->application_date }}</td>
            <td>
                <a href="{{ route('payapps.show', $payapp->id) }}">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection