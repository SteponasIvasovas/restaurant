<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Mail\OrderAccept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index() {
      $orders = Auth::user()->orders()->paginate(4);

      $orders->transform(function($order, $key) {
        $order->cart = unserialize($order->cart);
        return $order;
      });

      $orders->all();

      return view('order.index', compact('orders'));
    }

    public function store(Request $request) {
      $order = new Order();
      $cart = Session::get('cart');
      $order->cart = serialize($cart);
      Auth::user()->orders()->save($order); // $order->user_id = $request->user()->id;
      Mail::to($request->user())->send(new OrderAccept($cart));
      Session::forget('cart');
      return redirect('/')->with(['message' => 'Order successful']);
    }
}
