<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\TeachersExport;
use App\Imports\TeachersImport;
use App\Jobs\UploadCsvFile;
use App\Models\imports;
use App\Models\teachers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use function GuzzleHttp\Promise\all;
use function PHPUnit\Framework\returnValueMap;

class UploadController extends Controller
{
    //
    public function uploadTeachers()
    {
        return view('auth.upload');
    }

    public function importTeachers(Request $request)
    {

        // Excel::import(new TeachersImport, $request->file);

        $file = $request->file('file');

        $fullname = $file->getClientOriginalName();

        $name = date('Ymd_His_') . $fullname;

        $path = $request->file('file')->storeAs( 'data', $name);

        $userimport = new imports();

        $userimport->name = $request->username;
        $userimport->path = $path;
        $userimport->status = 0;
        $userimport->name = Auth::user()->name;
        $userimport->note = "ok";
        $userimport->save();

        // imports::create([

        //     'name' => $request->username,
        //     'path' => $path,
        //     'status' => 0,
        //     'create_by' => Auth::user()->name,
        //     'note' => 'ok', 

        // ]);

        UploadCsvFile::dispatch($path,$userimport);

        return response()->json('success!');

    }

    public function testLoop()
    {
        // $teachers = teachers::all()->first();

        // $teachers_id = $teachers->id;

        // $teachers_id = DB::table('teachers')->lists('last_name');

        // $roles = DB::table('roles')->lists('title');


        $teachers = DB::table('teachers')->get();


        foreach ($teachers as $teacher) {

            $users = User::where("teacher_id", $teacher->id)->get();

            foreach ($users as $user) {

                $id = $user[0]["id"];
                // if($user->id == NULL)
                // {

                //     User::create([

                //         'name' => 'thayloi',
                //         'email' => "khanhloi99@gmail.com",
                //         'password' => Hash::make("Bmvt@2022"),
                //         'role_id' => 3,
                //         'teacher_id' => $teachers->id,

                //     ]);

                // }
            }


            $user_added = User::all();

            return response()->json($id);
        }

        // return response()->json($teachers_id);

    }
}
