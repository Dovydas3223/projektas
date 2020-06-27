<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['Name', 'description', 'image', 'table'];

    public function ingredient(){
        return $this->belongsToMany('app\Ingredient');
    }

}
