<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'file'];

    public function getFileUrlAttribute()
    {
        return \Storage::url("{$this->id}/{$this->file}");
    }
}
