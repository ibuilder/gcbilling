@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Staff</h1>
    <a href="{{ route('staffs.create') }}" class="btn btn-primary">Add Staff</a>

    <table class="table">
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Rate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
            <tr>
                <td>{{ $staff->project_id }}</td>
                <td>{{ $staff->name }}</td>
                <td>{{ $staff->role }}</td>
                <td>{{ $staff->rate }}</td>
                <td>
                    <a href="{{ route('staffs.show', $staff->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('staffs.destroy', $staff->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection