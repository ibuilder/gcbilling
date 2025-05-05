@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Schedule of Value</h1>

    <form action="{{ route('sovs.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="project_id">Project ID</label>
            <input type="number" name="project_id" id="project_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="sort_order">Sort Order</label>
            <input type="number" name="sort_order" id="sort_order" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection