<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//     public function index()
//     {
//         return view('layouts.dashboard');
//     }
//     public function student_form()
//      {
//         return view('student_form');
//      }
//      public function teacher_form()
//     {
//         return view('teacher_form');
//      }

public function index()
{
$user = Auth::user();
        
        $student_id = $user->student_id;

        if ($student_id != null){

            return view('layouts.dashboard');
            
        }
        else{

            if (Auth::user()-> role_id == '1'){

                return view('home');

            }
            else{

                return redirect()->route('student.information');
                
            }

           

        }

}
}
