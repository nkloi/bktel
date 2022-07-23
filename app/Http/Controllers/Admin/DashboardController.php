<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ImportJob;
use App\Jobs\ImportStudent;
use App\Jobs\ImportSubject;
use App\Models\Import;
use App\Models\Subject;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpOption\None;

class DashboardController extends Controller
{


    public function index()
    {
        $user = auth() -> user();
        return view('layouts.dashboard', compact('user'));
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

        dispatch(new ImportStudent($path_import, $request->name, $import));

        return response()->json('success import student');

    }
    public function ShowImportSubject()
    {
        return view('dashboard.admin.import_subject');
    }

    public function ImportSubject(Request $request)
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

        dispatch(new ImportSubject($path_import, $request->name, $import));

        return response()->json('success import subject');
    }

    public function ShowFormSubject()
    {
        return view('dashboard.admin.form_subject');
    }
    public function FormSubject(Request $request)
    {
        $subject = new Subject();
        $subject->fill($request->all());
        $subject-> save();
        return response()->json('sucess');
    }

    public function test()
    {
        return view('test');
    }
    public function UploadUserAvatar()
    {
        $user = auth() -> user();
        $profile_image_url = $user -> profile_image_url;
        $name= substr( $profile_image_url , 12 , 100 );
        $path= '\storage\\' . $name;
        return view('dashboard.user.upload_user_avatar', compact('user','path','profile_image_url'));
    } 
    public function SaveUserAvatar(Request $request)
    {   
        $path = storage_path('app\public\profile_image\\');
        $user_id = auth()->user()->id;
        $file_name = $request-> file('image') -> getClientOriginalName();
        $name = '\app\public\profile_image\\' . $file_name;
        $request->file('image')->move($path, $file_name);
        $profile_image_url = '\app\public\profile_image\\' . $file_name;
        $user = User::find($user_id); 
        $user -> profile_image_url = $profile_image_url;
        $user ->save();
        return response()->json($file_name);

    } 

}
