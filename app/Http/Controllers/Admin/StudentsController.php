<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ImportStudent;
use App\Models\Import;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
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

}

