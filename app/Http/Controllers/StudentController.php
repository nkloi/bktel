<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show($student_id)
    {
        $student=Student::find($student_id);
        return response()->json([
            'data' => $student,

        ]);    
    }
    
    public function store($student_id)
    {
        return response()->json([
            'data'=>$student_id,
        ]);
    }

    public function update($student_id)
    {
        return response()->json([
            'data'=>$student_id,
        ]);
    }

    public function destroy($student_id)
    {
        return response()->json([
            'data'=>$student_id,
        ]);
    }
}
