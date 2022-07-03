<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'code', 'note'];

    public function teacher(){

        return $this->belongsToMany(Teacher::class, 'teacher_to_subjects', 'subject_id', 'teacher_id');
    }
}
