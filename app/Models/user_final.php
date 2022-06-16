<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_final extends Model
{
    use HasFactory;
    protected $attributes =[
        'last_name', 'first_name'
    ];
}
