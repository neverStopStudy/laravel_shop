<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    public function product()
    {
        return $this->belongsTo('App\Gallery');
    }

    public function findFirst($images)
    {
        return array_shift($images);
    }
}
