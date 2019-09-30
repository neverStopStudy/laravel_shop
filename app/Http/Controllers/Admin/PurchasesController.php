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

}
