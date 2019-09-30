<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = "purchases";
    protected $fillable = ['phone','product_id','status'];

//    public function user()
//    {
//        return $this->belongsTo('App\User');
//    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
