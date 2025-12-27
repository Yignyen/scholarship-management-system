@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Create New User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Name" class="border px-2 py-1 w-full" value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Email" class="border px-2 py-1 w-full" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Password" class="border px-2 py-1 w-full">
        <select name="role" class="border px-2 py-1 w-full">
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Create User</button>
    </form>
</div>
@endsection
