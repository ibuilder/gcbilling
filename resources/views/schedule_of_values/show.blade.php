@extends('layouts.app')

@section('content')
    <h1>SOV Details</h1>

    <div>
        <p><strong>ID:</strong> {{ $sov->id }}</p>
        <p><strong>Project ID:</strong> {{ $sov->project_id }}</p>
        <p><strong>Description:</strong> {{ $sov->description }}</p>
        <p><strong>Amount:</strong> {{ $sov->amount }}</p>
        <p><strong>Sort Order:</strong> {{ $sov->sort_order }}</p>
    </div>

    <a href="{{ route('sovs.edit', $sov->id) }}" class="btn btn-primary">Edit</a>
@endsection