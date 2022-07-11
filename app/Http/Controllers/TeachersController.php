<?php

namespace App\Http\Controllers;

use App\Jobs\ImportTeacher;
use App\Models\Import;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    public function showRegister()
    {
        return view('teachers.register');
    }

    public function showImport()
    {
        return view('teachers.import');
    }

    public function store(Request $request)
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

    public function storeImport(Request $request)
    {
        $path = storage_path('app\data\\');
        // $file_name = $request->file->getClientOriginalName();
        $name = $request->name;

        $generated_new_name = date('Ymd_His') . '_' . $request->file->getClientOriginalName();
        $path_import = 'app\data\\' . $generated_new_name;
        $request->file->move($path, $generated_new_name);

        $import = new Import();
        $import->name = $name;
        $import->path = $path_import;
        $import->status = 0;
        $import->save();

        dispatch(new ImportTeacher($path_import, $request->name, $import));

        return response()->json($request);
    }

    public function getAllTeachers(Request $request)
    {
        return response()->json(Teacher::all());
    }
}