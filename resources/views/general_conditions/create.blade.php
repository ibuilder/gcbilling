@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Create General Condition</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('general_conditions.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="project_id" class="form-label">Project ID:</label>
                <input type="number" name="project_id" id="project_id" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="staff_id" class="form-label">Staff ID:</label>
                <input type="number" name="staff_id" id="staff_id" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="type" class="form-label">Type:</label>
                <input type="text" name="type" id="type" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="description" class="form-label">Description:</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="amount" class="form-label">Amount:</label>
                <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="date" class="form-label">Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="hours_worked" class="form-label">Hours Worked:</label>
                <input type="number" name="hours_worked" id="hours_worked" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create General Condition</button>
    </form>
</div>
@endsection