<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    public function showRegister()
    {
        return view('dashboard.teacher.register');
    }

    public function store(TeacherRequest $request)
    {
        $user = new User();
        $teacher = new Teacher();

        $user->email = $request->email;
        $user->password = Hash::make('Bmvt@2022');
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->role_id = 3;
        $user->save();
        $teacher->fill($request->all())->save();

        $teacher->user()->save($user)->toArray();
        $teacher["email"] = $user->email;

        return response()->json($teacher);
    }
}
