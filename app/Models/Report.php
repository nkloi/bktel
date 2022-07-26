<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id','teacher_to_subjects_id', 'title', 'path', 'mark', 'note'
    ];
    public $timestamps = false;
}