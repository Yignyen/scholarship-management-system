@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Scholarships</h1>
    
    {{-- Back Button: Takes admin back to the Users Management page --}}
    <a href="{{ route('admin.dashboard') }}" 
       class="mb-4 inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
        &larr; Back  {{-- Left arrow indicates going back --}}
    </a>

    {{-- Create button --}}
    <a href="{{ route('admin.scholarships.create') }}"
       class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded">
        Add Scholarship
    </a>

    {{-- Success message --}}
    @if(session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Amount</th>
                <th class="border px-4 py-2">Deadline</th>
                <th class="border px-4 py-2">Funded By</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scholarships as $scholarship)
            <tr>
                <td class="border px-4 py-2">{{ $scholarship->name }}</td>
                <td class="border px-4 py-2">{{ $scholarship->amount }}</td>
                <td class="border px-4 py-2">{{ $scholarship->deadline }}</td>
                <td class="border px-4 py-2">{{ $scholarship->funded_by }}</td>
                <td class="border px-4 py-2 flex gap-2">
                    
                    {{-- Edit button --}}
                    <a href="{{ route('admin.scholarships.edit', $scholarship->id) }}"
                       class="px-3 py-1 bg-yellow-400 text-white rounded">
                        Edit
                    </a>

                    {{-- Delete button --}}
                    <form action="{{ route('admin.scholarships.destroy', $scholarship->id) }}"
                          method="POST"
                          onsubmit="return confirm('Delete this scholarship?');">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 bg-red-500 text-white rounded">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
