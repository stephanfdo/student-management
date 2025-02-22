@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-start mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Student Details</h2>
        <a href="{{ route('students.index') }}" 
           class="text-gray-600 hover:text-gray-800">
            ← Back to List
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Profile Section -->
        <div class="md:col-span-1">
            <div class="bg-gray-50 p-4 rounded-lg">
                @if($student->profile_image)
                    <img src="{{ asset('storage/'.$student->profile_image) }}" 
                         class="w-full rounded-lg mb-4">
                @else
                    <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500">
                        No Image
                    </div>
                @endif
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Student Code</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $student->student_code }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Contact Number</dt>
                        <dd class="mt-1 text-gray-900">{{ $student->contact_no }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Details Section -->
        <div class="md:col-span-2">
            <div class="space-y-6">
                <!-- Personal Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Personal Information</h3>
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                            <dd class="mt-1 text-gray-900">{{ $student->full_name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Birth Date</dt>
                            <dd class="mt-1 text-gray-900">{{ $student->birth_date->format('M d, Y') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Age (as of 2025-01-01)</dt>
                            <dd class="mt-1 text-gray-900">{{ $student->age }} years</dd>
                        </div>
                    </dl>
                </div>

                <!-- Address Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Address Information</h3>
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Address Line 1</dt>
                            <dd class="mt-1 text-gray-900">{{ $student->address->address_one }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">City</dt>
                            <dd class="mt-1 text-gray-900">{{ $student->address->city }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">District</dt>
                            <dd class="mt-1 text-gray-900">{{ $student->address->district->name }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="mt-6 flex gap-4">
                <a href="{{ route('students.edit', $student->id) }}" 
                   class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600">
                    Edit Student
                </a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700"
                            onclick="return confirm('Are you sure you want to delete this student?')">
                        Delete Student
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection