<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Models\teacher;
use App\Models\TeacherToSubjects;
use App\Models\Subject;
use App\Models\Import;

class SearchController extends Controller
{
    public function index()
    {
        return view('layouts.projectupl');
    }



    public function postSearch(Request $request)
    {
        $data1 = Subject::where('teacher_id',  $request->teacher_id)->where('subject_id',  $request->subject_id)->where('semester', $request->semester)->where('year', $request->year)->get();
        return $data1;
    }

    public function importSub(Request $request)
    {
        $data = TeacherToSubjects::select("*")
        ->when($request->has('teacher_id'), function ($query) use ($request) {
            $query->whereNotNull('teacher_id');
            $query->where('teacher_id', $request->teacher_id);

        })
        ->when($request->has('semester'), function ($query) use ($request) {
            $query->whereNotNull('semester');
            $query->where('semester', $request->semester);
        })
        ->get();

        foreach ($data as $outcome){
            $teacher_name = teacher::where('id', $outcome->teacher_id)->get();
            $subject_name = Subject::where('id', $outcome->subject_id)->get();
            $outcome->teacher_name = $teacher_name[0]["last_name"].$teacher_name[0]["first_name"];
            $outcome->subject_name = $subject_name[0]["name"];
        }
    }   
}

