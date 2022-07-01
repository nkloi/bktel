<?php

namespace App\Http\Controllers;

use App\Jobs\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\import;
use App\Imports\UsersStudentsImport;


class StudentController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function upload()
    {
        return view('layouts.uploadStudent');

    }

   public function importExport()
    {

        $datafile = request()->file('students_file');
        $name = $datafile->getClientOriginalName();
        $fullname = date('Ymd_His_') . $name;
        $path = request() -> file('students_file')->storeAs('data', $fullname);
        Excel::import(new UsersStudentsImport, request()->file('students_file'));

        $userimport = new import();

        $userimport->name = request()->username;
        $userimport->path = $path;
        $userimport->status = 0;
        $userimport->note = "ok";
        $userimport->save();

        StudentsImport::dispatch($path, $userimport)->delay(10);
        return response()->json('success!');
    }

    public function export() 
    {
        
    }


   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   
}
