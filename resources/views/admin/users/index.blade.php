@extends('layouts.app')

@section('content')
<div class="p-8">
    <nav class="bg-gray-100 border-b mb-6 p-4 flex gap-4">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
        <a href="{{ route('admin.scholarships.index') }}" class="text-blue-600 hover:underline">Scholarships</a>
        <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:underline">Manage Users</a>
        <a href="{{ route('admin.applications.index') }}" class="text-blue-600 hover:underline">Applications</a>
    </nav>

    <h1 class="text-2xl font-bold mb-4">Scholarships</h1>
    <p>Page is empty for now.</p>

    <table class="min-w-full border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="px-4 py-2 border">{{ $user->id }}</td>
                <td class="px-4 py-2 border">{{ $user->name }}</td>
                <td class="px-4 py-2 border">{{ $user->email }}</td>
                <td class="px-4 py-2 border">{{ $user->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
