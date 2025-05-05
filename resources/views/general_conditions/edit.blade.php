@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit General Condition</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('general_conditions.update', $generalCondition) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="project_id">Project ID</label>
                <input type="number" name="project_id" id="project_id" class="form-control" value="{{ old('project_id', $generalCondition->project_id) }}">
            </div>

            <div class="form-group">
                <label for="staff_id">Staff ID</label>
                <input type="number" name="staff_id" id="staff_id" class="form-control" value="{{ old('staff_id', $generalCondition->staff_id) }}">
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $generalCondition->type) }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $generalCondition->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount', $generalCondition->amount) }}">
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $generalCondition->date) }}">
            </div>

            <div class="form-group">
                <label for="hours_worked">Hours Worked</label>
                <input type="number" name="hours_worked" id="hours_worked" class="form-control" value="{{ old('hours_worked', $generalCondition->hours_worked) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update General Condition</button>
        </form>
    </div>
@endsection