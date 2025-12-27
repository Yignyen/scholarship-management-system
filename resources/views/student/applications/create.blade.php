@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Apply for Scholarship</h2>

    <p><strong>Scholarship:</strong> {{ $scholarship->title ?? 'N/A' }}</p>

    <form method="POST" action="{{ route('student.scholarship.apply', $scholarship->id) }}">
        @csrf

        <button type="submit" class="btn btn-primary">
            Submit Application
        </button>
    </form>
</div>
@endsection
