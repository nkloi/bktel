<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\teacher_to_subjects;

class TeacherToSubjectController extends Controller
{    
    public function find()
    {
        return view('layouts.FindTeacherAndSubject');
    }

    public function show(Request $request)
    {
        return response()->json(
            teacher_to_subjects::where([
                'teacher_id' => $request -> teacher_id,
                'subject_id' => $request -> subject_id,
                'semester' => $request -> semester,
                'year' => $request -> year
            ])
                ->leftJoin('teachers', 'teachers.id', '=', 'teacher_id')
                ->leftJoin('subjects', 'subjects.id', '=', 'subject_id')
                ->get()->toArray()
        );
    }

    public function index()
    {
        return view('layouts.addSubject');
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
 
        teacher_to_subjects::create([
            'teacher_id' => $data["teacher_id"],
            'subject_id' => $data["subject_id"],
            'semester' => $data["semester"],
            'year' => $data["year"],
            'note' => $data["note"],
        ]);
    }
}
