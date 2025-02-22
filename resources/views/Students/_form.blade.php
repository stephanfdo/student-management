<div class="bg-white rounded-lg shadow-md p-6">
    <div class="grid grid-cols-1 gap-6">
        <!-- Profile Image -->
        <div class="col-span-full">
            <label class="block text-sm font-medium text-gray-700">Profile Image</label>
            <div class="mt-1 flex items-center">
                <input type="file" name="profile_image" class="p-2 border rounded-md">
            </div>
        </div>

        <!-- Name Fields -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">First Name *</label>
                <input type="text" name="first_name" value="{{ old('first_name', $student->first_name ?? '') }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Middle Name</label>
                <input type="text" name="middle_name" value="{{ old('middle_name', $student->middle_name ?? '') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Last Name *</label>
                <input type="text" name="last_name" value="{{ old('last_name', $student->last_name ?? '') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
        </div>

        <!-- Address Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Address Line 1 *</label>
                <input type="text" name="address_one" value="{{ old('address_one', $student->address->address_one ?? '') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">City *</label>
                <input type="text" name="city" value="{{ old('city', $student->address->city ?? '') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
        </div>

        <!-- District Dropdown -->
        <div>
            <label class="block text-sm font-medium text-gray-700">District *</label>
            <select name="district_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Select District</option>
                @foreach($districts as $district)
                    <option value="{{ $district->id }}" 
                        {{ (old('district_id', $student->address->district_id ?? '') == $district->id ? 'selected' : '' }}>
                        {{ $district->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Other Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Birth Date *</label>
                <input type="date" name="birth_date" value="{{ old('birth_date', $student->birth_date ?? '') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Contact Number *</label>
                <input type="tel" name="contact_no" value="{{ old('contact_no', $student->contact_no ?? '') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
        </div>
    </div>
</div>