<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\imports;
use App\Models\Report;
use App\Models\teacher_to_subjects;
use Illuminate\Http\Request;

class UploadStudentReport extends Controller
{
    //
    
    public function formSubmit(Request $request)
    {
        $fileName = time().'.'.$request->file->getClientOriginalName();

        $reports = $request->all();

        $path = $request->file('file')->storeAs('reports', $fileName);

        // $teacher_to_subjects_id = teacher_to_subjects::where('teacher_id', $request->teacher_id)->where('subject_id', $request->subject_id)->get();

        $report = new Report();

        $report->student_id = 1;
        $report->teacher_to_subject_id = 37;
        $report->title = $request->name;
        // $report->title = $request['name'];
        $report->path = $path;
        $report->save();

        return response()->json(['success'=>'You have successfully upload file.']);

        // return response()->json($reports);

        
        
    }

}
