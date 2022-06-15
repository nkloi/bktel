<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\auth;

class StudentsController extends Controller
{
   
   
    
    public function show(Request $request, $student_id)
    {
        $studentEntity = Student::find($student_id);
        $student = $studentEntity->get()[0];
        //$user = $studentEntity->user;

        //$email = $user->email;
        //$studentArr = $student->attributesToArray();
       // $studentArr["email"] = $email;

        //return response()->json($studentArr);
    }
    public function store(Request $request)
    {
    
        //$user = auth()->user();
        $student = new Student();
        $student -> last_name = "nha" ;
        $student -> first_name = "le thanh" ;
        $student -> student_code = "1914422" ;
        $student -> department = "KTX" ;
        $student -> faculty = "abc" ;
        $student -> address = "abc" ;
        $student -> phone = "0346783250" ;
        $student -> note = "nha" ;
        $student -> save(); 


        return response()->json($student);

    }
    public function information(Request $request)

    {
        
        return view('auth.information');
    }
        
        
    
  

}
