<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'Students';
    protected $fillable = [
        'last_name', 'student_code', 'department', 'first_name', 'faculty', 'address', 'phone', 'note'
    ];
    protected $hidden = [
        'remember_token'
    ];
}
