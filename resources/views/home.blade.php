@extends('layouts.app')

@section('content')
<div class="container">
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
              <a href="" class="btn btn-block btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbspAdd to cart</a>
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
@endsection
