@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-xl">
    <h1 class="text-2xl font-bold mb-6">Add Scholarship</h1>

    {{-- Back button to scholarship list --}}
    <a href="{{ route('admin.scholarships.index') }}"
       class="inline-block mb-4 px-4 py-2 bg-gray-500 text-white rounded">
        ← Back
    </a>

    <form action="{{ route('admin.scholarships.store') }}" method="POST" class="space-y-4">
        @csrf

        <input type="text" name="name" placeholder="Scholarship Name"
               class="border px-3 py-2 w-full" required>

        <textarea name="eligibility" placeholder="Eligibility"
                  class="border px-3 py-2 w-full" required></textarea>

        <input type="number" name="amount" placeholder="Amount"
               class="border px-3 py-2 w-full" required>

        <input type="date" name="deadline"
               class="border px-3 py-2 w-full" required>

        <input type="text" name="funded_by" placeholder="Funded By"
               class="border px-3 py-2 w-full" required>

        <button type="submit"
                class="px-4 py-2 bg-green-600 text-white rounded">
            Create Scholarship
        </button>
    </form>
</div>
@endsection
