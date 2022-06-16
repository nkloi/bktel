<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use App\auth;

class StudentsController extends Controller
{
   
   
    
    public function show(Request $request, $student_id)
    {
        
        $studentEntity = Student::find($student_id);
        $user = $studentEntity->user;

        $email = $user->email;
        $studentArr = $studentEntity->attributesToArray();
        $studentArr["email"] = $email;

        return response()->json($studentArr);
    }
    public function store(Request $request)
    {
        
        $user = auth()->user();
        //DD($user);
        $student = new Student();
        $student->fill($request->all());
        $student->save();

        $student->user()->save($user);
        $users = User::all();
 
        return $users->toArray();

        //return view('auth.unicode');
        //return response()->json($user);
        
        
    }
    public function information(Request $request )

    {
        return view('auth.information');
    }
    public function unicode(Request $request)
    {
        return view('auth.unicode');
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
