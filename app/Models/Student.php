<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    public $fillable = ['first_name','last_name','student_code','departure','faculty','address','phone','note'];

    public function user()
    {
        return $this->hasOne(User::class, 'student_id');
    }
}
