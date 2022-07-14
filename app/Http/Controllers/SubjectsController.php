<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Import;
use Illuminate\Support\Facades\Auth;
use App\Jobs\UpLoadCsvFile_Subject;

class SubjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Subject::create([
            'name' => $data["name"],
            'code' => $data["code"],
            'note' => $data["note"],
        ]);
        return redirect()->route('home.add_subject');
    }
    public function upload(Request $request)
    {
        $data = $request->file("file");
        $original_name = $data->getClientOriginalName();
        $name = date('Ymd_His_') . $original_name;
        $path = $data->storeAs('data', $name);
        Import::create([
            'name' => $request->name,
            'path' => $path,
            'status' => 0,
            'created_by' => Auth::user()->name,
            'note' => $request->note,
        ]);
        $id = Import::max('id');
        $file_path = storage_path('app\\data\\' . $name);
        $file = fopen($file_path, "r");
        while (!feof($file)) {
            $content[] = fgetcsv($file, 0, ',');
        }
        UpLoadCsvFile_Subject::dispatch($content, $id)->delay(5);
        return redirect()->route('home.add_subject');
    }
}
