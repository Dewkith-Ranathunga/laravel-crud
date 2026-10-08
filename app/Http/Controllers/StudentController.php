<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function AddStudent()
    {
        return view('Index');
    }

    public function save(Request $request)
    {
        Student::create([
            'student_name' => $request->fullName,
            'student_email' => $request->email,
            'student_dob' => $request->dob
        ]);

        return redirect()->back()->with('success', 'Student Added Successfully');
    }
}
