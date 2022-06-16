<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class students extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name','first_name', 'student_code', 'department', 'faculty', 'address', 'phone', 'note'
    ];

    public function studentid()
    {
        return $this->hasOne('App\Models\User');
    }
}
