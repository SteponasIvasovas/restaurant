<?php

namespace App;

class Cart
{
    public $items = array();
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
      if($oldCart) {
        $this->items = $oldCart->items;
        $this->totalQty = $oldCart->totalQty;
        $this->totalPrice = $oldCart->totalPrice;
      }
    }

    public function add($dish, $id) {
      $storeItem = ['qty' => 0, 'price' => $dish->price, 'item' => $dish];
      if($this->items) {
      //tikrinam ar yra preke krepselyje
        if(array_key_exists($id, $this->items)) {
          $storeItem = $this->items[$dish->id];
        }
      }

      $storeItem['qty']++;
      $storeItem['price'] = $dish->price;
      $this->items[$dish->id] = $storeItem;
      $this->totalQty++;
      $this->totalPrice += $dish->price;
    }

    public function deleteByOne($id) {
      $this->totalQty--;
      $this->totalPrice -= $this->items[$id]['price'];
      $quantity = --$this->items[$id]['qty'];

      if ($quantity == 0) {
        unset($this->items[$id]);
      }
    }

    public function deleteAll($id) {
      $this->totalQty -= $this->items[$id]['qty'];
      $this->totalPrice -= ($this->items[$id]['qty'] * $this->items[$id]['price']);
      unset($this->items[$id]);
    }
}
