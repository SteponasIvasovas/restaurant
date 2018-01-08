@extends('layouts.app')

@section('content')

<div class="container">
  @if ($cart != null)
    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total price</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cart->items as $items)
          <tr>
            <td>{{$items['item']['title']}}</td>
            <td>Price : {{$items['price']}} Bitcoinai</td>
            <td>Quantity : {{$items['qty']}}</td>
            <td>Total price : {{$items['qty'] * $items['price']}} Bitcoinai</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <p>Total ordered : {{$cart->totalQty}}</p>
    <p>Total price : {{$cart->totalPrice}} Bitcoinai</p>
    <form action="" method="POST"
     style="display: inline"
     onsubmit="return confirm('Are you sure?');">
      {{ csrf_field() }}
      {{ method_field('delete') }}
      <button class="btn btn-danger pull-right">Delete</button>
    </form>
  @else
    <p>Cart is empty</p>
  @endif
</div>
@endsection
