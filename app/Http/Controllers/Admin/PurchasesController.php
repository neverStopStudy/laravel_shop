<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Purchase;
use Carbon\Carbon;


class PurchasesController extends Controller
{
    public function index()
    {
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

    public function newpurchases()
    {
        $purchases = Purchase::all()->where('created_at', '>=', Carbon::now()->subDays(1));
        return  view('admin.purchases.newpuchases',['purchases' => $purchases]);
    }

    public function paid()
    {
        $purchases = Purchase::all()->where('status', 1);
        return  view('admin.purchases.paid',['purchases' => $purchases]);
    }

    public function unpaid()
    {
        $purchases = Purchase::all()->where('status', 0);
        return  view('admin.purchases.unpaid',['purchases' => $purchases]);
    }
}
