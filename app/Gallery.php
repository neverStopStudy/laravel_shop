<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = ['product_id'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
