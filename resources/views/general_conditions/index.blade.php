@extends('layouts.app')

@section('content')
    <h1>General Conditions</h1>

    <a href="{{ route('general_conditions.create') }}">Create New General Condition</a>

    <table>
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Staff ID</th>
                <th>Type</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Hours Worked</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($generalConditions as $generalCondition)
                <tr>
                    <td>{{ $generalCondition->project_id }}</td>
                    <td>{{ $generalCondition->staff_id }}</td>
                    <td>{{ $generalCondition->type }}</td>
                    <td>{{ $generalCondition->description }}</td>
                    <td>{{ $generalCondition->amount }}</td>
                    <td>{{ $generalCondition->date }}</td>
                    <td>{{ $generalCondition->hours_worked }}</td>
                    <td>
                        <a href="{{ route('general_conditions.show', $generalCondition) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection