<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

}

