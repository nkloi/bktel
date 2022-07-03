<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_to_Subjects extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id', 'subject_id', 'semester', 'year', 'note',
    ];
}
