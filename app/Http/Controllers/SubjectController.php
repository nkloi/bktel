<?php

namespace App\Http\Controllers;

use App\Jobs\SubjectsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersSubjectsImport;
use App\Models\import;
use App\Models\Subject;

class SubjectController extends Controller
{
     /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function upload()
    {
        return view('layouts.uploadSubject');

    }

    public function uploadbyhand()
    {
        return view('layouts.subject');

    }

   public function importExport()
    {

        $datafile = request()->file('subjects_file');
        $name = $datafile->getClientOriginalName();
        $fullname = date('Ymd_His_') . $name;
        $path = request() -> file('subjects_file')->storeAs('data', $fullname);
        Excel::import(new UsersSubjectsImport, request()->file('subjects_file'));

        $userimport = new import();

        $userimport->name = request()->username;
        $userimport->path = $path;
        $userimport->status = 0;
        $userimport->note = "ok";
        $userimport->save();

        SubjectsImport::dispatch($path, $userimport)->delay(10);
        return response()->json('success!');
    }

    public function importbyhand(){

        $subjects = request()->all();

        $new_subject = new Subject();

        $new_subject->name = $subjects["name"];
        $new_subject->code = $subjects["code"];
        $new_subject->note = $subjects["note"];
        $new_subject->save();

        return redirect()->route('byhand.subjects');

    }

    public function export() 
    {
        
    }   
}
