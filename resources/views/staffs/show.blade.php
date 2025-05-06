@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Staff Member Details</h1>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Project ID:</strong></div>
        <div class="col-md-6">{{ $staff->project_id }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Name:</strong></div>
        <div class="col-md-6">{{ $staff->name }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Role:</strong></div>
        <div class="col-md-6">{{ $staff->role }}</div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6"><strong>Rate:</strong></div>
        <div class="col-md-6">{{ $staff->rate }}</div>
    </div>
    <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-primary">Edit</a>
</div>
@endsection
--- a/resources/views/staffs/show.blade.php
+++ b/resources/views/staffs/show.blade.php
