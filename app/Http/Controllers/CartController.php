<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index() {
      $cart = Session::has('cart') ? Session::get('cart') : null;
      return view('cart.index', compact('cart'));
    }

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

    public function deleteByOne(Request $request) {
      $id = $request->id;
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->deleteByOne($id);
      $request->session()->put('cart', $cart);
      // return view ('cart.index', compact('cart'));
      echo json_encode($cart);
    }

    public function deleteAll(Request $request) {
      $id = $request->id;
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->deleteAll($id);
      $request->session()->put('cart', $cart);
      echo json_encode($cart);
    }

    public function deleteCart(Request $request) {
      $request->session()->forget('cart');
      return redirect('cart');
    }
}
