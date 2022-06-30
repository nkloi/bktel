<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'subject_code', 'note'];

    public function teachers(){
        
        return $this->belongsToMany('App\Models\teachers', 'teacher_to_subjects', 'subject_id', 'teacher_id');
    }

}
