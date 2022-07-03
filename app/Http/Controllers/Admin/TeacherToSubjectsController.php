<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Teacher_to_Subjects;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class TeacherToSubjectsController extends Controller
{
    //
    public function ShowTeachertoSubjects()
        {
            return view('dashboard.admin.teachers_to_subjects');
        }

    public function TeachertoSubjects(Request $request)
    {
        $teacher_to_subject= new Teacher_to_Subjects();
        $teacher_to_subject->fill($request->all());

        $teacher_to_subject -> save();
        // $teacher = Teacher::find($request->teacher_id);
        // $subject_id = Subject::find($request->subject_id);

        // $teacher->subjects()->attach($subject_id);



        return response()->json('success register Subjects for Teacher');
    }
}
