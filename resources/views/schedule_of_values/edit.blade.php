@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Schedule of Value</h1>

        <form action="{{ route('schedule_of_values.update', $scheduleOfValue->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="project_id">Project ID</label>
                <input type="number" class="form-control" id="project_id" name="project_id" value="{{ old('project_id', $scheduleOfValue->project_id) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $scheduleOfValue->description) }}" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>  
                <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $scheduleOfValue->amount) }}" required>
            </div>
            
            <div class="form-group">
                <label for="sort_order">Sort Order</label>
                <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $scheduleOfValue->sort_order) }}" required>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection