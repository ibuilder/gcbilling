@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Staff</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('staffs.update', $staff->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="project_id">Project ID</label>
                <input type="number" name="project_id" id="project_id" class="form-control" value="{{ old('project_id', $staff->project_id) }}" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $staff->name) }}" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ old('role', $staff->role) }}" required>
            </div>
            <div class="form-group">
                <label for="rate">Rate</label>
                <input type="number" name="rate" id="rate" class="form-control" value="{{ old('rate', $staff->rate) }}" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Staff</button>
        </form>
    </div>
@endsection