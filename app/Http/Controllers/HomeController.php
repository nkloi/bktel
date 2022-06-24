<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\students;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isStudent');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $user = Auth::user();
        
        $student_id = $user->student_id;

        if ($student_id != null){

            return view('home');
            
        }
        else{

            if (Auth::user()-> role_id == '1'){

                return view('home');

            }
            else{

                return redirect()->route('student.information');
                // return view('home');
            }

            // return redirect()->route('student.information');

        }

    }
}
