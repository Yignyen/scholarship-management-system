@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-xl font-bold mb-4">Apply for Scholarship</h2>

    <form method="POST" action="{{ route('student.scholarship.apply.form', $scholarship->id) }}">
    @csrf
    <input type="text" name="name" placeholder="Full Name" class="border w-full mb-2 p-2">
    <input type="email" name="email" placeholder="Email" class="border w-full mb-2 p-2">
    <input type="text" name="phone" placeholder="Phone Number" class="border w-full mb-2 p-2">
    <input type="date" name="dob" class="border w-full mb-2 p-2">
    <select name="gender" class="border w-full mb-2 p-2">
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <input type="text" name="rc" placeholder="RC" class="border w-full mb-2 p-2">
    <textarea name="address" placeholder="Address" class="border w-full mb-2 p-2"></textarea>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit Application</button>
</form>
</div>
@endsection
