<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index() {
      $orders = Order::all();
      $orders->transform(function($item, $key) {
        $item->cart = unserialize($item->cart);
        return $item;
      });

      dd($orders);
      return view('order.index', compact('orders'));
    }

    public function store(Request $request) {
      $order = new Order();
      $order->user_id = $request->user()->id;
      $cart = Session::get('cart');
      $order->cart = serialize($cart);
      Session::forget('cart');
      $order->save();
      return redirect('/')->with(['message' => 'Order successful']);
    }

}
