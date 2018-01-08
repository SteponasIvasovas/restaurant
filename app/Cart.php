<?php

namespace App;

class Cart
{
    public $items=null;
    public $totalQty;
    public $totalPrice;

    public function __construct($oldCart) {
      if($oldCart) {
        $this->items = $oldCart->items;
        $this->totalQty = $oldCart->totalQty;
        $this->totalPrice = $oldCart->totalPrice;
      }
    }

    public function add($dish, $id) {
      $storeItem = ['qty'=>0, 'price'=>$dish->price, 'item'=>$dish];
      if($this->items) {
        //tikrinam ar yra preke krepselyje
        if(array_key_exists($id, $this->items[$dish->id])) {
          $storeItem = $this->items[$dish->id];
        }
      }
       $storeItem['qty']++;
       $storeItem['price']=$storeItem['qty']*$dish->price;
       $this->totalQty++;
       $this->totalPrice+= $dish->price;
    }
}
