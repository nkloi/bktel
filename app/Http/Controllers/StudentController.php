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
        $student = $studentEntity->get()[0];
        $user = $studentEntity->user;

        $email = $user->email;
        $studentArr = $student->attributesToArray();
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
        $user->student_id = $student->id;
        $user->save();

        return response()->json($user);
    }

    //acction update student
    public function update(Request $request, $student_id)
    {
        $student = Student::find($student_id)->update($request->all());
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