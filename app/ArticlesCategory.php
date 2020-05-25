<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticlesCategory extends Model
{
    protected $fillable = ['categoryName', 'description', 'image'];
}
