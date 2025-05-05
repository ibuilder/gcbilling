@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Change Order</h1>

    <form action="{{ route('change_orders.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="project_id">Project ID</label>
            <input type="number" name="project_id" id="project_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="co_number">Change Order Number</label>
            <input type="text" name="co_number" id="co_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_approved">Date Approved</label>
            <input type="date" name="date_approved" id="date_approved" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection