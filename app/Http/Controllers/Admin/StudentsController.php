<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentsController extends Controller
{
    public function show($student_id)
    {
        //Get student from student_id from the students table
        $studentEntity = Student::find($student_id);
        $user = $studentEntity->user;

        $email = $user->email;
        $studentArr = $studentEntity->attributesToArray();
        $studentArr["email"] = $email;

        return response()->json($studentArr);
        
    }
    
    public function store()
    {
        
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}