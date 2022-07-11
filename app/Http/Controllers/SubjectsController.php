<?php

namespace App\Http\Controllers;

use App\Jobs\ImportSubject;
use App\Models\Import;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function showImport()
    {
        return view('subjects.import');
    }

    public function showForm()
    {
        return view('subjects.form');
    }

    //action get subject with id
    public function show($subject_id)
    {
        $subject = Subject::find($subject_id);
        $users = $subject->user;

        $email = $users->email;
        $subjectfull = $subject->attributesToArray();
        $subjectfull["email"] = $email;
        return response()->json($subjectfull);
    }

    //save subject
    public function store(Request $request)
    {
        info($request);

        $subject = new Subject();
        $subject->fill($request->all());
        $subject->save();

        $subject->save();

        return response()->json('success');
    }

    //acction update subject
    public function update(Request $request, $subject_id)
    {
        Subject::find($subject_id)->update($request->all());
        return response('success', 200);
    }

    //action delete subject
    public function destroy(Request $request, $subject_id)
    {
        $subject = Subject::find($subject_id);

        $subject->delete();

        return response('suceess', 200);
    }

    public function storeImport(Request $request)
    {
        $path = storage_path('app\data\\');
        // $file_name = $request->file->getClientOriginalName();
        $name = $request->name;

        $generated_new_name = date('Ymd_His') . '_' . $request->file->getClientOriginalName();
        $path_import = 'app\data\\' . $generated_new_name;
        $request->file->move($path, $generated_new_name);

        $import = new Import();
        $import->name = $name;
        $import->path = $path_import;
        $import->status = 0;
        $import->save();

        dispatch(new ImportSubject($path_import, $request->name, $import));

        return response()->json($request);
    }

    public function getAllSubjects(Request $request)
    {
        return response()->json(Subject::all());
    }
}