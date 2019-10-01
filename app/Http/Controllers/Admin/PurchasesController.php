<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Purchase;

class PurchasesController extends Controller
{
    public function index(){
        $purchases = Purchase::all();
        return  view('admin.purchases.index',['purchases' => $purchases]);
    }

    public function edit($id){
        $purchase = Purchase::find($id);
        return  view('admin.purchases.index',['purchase' => $purchase]);
    }

    public function update($id)
    {
        $product = Purchase::find($id);
        $product->status = !$product->status;
        $product->save();
        return redirect()->route('admin.purchase.index');
    }

    public function destroy($id)
    {
        Purchase::destroy($id);
        return redirect()->route('admin.purchase.index');
    }
}
