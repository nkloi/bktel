<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;

class Subject extends Model
{
    use HasFactory;

    protected $table='subjects';
    protected $fillable=['id','name','code', 'note'];
}
