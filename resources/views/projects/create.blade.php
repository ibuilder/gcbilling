@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Create Project</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="project_number" class="form-label">Project Number</label>
                <input type="text" name="project_number" id="project_number" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="owner_name" class="form-label">Owner Name</label>
                <input type="text" name="owner_name" id="owner_name" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="architect_name" class="form-label">Architect Name</label>
                <input type="text" name="architect_name" id="architect_name" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="contract_amount" class="form-label">Contract Amount</label>
                <input type="number" name="contract_amount" id="contract_amount" class="form-control" step="0.01" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="contract_date" class="form-label">Contract Date</label>
                <input type="date" name="contract_date" id="contract_date" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="retainage_percentage" class="form-label">Retainage Percentage</label>
                <input type="number" name="retainage_percentage" id="retainage_percentage" class="form-control" step="0.01">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="gmp" class="form-label">GMP</label>
                <input type="number" name="gmp" id="gmp" class="form-control" step="0.01">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection