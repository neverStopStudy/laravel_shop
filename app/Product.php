<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','description','price','category_id'];

    public function gallery()
    {
        return $this->hasOne('App\Gallery');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function category()
    {
        return $this->belongsTo('App\ProductCategorie');
    }


}
