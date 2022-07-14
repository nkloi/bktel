<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use App\auth;
use App\Models\Report;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherToSubject;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{



    public function show(Request $request, $student_id)
    {

        $studentEntity = Student::find($student_id);
        $user = $studentEntity->user;
        $email = $user->email;
        $studentArr = $studentEntity->attributesToArray();
        $studentArr["email"] = $email;

        return response()->json($studentArr);
    }
    public function store(Request $request)
    {
        $user = auth()->user();
        $student = new Student();
        $student->fill($request->all());
        $student->save();
        // $student->user()->save($user);
        $users = User::all();
        return $users->toArray();
        return response()->json($user);
    }
    public function information(Request $request )
    {
        return view('auth.information');
    }
    //acction update student
    public function update(Request $request, $student_id)
    {
        Student::find($student_id)->update($request->all());
        return response('success', 200);
    }

    //action delete student
    public function destroy(Request $request, $student_id)
    {
        $student = Student::find($student_id);
        $student->delete();
        return response('suceess', 200);
    }

    public function ShowformUploadFile()
    {
        return view('dashboard.student.upload-file');
    }

    public function SearchSubject(Request $request)

    {
        $teacher_id=$request -> teacher_id;
        $subject_code=$request -> subject_code;
        $subject_id = DB::table('subjects')->where('code', $subject_code)->value('id') ;
        $semester=$request -> semester;
        $data = DB::table('teacher_to_subjects')->where('teacher_id', $teacher_id)
                                                ->where('subject_id', $subject_id)
                                                ->where('semester', $semester)
                                                ->get();
        return response()->json($data);
    }
    public function UploadFileReport(Request $request)
    {
        $student_id = auth()->user()->student_id;
        $path = storage_path('app\reports\\');
        $generated_new_name = date('Ymd_His') . '_' . $request-> file-> getClientOriginalName();
        $path_import = '\app\reports\\' . $generated_new_name;
        $request->file->move($path, $generated_new_name);

        $report = new Report();

        $report->teacher_to_subject_id = $request -> teacher_to_subject_id;
        $report->student_id = $student_id ;
        $report->title = $request->title;
        $report->path = $path_import ;
        $report->note = $request->note;
        $report->save();

        return response()->json('upload sucess');

    }






}
