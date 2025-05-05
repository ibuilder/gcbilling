@extends('layouts.app')

@section('content')
<h1>General Condition Details</h1>

<p><strong>Project ID:</strong> {{ $generalCondition->project_id }}</p>
<p><strong>Staff ID:</strong> {{ $generalCondition->staff_id }}</p>
<p><strong>Type:</strong> {{ $generalCondition->type }}</p>
<p><strong>Description:</strong> {{ $generalCondition->description }}</p>
<p><strong>Amount:</strong> {{ $generalCondition->amount }}</p>
<p><strong>Date:</strong> {{ $generalCondition->date }}</p>
<p><strong>Hours Worked:</strong> {{ $generalCondition->hours_worked }}</p>
@endsection