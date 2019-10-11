<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class Purchase extends Model
{
    protected $table = "purchases";
    protected $fillable = ['user_id','phone','product_id','status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public static function createPurchase(Request $request, $item){
        $purchase = new Purchase();

        if(Auth::user()->id){
            $purchase->user_id = Auth::user()->id;
        }
        $purchase->phone = $request->phone;
        $purchase->product_id = $item['item']['id'];
        $purchase->save();
    }
}
