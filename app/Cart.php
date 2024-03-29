<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart != null){
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
//    public function add($item, $id){
//        $storedItem  = ['quantity' => 0,'price' => $item->price,'item' => $item];
//        if ($this->items){
//            if (array_key_exists($id, $this->items)){
//                $storedItem = $this->items[$id];
//            }
//        }
//        $storedItem['quantity']++;
//        $storedItem['price'] = $item->price * $storedItem['quantity'];
//        $this->items[$id] = $storedItem;
//        $this->totalQuantity++;
//        $this->totalPrice += $item->price;
//    }

    public function add($item, $id){
        $storedItem  = ['price' => $item->price,'item' => $item];
        if ($this->items){
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['price'] = $item->price;
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->price;
    }
}
