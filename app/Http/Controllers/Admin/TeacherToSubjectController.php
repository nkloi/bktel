<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\imports;
use App\Models\teachers;
use Illuminate\Http\Request;
use App\Models\subjects;
use App\Models\teacher_to_subjects;
use App\Models\User;
use AuthorizesRequests;
use phpDocumentor\Reflection\Types\Null_;

use function PHPUnit\Framework\returnSelf;

class TeacherToSubjectController extends Controller
{
    //
    public function show()
    {
        return view('auth.TeacherToSubject');
    }
    public function findform()
    {
        return view('auth.FindTeacherAndSubject');
    }

    public function AddSubjectToTeacher()
    {

        $teacher_id = 5;

        $teacher = teachers::where('id', $teacher_id)->first();

        $subject_id = [8, 9, 10];

        if ($teacher->subjects()->attach($subject_id, [
            'semester' => 222,
            'year' => 2022,
            'note' => 'ok',

        ]));

        return response()->json("Adding Subject To Teacher Sucessfully!!");
    }

    public function getAllteacherbySubject($id, $subjectid)
    {

        $subjects = subjects::find($id);
        $teachers = $subjects->teachers;
        $teacher_id = $teachers[8]->pivot->semester;
        $teacher_id = $teachers[8]->pivot->subject_id[$subjectid];

        // $semester = $teachers->pivot->semester;

        // $semester = teacher_to_subjects::where('teacher_id', $teachers)->first()->pivot->semester;

        return response()->json($teacher_id);
    }

    public function getAllsubjectbyTeacher($id, $subjectid)
    {

        $teachers = teachers::find($id);
        $subjects = $teachers->subjects;
        $subject_id = $subjects[8]->pivot->semester;

        return response()->json($subject_id);
    }

    public function getSubjectAndTeacher(Request $request)
    {

        // $the_id = $request->all();
        // $teacher_id = $the_id["teacher_id"];
        // $subject_id = $the_id["subject_id"];
        // $semester = $the_id["semester"];
        // $semester = $the_id["year"];
        // $outcome = teacher_to_subjects::where('teacher_id', $teacher_id)->where('subject_id', $subject_id)->where('semester', $semester)->get();

        // $outcome = teacher_to_subjects::where('teacher_id', $teacher_id)->get();

        $data = teacher_to_subjects::select("*")
            ->when($request->has('teacher_id'), function ($query) use ($request) {
                $query->whereNotNull('teacher_id');
                $query->where('teacher_id', $request->teacher_id);
            })
            ->when($request->has('subject_id'), function ($query) use ($request) {
                $query->whereNotNull('subject_id');
                $query->where('subject_id', $request->subject_id);
            })
            ->when($request->has('semester'), function ($query) use ($request) {
                $query->whereNotNull('semester');
                $query->where('semester', $request->semester);
            })
            ->get();

        foreach ($data as $outcome) {
            $teacher_name = teachers::where('id', $outcome->teacher_id)->get();
            $subject_name = subjects::where('id', $outcome->subject_id)->get();
            $outcome->teacher_name = $teacher_name[0]["last_name"] . $teacher_name[0]["first_name"];
            $outcome->subject_name = $subject_name[0]["name"];
        }


        // $teacher_name = $data->teachers;

        return response()->json($data);

        // return view('home', ['user' => $data]);

    }

    public function showdata()
    {
        $user_id = 37;

        $user = teacher_to_subjects::where('id', $user_id)->first();

        $tecaher_name = $user->teachers;

        return response()->json($tecaher_name->last_name . ' ' . $tecaher_name->first_name);

        // return view('home', ['user' => 'DUY KHANH']);
    }

    public function uploadReport(Request $request)
    {

        $file = $request->file('report');

        $fullname = $file->getClientOriginalName();

        $name = date('Ymd_His_') . $fullname;

        $path = $request->file('student_file')->storeAs('data', $name);

        $userimport = new imports();

        return response()->json($path);
    }
}
