<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function forms()
    {
        return view('form');
    }

    public function teacher_form()
    {
        return view('teacher_form');
    }

    public function teacher_import()
    {
        return view('teacher_import');
    }

    public function student_import()
    {
        return view('student_import');
    }
}
