@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->roles as $role)
                    <span class="badge bg-secondary">{{ $role->name }}</span>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection