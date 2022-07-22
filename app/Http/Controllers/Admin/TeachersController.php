<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\Import as JobsImport;
use App\Jobs\ImportTeacher;
use App\Models\Import;
use App\Models\Report;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    public function index() {
        return view('home');
    }


    public function showRegister() {
        return view('teacher.registerteacher');
    }

    public function showImport() {
        return view('teacher.importteacher');
    }
    
    public function store(Request $request)
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

    public function storeImport(Request $request){
        $path = storage_path('app\data\\');
        // $file_name = $request->file->getClientOriginalName();
        $name = $request->name;

        $generated_new_name = date('Ymd_His') . '_' . $request->file->getClientOriginalName();
        $path_import = 'app\data\\' . $generated_new_name;
        $request->file->move($path, $generated_new_name);

        $import = new Import();
        $import->name = $name;
        $import->path = $path_import;
        $import->status = 0;
        $import->save();

        dispatch(new ImportTeacher($path_import, $request->name, $import));

        return response()->json($request);
    }

    public function getAllTeachers(Request $request)
    {
        return response()->json(Teacher::all());
    }

    public function ShowUploadMark(){
        return view('teacher.uploadmark');
    }

    public function SearchReport(Request $request){
        $subject_id = $request -> subject_id;
        $student_id = $request -> student_id;
        $teacher_id = auth() -> user() -> teacher_id;
        $semester = $request -> semester;
        $year = $request -> year;
        $data = DB::table('reports') -> join('teacher_to_subjects','teacher_to_subjects.id','=','reports.teacher_to_subject_id')
        -> join('teachers','teachers.id','=','teacher_to_subjects.teacher_id')                                  
        -> join('subjects','subjects.id','=','teacher_to_subjects.subject_id')
        -> join('students','students.id','=','reports.student_id')
        -> select("*",'reports.note as report_note','reports.id as report_id','teachers.first_name as teacher_fname',
                                                'teachers.last_name as teacher_lname','students.first_name as student_fname','students.last_name as student_lname')
                                     
                                    //  -> where('student_id',$student_id)
                                    //  -> where('teacher_id',$teacher_id)
                                    //  -> where('subject_id',$subject_id)
                                    //  -> where('semester',$semester)
                                     -> where('year',$year)
                                     -> get();
        return response()->json($data);
    }

    public function DownloadFileReport(Request $request)
    {

        $report_id= $request -> report_id;

        $report = Report::find($report_id);
        $path = storage_path($report->path);
        $name = $report -> title;
        $headers = array(
            'Content-Type: application/pdf',
          );
        return response()->download($path);

    }

    public function SetMarkReport(Request $request){
        $report_id = $request -> report_id;
        $report = Report::find($report_id);
        $report -> mark = $request -> mark;
        $report -> save();
        $data = $report;
        return response() -> json($data);

    }

}

