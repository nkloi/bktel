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
        $fileName = time() . '.' . $request->file->getClientOriginalName();

        $reports = $request->all();

        $path = $request->file('file')->storeAs('public/newimages', $fileName);

        $teacher_to_subjects = teacher_to_subjects::where('teacher_id', $request->teacher_id)->where('subject_id', $request->subject_id)->first();

        $teacher_to_subjects_id = $teacher_to_subjects->id;

        $report = new Report();

        $report->student_id = $request->student_id;
        $report->teacher_to_subject_id = $teacher_to_subjects_id;
        $report->title = $request->name;
        $report->path = $path;
        $report->save();

        // return response()->json($teacher_to_subjects_id);

        return response()->json(['success' => 'You have successfully upload file.']);
    }

    public function confirmation(Request $request)
    {

        // $data = teacher_to_subjects::where('id', $request->id)->get();
        // return response()->json($data);

        $data = $request->all();
        return response()->json($data);
    }
}
