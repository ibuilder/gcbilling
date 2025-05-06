@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">General Condition Details</h1>

    <div class="row mb-3">
        <div class="col-md-6"><strong>Project ID:</strong></div>
        <div class="col-md-6">{{ $generalCondition->project_id }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Staff ID:</strong></div>
        <div class="col-md-6">{{ $generalCondition->staff_id }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Type:</strong></div>
        <div class="col-md-6">{{ $generalCondition->type }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Description:</strong></div>
        <div class="col-md-6">{{ $generalCondition->description }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Amount:</strong></div>
        <div class="col-md-6">{{ $generalCondition->amount }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Date:</strong></div>
        <div class="col-md-6">{{ $generalCondition->date }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Hours Worked:</strong></div>
        <div class="col-md-6">{{ $generalCondition->hours_worked }}</div>
    </div>

    <a href="{{ route('general_conditions.edit', $generalCondition->id) }}" class="btn btn-primary">Edit</a>
</div>

@endsection