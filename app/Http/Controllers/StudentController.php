<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $student = \App\Models\student::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách học sinh",
        'data'=>\App\Http\Resources\student::collection($student)
        ];
        return response()->json($arr, 200);
    }
   
    public function store(Request $request)
    {
        $input = $request->all(); 
        $student = \App\Models\student::create($input);
        $arr = ['status' => true,
            'message'=>"Học sinh đã lưu thành công",
            'data'=> new \App\Http\Resources\student($student)
        ];
        return response()->json($arr, 201);
    }

    public function show($id)
    {
        $student = \App\Models\student::find($id);
        if (is_null($student)) {
           $arr = [
             'success' => false,
             'message' => 'Không có học sinh này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết học sinh ",
          'data'=> new \App\Http\Resources\student($student)
        ];
        return response()->json($arr, 201);
    }

    
    public function update(Request $request,\App\Models\student $student)
    {
        $input = $request->all();
        $student->id = $input['id'];
        $student->last_name = $input['last_name'];
        $student->first_name = $input['first_name'];
        $student->student_code = $input['student_code'];
        $student->department = $input['department'];
        $student->faculty = $input['faculty'];
        $student->address = $input['address'];
        $student->phone = $input['phone'];
        $student->note = $input['note'];
        $student->save();
        $arr = [
            'status' => true,
            'message' => 'Học sinh cập nhật thành công',
            'data' => new \App\Http\Resources\student($student)
        ];
        return response()->json($arr, 200);
    }

    
    public function destroy(\App\Models\student $student)
    {
        $student->delete();
        $arr = [
           'status' => true,
           'message' =>'Học sinh này đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
