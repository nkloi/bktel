<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject; 

class SubjectController extends Controller
{
    public function index()
    {
    return view('layouts.subject');
    }
    
    
    public function store(Request $request){
       
        $data = $request->all();
 
        Subject::create([
            'teacher_id' => $data["teacher_id"],
            'subject_id' => $data["subject_id"],
            'semester' => $data["semester"],
            'year' => $data["year"],
            'note' => $data["note"],
        ]);
        
    } 
}
