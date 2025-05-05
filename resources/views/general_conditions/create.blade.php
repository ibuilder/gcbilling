@extends('layouts.app')

@section('content')
<form action="{{ route('general_conditions.store') }}" method="POST">
    @csrf
    <div>
        <label for="project_id">Project ID:</label>
        <input type="text" name="project_id" id="project_id" required>
    </div>
    <div>
        <label for="staff_id">Staff ID:</label>
        <input type="text" name="staff_id" id="staff_id" required>
    </div>
    <div>
        <label for="type">Type:</label>
        <input type="text" name="type" id="type" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required>
    </div>
    <div>
        <label for="amount">Amount:</label>
        <input type="text" name="amount" id="amount" required>
    </div>
    <div>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required>
    </div>
        <div>
        <label for="hours_worked">Hours Worked:</label>
        <input type="text" name="hours_worked" id="hours_worked" >
    </div>
    <div>
        <button type="submit">Create General Condition</button>
    </div>
</form>
@endsection