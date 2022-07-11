<?php

namespace App\Http\Controllers;

use App\Models\TeacherToSubjects;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class TeacherToSubjectController extends Controller
{
    public function showRegister()
    {
        return view('dashboard.lecture-register');
    }

    public function getInfoTeacherAndSubject(Request $request)
    {
        return response()->json(
            TeacherToSubjects::where([
                'teacher_id' => $request->teacher_id, 'subject_id' => $request->subject_id,
                'semester' => $request->semester, 'year' => $request->year
            ])
                ->leftJoin('teachers', 'teachers.id', '=', 'teacher_id')
                ->leftJoin('subjects', 'subjects.id', '=', 'subject_id')
                ->get()->toArray()
        );
    }

    public function store(Request $request)
    {
        $teacher_to_subjects = new TeacherToSubjects();
        $teacher_to_subjects->fill($request->all());
        info($teacher_to_subjects);
        $teacher_to_subjects->save();
        return response()->json('success');
    }
}