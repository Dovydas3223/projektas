<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exercises extends Model
{
    protected $fillable = ['exerciseName', 'description', 'image'];
}
