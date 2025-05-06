@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">{{ $project->name }}</h1>

    <div class="row mb-3">
        <div class="col-md-6"><strong>Project Number:</strong></div>
        <div class="col-md-6">{{ $project->project_number }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Address:</strong></div>
        <div class="col-md-6">{{ $project->address }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Owner Name:</strong></div>
        <div class="col-md-6">{{ $project->owner_name }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Architect Name:</strong></div>
        <div class="col-md-6">{{ $project->architect_name }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Contract Amount:</strong></div>
        <div class="col-md-6">{{ $project->contract_amount }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Contract Date:</strong></div>
        <div class="col-md-6">{{ $project->contract_date }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Retainage Percentage:</strong></div>
        <div class="col-md-6">{{ $project->retainage_percentage }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>GMP:</strong></div>
        <div class="col-md-6">{{ $project->gmp }}</div>
    </div>

    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Edit</a>
</div>
@endsection