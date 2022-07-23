<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable = [
        'id', 'name', 'code', 'note'
    ];
    public function teacher()
    {
        return $this->belongsToMany('App\Models\Teacher', 'teacher_to_subjects', 'subject_id', 'teacher_id')->withPivot('id', 'semester', 'year')->withTimestamps();
    }
}
