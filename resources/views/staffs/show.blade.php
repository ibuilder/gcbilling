@extends('layouts.app')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Staff Member Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><strong>Project ID:</strong> {{ $staff->project_id }}</p>
                    <p><strong>Name:</strong> {{ $staff->name }}</p>
                    <p><strong>Role:</strong> {{ $staff->role }}</p>
                    <p><strong>Rate:</strong> {{ $staff->rate }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection