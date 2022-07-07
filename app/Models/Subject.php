<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\teacher;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id','subject_id', 'semester', 'year', 'note'
    ];
    public $timestamps = false;
   
    public function teacher(){
        return $this->belongsToMany('App\Models\teacher', 'subjects', 'subject_id', 'teacher_id', 'year')->withPivot('semester');
    }
}
