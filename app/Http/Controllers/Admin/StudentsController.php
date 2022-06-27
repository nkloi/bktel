<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\students;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class StudentsController extends Controller
{   

    public function show( Request $request){

        $students = students::all();
        
        return response()->json($students);

    }

    public function show_user(){
        $user = User::all();
        return response()->json($user);
    }

    public function information(){

        return view('auth.information');

    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = User::where('email', $data["email"])->get();
        $userArr = $user->toArray();
        if ($userArr != null) {
            students::create([
                'last_name' => $data["last_name"],
                'first_name' => $data["first_name"],
                'student_code' => $data["student_code"],
                'department' => $data["department"],
                'faculty' => $data["faculty"],
                'address' => $data["address"],
                'phone' => $data["phone"],
                'note' => $data["note"],
            ]);
            $lastId = students::max('id');
            User::where('email', $data["email"])->update(['student_id' => $lastId]);
            return redirect()->route('login');
        } else {
            echo "User Not Found";
        }
    }


    public function edit(Request $request, $id)
    {
        $student = students::where('id', $id)->first();
        return view('edit', ['info' => $student]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        students::where('id', $id)->update([
            'last_name' => $data["last_name"],
            'first_name' => $data["first_name"],
            'student_code' => $data["student_code"],
            'department' => $data["department"],
            'faculty' => $data["faculty"],
            'address' => $data["address"],
            'phone' => $data["phone"],
            'note' => $data["note"],
        ]);
        return redirect()->route('student.edit', ['id' => $id]);
    }

    public function delete(Request $request, $student_id)
    {
        User::where('student_id', $student_id)->update(['student_id' => NULL]);
        students::where('id',  $student_id)->delete();
        
        return redirect()->route('show.user');
    }

    public function delete_user(Request $request, $user_id)
    {
        User::where('id', $user_id)->delete();
        
        return redirect()->route('show.user');
    }


}