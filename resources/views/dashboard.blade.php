@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="row mb-3">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Projects</h5>
                    <p class="card-text">{{ $projectCount }}</p>
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">View Projects</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Staff</h5>
                    <p class="card-text">{{ $staffCount }}</p>
                    <a href="{{ route('staffs.index') }}" class="btn btn-primary">View Staff</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total General Conditions</h5>
                    <p class="card-text">{{ $generalConditionCount }}</p>
                    <a href="{{ route('general_conditions.index') }}" class="btn btn-primary">View General Conditions</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <h2>Quick Links</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('projects.create') }}" class="btn btn-success">New Project</a>
            <a href="{{ route('staffs.create') }}" class="btn btn-success">New Staff Member</a>
            <a href="{{ route('general_conditions.create') }}" class="btn btn-success">New General Condition</a>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <h2>Recent Projects</h2>
            <ul class="list-group">
                @forelse ($recentProjects as $project)
                    <li class="list-group-item">
                        <a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
                    </li>
                @empty
                    <li class="list-group-item">No recent projects.</li>
                @endforelse>
            </ul>
        </div>

        <div class="col-md-4">
            <h2>Recent Staff</h2>
            <ul class="list-group">
                @forelse ($recentStaff as $staff)
                    <li class="list-group-item">
                        <a href="{{ route('staffs.show', $staff) }}">{{ $staff->name }}</a>
                    </li>
                @empty
                    <li class="list-group-item">No recent staff.</li>
                @endforelse
            </ul>
        </div>

        <div class="col-md-4">
            <h2>Recent General Conditions</h2>
            <ul class="list-group">
                @forelse ($recentGeneralConditions as $generalCondition)
                    <li class="list-group-item"><a href="{{ route('general_conditions.show', $generalCondition) }}">{{ $generalCondition->description }}</a></li>
                @empty
                    <li class="list-group-item">No recent general conditions.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
