@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Change Order Details</h1>

                <p><strong>Project ID:</strong> {{ $changeOrder->project_id }}</p>
                <p><strong>CO Number:</strong> {{ $changeOrder->co_number }}</p>

                <p><strong>Description:</strong> {{ $changeOrder->description }}</p>
                <p><strong>Amount:</strong> {{ $changeOrder->amount }}</p>

                <p><strong>Status:</strong> {{ $changeOrder->status }}</p>
                <p><strong>Date Approved:</strong> {{ $changeOrder->date_approved }}</p>


                <a href="{{ route('change_orders.edit', $changeOrder->id) }}" class="btn btn-primary">Edit</a>
    </div>
@endsection