<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseCategory extends Model
{
    protected $fillable = ['categoryName', 'description', 'image'];
}
