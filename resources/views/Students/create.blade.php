@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Create New Student</h2>
    
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @if($errors->any())
<div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg">
    <h4 class="font-bold mb-2">Please fix these errors:</h4>
    <ul class="list-disc list-inside">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <!-- First Name -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">First Name *</label>
                <input type="text" name="first_name"  value="{{ old('first_name', $student->first_name ?? '') }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('first_name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
            </div>
            
            <!-- Last Name -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Last Name *</label>
                <input type="text" name="last_name"  value="{{ old('last_name', $student->last_name ?? '') }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('last_name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
            </div>
            
            <!-- Middle Name -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Middle Name</label>
                <input type="text" name="middle_name" value="{{ old('middle_name', $student->middle_name ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('middle_name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
            </div>
            
            <!-- Birth Date -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Birth Date *</label>
                <input type="date" name="birth_date" value="{{ old('birth_date', $student->birth_date ?? '') }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('birth_date')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
            </div>
            
            <!-- Contact Number -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Contact No *</label>
                <input type="tel" name="contact_no" value="{{ old('contact_no', $student->contact_no ?? '') }}"  required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('contact_no')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
            </div>
            
            <!-- Profile Image -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Profile Image</label>
                <input type="file" name="profile_image"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                    @error('profile_image')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
            </div>
        </div>

        <!-- Address Section -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-4 text-gray-800">Address Information</h3>
            
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Address Line 1 -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Address Line 1 *</label>
                    <input type="text" name="address_one"  value="{{ old('address_one', $student->address->address_one ?? '') }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('address_one')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
                </div>
                
                <!-- City -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">City *</label>
                    <input type="text" name="city"  value="{{ old('city', $student->address->city ?? '') }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('city')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
                </div>
                
                <!-- District -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">District *</label>
                    <select name="district_id" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Select District</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-6 flex gap-4">
    <button type="submit" 
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Create Student
    </button>
    <a href="{{ route('students.index') }}" 
       class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5">
        Back to List
    </a>
</div>
    </form>
</div>
@endsection