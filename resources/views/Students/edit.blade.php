@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Student</h2>
    
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <!-- First Name -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">First Name *</label>
                <input type="text" name="first_name" value="{{ old('first_name', $student->first_name) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('first_name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
            </div>
            
            <!-- Last Name -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Last Name *</label>
                <input type="text" name="last_name" value="{{ old('last_name', $student->last_name) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('last_name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
            </div>
            
            <!-- Middle Name -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Middle Name</label>
                <input type="text" name="middle_name" value="{{ old('middle_name', $student->middle_name) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('middle_name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
            </div>
            
            <!-- Birth Date -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Birth Date *</label>
                <input type="date" name="birth_date" value="{{ old('birth_date', $student->birth_date->format('Y-m-d')) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('birth_date')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
            </div>
            
            <!-- Contact Number -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Contact No *</label>
                <input type="tel" name="contact_no" value="{{ old('contact_no', $student->contact_no) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('contact_no')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
            </div>
            
            <!-- Profile Image -->
            <div class="col-span-full">
                <label class="block mb-2 text-sm font-medium text-gray-900">Profile Image</label>
                @if($student->profile_image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/'.$student->profile_image) }}" 
                            class="h-32 w-32 rounded-full object-cover mb-2">
                        <label class="flex items-center text-red-600 text-sm cursor-pointer">
                            <input type="checkbox" name="remove_image" value="1" class="mr-2">
                            Remove Image
                        </label>
                    </div>
                @endif
                <input type="file" name="profile_image"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
            </div>
        </div>

        <!-- Address Section -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-4 text-gray-800">Address Information</h3>
            
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Address Line 1 -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Address Line 1 *</label>
                    <input type="text" name="address_one" value="{{ old('address_one', $student->address->address_one) }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('address_one')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
                </div>
                
                <!-- City -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">City *</label>
                    <input type="text" name="city" value="{{ old('city', $student->address->city) }}" required
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
                            <option value="{{ $district->id }}" 
                                {{ $district->id == old('district_id', $student->address->district_id) ? 'selected' : '' }}>
                                {{ $district->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="flex gap-4">
            <button type="submit" 
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Update Student
            </button>
            <a href="{{ route('students.index') }}" 
               class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection