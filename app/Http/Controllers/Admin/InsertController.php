<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;

class InsertController extends Controller
{
    //
        //action save student 
        public function relationship()
        {
            
            $user = new User();
            $user->name="tri";
            $user->email="tri@gmail.com";
            $user->password="123456";

            $student = new Student();
            $student->last_name="tri";
            $student->first_name="nguyen";
            $student->student_code="123";
            $student->department="hcmut";
            $student->faculty="html";
            $student->address="ktxA";
            $student->phone="0386639364";
            $student->note="nothing";
    
            $student->save();
    
            $student->user()->save($user);
    
            return response()->json($user);
    
        }
    
}
