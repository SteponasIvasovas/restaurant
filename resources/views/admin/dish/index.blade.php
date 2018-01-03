@extends ('layouts.admin')

@section('content')
<div class="col-md-8">
  @if (session('message'))
    <p class="alert alert-info">{{ session('message') }}</p>
  @endif
  <ul class="list-group">
    @foreach($dishes as $dish)
    <li class="list-group-item col-md-3 clearfix">
      <div class="pull-left text-justified">
        <img src="/storage/images/{{$dish->photo}}" alt="no-image-available" style="width: 100%; max-height: 100px; border-radius: 100%;">
        <h2>{{ $dish->title }}</h2>
        <p>{{ $dish->description }}</p>
        <p>Price : {{ $dish->price }} Bitcoinai</p>
      </div>
      <div class="pull-right">
        <a class="btn btn-primary" href="{{route('dish.edit', $dish)}}" style="margin-right: 5px;">Edit</a>
        <form action="{{ route('dish.destroy', $dish) }}" method="POST"
         style="display: inline"
         onsubmit="return confirm('Are you sure?');">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <button class="btn btn-danger pull-right">Delete</button>
        </form>
      </div>
    </li>
    @endforeach
    <li class="col-md-12 clearfix" style="list-style: none; margin-top: 20px; padding-left: 0px;">
      <a class="btn btn-success" href="{{route('dish.create')}}">Create</a>
      <a class="btn btn-default" href="{{route('dish.create')}}">Back</a>
    </li>
  </ul>
</div>
@endsection
