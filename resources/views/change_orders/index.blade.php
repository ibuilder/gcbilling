@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Change Orders</h1>
        <a href="{{ route('change_orders.create') }}" class="btn btn-primary mb-3">Create Change Order</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>CO Number</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date Approved</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($changeOrders as $changeOrder)
                    <tr>
                        <td>{{ $changeOrder->project_id }}</td>
                        <td>{{ $changeOrder->co_number }}</td>
                        <td>{{ $changeOrder->description }}</td>
                        <td>{{ $changeOrder->amount }}</td>
                        <td>{{ $changeOrder->status }}</td>
                        <td>{{ $changeOrder->date_approved }}</td>
                        <td><a href="{{ route('change_orders.show', $changeOrder) }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection