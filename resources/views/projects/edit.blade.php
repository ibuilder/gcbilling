@extends('layouts.app') 

@section('content')

    <h1>Edit Project</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('projects.update', $project->id) }}" method="POST"> 
        @csrf
        @method('PATCH')

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $project->name }}" required>
        </div>

        <div>
            <label for="project_number">Project Number:</label>
            <input type="text" name="project_number" id="project_number" value="{{ $project->project_number }}">
        </div>

        <div>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="{{ $project->address }}" required>
        </div>
        

        <div>
            <label for="owner_name">Owner Name:</label>
            <input type="text" name="owner_name" id="owner_name" value="{{ $project->owner_name }}">
        </div>

        <div>
            <label for="contract_amount">Contract Amount:</label>            
            <input type="number" name="contract_amount" id="contract_amount" value="{{ $project->contract_amount }}" step="0.01" required>
        </div>

        <div>
            <label for="contract_date">Contract Date:</label>
            <input type="date" name="contract_date" id="contract_date" value="{{ $project->contract_date }}">
        </div>

        <div>
            <label for="architect_name">Architect Name:</label>
            <input type="text" name="architect_name" id="architect_name" value="{{ $project->architect_name }}">
        </div>

        <div>
            <label for="retainage_percentage">Retainage Percentage:</label>
            <input type="number" name="retainage_percentage" id="retainage_percentage" value="{{ $project->retainage_percentage }}" step="0.01">
        </div>

        <div>
            <label for="gmp">GMP:</label>
            <input type="number" name="gmp" id="gmp" value="{{ $project->gmp }}" step="0.01">
        </div>

        <button type="submit">Update Project</button>
    </form>
@endsection