<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index()
    {
        return view('dashboard.home');
    }
    public function RegisterStudent()
    {

        return view('dashboard.student.register');
    }
    public function RegisterTeacher()
    {

        return view('dashboard.teacher.register');
    }


}
