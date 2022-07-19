<?php

namespace App\Http\Controllers;

use App\Jobs\jobStudent;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Import;
use Illuminate\Support\Facades\Auth;
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

    public function upload(Request $request)
    {
        $data = $request->file("file");
        $original_name = $data->getClientOriginalName();
        $name = date('Ymd_His_') . $original_name;
        $path = $data->storeAs('data', $name);
        Import::create([
            'name' => $request->name,
            'path' => $path,
            'status' => 0,
            'created_by' => Auth::user()->name,
            'note' => $request->note,
        ]);
        $id = Import::max('id');
        $file_path = storage_path('app\\data\\' . $name);
        $file = fopen($file_path, "r");
        while (!feof($file)) {
            $content[] = fgetcsv($file, 0, ',');
        }
        jobStudent::dispatch($content, $id)->delay(5);
        return redirect()->route('home');
    }
}
