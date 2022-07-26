<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher_to_subjects;
use App\Models\Report;


class SearchController extends Controller
{
    public function index()
    {
        return view('layouts.FormSubjectReport');
    }

    public function postSearch(Request $request)
    {
        $data1 = teacher_to_subjects::where('teacher_id',  $request->teacher_id)->where('subject_id',  $request->subject_id)->where('semester', $request->semester)->where('year', $request->year)->get();
        return $data1;
    }

    public function store(Request $request)
    {
        $fileName = time().'.'.$request->file->getClientOriginalName();

        $reports = $request->all();

        $path = $request->file('file')->storeAs('reports', $fileName);


       $teacher_to_subjects = teacher_to_subjects::where('teacher_id', $request->teacher_id)->where('subject_id', $request->subject_id)->first();

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

    public function confirmation(Request $request)
    {

        $data = $request->all();
        return response()->json($data);
    }
}