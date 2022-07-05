<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\students;
use App\Models\teachers;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'student_id', 'teacher_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function received()
    {
        return $this->belongsTo(students::class, 'student_id', 'id', User::class);
    }

    public function teacher()
    {
        return $this->belongsTo(teachers::class, 'teacher_id', 'id', User::class);
    }

    public function roles()
    {
        return $this->belongsTo(roles::class, 'role_id', 'id', User::class);
    }


}
