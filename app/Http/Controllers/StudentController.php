<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use Users;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    

    public function store(Request $request)
    {
        
        // dd($request["faculty"]);   
    Student::create([
        'first_name' => $request["first_name"],
        'last_name'  => $request["last_name"],
        'department' => $request["department"],
        'faculty' => $request["faculty"],
        'phone' => $request["phone"],
        'address' => $request["address"],
        'student_code' => $request["student_code"],
        'note' => $request["note"]
    ]);
    $lastId = Student::max('id');
    
    
    return redirect()->route('student.show', ['id' => $lastId]);

        // $student->save();
    
        // $user = auth()->user();
        // $student = new Student();
        // $student->fill($request->all());
        // $student->user()->save($user);

        // return response()->json($student);
    }

    
    public function show(Request $request, $student_id)
    {
        $student = Student::where('id',$student_id)->get();
        return $student;
        // $studentEntity = student::find($student_id);
        // $student = $studentEntity->get()[0];
        // $user = $studentEntity->user;

        // $email = $user->email;
        // $studentArr = $student->attributesToArray();
        // $studentArr["email"] = $email;

        // return response()->json($studentArr);
    }
    public function create(Request $request)
    {
        return view('create');
    }

    public function edit(Request $request, $student_id)
    {
        $student = Student::where('id', $student_id)->first();
        return view('edit', ['info' => $student]);
    }
    
    public function update(Request $request, $id)
    {
        
        // $student = Student::where('id', $id)-> first();
        // $data = $request->all();
        // dd($data);
        // Student::update($data);
        Student::where('id', $id) -> update([
            'last_name'  => $request["last_name"],
            'first_name' => $request["first_name"],
            
            'department' => $request["department"],
            'faculty' => $request["faculty"],
            'phone' => $request["phone"],
            'address' => $request["address"],
            'student_code' => $request["student_code"],
            'note' => $request["note"]
        ]);
        // echo"success update user";
        return redirect()->route('student.edit', ['id'=> $id]);
    }
    public function delete($student_id)
    {
        $student = Student::where('id',$student_id);
        $student ->delete();
        

        return redirect()->route('home');
    }
}
