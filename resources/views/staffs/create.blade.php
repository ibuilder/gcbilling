@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('staffs.store') }}">
    @csrf

    <div>
        <label for="project_id">Project ID</label>
        <input type="text" name="project_id" id="project_id" required>
    </div>

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="role">Role</label>
        <input type="text" name="role" id="role" required>
    </div>

    <div>
        <label for="rate">Rate</label>
        <input type="number" name="rate" id="rate" step="0.01" required>
    </div>

    <div>
        <button type="submit">Create Staff Member</button>
    </div>
</form>
@endsection