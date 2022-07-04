<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;
use Mockery\Matcher\Subset;

class TeacherToSubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $get_teacher = Teacher::where('teacher_code', $data["lecturer_code"])->get();
        $subject = Subject::where('code', $data["subject_code"])->get();
        if (isset($get_teacher[0]['id']) && isset($subject[0]['id'])) {
            $teacher = Teacher::find($get_teacher[0]['id']);
            if (!$teacher->subject->contains($subject[0]['id'])) {
                $teacher->subject()->attach($subject[0]['id'], [
                    'semester' => $data["semester"],
                    'year' => $data["year"],
                    'note' => $data["note"],
                ]);
            } else {
                $items = $teacher->subject->where('id', $subject[0]['id']);
                $duplicate = false;
                foreach ($items as $item) {
                    if ($item["pivot"]["semester"] == $data["semester"] && $item["pivot"]["year"] == $data["year"]) {
                        $duplicate = true;
                    }
                }
                if (!$duplicate) {
                    $teacher->subject()->attach($subject[0]['id'], [
                        'semester' => $data["semester"],
                        'year' => $data["year"],
                        'note' => $data["note"],
                    ]);
                }
            }
        } else {
            $err = "ID was wrong! (LeturerID or SubjectID or Both)";
            return $err;
        }
    }
    public function search(Request $request)
    {
        if ($request["code"] == NULL && $request["subject_code"] == NULL && $request["semester"] == NULL) {
            $search = DB::table('teacher_to_subjects')->where('year', intval($request->year))->get();
        } else if ($request["code"] != NULL && $request["subject_code"] != NULL && $request["semester"] != NULL) {
            // $teachers = Teacher::where('first_name', 'LIKE', '%' . $request["name"] . '%')->get();
            $code = Teacher::where('teacher_code', $request["code"])->get();
            $subject_code = Subject::where('code', $request["subject_code"])->get();
            if (isset($subject_code[0]["id"]) && isset($code[0]["id"])) {
                $search = DB::table('teacher_to_subjects')->where('year', intval($request->year))
                    ->where('semester', intval($request->semester))
                    ->where('subject_id', intval($subject_code[0]["id"]))
                    ->where('teacher_id', intval($code[0]["id"]))->get();
            } else {
                $search = "Code was wrong!";
            }
        } else if ($request["code"] != NULL && $request["subject_code"] == NULL && $request["semester"] == NULL) {
            $code = Teacher::where('teacher_code', $request["code"])->get();
            if (isset($code[0]["id"])) {
                $search = DB::table('teacher_to_subjects')->where('year', intval($request->year))
                    ->where('teacher_id', intval($code[0]["id"]))->get();
            } else {
                $search = "Code was wrong!";
            }
        } else if ($request["code"] == NULL && $request["subject_code"] != NULL && $request["semester"] == NUll) {
            $subject_code = Subject::where('code', $request["subject_code"])->get();
            if (isset($subject_code[0]["id"])) {
                $search = DB::table('teacher_to_subjects')->where('year', intval($request->year))
                    ->where('subject_id', intval($subject_code[0]["id"]))->get();
            } else {
                $search = "Code was wrong!";
            }
        } else if ($request["code"] == NULL && $request["subject_code"] == NULL && $request["semester"] != NULL) {
            $search = DB::table('teacher_to_subjects')->where('year', intval($request->year))
                ->where('semester', intval($request->semester))->get();
        } else if ($request["code"] != NULL && $request["subject_code"] != NULL && $request["semester"] == NULL) {
            $code = Teacher::where('teacher_code', $request["code"])->get();
            $subject_code = Subject::where('code', $request["subject_code"])->get();
            if (isset($subject_code[0]["id"]) && isset($code[0]["id"])) {
                $search = DB::table('teacher_to_subjects')->where('year', intval($request->year))
                    ->where('subject_id', intval($subject_code[0]["id"]))
                    ->where('teacher_id', intval($code[0]["id"]))->get();
            } else {
                $search = "Code was wrong!";
            }
        } else if ($request["code"] != NULL && $request["subject_code"] == NULL && $request["semester"] != NULL) {
            $code = Teacher::where('teacher_code', $request["code"])->get();
            if (isset($code[0]["id"])) {
                $search = DB::table('teacher_to_subjects')->where('year', intval($request->year))
                    ->where('semester', intval($request->semester))
                    ->where('teacher_id', intval($code[0]["id"]))->get();
            } else {
                $search = "Code was wrong!";
            }
        } else if ($request["code"] == NULL && $request["subject_code"] != NULL && $request["semester"] != NULL) {
            $subject_code = Subject::where('code', $request["subject_code"])->get();
            if (isset($subject_code[0]["id"])) {
                $search = DB::table('teacher_to_subjects')->where('year', intval($request->year))
                    ->where('semester', intval($request->semester))
                    ->where('subject_id', intval($subject_code[0]["id"]))->get();
            } else {
                $search = "Code was wrong!";
            }
        }
        if (is_object($search)) {
            foreach ($search as $result) {
                $subject = Subject::where('id', $result->subject_id)->get();
                $teacher = Teacher::where('id', $result->teacher_id)->get();
                $teacher_name = $teacher[0]["first_name"] . " " . $teacher[0]["last_name"];
                $subject_name = $subject[0]["name"];
                $result->teacher_id = $teacher_name;
                $result->subject_id = $subject_name;
            }
            return $search;
        } else {
            return $search;
        }
    }
    public function getAllTeacherCode()
    {
        $all_teacher = Teacher::orderBy('first_name', 'asc')->get();
        return $all_teacher;
    }
    public function getAllSubjectCode()
    {
        $all_subject = Subject::orderBy('name', 'asc')->get();
        return $all_subject;
    }
}
