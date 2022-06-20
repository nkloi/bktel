<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function showRegister()
    {
        auth()->user()->student;
        return view('dashboard.student.register');
    }

    public function index()
    {
        return view('dashboard.home');
    }

    //action get student with id
    public function show(Request $request, $student_id)
    {
        $studentEntity = Student::find($student_id);
        $studentEntity->user->toArray();

        return response()->json($studentEntity);
    }

    //action save student
    public function store(StudentRequest $request)
    {
        // info($request);
        $user = auth()->user();
        $student = new Student();
        $student->fill($request->all());
        $student->save();

        $student->user()->save($user);

        return response()->json($student);
    }

    //acction update student
    public function update(StudentRequest $request, $student_id)
    {
        info($request);
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
