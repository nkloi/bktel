<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ImportJob;
use App\Jobs\ImportStudent;
use App\Models\Import;
use Facade\FlareClient\Http\Response;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{


    public function index()
    {
        return view('dashboard.home');
    }
    public function RegisterStudent()
    {

        return view('dashboard.student.register');
    }
    public function RegisterTeacher()
    {

        return view('dashboard.teacher.register');

    }
    public function ShowformImportTeacher()
    {
        return view('dashboard.admin.import_teacher');
    }

    public function ImportTeacher(Request $request)
    {
        $path = storage_path('app\data\\');
        $name = $request->name;

        $generated_new_name = date('Ymd_His') . '_' . $request-> file-> getClientOriginalName();
        $path_import = '\app\data\\' . $generated_new_name;
        $request->file->move($path, $generated_new_name);

        $import = new Import();
        $import->name = $name;
        $import->path = $path_import;
        $import->created_by =  $name ;
        $import->status = 0;
        $import->save();

        dispatch(new ImportJob($path_import, $request->name, $import));

        return response()->json('success import teacher');

    }
    public function ShowformImportStudent()
    {
        return view('dashboard.admin.import_student');
    }
    public function ImportStudent(Request $request)
    {
        $path = storage_path('app\data\\');
        $name = $request->name;;
        $generated_new_name = date('Ymd_His') . '_' . $request-> file-> getClientOriginalName();
        $path_import = '\app\data\\' . $generated_new_name;
        $request->file->move($path, $generated_new_name);

        $import = new Import();
        $import->name = $name;
        $import->path = $path_import;
        $import->created_by =  $name ;
        $import->status = 0;
        $import->save();

        dispatch(new ImportStudent($path_import, $request->name, $import));

        return response()->json('success import student');

    }



    public function test()
    {
        return view('test');
    }

}
