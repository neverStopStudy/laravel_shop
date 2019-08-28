<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductCategorie extends Model
{
    protected $fillable = ['title','parent_id','published','slug'];
    protected $table = 'product_categories';

    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title,0,40) . "-" .
            Carbon::now()->format('dmyHi'),"-");
    }

    public function children(){
        return $this->hasMany(self::class,'parent_id');
    }

    public function products()
    {
        return $this->hasMany('App\Product','category_id');
    }
}
