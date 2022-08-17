<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher_to_subjects;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        return view('layouts.UploadReport');
    }

    public function postSearch(Request $request)
    {
        $data1 = teacher_to_subjects::where('teacher_id',  $request->teacher_id)->where('subject_id',  $request->subject_id)->where('semester', $request->semester)->where('year', $request->year)->get();
        return $data1;
    }

    public function reportSearch(Request $request)
    {
        $subject_id = $request -> subject_id;
        $student_id = $request -> student_id;
        $teacher_id = auth() -> user() -> teacher_id;
        $semester = $request -> semester;
        $year = $request -> year;
        $data = DB::table('reports') -> join('teacher_to_subjects','teacher_to_subjects.id','=','reports.teacher_to_subject_id')
        -> join('teachers','teachers.id','=','teacher_to_subjects.teacher_id')                                  
        -> join('subjects','subjects.id','=','teacher_to_subjects.subject_id')
        -> join('students','students.id','=','reports.student_id')
        -> select("*",'reports.note as report_note','reports.id as report_id','teachers.first_name as teacher_fname',
                                                'teachers.last_name as teacher_lname','students.first_name as student_fname','students.last_name as student_lname')
        -> where('year',$year)->where('subject_id',$subject_id)->where('student_id', $student_id)->where('teacher_id',$teacher_id)->where('semester',$semester)
        -> get();
        return response()->json($data);
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
        $report->note = $request->note;
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