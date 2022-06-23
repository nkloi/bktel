<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        // $validatedData = $request->validate([
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/(.+)@hcmut.edu.vn/i'],
        // ]);

        Teacher::create([
            'last_name' => $data["last_name"],
            'first_name' => $data["first_name"],
            'teacher_code' => $data["teacher_code"],
            'department' => $data["department"],
            'faculty' => $data["faculty"],
            'address' => $data["address"],
            'phone' => $data["phone"],
            'note' => $data["note"],
        ]);
        $lastId = Teacher::max('id');
        User::create([
            'teacher_id' => $lastId,
            'role_id' => 3,
            'name' => $data["first_name"] . " " . $data["last_name"],
            'email' => $data["email"],
            'password' => Hash::make('Bmvt@2022'),
        ]);
    }
}
