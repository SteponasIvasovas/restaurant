<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function ajaxAdd(Request $request) {
      $id = $request->id;
      $dish = Dish::findOrFail($id);
      // $request->session()->flush();
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($dish, $id);
      $request->session()->put('cart', $cart);// galima ir taip rasyti Session::put('cart', $cart);
      echo json_encode($cart);// arba  return json_encode($cart);
    }
}
