<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'student_code', 'department', '​faculty', 'address', 'phone', 'note'
    ];

    public function user()
    {
        return $this->hasOne(Userr::class, 'student_id');
    }
}
