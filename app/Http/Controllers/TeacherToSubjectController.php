<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\Subject;
class TeacherToSubjectController extends Controller
{
    public function index()
    {
        return view('layouts.finding');
    }
    
    public function SubjectAndTeacher(Request $request){
        return response()->json(
            Subject::where([
                'teacher_id' => $request->teacher_id, 
                'subject_id' => $request->subject_id,
                'semester' => $request->semester, 
                'year' => $request->year
            ])
                ->leftJoin('teachers', 'teachers.id', '=', 'teacher_id')
                ->leftJoin('subjects', 'subjects.id', '=', 'subject_id')
                ->get()->toArray()
        );
    }
}