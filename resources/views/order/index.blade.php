@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Your orders</h1>
  @foreach($orders as $order)

  <table class="table">
    <thead>
      <tr><th class="text-center" colspan="4">Order id : {{$order->id}}</th></tr>
      <tr class="text-center">
        <th>Title</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total price</th>
      </tr>
    </thead>
    <tbody>
      @foreach($order->cart->items as $items)
        <tr class="text-center">
          <td>{{$items['item']['title']}}</td>
          <td>{{$items['price']}}</td>
          <td>{{$items['qty']}}</td>
          <td>{{$items['price'] * $items['qty']}}</td>
        </tr>
      @endforeach
      <tr><td>Total ordered : <span>{{$order->cart->totalQty}}</span></td></tr>
      <tr><td>Total price : <span>{{$order->cart->totalPrice}} Bitcoinai</span></td></tr>
    </tbody>
  </table>
  @endforeach
  <div class="text-center">
    {{$orders->links()}}
  </div>
</div>
@endsection
