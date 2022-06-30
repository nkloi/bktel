<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function show(Request $request, $student_id)
    {
        $studentEntity = Student::find($student_id);
        //$studentEntity->user()->toArray();
        //return $studentEntity;
        return view('auth.info', ['info' => $studentEntity]);
        //return response()->json($studentEntity);
       
    } 

    public function store(Request $request)
    {
        // info($request);
        $user = auth()->user();
        $student = new Student();
        $student->fill($request->all());
        $student->save();

        $student->user()->save($user);
        return view('auth.info', ['info' => $student]);
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

    public function information()
    {
            return view('auth.information');

    }
}