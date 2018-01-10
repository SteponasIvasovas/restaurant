@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if ($cart != null)
          @foreach ($cart->items as $items)
            <tr id="item-{{$items['item']['id']}}">
              <td>{{$items['item']['title']}}</td>
              <td><span id="price-{{$items['item']['id']}}">{{$items['price']}}</span> Bitcoinai</td>
              <td><span id="quantity-{{$items['item']['id']}}">{{$items['qty']}}</span></td>
              <td><span id="total-{{$items['item']['id']}}">{{$items['qty'] * $items['price']}}</span> Bitcoinai</td>
              <td>
                <a id="delete-one" class="delete-one btn btn-warning" data-id="{{$items['item']['id']}}">Delete by one</a>
                <a id="delete-all" class="delete-all btn btn-warning" data-id="{{$items['item']['id']}}">Delete all</a>
              </td>
            </tr>
          @endforeach
          <tr>
            <td colspan="5" class="text-right">Total ordered : <span id="total-qty">{{$cart->totalQty}}</span></td>
          </tr>
          <tr><td colspan="5" class="text-right">Total price : <span id="total-price">{{$cart->totalPrice}} Bitcoinai</span></td></tr>
          <tr>
            <td colspan="5">
              <form action="{{route('cart.deleteCart')}}" method="POST"
              style="display: inline"
              onsubmit="return confirm('Are you sure you want to delete cart????');">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger pull-right">Delete</button>
              </form>
              <form action="{{route('order.store')}}" method="POST"
              style="display: inline">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger pull-right">Checkout</button>
              </form>
            </td>
          </tr>
          @else
            <tr><td>Cart is empty</td></tr>
          @endif
      </tbody>
    </table>
</div>
<script
     src="https://code.jquery.com/jquery-3.2.1.min.js"
     integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
     crossorigin="anonymous">
   </script>

   <script type="text/javascript">
     $(document).ready(function () {
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       $('a.delete-all').click(function () {
         var dish_id = $(this).data('id');
         $("#item-" + dish_id).remove();

         var url = "/cart/deleteAll";
         $.ajax({
           type: "POST",
           url: url,
           data: {id : dish_id},
           dataType: "json",
           success: function (data) {
            $('#total-qty').html(data.totalQty);
            $('#total-price').html(data.totalPrice);
            $('#cart-id span').html(data.totalQty);
            console.log(data);
           },
           error: function (data) {
             console.log('Error');
           }
         })
       });
       $('a.delete-one').click(function () {
         var dish_id = $(this).data('id');

         let quantity = $("#quantity-" + dish_id).html() - 1;

         if (quantity == 0) {
           $("#item-" + dish_id).remove();
         } else {
           $("#quantity-" + dish_id).html(quantity);
           $("#total-" + dish_id).html(quantity * $("#price-" + dish_id));
         }

         var url = "/cart/" + dish_id;
         $.ajax({
           type: "GET",
           url: url,
           data: {id : dish_id},
           dataType: "json",
           success: function (data) {
            $('#total-qty').html(data.totalQty);
            $('#total-price').html(data.totalPrice);
            $('#cart-id span').html(data.totalQty);
            // console.log(data);
           },
           error: function (data) {
             console.log('Error');
           }
         })
       });
     });
   </script>
@endsection
