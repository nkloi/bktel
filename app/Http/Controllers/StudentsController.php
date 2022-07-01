<?php

namespace App\Http\Controllers;

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
        return view('students.register');
    }
    
    public function show(Request $request, $student_id)
    {
        $studentEntity = Student::find($student_id);
        $student = $studentEntity->get()[0];
        $user = $studentEntity->user;

        $email = $user->email;
        $studentArr = $student->attributesToArray();
        $studentArr["email"] = $email;
        
        return response()->json($studentArr);
    }

    public function update(Request $request, $student_id)
    {
        $student = Student::find($student_id)->update($request->all());
        return response('success', 200);
    }

    public function destroy(Request $request, $student_id)
    {
        $student = Student::find($student_id);

        $student->delete();

        return response('suceess', 200);
    }

    public function store(Request $request)
    {
        // info($request);
        $user = auth()->user();
        $student = new Student();
        $student->fill($request->all());
        $student->save();

        $student->user()->save($user);

        return response()->json($student);
    }

    public function showImport() {
        return view('students.import');
    }

    public function storeImport(Request $request)
    {
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

        return response()->json('success');
    }


}