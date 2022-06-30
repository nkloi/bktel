<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\UpLoadCsvFile_Teacher;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Import;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/(.+)@hcmut.edu.vn/i'],
        ]);

        Teacher::create([
            'last_name' => $data["last_name"],
            'first_name' => $data["first_name"],
            'teacher_code' => $data["teacher_code"],
            'department' => $data["department"],
            'faculty' => $data["faculty"],
            'address' => $data["address"],
            'phone' => $data["phone"],
            'note' => $data["note"],
        ]);
        $lastId = Teacher::max('id');
        User::create([
            'teacher_id' => $lastId,
            'role_id' => 3,
            'name' => $data["first_name"] . " " . $data["last_name"],
            'email' => $data["email"],
            'password' => Hash::make('Bmvt@2022'),
        ]);
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
        UpLoadCsvFile_Teacher::dispatch($content, $id)->delay(5);
        return redirect()->route('home');
    }
}
