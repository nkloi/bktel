<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = Auth::user()->id;
        // dd($request["faculty"]);   
        teacher::create([
            'first_name' => $data["first_name"],
            'last_name'  => $data["last_name"],
            'department' => $data["department"],
            'faculty' => $data["faculty"],
            'email' => $data["email"],
            'phone' => $data["phone"],
            'address' => $data["address"],
            'teacher_code' => $data["teacher_code"],
            'note' => $data["note"]
        ]);
        $lastId = teacher::max('id');
        User::create([
            'teacher_id' => $lastId,
            'role_id' => 3,
            'name' => $data["first_name"] . " " . $data["last_name"],
            'email' => $data["email"],
            'password' => Hash::make('Bmvt@2022'),
        ]);
    }
}
