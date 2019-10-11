<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Purchase;
use Auth;

class PurchasesController extends Controller
{
    public function index(){
        $purchases = Purchase::all();
        return  view('admin.purchases.index',['purchases' => $purchases]);
    }

    public function store(Request $request)
    {
        foreach (session()->get('cart')->items as $item){
//            $purchase = new Purchase();
//            $purchase->user_id = Auth::user()->id;
//            $purchase->phone = $request->phone;
//            $purchase->product_id = $item['item']['id'];
//            $purchase->save();
            Purchase::createPurchase($request,$item);
        }
        session()->forget('cart');
        return redirect()->route('product.index');
    }
}

