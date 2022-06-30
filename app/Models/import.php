<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class import extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'path', 'status', 'created_by', 'note'
    ];
    public $timestamps = false;
}
