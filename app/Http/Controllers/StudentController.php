<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Address;
use App\Models\District;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['address.district'])
            ->latest()
            ->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $districts = District::all();
        return view('students.create', compact('districts'));
    }

    public function store(StoreStudentRequest $request)
    {
        DB::transaction(function () use ($request) {
            $address = Address::create($request->only([
                'address_one', 'city', 'district_id'
            ]));

            $studentData = $request->except([
                'address_one', 'city', 'district_id'
            ]);

            if ($request->hasFile('profile_image')) {
                $studentData['profile_image'] = $request->file('profile_image')
                    ->store('students', 'public');
            }

            Student::create(array_merge($studentData, [
                'address_id' => $address->id
            ]));
        });

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $districts = District::all();
        return view('students.edit', compact('student', 'districts'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        DB::transaction(function () use ($request, $student) {
            $student->address->update($request->only([
                'address_one', 'city', 'district_id'
            ]));

            $studentData = $request->except([
                'address_one', 'city', 'district_id','remove_image'
            ]);

            if ($request->hasFile('profile_image')) {
                // Delete old image
                if ($student->profile_image) {
                    Storage::disk('public')->delete($student->profile_image);
                }
                
                $studentData['profile_image'] = $request->file('profile_image')
                    ->store('students', 'public');
            }

            elseif ($request->remove_image) {
                // Handle image removal
                Storage::disk('public')->delete($student->profile_image);
                $studentData['profile_image'] = null;
            }

            $student->update($studentData);
        });

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        DB::transaction(function () use ($student) {
            // Delete student first to remove foreign key reference
            $student->delete();
            
            // Then delete the related address
            $student->address()->delete();
            
            // Delete profile image if exists
            if ($student->profile_image) {
                Storage::disk('public')->delete($student->profile_image);
            }
        });
    
        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully');
    }
}
