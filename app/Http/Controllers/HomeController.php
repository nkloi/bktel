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
    public function index()
    {
        $user = Auth::user();
        $student_id= $user -> student_id;
        $role_id = $user -> role_id;
        if($student_id == null){
        return view('home');}    //de cap nhat thong tin nhung chua submit duoc. cap nhat thong tin o nut information

        else if($role_id == 1) {
            return view('auth.admin');
        }
        else if($role_id == 4) {
            return view('auth.guest');
        }
        else if(($role_id == 2) )
        {
            return response()->json('Role nay la supervisor');
        }
        else if($role_id == 3)
        {
            return response()->json('Role nay la techer');
        }
        else;
    }
}
