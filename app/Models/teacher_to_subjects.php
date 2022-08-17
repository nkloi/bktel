<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_to_subjects extends Model
{
    use HasFactory;

    protected $table = 'teacher_to_subjects';

    protected $fillable = [
        'teacher_id', 'subject_id', 'semester', 'year', 'note'
    ];
    
    public function teacher()
    {
        return $this->belongsToMany('App\Models\teacher', 'subjects', 'subject_id', 'teacher_id', 'year')->withPivot('semester');
    }

    public function report()
    {
        return $this->belongsTo('App\Models\Report');
    }

    public $timestamps = false;

}