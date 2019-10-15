<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Purchase;
use Auth;
use App\Mail\newPurchase;
use Illuminate\Support\Facades\Mail;

class PurchasesController extends Controller
{
    public function index(){
        $purchases = Purchase::all();
        return  view('admin.purchases.index',['purchases' => $purchases]);
    }

    public function store(Request $request)
    {
        foreach (session()->get('cart')->items as $item){
            $purchase = new Purchase();
            if(Auth::user()) {
                $purchase->user_id = Auth::user()->id;
            }
            $purchase->phone = $request->phone;
            $purchase->product_id = $item['item']['id'];
            $purchase->save();

//            $purchase = Purchase::createPurchase($request,$item);
            Mail::to("kak.nazvat.pochtu@gmail.com")->send(new newPurchase($purchase));
        }
        session()->forget('cart');
        return redirect()->route('product.index');
    }
}

