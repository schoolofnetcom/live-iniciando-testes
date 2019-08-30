<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'is_active']; //mass assigment

    //mutators

    protected $dates = [
        'field',
    ];
}
