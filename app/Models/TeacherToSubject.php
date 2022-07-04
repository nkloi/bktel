<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherToSubject extends Model
{
    use HasFactory;

    protected $table = "teacher_to_subjects";
    protected $fillable = [
        'teacher_id', 'subject_id', 'semester', 'year', 'note',
    ];
}
