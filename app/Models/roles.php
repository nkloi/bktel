<?php

namespace App\Models;

use Database\Seeders\roles_table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    protected $table="roles";
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
