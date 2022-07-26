<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_report extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'teacher_to_subject_id', 'title', 'path', 'mark', 'note'
    ];

    public $timestamps = false;
}
