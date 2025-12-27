@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="Name" class="border px-2 py-1 w-full" value="{{ old('name', $user->name) }}">
        <input type="email" name="email" placeholder="Email" class="border px-2 py-1 w-full" value="{{ old('email', $user->email) }}">
        <input type="password" name="password" placeholder="Password (leave blank to keep current)" class="border px-2 py-1 w-full">
        <select name="role" class="border px-2 py-1 w-full">
            <option value="student" {{ $user->role=='student' ? 'selected' : '' }}>Student</option>
            <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
        </select>
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Update User</button>
    </form>
</div>
@endsection
