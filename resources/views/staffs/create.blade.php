@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Staff</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('staffs.store') }}">
        @csrf

        <div class="form-group">
            <label for="project_id">Project ID</label>
            <input type="number" name="project_id" id="project_id" class="form-control" required>
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
</div>
@endsection
