@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Projects</h1>

        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create Project</a>

        <table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Project Number</th>
            <th>Address</th>
            <th>Owner Name</th>
            <th>Architect Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->name }}</td>
            <td>{{ $project->project_number }}</td>
            <td>{{ $project->address }}</td>
            <td>{{ $project->owner_name }}</td>
            <td>{{ $project->architect_name }}</td>
            <td>
                <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-primary">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
@endsection