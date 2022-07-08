<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_to_subjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id', 'subject_id', 'semester', 'year', 'note',
    ];
}
