<?php

namespace App\Models;

use Database\Seeders\users;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    public function roleid()
    {
        return $this->hasOne('App\Models\User');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');

    }
}