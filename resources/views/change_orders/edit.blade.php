@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Change Order</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('change_orders.update', $changeOrder->id) }}" method="POST">
            @csrf
            @method('PATCH')
            
            <div class="form-group">       
                <label for="project_id">Project ID</label>
                <input type="number" name="project_id" id="project_id" class="form-control" value="{{ $changeOrder->project_id }}" required>
            </div>

            <div class="form-group">
                <label for="co_number">CO Number</label>
                <input type="text" name="co_number" id="co_number" class="form-control" value="{{ $changeOrder->co_number }}" required>
            </div>
           
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $changeOrder->description }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control" value="{{ $changeOrder->amount }}" required>
            </div>           

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control" value="{{ old('status', $changeOrder->status) }}" required>
            </div>       

            <div class="form-group">
                <label for="date_approved">Date Approved</label>
                <input type="date" name="date_approved" id="date_approved" class="form-control" value="{{ $changeOrder->date_approved }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Change Order</button>
        </form>
    </div>
@endsection