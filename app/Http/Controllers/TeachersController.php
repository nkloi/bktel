<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    public function index() {
        return view('home');
    }


    public function showRegister() {
        return view('teachers.register');
    }
    
    public function store(Request $request)
    {
        $user = new User();
        $teacher = new Teacher();
        info($request->department);

        $user->email = $request->email;
        $user->password = Hash::make('Bmvt@2022');
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->role_id = config('constant.roles.teacher');
        $user->save();
        $teacher->fill($request->all())->save();
        $teacher->user()->save($user)->toArray();
        $teacher["email"] = $user->email;

        return response()->json($teacher);
    }
}
