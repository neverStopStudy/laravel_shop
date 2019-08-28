<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;

class CartsController extends Controller
{
    public function allProducts()
    {
        if (!Session::has('cart')){
            return view('cart.index');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        return view('cart.index',['products' => $cart->items,'totalPrice' => $cart->totalPrice]);
    }
}
