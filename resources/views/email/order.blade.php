<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Order mail</title>
    <style media="screen">
      #order-mail-table,
      #order-mail-table th,
      #order-mail-table td {
        border: 1px dashed black;
      }
    </style>
  </head>
  <body>
    <h1> Hello, {{$name}} </h1>
    <table id="order-mail-table" class="table">
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
        <tr style="text-align: center">
          <td>{{$items['item']['title']}}</td>
          <td>{{$items['price']}} Bitcoinai</td>
          <td>{{$items['qty']}}</td>
          <td>{{$items['qty'] * $items['price']}} Bitcoinai</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <p>Total ordered : <span>{{$cart->totalQty}}</span></p>
    <p>Total price : <span>{{$cart->totalPrice}} Bitcoinai</span></p>
  </body>
</html>
