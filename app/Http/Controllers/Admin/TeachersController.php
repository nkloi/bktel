<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
     public function show2(Request $request, $teacher_id)
    {
        $studentEntity = Teacher::find($teacher_id);
        $user = $studentEntity->user;

        $email = $user->email;
        $studentArr = $studentEntity->attributesToArray();
        $studentArr["email"] = $email;

        return response()->json($studentArr);
    }

    public function store2(Request $request)
    {

        $user = new User();
        $teacher = new Teacher();

        $user->email = $request->email;
        $user->password = Hash::make('Bmvt@2022');
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->role_id = 3;
        $user->save();
        $teacher->fill($request->all())->save();

        $teacher->user()->save($user)->toArray();
        $teacher["email"] = $user->email;

        return response()->json($teacher);
    }
    public function register()
    {
        return view ('auth.addteacher');
    }
    public function ShowformUploadMark()
    {
        return view ('dashboard.teacher.upload-mark');
    }
    public function SearchReport(Request $request)
    {
        $subject_id=$request -> subject_id;
        $student_id=$request -> student_id;
        $teacher_id= auth()->user()->teacher_id;
        // $subject_id = DB::table('subjects')->where('code', $subject_code)->value('id') ;
        $semester = $request -> semester;
        $data = DB::table('reports')->select('*', 'reports.note as report_note')
                ->leftJoin('teacher_to_subjects', 'teacher_to_subjects.id', '=','reports.teacher_to_subject_id', 'teacher_to_subjects.note as teacher_to_subject_note')
                                    ->where('student_id', $student_id)
                                    // ->where('subject_id', $subject_id)
                                    ->where('teacher_id', $teacher_id)
                                    ->get();
        return response()->json($data);
    }

}
