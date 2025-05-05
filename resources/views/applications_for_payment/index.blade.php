@extends('layouts.app')

@section('content')
    <h1>Applications for Payment</h1>

    <a href="{{ route('applications-for-payment.create') }}" class="btn btn-primary">Create Application for Payment</a>

    <table class="table">
        <thead>
            <tr>
                <th>Application Number</th>
                <th>Application Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applicationsForPayments as $application)
                <tr>
                    <td>{{ $application->application_number }}</td>
                    <td>{{ $application->application_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection