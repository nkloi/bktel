<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherToSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Subset;

class TeacherToSubjectsController extends Controller
{
    //
    public function ShowRegisterSubjects()
        {
            return view('dashboard.admin.teachers_to_subjects');
        }

    public function storeTeachertoSubjects(Request $request)
    {
        $teacher_to_subject= new TeacherToSubject();
        $teacher_to_subject->fill($request->all());
        info($teacher_to_subject);
        $teacher_to_subject -> save();
        return response()->json('register subjects to teacher success');


    }
    public function showInforTeacherAndSubject(Request $request)
    {

        // return response()->json(
        //     TeacherToSubjects::where([
        //         'teacher_id' => $request->teacher_id, 'subject_id' => $request->subject_id,
        //         'semester' => $request->semester, 'year' => $request->year
        //     ])
        $teacher_to_subject = DB::table('teacher_to_subjects')->where('teacher_id', '1')->where('subject_id','1')
                                ->leftJoin('teachers', 'teachers.id', '=', 'teacher_id')
                                ->leftJoin('subjects', 'subjects.id', '=', 'subject_id')
                                ->select('teacher_id', 'subject_id','semester','year','name','code','first_name','last_name','teacher_code')
                                ->get();

        return response()->json($teacher_to_subject);

    }

}
