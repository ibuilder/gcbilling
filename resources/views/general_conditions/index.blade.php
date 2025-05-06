@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>General Conditions</h1>
        <a href="{{ route('general_conditions.create') }}" class="btn btn-primary">Create General Condition</a>

        <table class="table">
                <thead>
                    <tr>
                        <th>Project ID</th>
                        <th>Staff ID</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Amount</th>+                    <th>Date</th>
                    <th>Hours Worked</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($generalConditions as $generalCondition)
                        <tr>
                            <td>{{ $generalCondition->project_id }}</td>
                            <td>{{ $generalCondition->staff_id }}</td>
                            <td>{{ $generalCondition->type }}</td>
                            <td>{{ $generalCondition->description }}</td>
                            <td>{{ $generalCondition->amount }}</td>
                            <td>{{ $generalCondition->date }}</td>
                                <td>{{ $generalCondition->hours_worked }}</td>
                            <td>
                            <a href="{{ route('general_conditions.show', $generalCondition) }}" class="btn btn-info">View</a>
                            <a href="{{ route('general_conditions.edit', $generalCondition) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('general_conditions.destroy', $generalCondition) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </td>
                        </tr>
                @endforeach
                </tbody>
        </table>
    </div>
@endsection
