<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SubjectCsvUpload;
use Illuminate\Http\Request;
use App\Models\imports;
use App\Models\subjects;

class SubjectUploadController extends Controller
{
    //
    public function uploadbyhand()
    {
        return view('auth.SubjectbyHand');
    }

    public function uploadSubjects()
    {
        return view('auth.SubjectUpload');
    }

    public function importSubjects(Request $request)
    {

        $file = $request->file('subject_file');

        $fullname = $file->getClientOriginalName();

        $name = date('Ymd_His_') . $fullname;

        $path = $request->file('subject_file')->storeAs('subject', $name);

        $userimport = new imports();

        $userimport->name = $request->username;
        $userimport->path = $path;
        $userimport->status = 0;
        $userimport->note = "ok";
        $userimport->save();

        SubjectCsvUpload::dispatch($path, $userimport)->delay(10);

        return response()->json('Adding Students successfully!');
    }

    public function importbyhand(Request $request){

        $subjects = $request->all();

        $new_subject = new subjects();

        $new_subject->name = $subjects["name"];
        $new_subject->subject_code = $subjects["subject_code"];
        $new_subject->note = $subjects["note"];
        $new_subject->save();

        return redirect()->route('byhand.subjects');

    }

}
