<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class StudentsController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $user = User::where('email', $data["email"])->get();

        $userArr = $user->toArray();

        if ($userArr != null) {
            Student::create([
                'last_name' => $data["last_name"],
                'first_name' => $data["first_name"],
                'student_code' => $data["student_code"],
                'department' => $data["department"],
                'faculty' => $data["faculty"],
                'address' => $data["address"],
                'phone' => $data["phone"],
                'note' => $data["note"],
            ]);
            $lastId = Student::max('id');
            User::where('email', $data["email"])->update(['student_id' => $lastId]);
            return redirect()->route('student.show', ['id' => $lastId]);
        } else {
            echo "<script type='text/javascript'>alert('Email not found');</script>";
        }
    }
    public function create(Request $request)
    {
        return view('create');
    }
    public function show(Request $request, $id)
    {
        $student = Student::where('id', $id)->first();
        return view('info', ['info' => $student]);
    }
    public function edit(Request $request, $id)
    {
        $student = Student::where('id', $id)->first();
        return view('edit', ['info' => $student]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        Student::where('id', $id)->update([
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
    public function destroy(Request $request, $id)
    {
        User::where('student_id', $id)->update(['student_id' => NULL]);
        Student::where('id', $id)->delete();
        return redirect()->route('home');
    }
}
