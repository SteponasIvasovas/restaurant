@extends ('layouts.admin')

@section('content')
<div class="col-md-8">
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
            <p>Price&nbsp:&nbsp{{ $dish->price }}&nbspBitcoinai</p>
            <div class="pull-right" style="margin-top: 20px">
              <a class="btn btn-primary" href="{{route('dish.edit', $dish)}}" style="margin-right: 5px;">Edit</a>
              <form action="{{ route('dish.destroy', $dish) }}" method="POST"
              style="display: inline"
              onsubmit="return confirm('Are you sure?');">
              {{ csrf_field() }}
              {{ method_field('delete') }}
                <button class="btn btn-danger pull-right">Delete</button>
              </form>
            </div>
          </div>
        </li>
        @endif
      @endforeach
    </div>
    @endfor
    <li class="col-md-12 clearfix" style="list-style: none; margin-top: 20px; padding-left: 0px;">
      <a class="btn btn-success" href="{{route('dish.create')}}">Create</a>
      <a class="btn btn-default" href="{{route('dish.create')}}">Back</a>
    </li>
  </ul>
</div>
@endsection
