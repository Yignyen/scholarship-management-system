    @extends('layouts.app')

    @section('content')
    <div class="container mx-auto py-8">
         <marquee><p>Welcome, {{ Auth::user()->name }}!</p></marquee>
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
        @if(isset($applications[$scholarship->id]))
            @php
                $application = $applications[$scholarship->id];
            @endphp

            {{-- Show status --}}
            @if($application->status === 'pending')
                <span class="px-2 py-1 bg-yellow-400 text-white rounded">
                    Pending
                </span>
            @elseif($application->status === 'approved')
                <span class="px-2 py-1 bg-green-500 text-white rounded">
                    Approved
                </span>
            @elseif($application->status === 'rejected')
                <span class="px-2 py-1 bg-red-500 text-white rounded">
                    Rejected
                </span>
            @endif

            {{-- Allow edit ONLY if pending --}}
            @if($application->status === 'pending')
                <a href="{{ route('student.applications.edit', $application->id) }}"
                class="ml-2 px-2 py-1 bg-yellow-500 text-white rounded">
                    Edit
                </a>
            @endif
        @else
            <a href="{{ route('student.scholarship.apply.form', $scholarship->id) }}"
            class="px-2 py-1 bg-blue-500 text-white rounded">
                Apply
            </a>
        @endif
    </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
