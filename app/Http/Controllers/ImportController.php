<?php

namespace App\Http\Controllers;

use App\Jobs\ImportJob;
use App\Models\Import;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function showImport()
    {
        return view('dashboard.admin.import');
    }

    public function store(Request $request)
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

        dispatch(new ImportJob($path_import, $request->name, $import));

        return response()->json('success');
    }
}
