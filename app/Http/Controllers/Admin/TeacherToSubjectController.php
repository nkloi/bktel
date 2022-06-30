<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\teachers;
use Illuminate\Http\Request;
use App\Models\subjects;
use AuthorizesRequests;

class TeacherToSubjectController extends Controller
{
    //

    public function show()
    {
        return view('auth.TeacherToSubject');
    }
    
    public function AddSubjectToTeacher()
    {   

        $teacher_id = 1;

        $teacher = teachers::where('id', $teacher_id )->first();

        $subject_id = [1,2];

        $teacher->subjects()->attach($subject_id);

        return response()->json("Adding Subject To Teacher Sucessfully!!");
    }
}
