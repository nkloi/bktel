<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ImportStudent;
use App\Models\Import;
use App\Models\Report;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    public function index() {
        return view('home');
    }


    public function showRegister() {
        return view('student.register');
    }

    public function showImport() {
        return view('student.import');
    }

    //action with student_id
    public function show(Request $request, $student_id)
    {
        //get student_id from user to find id in student
        $studentEntity = Student::find($student_id);
        $user = $studentEntity->user;

        //get email in user 
        $email = $user->email;
        $studentArr = $studentEntity->attributesToArray();
        $studentArr["email"] = $email; 

        return response()->json($studentArr); 
    }

    //action save student 
    public function store(Request $request)
    {
        $user = auth()->user();
        $student = new Student();
        $student->fill($request->all());
        $student->save();
        $student->user()->save($user);
        return response()->json($user);
    }

    //get update
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

        dispatch(new ImportStudent($path_import, $request->name, $import));

        
    }

    public function showUpload(){
        return view('student.upload');
    }

    public function showStudentID(){
        $role=auth()->user->student_id;
        return response()->json($role);
    }

    public function SearchSubject(Request $request){
        $teacher=Teacher::where('teacher_code',$request->teacher_code)->get();
        $teacher_id=$teacher[0]["id"];
        $subject=Subject::where('code',$request->subject_code)->get();
        $subject_id=$subject[0]["id"];
        $semester=$request->semester;
        $data=DB::table('teacher_to_subjects') -> select("*",'teachers.first_name as teacher_fname','teachers.last_name as teacher_lname')
                                               -> join('teachers','teachers.id','=','teacher_to_subjects.teacher_id')                                  
                                               -> join('subjects','subjects.id','=','teacher_to_subjects.subject_id')                                     
                                               -> where('teacher_id',$teacher_id)
                                               -> where('subject_id',$subject_id)
                                               -> where('semester',$semester)
                                               -> get();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                                               
        return response()->json($data);
    }

    public function UploadFileReport(Request $request){
        
        $student_id=auth()->user()->student_id;
        $path = storage_path('app\reports\\');
        $generated_new_name = date('Ymd_His') . '_' . $request-> file-> getClientOriginalName();
        $path_import = '\app\reports\\' . $generated_new_name;
        $request->file->move($path, $generated_new_name);

        $report = new Report();
        
        $report -> teacher_to_subject_id = $request -> teacher_to_subject_id;
        $report -> student_id = $student_id;
        $report -> title = $request -> title;
        $report -> path = $path_import;
        $report -> note = $request -> note;
        $report -> save();

        return response()->json('upload sucess');
        
    }
}

