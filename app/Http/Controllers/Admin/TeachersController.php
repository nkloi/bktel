<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
     // public function show2(Request $request, $teacher_id)
    // {
    //     $studentEntity = Student::find($teacher_id);
    //     $user = $studentEntity->user;

    //     $email = $user->email;
    //     $studentArr = $studentEntity->attributesToArray();
    //     $studentArr["email"] = $email;

    //     return response()->json($studentArr);
    // }
    //
    public function store2(Request $request)
    {
        $user = auth()->user();
        //DD($user);
        $teacher = new Teacher();
        $teacher->fill($request->all());
        $teacher->save();

        $teacher->user()->save($user);
        $users = User::all();

        return $users->toArray();

        //return view('auth.unicode');
        return response()->json($teacher);
    }
    

}
