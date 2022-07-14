<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class TeacherController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('admin');
   }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index()
   {
       return view('layouts.teacher');
   }
   public function store(Request $request){
       
       $data = $request->all();

       teacher::create([
           'last_name' => $data["last_name"],
           'first_name' => $data["first_name"],
           'teacher_code' => $data["teacher_code"],
           'department' => $data["department"],
           'faculty' => $data["faculty"],
           'address' => $data["address"],
           'phone' => $data["num"],
           'note' => $data["note"],
       ]);

       User::create([
           'email' => $data["email"],
           'name'  => $data["last_name"].$data["first_name"],
           'password' => Hash::make('Bmvt@2022'),
           
       ]);

       $lastId = teacher::max('id');
       User::where('email', $data["email"])->update(['teacher_id' => $lastId]);

       return response()->json($data);
   }   
}

