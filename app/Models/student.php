<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'last_name', 'first_name','student_code', 'department','faculty', 'address','phone','note'];
    public $timestamps = false;
}
