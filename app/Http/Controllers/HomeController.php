<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Models\User;



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
    public function index()
    {
        return view('home');
    }
    public function student_form(Request $request)
    {
        $current_userid = Auth::user()->id;
        $check = User::where('id', $current_userid)->get();
        if ($check[0]["student_id"] == NULL || $check[0]["role_id"] != 4) {
            return view('student_form');
        } else {
            return redirect()->route('home');
        }
    }
    public function teacher_form()
    {

        return view('teacher_form');
    }
    public function add_student()
    {

        return view('addstudent');
    }
}
