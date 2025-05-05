@extends('layouts.app')

@section('content')
    <h1>Project Staff</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Rate</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
            <tr>
                <td>{{ $staff->project_id }}</td>
                <td>{{ $staff->name }}</td>
                <td>{{ $staff->role }}</td>
                <td>{{ $staff->rate }}</td>
                <td><a href="{{ route('staffs.show', $staff->id) }}">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection