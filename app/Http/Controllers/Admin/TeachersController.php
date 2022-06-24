<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
     public function show2(Request $request, $teacher_id)
    {
        $studentEntity = Teacher::find($teacher_id);
        $user = $studentEntity->user;

        $email = $user->email;
        $studentArr = $studentEntity->attributesToArray();
        $studentArr["email"] = $email;

        return response()->json($studentArr);
    }

    public function store2(Request $request)
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
    public function register()
    {
        return view ('auth.addteacher');
    }

}
