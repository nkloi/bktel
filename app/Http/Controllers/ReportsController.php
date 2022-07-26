<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class ReportsController extends Controller
{
    public function upload(Request $request)
    {
        $data = $request->file("file");
        $original_name = $data->getClientOriginalName();
        $path = $data->storeAs('reports/' . $request->year . '/' . $request->semester . '/' . $request->subject_id, $original_name);
        try {
            Report::create([
                'student_id' => Auth::user()->student->id,
                'teacher_to_subject_id' => $request["id"],
                'title'    => $request["title"],
                'path'    => $path,
                'note'  => $request["note"]
            ]);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
        return 'success';
    }
}