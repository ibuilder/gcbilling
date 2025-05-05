@extends('layouts.app')

@section('content')
    <h1>{{ $project->name }}</h1>

    <p><strong>Project Number:</strong> {{ $project->project_number }}</p>
    <p><strong>Address:</strong> {{ $project->address }}</p>
    <p><strong>Owner Name:</strong> {{ $project->owner_name }}</p>
    <p><strong>Architect Name:</strong> {{ $project->architect_name }}</p>
    <p><strong>Contract Amount:</strong> {{ $project->contract_amount }}</p>
    <p><strong>Contract Date:</strong> {{ $project->contract_date }}</p>
    <p><strong>Retainage Percentage:</strong> {{ $project->retainage_percentage }}</p>
    <p><strong>GMP:</strong> {{ $project->gmp }}</p>

    <a href="{{ route('projects.edit', $project->id) }}">Edit</a>
@endsection