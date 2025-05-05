@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Staff Member Details</h1>
    <div class="p-6 text-gray-900">
        <p><strong>Project ID:</strong> {{ $staff->project_id }}</p>
        <p><strong>Name:</strong> {{ $staff->name }}</p>
        <p><strong>Role:</strong> {{ $staff->role }}</p>
        <p><strong>Rate:</strong> {{ $staff->rate }}</p>
    </div>
    <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-primary">Edit</a>
</div>
@endsection