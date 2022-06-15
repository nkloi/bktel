<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    //action get student with id
    public function show(Request $request, $student_id)
    {
        $studentEntity = Student::find($student_id);
        $user = $studentEntity->user;

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
}
