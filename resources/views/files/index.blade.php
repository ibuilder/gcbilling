@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Uploaded Files</h1>

    <table class="table">
        <thead>
            <tr>
                <th>File Name</th>
                <th>Size</th>
                <th>Uploaded By</th>
                <th>Download Link</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($files as $file)
                <tr>
                    <td>{{ $file->original_name }}</td>
                    <td>{{ round($file->size / 1024, 2) }} KB</td>
                    <td>{{ $file->uploadedBy->name ?? 'N/A' }}</td> {{-- Assuming a relationship to the User model named 'uploadedBy' --}}
                    <td>
                        <a href="{{ route('files.download', $file) }}" class="btn btn-primary btn-sm">Download</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection