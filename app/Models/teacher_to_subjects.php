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
    
    public function teachers()
    {
        return $this->belongsTo(teachers::class, 'teacher_id', 'id', teacher_to_subjects::class);
    }
    
}
