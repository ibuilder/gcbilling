@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pay Application Details</h1>

        <div>
            <h2>Pay Application Information</h2>
            <p><strong>Project Name:</strong> {{ $project->name }}</p>
            <p><strong>Application Number:</strong> {{ $payapp->application_number }}</p>
            <p><strong>Billing Period Start:</strong> {{ $payapp->billing_period_start }}</p>
            <p><strong>Billing Period End:</strong> {{ $payapp->billing_period_end }}</p>
            <p><strong>Application Date:</strong> {{ $payapp->application_date }}</p>

        </div>
        <div>
            <a href="{{ route('payapps.exportPdf', $payapp->id) }}">Export to PDF</a> | <a href="{{ route('payapps.exportExcel', $payapp->id) }}">Export to Excel</a>
        </div>
        <div>
            <h2>Change Orders</h2>
            @if($changeOrders->isNotEmpty())
                <ul>
                    @foreach($changeOrders as $changeOrder)
                        <li>CO Number: {{ $changeOrder->co_number }} - Amount: ${{ $changeOrder->amount }}</li>
                    @endforeach
                </ul>
            @else
                <p>No Change Orders for this project.</p>
            @endif
        </div>
        <h2>G702 Data</h2>
        <table class="table">
            <thead>
            <tr>
                <th>GMP</th>
                <th>Total Work Completed</th>
                <th>Total Materials Stored</th>
                <th>Total Completed and Stored to Date</th>
                <th>Retainage Percentage</th>
                <th>Total Retainage</th>
                <th>Total Earned Less Retainage</th>
                <th>Previous Payments</th>
                <th>Amount Due This Payment</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>${{ number_format($g702Data['gmp'], 2) }}</td>
                <td>${{ number_format($g702Data['total_work_completed'], 2) }}</td>
                <td>${{ number_format($g702Data['total_materials_stored'], 2) }}</td>
                <td>${{ number_format($g702Data['total_completed_and_stored'], 2) }}</td>
                <td>{{ $g702Data['retainage_percentage'] }}%</td>
                <td>${{ number_format($g702Data['total_retainage'], 2) }}</td>
                <td>${{ number_format($g702Data['total_earned_less_retainage'], 2) }}</td>
                <td>${{ number_format($g702Data['previous_payments'], 2) }}</td>
                <td>${{ number_format($g702Data['amount_due'], 2) }}</td>
            </tr>
            </tbody>
        </table>

        <h2>G703 Data</h2>

        <table class="table">
            <thead>
            <tr>
                <th>Description</th>
                <th>Scheduled Value</th>
                <th>Previous Work Completed</th>
                <th>Previous Stored</th>
                <th>Current Work Completed</th>
                <th>Current Stored</th>
                <th>Total Completed and Stored to Date</th>
                <th>Balance to Finish</th>
                <th>%</th>
            </tr>
            </thead>
            <tbody>
            @foreach($g703Data as $lineItem)
                @include('payapps._g703', ['lineItem' => $lineItem])
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('payapps.edit', $payapp->id) }}">Edit</a>
    </div>
@endsection