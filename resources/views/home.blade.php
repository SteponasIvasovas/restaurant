@extends('layouts.app')

@section('content')
<div class="container">
  @if (session('message'))
    <p class="alert alert-info">{{ session('message') }}</p>
  @endif
      <ul class="list-group">
        @for ($i = 0; $i < 4; $i++)
          <div class="col-md-3" style="padding: 0">
          @foreach($dishes as $dish)
            @if (($loop->iteration + 3) % 4 == $i)
            <li class="list-group-item col-md-12 clearfix" style="">
              <div class="text-justify">
                <img src="/storage/images/{{$dish->photo}}" alt="no-image-available" style="width: 100%; border-radius: 100%;">
                <h2>{{ $dish->title }}</h2>
                <p>{{ $dish->description }}</p>
                <p>Price : {{ $dish->price }} Bitcoinai</p>
              </div>
              <a href="#" data-id="{{$dish->id}}" class="cart btn btn-block btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbspAdd to cart</a>
            </li>
            @endif
          @endforeach
        </div>
        @endfor
      </ul>
</div>
<div class="text-center">
  {{$dishes->links()}}
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
       $('a.cart').click(function () {
         var dish_id = $(this).data('id');
         var url = "/cart/add";
         $.ajax({
           type: "POST",
           url: url,
           data: {id : dish_id},
           dataType: "json",
           success: function (data) {
             $('#cart-id span').html(data.totalQty);
            //  console.log(data.totalQty);
           },
           error: function (data) {
             console.log('Error');
           }
         })
       });
     });
   </script>
@endsection
