<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = [
        'last_name', 'teacher_code', 'department', 'first_name', 'faculty', 'address', 'phone', 'note'
    ];
    protected $hidden = [
        'remember_token'
    ];
    public function subject()
    {
        return $this->belongsToMany('App\Models\Subject', 'teacher_to_subjct', 'teaachet_id', 'subject_id')->withPivot('id', 'semester', 'year')->withTimestamps();
    }
}