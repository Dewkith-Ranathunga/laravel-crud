<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function AddStudent()
    {
        return view('Index');
    }


    public function save(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|unique:students,student_email',
            'dob' => 'required|date|before_or_equal:today',
        ]);

        Student::create([
            'student_name' => $request->fullName,
            'student_email' => $request->email,
            'student_dob' => $request->dob,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student Added Successfully');
    }



    public function index()
    {
        $students = Student::where('status', '!=', Student::STATUS_DELETED)
            ->get();

        return view('Students', compact('students'));
    }


    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('EditStudent', compact('student'));
    }


    public function update(Request $request, $id)
    {
        $student = Student::where('status', '!=', Student::STATUS_DELETED)
            ->findOrFail($id);

        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'student_email')->ignore($student->id), // Ignore the current student's email when checking for uniqueness
            ],
            'dob' => 'required|date|before_or_equal:today',
        ]);

        $student->update([
            'student_name' => $request->fullName,
            'student_email' => $request->email,
            'student_dob' => $request->dob,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student Updated Successfully');
    }



    public function destroy($id)
    {
        $student = Student::where('status', '!=', Student::STATUS_DELETED) // Only delete students that are not already deleted
            ->findOrFail($id);

        $student->update([
            'status' => Student::STATUS_DELETED
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student Deleted Successfully');
    }



    public function changeStatus($id)
    {
        $student = Student::where('status', '!=', Student::STATUS_DELETED)
            ->findOrFail($id);

        if ($student->status == Student::STATUS_ACTIVE) {
            $student->status = Student::STATUS_DEACTIVE;
        } else {
            $student->status = Student::STATUS_ACTIVE;
        }

        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'Student Status Updated Successfully');
    }
}
