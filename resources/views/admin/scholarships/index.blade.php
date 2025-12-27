@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Scholarships</h1>

    <nav class="bg-gray-100 border-b mb-6 p-4 flex gap-4">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
        <a href="{{ route('admin.scholarships.index') }}" class="text-blue-600 hover:underline">Scholarships</a>
        <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:underline">Manage Users</a>
        <a href="{{ route('admin.applications.index') }}" class="text-blue-600 hover:underline">Applications</a>
    </nav>

    <p>Page is empty for now.</p>
</div>
@endsection
