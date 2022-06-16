<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class studentController extends Controller
{
    public function show(Student $student_id)
    {
        return Student::find($student_id);
    }
    public function store(Request $request )
    {
        return Student::create($request->all());
    }
    public function update(Request $request, $student_id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return $student;
    }
    public function delete(Request $request, $student_id)
    {
        $student = Student::findOrFail($student_id);
        $student->delete();

        return 204;
    }
}