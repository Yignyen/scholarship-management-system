@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">All Applications</h2>

    @if(session('success'))
        <div class="bg-green-200 p-2 mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-2 py-1">#</th>
                <th class="border px-2 py-1">Student Name</th>
                <th class="border px-2 py-1">Email</th>
                <th class="border px-2 py-1">Scholarship</th>
                <th class="border px-2 py-1">Phone</th>
                <th class="border px-2 py-1">DOB</th>
                <th class="border px-2 py-1">Gender</th>
                <th class="border px-2 py-1">RC</th>
                <th class="border px-2 py-1">Address</th>
                <th class="border px-2 py-1">Status</th>
                <th class="border px-2 py-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $app)
            <tr>
                <td class="border px-2 py-1">{{ $loop->iteration }}</td>
                <td class="border px-2 py-1">{{ $app->user->name }}</td>
                <td class="border px-2 py-1">{{ $app->email }}</td>
                <td class="border px-2 py-1">{{ $app->scholarship->title ?? 'N/A' }}</td>
                <td class="border px-2 py-1">{{ $app->phone }}</td>
                <td class="border px-2 py-1">{{ $app->dob }}</td>
                <td class="border px-2 py-1">{{ $app->gender }}</td>
                <td class="border px-2 py-1">{{ $app->rc }}</td>
                <td class="border px-2 py-1">{{ $app->address }}</td>
                <td class="border px-2 py-1">
                    {{ ucfirst($app->status) }}
                </td>
                <td class="border px-2 py-1 flex gap-2">
                    @if($app->status == 'pending')
                        <form method="POST" action="{{ route('admin.applications.approve', $app->id) }}">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Approve</button>
                        </form>
                        <form method="POST" action="{{ route('admin.applications.reject', $app->id) }}">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Reject</button>
                        </form>
                    @else
                        <span class="text-gray-500">Action Done</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
