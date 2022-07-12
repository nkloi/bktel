<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $table='teachers';
    protected $fillable = [
        'first_name', 'last_name', 'teacher_code', 'department', 'faculty', 'address', 'phone', 'note'
    ];

    protected $hidden = [
        'remember_token'
    ];
}
