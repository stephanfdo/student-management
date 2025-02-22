<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'birth_date' => 'required|date|before:2020-01-01', // At least 15 years old by 2025
            'contact_no' => 'required|numeric|digits:10',
            'address_one' => 'required|string|max:255',
            'city' => 'required|string|max:50',
            'district_id' => 'required|exists:districts,id'
        ];
    }

    public function messages()
    {
        return [
            'birth_date.before' => 'Student must be at least 15 years old as of 2025-01-01',
            'contact_no.digits' => 'Contact number must be exactly 10 digits',
            'contact_no.numeric' => 'Contact number must contain only numbers'
        ];
    }
}