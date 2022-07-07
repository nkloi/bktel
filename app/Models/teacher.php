<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    public $table='teacher';
    public $fillable = [
        'first_name', 'last_name', 'teacher_code', 'department', 'faculty', 'address', 'phone', 'note'
    ];
    public function teacherid()
    {
        return $this->hasOne('App\Models\User');
    }
}
