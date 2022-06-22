<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\teachers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\Cloner\Data;

class TeacherController extends Controller
{
    //
    public function teacher_menu(){
        return view('auth.teacher_form');
    }

    public function information(){

        return view('auth.information');

    }

    public function add_teacher(Request $request){
        
        $data = $request->all();

        teachers::create([
            'last_name' => $data["last_name"],
            'first_name' => $data["first_name"],
            'teacher_code' => $data["teacher_code"],
            'department' => $data["department"],
            'faculty' => $data["faculty"],
            'address' => $data["address"],
            'phone' => $data["phone"],
            'note' => $data["note"],
        ]);

        User::create([
            'email' => $data["email"],
            'name'  => $data["last_name"].$data["first_name"],
            'password' => Hash::make('Bmvt@2022'),
            
        ]);

        $lastId = teachers::max('id');
        User::where('email', $data["email"])->update(['teacher_id' => $lastId]);

        return response()->json($data);

    }
}
