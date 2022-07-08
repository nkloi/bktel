<?php

namespace App\Http\Controllers;

use App\Exports\ExportUsers;
use App\Imports\UsersImport;
use App\Jobs\ProcessImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\User;
use App\Models\import;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Process\Process;

class TeacherController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function upload()
    {
        return view('layouts.uploadTeacher');

    }

   public function importExport()
    {

        $datafile = request()->file('teachers_file');
        $name = $datafile->getClientOriginalName();
        $fullname = date('Ymd_His_') . $name;
        $path = request() -> file('teachers_file')->storeAs('data', $fullname);
        Excel::import(new UsersImport, request()->file('teachers_file'));

        $userimport = new import();

        $userimport->name = request()->username;
        $userimport->path = $path;
        $userimport->status = 0;
        $userimport->note = "ok";
        $userimport->save();

        ProcessImport::dispatch($path, $userimport)->delay(10);
        return response()->json('success!');
    }

    public function export()
    {
        
    }
    

   public function __construct()
   {
    //    $this->middleware('admin');
   }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index()
   {
       return view('layouts.teacher');
   }

   public function store(Request $request)
   {
       info($request);
       $data = $request->all();
       teacher::create([
           'last_name' => $data["last_name"],
           'first_name' => $data["first_name"],
           'teacher_code' => $data["teacher_code"],
           'department' => $data["department"],
           'faculty' => $data["faculty"],
           'address' => $data["address"],
           'phone' => $data["num"],
           'note' => $data["note"],
       ]);

       User::create([
           'email' => $data["email"],
           'name'  => $data["last_name"].$data["first_name"],
           'password' => Hash::make('Bmvt@2022'),
           
       ]);

       $lastId = teacher::max('id');
       User::where('email', $data["email"])->update(['teacher_id' => $lastId]);

       return response()->json($data);
   }   
}
