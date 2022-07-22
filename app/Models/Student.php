<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    // {
    //     return $this->hasOne('App\Models\User');
    // }

    protected $fillable = [
        'first_name', 'last_name', 'student_code', 'department', 'faculty', 'address', 'phone', 'note'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'student_id');
    }

    public function Report()
    {
        return $this->hasMany(Report::class);
    }
}

   


