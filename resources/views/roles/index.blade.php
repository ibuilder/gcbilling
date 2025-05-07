@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Roles</h1>

            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary mb-3">Create New Role</a>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Role Name</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                @forelse ($role->permissions as $permission)
                                    <span class="badge bg-secondary">{{ $permission->name }}</span>
                                @empty
                                    No permissions assigned.
                                @endforelse
                            </td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No roles found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection