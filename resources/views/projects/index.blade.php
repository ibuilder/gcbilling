@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Projects</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Create Project</a>
        <table class="table">
        <thead>
            <tr>
                    <th>Name</th>
                    <th>Project Number</th>
                    <th>Address</th>
                    <th>Owner Name</th>
                    <th>Architect Name</th>
                    <th>Contract Amount</th>
                    <th>Contract Date</th>
                    <th>Retainage Percentage</th>
                    <th>GMP</th>
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
                        <td>{{ $project->contract_amount }}</td>
                        <td>{{ $project->contract_date }}</td>
                        <td>{{ $project->retainage_percentage }}</td>
                        <td>{{ $project->gmp }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;">
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
    @endif
</div>
@endsection