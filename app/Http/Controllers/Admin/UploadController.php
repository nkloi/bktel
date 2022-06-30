<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\TeachersExport;
use App\Imports\TeachersImport;
use App\Jobs\StudentCsvUpload;
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

    public function uploadStudents()
    {
        return view('auth.upload_student');
    }

    public function importStudents(Request $request)
    {

        $file = $request->file('student_file');

        $fullname = $file->getClientOriginalName();

        $name = date('Ymd_His_') . $fullname;

        $path = $request->file('student_file')->storeAs('data', $name);

        $userimport = new imports();

        $userimport->name = $request->username;
        $userimport->path = $path;
        $userimport->status = 0;
        $userimport->note = "ok";
        $userimport->save();

        StudentCsvUpload::dispatch($path, $userimport)->delay(10);

        return response()->json('Adding Students successfully!');
    }

    public function importTeachers(Request $request)
    {

        $file = $request->file('file');

        $fullname = $file->getClientOriginalName();

        $name = date('Ymd_His_') . $fullname;

        $path = $request->file('file')->storeAs('data', $name);

        $userimport = new imports();

        $userimport->name = $request->username;
        $userimport->path = $path;
        $userimport->status = 0;
        $userimport->note = "ok";
        $userimport->save();

        UploadCsvFile::dispatch($path, $userimport)->delay(10);

        return response()->json('success!');
    }

    public function testLoop()
    {

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
