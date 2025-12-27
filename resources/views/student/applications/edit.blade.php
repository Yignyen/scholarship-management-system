@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-xl font-bold mb-4">Edit Application</h2>

    <form method="POST" action="{{ route('student.applications.update', $application->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $application->name }}" class="border w-full mb-2 p-2">
        <input type="email" name="email" value="{{ $application->email }}" class="border w-full mb-2 p-2">
        <input type="text" name="phone" value="{{ $application->phone }}" class="border w-full mb-2 p-2">
        <input type="date" name="dob" value="{{ $application->dob }}" class="border w-full mb-2 p-2">

        <select name="gender" class="border w-full mb-2 p-2">
            <option value="male" {{ $application->gender == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $application->gender == 'female' ? 'selected' : '' }}>Female</option>
        </select>

        <input type="text" name="rc" value="{{ $application->rc }}" class="border w-full mb-2 p-2">
        <textarea name="address" class="border w-full mb-2 p-2">{{ $application->address }}</textarea>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Update Application
        </button>
    </form>
</div>
@endsection

