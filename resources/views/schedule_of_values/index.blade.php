@extends('layouts.app')

@section('content')
    <h1>SOVs</h1>

    <a href="{{ route('schedule_of_values.create') }}" class="btn btn-primary">Create New SOV</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project ID</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Sort Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sovs as $sov)
                <tr>
                    <td>{{ $sov->id }}</td>
                    <td>{{ $sov->project_id }}</td>
                    <td>{{ $sov->description }}</td>
                    <td>{{ $sov->amount }}</td>
                    <td>{{ $sov->sort_order }}</td>
                    <td><a href="{{ route('schedule_of_values.show', $sov->id) }}">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection