@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Project</h1>

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

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="project_number">Project Number</label>
            <input type="text" name="project_number" id="project_number" class="form-control">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="owner_name">Owner Name</label>
            <input type="text" name="owner_name" id="owner_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="architect_name">Architect Name</label>
            <input type="text" name="architect_name" id="architect_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="contract_amount">Contract Amount</label>
            <input type="number" name="contract_amount" id="contract_amount" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="contract_date">Contract Date</label>
            <input type="date" name="contract_date" id="contract_date" class="form-control">
        </div>

        <div class="form-group">
            <label for="retainage_percentage">Retainage Percentage</label>
            <input type="number" name="retainage_percentage" id="retainage_percentage" class="form-control" step="0.01">
        </div>
        <div class="form-group">
            <label for="gmp">GMP</label>
            <input type="number" name="gmp" id="gmp" class="form-control" step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection