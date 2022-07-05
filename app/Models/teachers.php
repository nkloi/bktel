<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subjects;

use function PHPUnit\Framework\returnSelf;

class teachers extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name', 'first_name', 'teacher_code', 'department', 'faculty', 'address', 'phone', 'note'
    ];

    public function teacherid()
    {
        return $this->hasOne('App\Models\User');
    }

    public function subjects()
    {

        return $this->belongsToMany('App\Models\subjects', 'teacher_to_subjects', 'teacher_id', 'subject_id')->withPivot('semester');
    }

    public function teacherTosubjects()
    {
        return $this->hasOne(teacher_to_subjects::class, 'teacher_id');
    }

}