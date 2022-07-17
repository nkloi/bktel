<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'teacher_to_subject_id',
        'title',
        'path',
        'mark',
        'note',
        ];
    public function TeacherToSubject()
    {
        return $this->hasOne(TeacherToSubject::class, 'teacher_to_subject_id');
    }
    public function Student()
    {
        return $this->hasMany(Student::class, 'student_id');
    }
}
