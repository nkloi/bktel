<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\teachers;
use Illuminate\Http\Request;
use App\Models\subjects;
use App\Models\teacher_to_subjects;
use AuthorizesRequests;

use function PHPUnit\Framework\returnSelf;

class TeacherToSubjectController extends Controller
{
    //

    public function show()
    {
        return view('auth.TeacherToSubject');
    }
    
    public function AddSubjectToTeacher()
    {   

        $teacher_id = 5;

        $teacher = teachers::where('id', $teacher_id )->first();

        $subject_id = [8,9,10];

        if ($teacher->subjects()->attach($subject_id,[
            'semester' => 222,
            'year' => 2022,
            'note' => 'ok',

        ]));

        return response()->json("Adding Subject To Teacher Sucessfully!!");

    }

    public function getAllteacherbySubject($id){

        $subjects = subjects::find($id);
        $teachers = $subjects->teachers;
        $teacher_id = $teachers[8]->pivot->semester;
        
        // $semester = $teachers->pivot->semester;

        // $semester = teacher_to_subjects::where('teacher_id', $teachers)->first()->pivot->semester;

        return response()->json($teacher_id);

    }

    public function getAllsubjectbyTeacher($id){

        $teachers = teachers::find($id);
        $subjects = $teachers->subjects;
        $subject_id = $subjects[8]->pivot->semester;

        return response()->json($subject_id);

    }
}
