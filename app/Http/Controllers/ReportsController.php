<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function upload(Request $request)
    {
        $data = $request->file("file");
        $original_name = $data->getClientOriginalName();
        $path = $data->storeAs('reports\\' . $request->year . '\\' . $request->semester . '\\' . $request->subject_id, $original_name);
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
    public function search(Request $request)
    {
        $teacher_id = Auth::user()->teacher_id;
        if (isset($teacher_id)) {
            if ($request["subject_id"] == NULL && $request["student_code"] == NULL && $request["student_name"] == NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['teacher_id' => $teacher_id, 'year' => $request["year"], 'semester' => $request["semester"]])
                    ->get();
            } else if ($request["subject_id"] != NULL  && $request["student_code"] == NULL && $request["student_name"] == NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['teacher_id' => $teacher_id, 'year' => $request["year"], 'semester' => $request["semester"], 'teacher_to_subjects.subject_id' => $request["subject_id"]])
                    ->get();
            } else if ($request["subject_id"] == NULL  && $request["student_code"] != NULL && $request["student_name"] == NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['teacher_id' => $teacher_id, 'year' => $request["year"], 'semester' => $request["semester"], 'students.student_code' => $request["student_code"]])
                    ->get();
            } else if ($request["subject_id"] == NULL  && $request["student_code"] == NULL && $request["student_name"] != NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['teacher_id' => $teacher_id, 'year' => $request["year"], 'semester' => $request["semester"]])
                    ->where('students.first_name', 'LIKE', '%' . $request["student_name"] . '%')
                    ->get();
            } else if ($request["subject_id"] != NULL  && $request["student_code"] != NULL && $request["student_name"] == NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['teacher_id' => $teacher_id, 'year' => $request["year"], 'semester' => $request["semester"], 'teacher_to_subjects.subject_id' => $request["subject_id"], 'students.student_code' => $request["student_code"]])
                    ->get();
            } else if ($request["subject_id"] == NULL  && $request["student_code"] != NULL && $request["student_name"] != NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['teacher_id' => $teacher_id, 'year' => $request["year"], 'semester' => $request["semester"], 'students.student_code' => $request["student_code"]])
                    ->where('students.first_name', 'LIKE', '%' . $request["student_name"] . '%')
                    ->get();
            } else if ($request["subject_id"] != NULL  && $request["student_code"] == NULL && $request["student_name"] != NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['teacher_id' => $teacher_id, 'year' => $request["year"], 'semester' => $request["semester"], 'teacher_to_subjects.subject_id' => $request["subject_id"]])
                    ->where('students.first_name', 'LIKE', '%' . $request["student_name"] . '%')
                    ->get();
            } else if ($request["subject_id"] != NULL  && $request["student_code"] != NULL && $request["student_name"] != NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['teacher_id' => $teacher_id, 'year' => $request["year"], 'semester' => $request["semester"], 'students.student_code' => $request["student_code"], 'teacher_to_subjects.subject_id' => $request["subject_id"]])
                    ->where('students.first_name', 'LIKE', '%' . $request["student_name"] . '%')
                    ->get();
            }
        } else {
            if ($request["subject_id"] == NULL && $request["student_code"] == NULL && $request["student_name"] == NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['year' => $request["year"], 'semester' => $request["semester"]])
                    ->get();
            } else if ($request["subject_id"] != NULL  && $request["student_code"] == NULL && $request["student_name"] == NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['year' => $request["year"], 'semester' => $request["semester"], 'teacher_to_subjects.subject_id' => $request["subject_id"]])
                    ->get();
            } else if ($request["subject_id"] == NULL  && $request["student_code"] != NULL && $request["student_name"] == NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['year' => $request["year"], 'semester' => $request["semester"], 'students.student_code' => $request["student_code"]])
                    ->get();
            } else if ($request["subject_id"] == NULL  && $request["student_code"] == NULL && $request["student_name"] != NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['year' => $request["year"], 'semester' => $request["semester"]])
                    ->where('students.first_name', 'LIKE', '%' . $request["student_name"] . '%')
                    ->get();
            } else if ($request["subject_id"] != NULL  && $request["student_code"] != NULL && $request["student_name"] == NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['year' => $request["year"], 'semester' => $request["semester"], 'teacher_to_subjects.subject_id' => $request["subject_id"], 'students.student_code' => $request["student_code"]])
                    ->get();
            } else if ($request["subject_id"] == NULL  && $request["student_code"] != NULL && $request["student_name"] != NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['year' => $request["year"], 'semester' => $request["semester"], 'students.student_code' => $request["student_code"]])
                    ->where('students.first_name', 'LIKE', '%' . $request["student_name"] . '%')
                    ->get();
            } else if ($request["subject_id"] != NULL  && $request["student_code"] == NULL && $request["student_name"] != NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['year' => $request["year"], 'semester' => $request["semester"], 'teacher_to_subjects.subject_id' => $request["subject_id"]])
                    ->where('students.first_name', 'LIKE', '%' . $request["student_name"] . '%')
                    ->get();
            } else if ($request["subject_id"] != NULL  && $request["student_code"] != NULL && $request["student_name"] != NULL) {
                $results = DB::table('teacher_to_subjects')
                    ->select('reports.id AS report_id', 'students.student_code AS student_code', 'students.first_name', 'students.last_name', 'teacher_to_subjects.subject_id', 'subjects.name', 'semester', 'year', 'reports.note', 'reports.mark', 'reports.title', 'reports.path')
                    ->join('reports', 'teacher_to_subjects.id', '=', 'reports.teacher_to_subject_id')
                    ->join('students', 'students.id', '=', 'reports.student_id')
                    ->join('subjects', 'subjects.id', '=', 'teacher_to_subjects.subject_id')
                    ->where(['year' => $request["year"], 'semester' => $request["semester"], 'students.student_code' => $request["student_code"], 'teacher_to_subjects.subject_id' => $request["subject_id"]])
                    ->where('students.first_name', 'LIKE', '%' . $request["student_name"] . '%')
                    ->get();
            }
        }
        return $results;
    }
    public function set_mark(Request $request)
    {
        try {
            Report::where([
                'id' => $request["report_id"]
            ])->update(['mark' => intval($request["mark"])]);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
        return 'success';
    }
    public function open_file(Request $request)
    {
        $report = Report::where('id', $request["report_id"])->get();
        $report_path = $report[0]["path"];
        $path = storage_path('\\app\\' . $report_path);
        return  response()->download($path);
    }
}
