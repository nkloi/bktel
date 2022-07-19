<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
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
        $data = DB::table('reports')->join('teacher_to_subjects', 'teacher_to_subjects.id','=','reports.teacher_to_subject_id')
                                    ->select('*', 'reports.note as report_note','reports.id as report_id')
                
                                    ->where('student_id', $student_id)
                                    // ->where('subject_id', $subject_id)
                                    ->where('teacher_id', $teacher_id)
                                    ->get();
        return response()->json($data);
    }
    public function SetMarkReport(Request $request)
    {
        $report_id= $request -> report_id;
        $report = Report::find($report_id);
        $report->mark= $request -> mark;
        $report->save();
        $data = $report;
        return response()->json($data);

    }
    public function DowloadfileReport(Request $request)
    {

        $report_id= $request -> report_id;
         
        $report = Report::find($report_id);
        $path = storage_path($report->path);
        // return response()->json($pathToFile);
        $name = $report -> title;
        $headers = array(
            'Content-Type: application/pdf',
          );
        return response()->download($path);

    }

    public function FormExportFileMark()
    {
        return view ('dashboard.teacher.export-mark');
    }

    public function SearchAllReport(Request $request)
    {
        $subject_id=$request -> subject_id;
        $teacher_id= auth()->user()->teacher_id;
        // $subject_id = DB::table('subjects')->where('code', $subject_code)->value('id') ;
        $semester = $request -> semester;
        $data = DB::table('reports')->join('teacher_to_subjects', 'teacher_to_subjects.id','=','reports.teacher_to_subject_id')
                                    ->join('teachers', 'teachers.id','=','teacher_to_subjects.teacher_id')
                                    ->join('subjects', 'subjects.id','=','teacher_to_subjects.subject_id')
                                    ->join('students', 'students.id','=','reports.student_id')
                                    ->select('*', 'reports.note as report_note','reports.id as report_id','teachers.first_name as teacher_first_name')                                    
                                    ->where('subject_id', $subject_id)
                                    ->where('teacher_id', $teacher_id)
                                    ->get();
        return response()->json($data);
    }

    public function ExportFileMarkCsv(Request $request)
    {
        $report_id = $request -> report_id;
        $subject_id=$request -> subject_id;
        $teacher_id= auth()->user()->teacher_id;
        $semester = $request -> semester;
        $data = DB::table('reports')->join('teacher_to_subjects', 'teacher_to_subjects.id','=','reports.teacher_to_subject_id')
                                    ->join('teachers', 'teachers.id','=','teacher_to_subjects.teacher_id')
                                    ->join('subjects', 'subjects.id','=','teacher_to_subjects.subject_id')
                                    ->join('students', 'students.id','=','reports.student_id')
                                    
                                    ->select('*', 'reports.note as report_note','reports.id as report_id','teachers.first_name as teacher_first_name',)  
                                    ->select('teacher_to_subjects.semester','teacher_to_subjects.year',
                                                'teachers.id as teacher_id','teachers.first_name as teacher_name',
                                                'subjects.id as subject_id','subjects.name',
                                                'students.id as student_id','students.first_name as student_name',
                                                'reports.mark'
                                            )          
                                    //->where('subject_id', $subject_id)
                                    ->where('teacher_id', $teacher_id)                         
                                    // ->where('report_id', $report_id)
                                    ->get();
        return response()->json($data);
    }




}
