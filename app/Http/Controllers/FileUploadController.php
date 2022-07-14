<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\TeacherToSubjects;
use App\Models\Report;

class FileUploadController extends Controller
{
    public function fileUploadPost(Request $request)
    {
        
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        $fileName =$request->file->getClientOriginalName();  
        $reports = $request->all();
        $path = $request->file->move(app_path('reports'), $fileName);        

        $teacher_to_subjects = TeacherToSubjects::where('teacher_id', $request->teacher_id)->where('subject_id', $request->subject_id)->first();

        $teacher_to_subjects_id = $teacher_to_subjects->id;
        
        $report = new Report();
        $report->student_id = $request->student_id;
        $report->teacher_to_subject_id = $teacher_to_subjects_id;
        $report->title = $request->name;
        $report->path = $path;
        $report->save();
        
        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);
        
    }

    public function confirm(Request $request){

        $data = $request->all();
        return response()->json($data);
    }
}