@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Edit Scholarship</h1>

    {{-- Back button --}}
    <a href="{{ route('admin.scholarships.index') }}"
       class="inline-block mb-4 px-4 py-2 bg-gray-500 text-white rounded">
        ← Back
    </a>

    <form action="{{ route('admin.scholarships.update', $scholarship->id) }}"
          method="POST"
          class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="name" class="border p-2 w-full"
               value="{{ $scholarship->name }}" placeholder="Scholarship Name">

        <textarea name="eligibility" class="border p-2 w-full"
                  placeholder="Eligibility">{{ $scholarship->eligibility }}</textarea>

        <input type="number" name="amount" class="border p-2 w-full"
               value="{{ $scholarship->amount }}" placeholder="Amount">

        <input type="date" name="deadline" class="border p-2 w-full"
               value="{{ $scholarship->deadline }}">

        <input type="text" name="funded_by" class="border p-2 w-full"
               value="{{ $scholarship->funded_by }}" placeholder="Funded By">

        <button class="px-4 py-2 bg-green-500 text-white rounded">
            Update Scholarship
        </button>
    </form>
</div>
@endsection
