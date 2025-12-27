@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Available Scholarships</h1>

    <table class="min-w-full border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Eligible</th>
                <th class="px-4 py-2 border">Amount</th>
                <th class="px-4 py-2 border">Deadline</th>
                <th class="px-4 py-2 border">Funded By</th>
                <th class="px-4 py-2 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scholarships as $scholarship)
                <tr>
                    <td class="px-4 py-2 border">{{ $scholarship->name }}</td>
                    <td class="px-4 py-2 border">{{ $scholarship->eligibility }}</td>
                    <td class="px-4 py-2 border">{{ $scholarship->amount }}</td>
                    <td class="px-4 py-2 border">{{ $scholarship->deadline }}</td>
                    <td class="px-4 py-2 border">{{ $scholarship->funded_by }}</td>
                    <td class="px-4 py-2 border">
                    @if(in_array($scholarship->id, $applications))
    <!-- If student has already applied, show Edit -->
    <a href="{{ route('student.applications.edit', $scholarship->id) }}" class="px-2 py-1 bg-yellow-400 text-white rounded">Edit</a>
@else
    <!-- If not applied yet, show Apply -->
    <a href="{{ route('student.scholarship.apply.form', $scholarship->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded">Apply</a>
@endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
