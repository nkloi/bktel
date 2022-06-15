<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Students;

class StudentsController extends Controller
{
    public function show($student_id)
    {
        $student=Student::find($student_id);
        return response()->json([
            'data' => $student,

        ]);    
    }  
}
